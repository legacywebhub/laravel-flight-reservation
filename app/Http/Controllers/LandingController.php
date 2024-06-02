<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\User;
use App\Models\Flight;
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
            'upcoming_flights'=> Flight::where('departure_time', '>=', Carbon::now())
                                        ->where('status', 'available')->latest()->limit(10)->get()
        ]);
    }


    // Show available flights
    public function flights()
    {
        return view('landing.flights', [
            'company'=> Setting::latest()->first(),
            'flights'=> Flight::where('departure_time', '>=', Carbon::now())
                        ->where('status', 'available')
                        ->latest()
                        ->paginate(10)
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

        $flights = $query->paginate(10);

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


    // Checkout booking
    public function checkout(Request $request)
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

        // Payment
        $payment = new Payment;
        $payment->reference_id = $data['reference_id'];
        $payment->amount = $data['amount'];
        $payment->payment_date = Carbon::now()->format('Y-m-d H:i:s');
        $payment->payment_method = 'paypal';
        $payment->payment_status = 'successful';
        $payment->save();

        // Seat Booking (Pivot table)
        $seat_booking = new SeatBooking;
        $seat_booking->booking_id = Functions::generateBookingID();
        $seat_booking->payment_id = $payment->id;
        $seat_booking->seat_id = $data['seat_id'];
        $seat_booking->amount = $data['amount'];
        $seat_booking->status = 'purchased';
        $seat_booking->date = Carbon::now()->format('Y-m-d H:i:s');
        // Checking if authenticated user
        if (auth()->check()) {
            $seat_booking->user_id = Auth::user()->id;
            $seat_booking->name = Auth::user()->name;
            $seat_booking->email = Auth::user()->email;
            $seat_booking->phone = Auth::user()->phone;
            $seat_booking->address = Auth::user()->address;
            $seat_booking->gender = Auth::user()->gender;
            $seat_booking->age = Auth::user()->age;
        } else {
            $seat_booking->name = $data['name'];
            $seat_booking->email = $data['email'];
            $seat_booking->phone = $data['phone'];
            $seat_booking->address = $data['address'];
            $seat_booking->gender = $data['gender'];
            $seat_booking->age = $data['age'];
        }
        $seat_booking->save();

        // Updating seat status
        $seat = $seat_booking->seat;
        $seat->status = 'booked';
        $seat->save();

        // Checking if all flight seats have been booked
        // And updating flight status accordingly
        // We need just to check one available seat record
        // And if non, flight has completely been booked
        $any_available_seats = Seat::where('flight_id', $seat->flight_id)
                                    ->where('status', 'available')
                                    ->first();
        // If no available seat
        if (is_null($any_available_seats) || empty($any_available_seats)) {
            $flight = $seat->flight;
            $flight->status = 'booked';
            $flight->save();
        }
        
        // Return JSON response
        return response()->json([
            'status' => "success",
            'message' => "Booking was successfully placed",
            'invoice_url' => route('invoice', ['booking_id' => $seat_booking->booking_id])
        ]);
    }


    // Invoice page
    public function invoice($booking_id)
    {
        // Fetching seat booking
        $seat_booking = SeatBooking::where('booking_id', $booking_id)->first();
        // Fetching seat
        $seat = $seat_booking->seat;

        // Redirecting user if seat booking not found
        if (empty($seat_booking) || is_null($seat) || $seat->status == 'available') {
            return redirect()->route('flights')->with('message', "Invalid booking ID");
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


    // Pricing page
    public function pricing()
    {
        return view('landing.pricing', [
            'company'=> Setting::latest()->first(),
        ]);
    }


    // Pricing page
    public function services()
    {
        return view('landing.services', [
            'company'=> Setting::latest()->first(),
        ]);
    }


    // FAQ page
    public function faq()
    {
        return view('landing.faq', [
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
        // Validating form fields
        $formFields = $request->validate([
            'name'=> 'required|min:5|max:100',
            'email'=> 'required|email|max:100',
            'subject'=> 'required|max:500',
            'message'=> 'required|max:5000'
        ]);
        // Saving to database
        Message::create($formFields);
        // Redirecting to contact page
        return back()
                ->with('message', 'Message sent successfully!')
                ->with('message_type', 'success');
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
        return redirect('/login')
                ->with('message', 'You have been succesfully registered and can now login!')
                ->with('message_type', 'success');
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