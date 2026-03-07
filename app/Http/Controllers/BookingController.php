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
            'details' => [
                'check_in' => request('date_start', '2026-03-07'),
                'check_out' => request('date_end', '2026-03-13'),
                'guests' => 2,
                'nights' => 6,
            ],
            'summary' => [
                'Sewa per malam' => 'IDR 3.333',
                'Sewa * 6 malam' => 'IDR 19.998',
                'Biaya Layanan' => 'IDR 500',
                'Biaya Kebersihan' => 'IDR 200',
                'Pajak (11%)' => 'IDR 2.277',
                'Diskon Promo' => '- IDR 1.000',
                'Total' => 'IDR 21.975'
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
        // Data mock untuk riwayat pemesanan
        $orders = [
            [
                'id' => 'ORD-001',
                'venue_name' => 'Aula Masjid Manarul Aman',
                'location' => 'Sidoarjo, Jawa Timur',
                'date' => '24 Feb 2026',
                'total_price' => 'IDR 36.000.000',
                'status' => 'Selesai',
                'status_class' => 'status-success',
                'image' => asset('images/venues/Ballroom/Aula-Masjid-Manarul-Aman.webp')
            ],
            [
                'id' => 'ORD-002',
                'venue_name' => 'Balai Kartini',
                'location' => 'Jakarta Selatan',
                'date' => '15 Mar 2026',
                'total_price' => 'IDR 43.000.000',
                'status' => 'Diproses',
                'status_class' => 'status-warning',
                'image' => asset('images/venues/Ballroom/Balai-Kartini.webp')
            ],
            [
                'id' => 'ORD-003',
                'venue_name' => 'Balai Samudera Kelapa Gading',
                'location' => 'Jakarta Utara',
                'date' => '10 Apr 2026',
                'total_price' => 'IDR 25.000.000',
                'status' => 'Menunggu Pembayaran',
                'status_class' => 'status-danger',
                'image' => asset('images/venues/Ballroom/Balai-Samudera-Kelapa-Gading-Jakarta-Utara.webp')
            ]
        ];

        return view('orders', compact('orders'));
    }

    /**
     * Proses pembayaran (mock).
     */
    public function pay()
    {
        return redirect()->route('dashboard')->with('success', 'Pembayaran Berhasil!');
    }
}
