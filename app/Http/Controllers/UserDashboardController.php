<?php

namespace App\Http\Controllers;

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

    // User dashboard
    public function dashboard()
    {
        return view('dashboard.dashboard', [
            'company'=> Setting::latest()->first()
        ]);
    }

    // Show flights
    public function flights()
    {
        return view('dashboard.flights', [
            'company'=> Setting::latest()->first(),
            'flights'=> Flight::where('status', 'available')->paginate(2)
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

    // Bookings
    public function bookings()
    {
        return view('dashboard.flights', [
            'company'=> Setting::latest()->first(),
            'bookings'=> Auth::user()->bookings->paginate(2)
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
