<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_type',
        'item_id',
        'rating_overall',
        'rating_venue_fasilitas',
        'rating_katering',
        'rating_pelayanan',
        'rating_harga',
        'comment',
        'photos',
        'is_anonymous',
        'booking_id',
    ];

    protected $casts = [
        'photos' => 'array',
        'is_anonymous' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Dynamic relationship
    public function item()
    {
        if ($this->item_type === 'Venue') {
            return $this->belongsTo(Venue::class, 'item_id');
        } else {
            return $this->belongsTo(Vendor::class, 'item_id');
        }
    }
}
