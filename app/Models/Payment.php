<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'payments';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'booking_id',
        'reference_id',
        'amount',
        'payment_date',
        'payment_method',
        'payment_status',
    ];

    // Define relationship to payment
    public function booking() {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
