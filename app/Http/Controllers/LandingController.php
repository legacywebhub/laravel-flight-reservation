<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Flight;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    
    // Home/index page
    public function home()
    {
        return view('landing.home', [
            'company'=> Setting::latest()->first(),
            'latest_flights'=> Flight::latest()->get()
        ]);
    }

    // Show available flights
    public function flights()
    {
        return view('landing.about', [
            'company'=> Setting::latest()->first(),
            'flights'=> Flight::where('status', 'available')
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
            'email'=> ['required', 'email', 'max:100'],
            'phone'=> ['required', 'max:30'],
            'address'=> ['required', 'min:7', 'max:160'],
            'age'=> ['required', 'max:3'],
            'gender'=> 'required',
            'password'=> 'required'
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