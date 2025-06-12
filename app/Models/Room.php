<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_number',
        'type',
        'description',
        'price_per_night',
        'capacity',
        'features',
        'featured_image',
        'gallery_images',
        'status', // available, booked, maintenance
    ];

    protected $casts = [
        'features' => 'array',
        'gallery_images' => 'array',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
} 