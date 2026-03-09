<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    /**
     * Tampilkan daftar semua vendor bunga.
     */
    public function index(Request $request)
    {
        $query = Vendor::query();

        if ($request->filled('category')) {
            $query->where('type', $request->category);
        }

        $vendors = $query->get();
        return view('flowers', compact('vendors'));
    }

    /**
     * Tampilkan detail vendor bunga spesifik.
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);

        // Format data agar kompatibel dengan view
        $vendorData = [
            'id' => $vendor->id,
            'name' => $vendor->name,
            'rating' => $vendor->rating ?? '4.5',
            'location' => $vendor->location,
            'price' => $vendor->price,
            'about' => $vendor->about,
            'features' => $vendor->features ?? [],
            'categories' => $vendor->categories ?? [],
            'testimonials' => $vendor->testimonials ?? [],
            'image' => $vendor->image, // Seragamkan dengan Venue
            'owner' => [
                'name' => $vendor->owner,
                'bio' => 'Pemilik ' . $vendor->name . ' yang berpengalaman dan berdedikasi menghadirkan bunga terbaik untuk momen spesial Anda.',
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode($vendor->owner) . '&background=f9d8e4&color=d13d6a',
            ],
        ];

        return view('flower-detail', ['vendor' => $vendorData]);
    }
}
