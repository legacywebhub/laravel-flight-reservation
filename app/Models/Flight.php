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

    // Connected table
    protected $table = 'flights';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'flight_id',
        'airline_id',
        'origin_id',
        'destination_id',
        'departure_time',
        'arrival_time',
        'economy_price',
        'premium_economy_price',
        'business_price',
        'first_class_price',
        'available_seats',
        'status',
    ];

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

    // Define the relationship to seats
    public function seats()
    {
        return $this->hasMany(Seat::class, 'flight_id');
    }

    // Flight model event listener
    protected static function booted()
    {
        static::created(function ($flight) {
            $flight->createSeats();
        });
    }

    // Function to create flight seats
    protected function createSeats()
    {
        // Defining seat classes and the number of seats in each class
        $seatClasses = [
            'economy' => floor(0.70 * $this->available_seats),
            'premium economy' => floor(0.10 * $this->available_seats),
            'business' => floor(0.15 * $this->available_seats),
            'first class' => floor(0.05 * $this->available_seats),
        ];

        foreach ($seatClasses as $class => $count) {
            // Determining seat price based on price
            if ($class == 'economy') {
                $price = $this->economy_price;
            } else if ($class == 'premium economy') {
                $price = $this->premium_economy_price;
            } else if ($class == 'business economy') {
                $price = $this->business_price;
            } else {
                $price = $this->first_class_price;
            }

            // Loop to create class seats
            for ($i = 1; $i <= $count; $i++) {
                Seat::create([
                    'flight_id' => $this->id,
                    'seat_number' => strtoupper(substr($class, 0, 1)) . $i, // Example: E1, E2, ..., B1, B2, ...
                    'seat_class' => $class,
                    'price' => $price,
                    'status' => 'available'
                ]);
            }
        }
    }
}
