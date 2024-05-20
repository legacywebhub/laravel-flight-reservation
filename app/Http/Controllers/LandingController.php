<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    
    
    //
    public function home()
    {
        return view('landing.home', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    //
    public function about()
    {
        return view('landing.about', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    //
    public function contact()
    {
        return view('landing.contact', [
            'company'=> Setting::latest()->first(),
        ]);
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'message'=> 'required'
        ]);

        Message::create($request->all());
        return view('landing.contact', [
            'company'=> Setting::latest()->first(),
        ]);
    }
}
