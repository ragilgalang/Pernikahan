<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'owner',
        'location',
        'price',
        'image',
        'gallery',
        'about',
        'features',
        'category',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];
}
