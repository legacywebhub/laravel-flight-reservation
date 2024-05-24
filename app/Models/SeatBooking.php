<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatBooking extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'seatbookings';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'booking_id',
        'seat_id',
        'date'
    ];

    // Define the relationship to booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    // Define the relationship to seat
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }
}
