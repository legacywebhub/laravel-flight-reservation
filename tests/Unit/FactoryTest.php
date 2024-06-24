<?php

namespace Tests;

use App\Models\Seat;
use App\Models\User;
use App\Models\Flight;
use App\Models\Airline;
use App\Models\Airport;
use Illuminate\Foundation\Testing\TestCase;

class FactoryTest extends TestCase
{
    // Airline factory test
    public function test_airline_factory()
    {
        $airline = Airline::factory()->create();

        // Ensure the airline is an instance of the Airine model
        $this->assertInstanceOf(Airline::class, $airline);

        // Check that some of the attributes are set
        $this->assertNotNull($airline->name);
        $this->assertNotNull($airline->number_of_seats);
    }

    // Airport factory test
    public function test_airport_factory()
    {
        $airport = Airport::factory()->create();

        // Ensure the airport is an instance of the Airport model
        $this->assertInstanceOf(Airport::class, $airport);

        // Check that some of the attributes are set
        $this->assertNotNull($airport->name);
        $this->assertNotNull($airport->country);
        $this->assertNotNull($airport->city);
    }

    // Flight factory test
    public function test_flight_factory()
    {
        $flight = Flight::factory()->create();

        // Ensure the flight is an instance of the Flight model
        $this->assertInstanceOf(Flight::class, $flight);

        // Check that some of the attributes are set
        $this->assertNotNull($flight->id);
        $this->assertNotNull($flight->origin_id);
        $this->assertNotNull($flight->destination_id);
        $this->assertNotNull($flight->departure_time);
        $this->assertNotNull($flight->arrival_time);
        $this->assertNotNull($flight->available_seats);
    }

    // Seat factory test
    public function test_seat_factory()
    {
        $seat = Seat::factory()->create();

        // Ensure the seat is an instance of the Seat model
        $this->assertInstanceOf(Seat::class, $seat);

        // Check that some of the attributes are set
        $this->assertNotNull($seat->flight_id);
        $this->assertNotNull($seat->seat_number);
        $this->assertNotNull($seat->seat_class);
        $this->assertNotNull($seat->price);
        $this->assertNotNull($seat->status);
    }

    // User factory test
    public function test_user_factory()
    {
        $user = User::factory()->create();

        // Ensure the user is an instance of the User model
        $this->assertInstanceOf(User::class, $user);

        // Check that some of the attributes are set
        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
        $this->assertNotNull($user->phone);
        $this->assertNotNull($user->address);
        $this->assertNotNull($user->timezone);
        $this->assertNotNull($user->age);
        $this->assertNotNull($user->gender);
        $this->assertNotNull($user->password);
    }
}