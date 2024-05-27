<?php

namespace Database\Factories;

use App\Custom\Functions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $class = Functions::randomString(['economy', 'premium economy', 'business', 'first class']);
        $price = 500;

        if ($class == 'premium economy') {
            $price = 500 + 200;
        } else if ($class == 'business') {
            $price = 500 + 300;
        } else if ($class == 'first class') {
            $price = 500 + 500;
        }

        return [
            'flight_id' => rand(1, 10),
            'seat_number' => strtoupper(substr($class, 0, 1)) . rand(1, 500), // Example: E1, E2, ..., B1, B2, ...
            'seat_class' => $class,
            'price' => $price,
            'status' => 'available'
        ];
    }
}
