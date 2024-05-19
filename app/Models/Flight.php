<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    // Define the relationship for the airline
    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id');
    }

    // Define the relationship for the origin airport
    public function origin()
    {
        return $this->belongsTo(Airport::class, 'origin_id');
    }

    // Define the relationship for the destination airport
    public function destination()
    {
        return $this->belongsTo(Airport::class, 'destination_id');
    }

    // Define the relationship for flight seats
    public function seats()
    {
        return $this->hasMany(Seat::class, 'flight_id');
    }

    // Define the relationship for flight bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'flight_id');
    }
}
