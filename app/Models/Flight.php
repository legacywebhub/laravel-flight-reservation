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

    // Disable timestamps
    public $timestamps = false;

    // Define the relationship to the airline
    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id');
    }

    // Define the relationship to the origin airport
    public function origin()
    {
        return $this->belongsTo(Airport::class, 'origin_id');
    }

    // Define the relationship to the destination airport
    public function destination()
    {
        return $this->belongsTo(Airport::class, 'destination_id');
    }

    // Define the relationship to flight seats
    public function seats()
    {
        return $this->hasMany(Seat::class, 'flight_id');
    }
}
