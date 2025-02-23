<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'people',
        'price',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
