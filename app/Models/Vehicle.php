<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'capacity',
        'unit',
        'registration_plate',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
