<?php

namespace Tests;

use App\Models\Flight;
use Database\Seeders\FlightSeeder;
use Database\Seeders\BotResponseSeeder;
use Illuminate\Foundation\Testing\TestCase;

class SeederTest extends TestCase
{
    // Flight seeder test
    public function test_flight_seeder()
    {
        $current_no_flights = Flight::count();
        $created_flights = count($this->seed(FlightSeeder::class));
        $total_flights = $current_no_flights + $created_flights;

        // Check that flights were created
        $this->assertDatabaseCount('flights', $total_flights);
    }

    // BotResponse seeder test
    public function test_botresponse_seeder()
    {
        $responses = $this->seed(BotResponseSeeder::class);

        // Check that responses were created
        $this->assertDatabaseCount('bot_responses', count($responses));
    }
}