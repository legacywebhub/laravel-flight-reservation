<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Flight;
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
        User::factory(10)->create();
        /*
        Airline::factory(5)->create();
        Airport::factory(10)->create();
        Flight::factory(20)->create();
        
        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'phone' => '+234 906 075 5152',
            'address' => '30 Laravel-Fly Road, Awka, Nigeria',
            'age' => '25',
            'password' => Hash::make('admin'),
            'is_staff' => true
        ]);

        Setting::create([
            'name' => "Laravel-Fly Airways",
            'email' => "info@laravelfly.com",
            'phone' => "+234 916 075 5152",
            'address' => "30 Laravel-Fly Road, Awka, Nigeria"
        ]);
        */
    }
}
