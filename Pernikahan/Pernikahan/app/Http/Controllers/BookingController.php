<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Tampilkan halaman checkout.
     */
    public function checkout()
    {
        // Data mock untuk checkout (biasanya ini datang dari sesi atau database)
        $booking = [
            'item_name' => 'Royal Wedding Hall',
            'owner' => 'Bapak Shrikanth',
            'location' => '116, Townhall Resort 15, Rustom. Kepulauan Kyd',
            'price_per_night' => 'IDR 3.333',
            'image' => 'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=80',
            'summary' => [
                'Sewa per malam' => 'IDR 3.333',
                'Sewa * x malam' => 'IDR 3.333',
                'Pajak' => 'IDR 0',
                'Total' => 'IDR 3.333'
            ],

            'gallery' => [
                'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80'
            ]
        ];

        return view('checkout', compact('booking'));
    }

    /**
     * Tampilkan riwayat pemesanan pengguna.
     */
    public function orders()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        $bookings = \App\Models\Booking::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $orders = $bookings->map(function ($booking) {
            $item = null;
            if ($booking->item_type === 'Venue') {
                $item = \App\Models\Venue::find($booking->item_id);
            } else {
                $item = \App\Models\Vendor::find($booking->item_id);
            }

            $statusClasses = [
                'Pending' => 'status-warning',
                'Confirmed' => 'status-success',
                'Cancelled' => 'status-danger',
                'Completed' => 'status-success',
            ];

            return [
                'id' => 'ORD-' . str_pad($booking->id, 3, '0', STR_PAD_LEFT),
                'venue_name' => $item ? $item->name : 'Item Tidak Ditemukan',
                'location' => $item ? $item->location : '-',
                'date' => isset($booking->booking_details['event_date']) 
                    ? \Carbon\Carbon::parse($booking->booking_details['event_date'])->format('d M Y') 
                    : $booking->created_at->format('d M Y'),
                'total_price' => $booking->total_price,
                'status' => $booking->status,
                'status_class' => $statusClasses[$booking->status] ?? 'status-warning',
                'image' => $item ? asset($item->image) : asset('images/placeholder.jpg'),
                'item_type' => $booking->item_type,
                'item_id' => $booking->item_id
            ];
        });

        return view('orders', compact('orders'));
    }
}
