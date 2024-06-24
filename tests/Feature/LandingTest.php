<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingTest extends TestCase
{
    // Home page test
    public function test_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // About page test
    public function test_about_page(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    // Services page test
    public function test_services_page(): void
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
    }

    // Pricing page test
    public function test_pricing_page(): void
    {
        $response = $this->get('/pricing');

        $response->assertStatus(200);
    }

    // Faq page test
    public function test_faq_page(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }

    // Contact page test
    public function test_contact_page(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    // Contact page posting test
    public function test_contact_page_posting(): void
    {
        $response = $this->post('/contact', [
            'name'=> fake()->name(),
            'email'=> fake()->safeEmail(),
            'subject'=> fake()->words(5, true),
            'message'=> fake()->paragraphs(20, true)
        ]);

        $response->assertStatus(302);
    }

    // Flights page test
    public function test_flights_page(): void
    {
        $response = $this->get('/flights');

        $response->assertStatus(200);
    }

    // Search flights page test
    public function test_search_flights(): void
    {
        $response = $this->post('/flights', [
            'range' => 7
        ]);

        $response->assertStatus(200);
    }

    // Flight page test
    public function test_flight_page(): void
    {
        $response = $this->get('/flight/1');

        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }

    // Flight booking page test
    public function test_book_flight_page(): void
    {
        $response = $this->get('/flight/book/1');

        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }

    // Flight checkout test
    public function test_checkout(): void
    {
        $response = $this->post('/flight/book/1', [
            'flight_id' => 1,
            'seat_id' => rand(1, 500),
            'reference_id' => \App\Custom\Functions::generateReferenceID(),        
            'amount' => 500,
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'gender' => 'male',
            'age' => rand(20, 70)
        ]);

        $response->assertStatus(200);
    }

    // Register page test
    public function test_register_page(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // Registeration test
    public function test_registeration(): void
    {
        $genders = ['male', 'female'];

        $response = $this->post('/register', [
            'name'=> fake()->name(),
            'email'=> fake()->unique()->safeEmail(),
            'phone'=> fake()->phoneNumber(),
            'address'=> fake()->address(),
            'age'=> rand(20, 60),
            'gender'=> $genders[rand(0, 1)],
            'password'=> 'password'
        ]);

        $response->assertStatus(302);
    }

    // Login page test
    public function test_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // Login test
    public function test_login(): void
    {
        $response = $this->post('/login', [
            'email'=> 'admin@gmail.com',
            'password'=> 'admin'
        ]);

        $response->assertStatus(302);
    }
}
