<?php

namespace Tests;

use App\Models\Seat;
use App\Models\Flight;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // Flight-Seat relationship test
    public function test_flight_has_seats()
    {
        $flight = Flight::factory()->create();
        $seat = Seat::factory()->create(['flight_id' => $flight->id]);

        // Assert the relationship
        $this->assertTrue($flight->seats->contains($seat));
        $this->assertEquals(1, $flight->seats->count());
        $this->assertInstanceOf(Seat::class, $flight->seats->first());
    }
}