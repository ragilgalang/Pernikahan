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

        $venues = $query->get();
        return view('venues', compact('venues'));
    }

    /**
     * Tampilkan detail venue spesifik.
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);

        // Pastikan gallery berupa array
        if (is_string($venue->gallery)) {
            $venue->gallery = json_decode($venue->gallery, true) ?? [];
        }

        // Format owner untuk kompatibilitas dengan view
        $venueData = [
            'id' => $venue->id,
            'name' => $venue->name,
            'rating' => $venue->rating ?? '4.5',
            'location' => $venue->location,
            'price' => $venue->price,
            'about' => $venue->about,
            'features' => $venue->features,
            'gallery' => $venue->gallery ?? [],
            'image' => $venue->image,
            'owner' => [
                'name' => $venue->owner,
                'bio' => 'Pengelola ' . $venue->name . ' yang berpengalaman dan berdedikasi memastikan pernikahan Anda berjalan sempurna.',
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode($venue->owner) . '&background=f9d8e4&color=d13d6a',
            ],
            'testimonials' => $venue->testimonials ?? [],
        ];

        return view('venue-detail', ['venue' => $venueData]);
    }
}
