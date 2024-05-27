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

    // Connected table
    protected $table = 'bookings';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'booking_id',
        'user_id',
        //'is_anonymous',
        'name',
        'email',
        'phone',
        'amount',
        'status',
        'date'
    ];

    // Define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship to payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }

    // Define the relationship to seat bookings
    public function seatbookings()
    {
        return $this->hasMany(SeatBooking::class, 'booking_id');
    }
}
