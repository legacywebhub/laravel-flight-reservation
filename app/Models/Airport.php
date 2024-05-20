<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country',
        'city',
    ];

    // Define the relationship for flights where this airport is the origin
    public function originFlights()
    {
        return $this->hasMany(Flight::class, 'origin_id');
    }

    // Define the relationship for flights where this airport is the destination
    public function destinationFlights()
    {
        return $this->hasMany(Flight::class, 'destination_id');
    }
}
