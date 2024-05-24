<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\Flight;
use App\Models\Booking;
use App\Models\Setting;
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
        return back();
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
    public function flight(Flight $flight) 
    {
        return view('dashboard.flight', [
            'company'=> Setting::latest()->first(),
            'flight'=> $flight,
            'seats' => $flight->seats->where('status', 'available')
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
    public function bookFlight(Seat $seat)
    {
        return view('dashboard.book-flight', [
            'company'=> Setting::latest()->first(),
            'seat'=> $seat
        ]);
    }

    // Booking checkout/complete payment
    public function checkout(Booking $booking)
    {
        $booking = Booking::find($booking);

        return view('dashboard.flights', [
            'company'=> Setting::latest()->first(), 'booking'=> $booking
        ]);
    }

}
