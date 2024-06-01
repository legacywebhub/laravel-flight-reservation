<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotResponse extends Model
{
    use HasFactory;

    // Connected table
    protected $table = 'bot_responses';

    // Mass fillable fields
    protected $fillable = [
        'question',
        'response'
    ];
}
