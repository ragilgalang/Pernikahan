<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'item_type',
        'item_id',
        'status',
        'total_price',
        'booking_details',
    ];

    protected $casts = [
        'booking_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
