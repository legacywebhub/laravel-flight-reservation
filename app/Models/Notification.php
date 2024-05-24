<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'notifications';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable fields
    protected $fillable = [
        'user_id',
        'message',
        'data',
        'date',
    ];

    // Casting for automatic data conversion for fields 
    protected $casts = [
        'data' => 'array',
    ];

    // Define the relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
