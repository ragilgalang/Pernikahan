<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Venue;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($type, $id)
    {
        $item = ($type === 'Venue') ? Venue::find($id) : Vendor::find($id);
        
        if (!$item) {
            return redirect()->back()->with('error', 'Item tidak ditemukan.');
        }

        $reviews = Review::where('item_type', $type)
            ->where('item_id', $id)
            ->latest()
            ->get();

        // Statistik Rating
        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? round($reviews->avg('rating_overall'), 1) : 0;
        
        $stats = [
            5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0
        ];

        foreach ($reviews as $rev) {
            $stats[$rev->rating_overall]++;
        }

        // Hitung persentase untuk progress bar
        $distribution = [];
        foreach ($stats as $star => $count) {
            $distribution[$star] = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0;
        }

        return view('reviews', compact('item', 'type', 'id', 'reviews', 'averageRating', 'totalReviews', 'distribution'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_type' => 'required|in:Venue,Vendor',
            'item_id' => 'required|integer',
            'rating_overall' => 'required|integer|min:1|max:5',
            'rating_venue_fasilitas' => 'nullable|integer|min:0|max:5',
            'rating_katering' => 'nullable|integer|min:0|max:5',
            'rating_pelayanan' => 'nullable|integer|min:0|max:5',
            'rating_harga' => 'nullable|integer|min:0|max:5',
            'comment' => 'nullable|string',
            'is_anonymous' => 'nullable',
            'booking_id' => 'nullable|integer',
        ]);

        $review = Review::create([
            'user_id' => Auth::id(),
            'item_type' => $request->item_type,
            'item_id' => $request->item_id,
            'rating_overall' => $request->rating_overall,
            'rating_venue_fasilitas' => $request->rating_venue_fasilitas ?? 0,
            'rating_katering' => $request->rating_katering ?? 0,
            'rating_pelayanan' => $request->rating_pelayanan ?? 0,
            'rating_harga' => $request->rating_harga ?? 0,
            'comment' => $request->comment,
            'is_anonymous' => $request->has('is_anonymous'),
            'booking_id' => $request->booking_id,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
