<?php

use Illuminate\Support\Facades\Route;
use App\Models\Venue;

Route::get('/venues', function () {

    return Venue::all()->map(function ($venue) {
        return [
            'id' => $venue->id,
            'name' => $venue->name,
            'owner' => $venue->owner,
            'location' => $venue->location,
            'price' => $venue->price,
            'image' => $venue->image, // Kirim path relatif saja
            'gallery' => $venue->gallery,
            'about' => $venue->about,
            'features' => $venue->features,
            'category' => $venue->category,
        ];
    });
});

// Solusi CORS untuk Gambar: Sajikan melalui rute API
Route::get('/image/{path}', function ($path) {
    $filePath = public_path('images/' . $path);
    
    if (!file_exists($filePath)) {
        abort(404);
    }

    return response()->file($filePath, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET',
    ]);
})->where('path', '.*');