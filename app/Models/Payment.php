<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define relationship for payment
    public function booking() {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
