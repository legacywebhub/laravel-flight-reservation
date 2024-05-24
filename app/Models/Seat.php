<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'seats';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'flight_id',
        'seat_number',
        'seat_class',
        'price',
        'status',
    ];

    // Define the relationship to flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    // Define the relationship to seat bookings
    public function seatbookings()
    {
        return $this->hasMany(SeatBooking::class, 'seat_id');
    }
}
