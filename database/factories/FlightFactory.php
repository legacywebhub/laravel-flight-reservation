<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\Flight;
use App\Custom\Functions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Date extension by days
        $dateAddition = rand(0, 7);

        // Base flight price
        $base_price = fake()->randomFloat(2, 1000, 3000);

        return [
            'flight_id' => Functions::generateFlightID(),
            'airline_id' => rand(1, 5), // Random airline ID between 1 and 10
            'origin_id' => rand(1, 10), // Random origin ID between 1 and 10
            'destination_id' => rand(1, 10), // Random destination ID between 1 and 10
            'departure_time' => Carbon::now()->addDays($dateAddition)->format('Y-m-d H:i:s'), // Departure at least today or in the next 7 days
            'arrival_time' => fake()->dateTimeBetween(Carbon::now()->addDays($dateAddition), Carbon::now()->addDays($dateAddition + 1)), // Arrival sometime between departure date and a day after
            'economy_price' => $base_price, // Price between 100.00 and 1000.00
            'premium_economy_price' => $base_price + 500, // Price dependent on the economy/base price
            'business_price' => $base_price + 1000, // Price dependent on the economy/base price
            'first_class_price' => $base_price + 3000, // Price dependent on the economy/base price
            'available_seats' => rand(150, 300)
        ];
    }
}
