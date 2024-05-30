<?php

namespace App\Models;

use App\Models\SeatBooking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'payments';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'reference_id',
        'amount',
        'payment_date',
        'payment_method',
        'payment_status',
    ];

    // Define the relationship to seat booking
    public function seatbooking()
    {
        return $this->hasOne(SeatBooking::class, 'booking_id');
    }
}
