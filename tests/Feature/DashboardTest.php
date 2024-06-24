<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    // Declaring user for testing
    protected $user;

    // This method is called before each test method is executed and it is
    //  used to prepare the testing environment before each test method is run
    protected function setUp(): void
    {
        parent::setUp(); // Calls the setUp method in TestCase

        // Your additional setup code here

        // Query the user and store it as a class property
        $this->user = User::where('email', 'admin@gmail.com')->first();
    }

    // Dashboard page test
    public function test_dashboard_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/dashboard');

        $response->assertStatus(200);
    }

    // Flights page test
    public function test_flights_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/flights');

        $response->assertStatus(200);
    }

    // Search flights page test
    public function test_search_flights(): void
    {
        $response = $this->actingAs($this->user)->post('/user/flights', ['range' => 5]);

        $response->assertStatus(200);
    }

    // Flight page test
    public function test_flight_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/flight/1');


        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }

    // Flight booking page test
    public function test_book_flight_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/flight/book/3');

        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }

    // Flight checkout test
    public function test_checkout(): void
    {
        $genders = ['male', 'female'];

        $response = $this->actingAs($this->user)->post('/user/flight/book/3', [
            'flight_id' => 1,
            'seat_id' => rand(1, 500),
            'reference_id' => \App\Custom\Functions::generateReferenceID(),        
            'amount' => 500,
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'gender' => $genders[rand(0, 1)],
            'age' => rand(20, 70)
        ]);

        $response->assertStatus(200);
    }

    // User bookings page test
    public function test_user_bookings_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/bookings');

        $response->assertStatus(200);
    }

    // Notifications page test
    public function test_notifications_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/notifications');

        $response->assertStatus(200);
    }

    // Profile page test
    public function test_profile_page(): void
    {
        $response = $this->actingAs($this->user)->get('/user/profile');

        $response->assertStatus(200);
    }

    // Logout test
    public function test_logout(): void
    {
        $response = $this->actingAs($this->user)->get('/user/logout');

        $response->assertStatus(302);
    }
}