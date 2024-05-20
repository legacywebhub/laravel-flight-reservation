<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];

    // Define relationship for user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
