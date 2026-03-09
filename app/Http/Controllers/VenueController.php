<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Tampilkan daftar semua venue.
     */
    public function index(Request $request)
{
    $query = Venue::query();

    if ($request->has('category') && $request->category != '') {
        $query->where('category', $request->category);
    }

    $venues = $query->latest()->paginate(20)->withQueryString();

    return view('venues', compact('venues'));
}

    /**
     * Tampilkan detail venue spesifik.
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);

        // Parse gallery if it's a string
        $gallery = is_string($venue->gallery) ? json_decode($venue->gallery, true) : ($venue->gallery ?? []);
        
        // Wrap gallery items in asset() and ensure paths are correct
        $formattedGallery = array_map(function($img) {
            return asset(ltrim($img, '/'));
        }, $gallery);

        // Prepend main image to gallery if not already present
        $mainImage = asset($venue->image);
        if (!in_array($mainImage, $formattedGallery)) {
            array_unshift($formattedGallery, $mainImage);
        }

        // Format owner untuk kompatibilitas dengan view
        $venueData = [
            'id' => $venue->id,
            'name' => $venue->name,
            'rating' => '4.5',
            'location' => $venue->location,
            'price' => 'IDR ' . number_format((float)$venue->price, 0, ',', '.'),
            'about' => $venue->about,
            'features' => $venue->features,
            'gallery' => $formattedGallery,
            'image' => $mainImage,
            'owner' => [
                'name' => $venue->owner,
                'bio' => 'Pengelola ' . $venue->name . ' yang berpengalaman dan berdedikasi memastikan pernikahan Anda berjalan sempurna.',
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode($venue->owner) . '&background=f9d8e4&color=d13d6a',
            ],
            'testimonials' => [
                [
                    'text' => 'Pernikahan kami di sini sangat berkesan. Fasilitas lengkap dan staf yang ramah. Sangat direkomendasikan!',
                    'author' => 'Ibu Sari & Bapak Budi'
                ]
            ],
        ];

        return view('venue-detail', ['venue' => $venueData]);
    }
}
