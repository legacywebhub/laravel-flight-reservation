<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'messages';

    // Disable timestamps
    public $timestamps = false;

    // Mass fillable field
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];

    // Define relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
