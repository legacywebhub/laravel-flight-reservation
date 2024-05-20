<?php

namespace App\Models;

use App\Models\User;
use App\Models\Flight;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Define relationship for booking user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship for booking flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    // Define relationship for booking payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }

    // Define the relationship for seat bookings
    public function seatbookings()
    {
        return $this->hasMany(SeatBooking::class, 'booking_id');
    }
}
