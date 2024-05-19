<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;

    // Define the relationship for flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    // Define the relationship for seat bookings
    public function seatbookings()
    {
        return $this->hasMany(SeatBooking::class, 'seat_id');
    }
}
