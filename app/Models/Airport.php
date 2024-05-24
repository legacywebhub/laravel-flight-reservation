<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'airports';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'name',
        'country',
        'city',
    ];

    // Define the relationship to flights where this airport is the origin
    public function originFlights()
    {
        return $this->hasMany(Flight::class, 'origin_id');
    }

    // Define the relationship to flights where this airport is the destination
    public function destinationFlights()
    {
        return $this->hasMany(Flight::class, 'destination_id');
    }
}
