<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating a defined user admin
        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'phone' => '+234 906 075 5152',
            'address' => '30 Laravel-Fly Road, Awka, Nigeria',
            'timezone' => 'Africa/Lagos',
            'age' => 25,
            'password' => Hash::make('admin'),
            'is_staff' => true
        ]);

        // Creating a default site setting
        Setting::create([
            'name' => "Laravel Flights",
            'email' => "info@laravelflights.com",
            'phone' => "+234 916 075 5152",
            'address' => "30 Laravel-Fly Road, Awka, Nigeria"
        ]);

        // Mass creating table records
        User::factory(10)->create();
        Airline::factory(10)->create();
        Airport::factory(10)->create();
        
        // Calling other seeders
        $this->call([
            BotResponseSeeder::class,
            FlightSeeder::class
        ]);
    }
}
