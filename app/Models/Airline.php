<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airline extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'airlines';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'name',
        'number_of_seats'
    ];

    // Define the relationship to flights
    public function flights()
    {
        return $this->hasMany(Flight::class, 'airline_id');
    }
}
