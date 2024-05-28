<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\User;
use App\Models\Flight;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Setting;
use App\Custom\Functions;
use App\Models\SeatBooking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    
    // Home/index page
    public function home()
    {
        return view('landing.home', [
            'company'=> Setting::latest()->first(),
            'upcoming_flights'=> Flight::where('status', 'available')->latest()->limit(10)->get()
        ]);
    }

    // Show available flights
    public function flights()
    {
        return view('landing.flights', [
            'company'=> Setting::latest()->first(),
            'flights'=> Flight::where('status', 'available')->latest()->get()
        ]);
    }

    // Search flights
    public function searchFlight(Request $request)
    {
        $query = Flight::query()->where('status', 'available');

        if ($request->filled('origin')) {
            $query->whereHas('origin', function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->origin . '%')
                  ->orWhere('country', 'like', '%' . $request->origin . '%');
            });
        }

        if ($request->filled('destination')) {
            $query->whereHas('destination', function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->destination . '%')
                  ->orWhere('country', 'like', '%' . $request->destination . '%');
            });
        }

        if ($request->filled('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        }

        if ($request->filled('arrival_date')) {
            $query->whereDate('arrival_time', $request->arrival_date);
        }

        $flights = $query->get();

        return view('landing.flights', [
            'company'=> Setting::latest()->first(), 'flights' => $flights
        ]);
    }

    // Flight page
    public function flight($id) 
    {
        $flight = Flight::find($id);
        $seats = $flight->seats->where('status', 'available');

        return view('landing.flight', [
            'company'=> Setting::latest()->first(),
            'flight'=> $flight, 'seats' => $seats
        ]);
    }

    // Show seat booking
    public function bookFlight($id)
    {
        // Fetching seat
        $seat = Seat::find($id);

        // Redirecting if seat has already been booked
        if ($seat->status == 'booked') {
            return redirect()->route('flights');
        }

        return view('landing.book-flight', [
            'company'=> Setting::latest()->first(),
            'seat'=> $seat
        ]);
    }

    // Save booking information
    public function saveBooking(Request $request)
    {
        // Validating post request
        $data = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'seat_id' => 'required|exists:seats,id',
            'reference_id' => 'required|string',        
            'amount' => 'required',
            'name' => 'required_if:is_anonymous,true|string|max:100',
            'email' => 'required_if:is_anonymous,true|email|max:100',
            'phone' => 'required_if:is_anonymous,true|string|max:30',
            'address' => 'required_if:is_anonymous,true|string|max:160',
            'gender' => 'required_if:is_anonymous,true',
            'age' => 'required_if:is_anonymous,true'
        ]);

        // Booking
        $booking = new Booking;
        $booking->booking_id = Functions::generateBookingID();
        $booking->amount = $data['amount'];
        $booking->status = 'purchased';
        $booking->date = Carbon::now()->format('Y-m-d H:i:s');
        // Checking if authenticated user
        if (auth()->check()) {
            $booking->user_id = auth()->id();
            $booking->name = auth()->name;
            $booking->email = auth()->email;
            $booking->phone = auth()->phone;
            $booking->address = auth()->address;
            $booking->gender = auth()->gender;
            $booking->age = auth()->age;
        } else {
            $booking->name = $data['name'];
            $booking->email = $data['email'];
            $booking->phone = $data['phone'];
            $booking->address = $data['address'];
            $booking->gender = $data['gender'];
            $booking->age = $data['age'];
        }
        $booking->save();

        // Payment
        $payment = new Payment;
        $payment->booking_id = $booking->id;
        $payment->reference_id = $data['reference_id'];
        $payment->amount = $data['amount'];
        $payment->payment_date = Carbon::now()->format('Y-m-d H:i:s');
        $payment->payment_method = 'card';
        $payment->payment_status = 'successful';
        $payment->save();

        // Seat Booking (Pivot table)
        $seat_booking = new SeatBooking;
        $seat_booking->booking_id = $booking->id;
        $seat_booking->seat_id = $data['seat_id'];
        $seat_booking->save();

        // Updating seat status
        $seat = $seat_booking->seat;
        $seat->status = 'booked';
        $seat->save();

        // Return JSON response
        return response()->json([
            'status' => "success", 
            'message' => "Booking was successfully placed", 
            'invoice_url' => route('invoice', ['booking_id' => $booking->booking_id])
        ]);
    }

    // Invoice page
    public function invoice($booking_id)
    {
        // Fetching booking
        $booking = Booking::where('booking_id', $booking_id)->first();
        // Fetching seat booking
        $seat_booking = SeatBooking::where('booking_id', $booking->id)->first();
        // Fetching seat
        $seat = $seat_booking->seat;

        // Redirecting user if seat booking not found
        if (empty($seat_booking) || is_null($seat) || $seat->status == 'available') {
            return redirect()->route('flights')
                                ->with('message', "Invalid booking ID");
        }

        return view('landing.invoice', [
            'company' => Setting::latest()->first(),
            'seat_booking' => $seat_booking
        ]);
    }

    // About page
    public function about()
    {
        return view('landing.about', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    // Show contact page
    public function contact()
    {
        return view('landing.contact', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    // Submit contact form
    public function saveMessage(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:5|max:100',
            'email'=> 'required|email|max:100',
            'subject'=> 'required|max:160',
            'message'=> 'required|max:5000'
        ]);

        Message::create($request->all());
        return back()->with('message', 'Message sent successfully!');
    }

    // Show register form
    public function register() 
    {
        return view('landing.register', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    // Submit registeration form
    public function registerUser(Request $request) 
    {
        // Validating form fields
        $formFields = $request->validate([
            'name'=> ['required', 'min:5', 'max:100'],
            'email'=> ['required', 'email', 'max:100', Rule::unique('users', 'email')],
            'phone'=> ['required', 'max:30'],
            'address'=> ['required', 'min:7', 'max:160'],
            'age'=> ['required', 'max:3'],
            'gender'=> 'required',
            'password'=> 'required|min:5'
        ]);

        // Hashing user password
        $formFields['password'] = Hash::make($formFields['password']);

        // Creating user
        User::create($formFields);

        // Redirecting user to login page
        return redirect('/login')->with('message', 'You have been succesfully registered and can now login!');
    }

    // Show login form
    public function login() 
    {
        return view('landing.login', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    // Authenticate user
    public function authenticateUser(Request $request) 
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to find the user
        $user = User::where('email', $request->email)->first();

        // If user exists and the password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            // Redirect to user dashboard
            return redirect()->route('dashboard');
        }

        // If authentication fails
        return back()->with('message', 'Invalid credentials');
    }
}