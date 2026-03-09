<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'owner',
        'location',
        'price',
        'image',
        'rating',
        'type',
        'about',
        'features',
        'categories',
        'testimonials',
    ];

    protected $casts = [
        'features' => 'array',
        'categories' => 'array',
        'testimonials' => 'array',
    ];
}
