<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\Flight;
use App\Models\Payment;
use App\Models\Setting;
use App\Custom\Functions;
use App\Models\SeatBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    // Logout User
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // User notifications
    public function notifications()
    {
        return view('dashboard.notifications', [
            'company'=> Setting::latest()->first(),
            'notifications'=> Auth::user()->notifications
        ]);
    }

    // User dashboard
    public function dashboard()
    {
        return view('dashboard.dashboard', [
            'company'=> Setting::latest()->first(),
            'flights'=> Flight::where('departure_time', '<=', Carbon::now()->addWeek())
                        ->where('status', 'available')->get()
        ]);
    }

    // Show flights
    public function flights(Request $request)
    {
        if ($request->range) {
            $timeframe = Carbon::now()->addDays($request->range);
            $flights = Flight::where('departure_time', '<=', $timeframe)
                               ->where('status', 'available');
        } else {
            $flights = Flight::where('status', 'available');
        }

        return view('dashboard.flights', [
            'company'=> Setting::latest()->first(),
            'flights'=> $flights->paginate(20)
        ]);
    }

    // Search or filter flights
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

        return view('dashboard.flight', [
            'company'=> Setting::latest()->first(),
            'flight'=> $flight, 'seats' => $seats
        ]);
    }

    // Bookings for user page 
    public function bookings()
    {
        return view('dashboard.flights', [
            'company'=> Setting::latest()->first(),
            'bookings'=> Auth::user()->bookings->paginate(2)
        ]);
    }

    // Book a flight seat 
    public function bookFlight($id)
    {
        // Fetching seat
        $seat = Seat::find($id);

        // Redirecting if seat has already been booked
        if ($seat->status == 'booked') {
            return redirect()->route('flights');
        }

        return view('dashboard.book-flight', [
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
        $seat_booking->user_id = Auth::user()->id;
        $seat_booking->name = Auth::user()->name;
        $seat_booking->email = Auth::user()->email;
        $seat_booking->phone = Auth::user()->phone;
        $seat_booking->address = Auth::user()->address;
        $seat_booking->gender = Auth::user()->gender;
        $seat_booking->age = Auth::user()->age;
        $seat_booking->amount = $data['amount'];
        $seat_booking->status = 'purchased';
        $seat_booking->date = Carbon::now()->format('Y-m-d H:i:s');
        $seat_booking->save();

        // Updating seat status
        $seat = $seat_booking->seat;
        $seat->status = 'booked';
        $seat->save();

        // Return JSON response
        return response()->json([
            'status' => "success", 
            'message' => "Booking was successfully placed", 
            'invoice_url' => route('dashboard.invoice', ['booking_id' => $seat_booking->booking_id])
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

        return view('dashboard.invoice', [
            'company' => Setting::latest()->first(),
            'seat_booking' => $seat_booking
        ]);
    }

    // Profile page
    public function profile()
    {
        return view('dashboard.profile', [
            'company' => Setting::latest()->first(),
        ]);
    }

}
