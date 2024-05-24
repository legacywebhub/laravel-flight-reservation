<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_image',
        'name',
        'email',
        'phone',
        'address',
        'timezone',
        'age',
        'gender',
        'password',
        'is_staff',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Define relationship to bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    // Define relationship to messages
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    // Define relationship to notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }
}
