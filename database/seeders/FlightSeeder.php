<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\Flight;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating large record of flights using factories
        Flight::factory(10)->create()->each(function ($flight) {
            $this->createFlightSeats($flight);
        });
    }

    
    // Function to create flight seats
    public function createFlightSeats($flight)
    {
        //dd($flight);  // Debugging purpose
        
        // Define the seat classes and the number of seats in each class
        $seatClasses = [
            'economy' => floor(0.70 * $flight->available_seats),
            'premium economy' => floor(0.10 * $flight->available_seats),
            'business' => floor(0.15 * $flight->available_seats),
            'first class' => floor(0.05 * $flight->available_seats),
        ];

        foreach ($seatClasses as $class => $count) {
            // Determining seat price based on class
            if ($class == 'economy') {
                $price = $flight->economy_price;
            } else if ($class == 'premium economy') {
                $price = $flight->premium_economy_price;
            } else if ($class == 'business') {
                $price = $flight->business_price;
            } else {
                $price = $flight->first_class_price;
            }

            // Loop to create class seats
            for ($i = 1; $i <= $count; $i++) {
                Seat::create([
                    'flight_id' => $flight->id,
                    'seat_number' => strtoupper(substr($class, 0, 1)) . $i, // Example: E1, E2, ..., B1, B2, ...
                    'seat_class' => $class,
                    'price' => $price,
                    'status' => 'available'
                ]);
            }
        }
        
    }
}
