<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatBooking extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'seat_bookings';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'booking_id',
        'payment_id',
        'seat_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'age',
        'gender',
        'amount',
        'status',
        'date'
    ];

    // Define the relationship to payment
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    // Define the relationship to seat
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    // Define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
