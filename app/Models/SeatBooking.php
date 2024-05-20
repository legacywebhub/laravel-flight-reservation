<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatBooking extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Define the relationship for booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    // Define the relationship for seat
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }
}
