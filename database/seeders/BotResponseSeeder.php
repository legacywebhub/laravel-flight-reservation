<?php

namespace Database\Seeders;

use App\Models\BotResponse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BotResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BotResponse::create(['question' => 'Hello', 'response' => 'Good day.. How may I help you? 😶']);
        BotResponse::create(['question' => 'Thank you', 'response' => 'You are welcome.. Feel free to reach out if you encounter issues in the future 🙂']);
        BotResponse::create(['question' => 'Bye', 'response' => '👍']);
        BotResponse::create(['question' => 'Do I get a ticket if I book a flight', 'response' => 'No.. but you are issued with a booking ID with which you can retrieve your ticket at the airport']);
        BotResponse::create(['question' => 'What is the minimum booking price', 'response' => 'The minimum booking price per seat is for the economy class and is usually around $300']);
        BotResponse::create(['question' => 'What are the requirements to book a flight', 'response' => 'You need just your information and the flight or seat info which you are trying to book. Ensure to provide authentic information to avoid further complications']);
        BotResponse::create(['question' => 'What is the price for economy', 'response' => '🤔 Depends on the airline but usually between $300. Please check out our pricing page for more info']);
        BotResponse::create(['question' => 'What is the price for premium economy', 'response' => '🤔🤔 Depends on the airline but usually between $500. Please check out our pricing page for more info']);
        BotResponse::create(['question' => 'What is the price for business class', 'response' => '🤔 Depends on the airline but usually between $700. Please check out our pricing page for more info']);
        BotResponse::create(['question' => 'What is the price for first class', 'response' => '🤔 Depends on the airline but usually between $900. Please check out our pricing page for more info']);
        BotResponse::create(['question' => 'Can I book multiple seats at a time', 'response' => "No you can't, just one seat at a time"]);
        BotResponse::create(['question' => 'What payment methods do you offer', 'response' => "For now just paypal. More payments gateways will be made availabe in the future"]);
        BotResponse::create(['question' => 'Do you accept crypto', 'response' => "No.. crypto payments aren't accepted yet"]);
        BotResponse::create(['question' => 'What are the benefits for signing up on this platform', 'response' => "Firstly you get an easier way to track your bookings and receipts. You also get discounted offers and upgrades for your loyalty"]);
        BotResponse::create(['question' => 'Hotel', 'response' => "Booking of hotels are not available yet"]);
        BotResponse::create(['question' => 'Where can I retrieve my ticket after booking', 'response' => "Please proceed to the airport reception and provide them with your booking ID. Your ticket(s) will be issued if you followed the process correctly"]);
        // Add more predefined responses here
    }
}
