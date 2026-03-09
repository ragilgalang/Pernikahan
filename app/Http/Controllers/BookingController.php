<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Tampilkan halaman checkout.
     */
    public function checkout($venue_id = null)
    {
        // Jika ada venue_id, ambil dari database
        if ($venue_id) {
            $venue = \App\Models\Venue::find($venue_id);
            if ($venue) {
                $booking = [
                    'item_name' => $venue->name,
                    'owner' => $venue->owner,
                    'location' => $venue->location,
                    'price_per_night' => 'IDR ' . number_format((float)$venue->price, 0, ',', '.'),
                    'image' => asset($venue->image),
                    'details' => [
                        'check_in' => request('date_start', '2026-03-07'),
                        'check_out' => request('date_end', '2026-03-13'),
                        'guests' => 2,
                        'nights' => 6,
                    ],
                    'summary' => [
                        'Sewa' => 'IDR ' . number_format((float)$venue->price, 0, ',', '.'),
                        'Biaya Layanan' => 'IDR 50.000',
                        'Pajak (11%)' => 'IDR ' . number_format((float)$venue->price * 0.11, 0, ',', '.'),
                        'Total' => 'IDR ' . number_format((float)$venue->price * 1.11 + 50000, 0, ',', '.')
                    ],
                    'gallery' => is_string($venue->gallery) ? json_decode($venue->gallery, true) : ($venue->gallery ?? [])
                ];
                return view('checkout', compact('booking'));
            }
        }

        // Mock data fallback jika tidak ada venue_id atau venue tidak ditemukan
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
        // Ambil 3 venue pertama dari database untuk demo riwayat pemesanan
        $venues = \App\Models\Venue::limit(3)->get();
        
        $orders = [];
        $statuses = [
            ['text' => 'Selesai', 'class' => 'status-success'],
            ['text' => 'Diproses', 'class' => 'status-warning'],
            ['text' => 'Menunggu Pembayaran', 'class' => 'status-danger'],
        ];

        foreach ($venues as $index => $venue) {
            $orders[] = [
                'id' => 'ORD-00' . ($index + 1),
                'venue_name' => $venue->name,
                'venue_id' => $venue->id,
                'location' => $venue->location,
                'date' => ($index + 24) . ' Feb 2026', // Random date
                'total_price' => 'IDR ' . number_format((float)$venue->price, 0, ',', '.'),
                'status' => $statuses[$index]['text'],
                'status_class' => $statuses[$index]['class'],
                'image' => asset($venue->image)
            ];
        }

        // Jika database benar-benar kosong (tidak seharusnya karena ada 100)
        if (empty($orders)) {
            $orders = [
                [
                    'id' => 'ORD-001',
                    'venue_name' => 'Belum ada data venue di database',
                    'venue_id' => 1,
                    'location' => '-',
                    'date' => '-',
                    'total_price' => 'IDR 0',
                    'status' => 'Gagal',
                    'status_class' => 'status-danger',
                    'image' => ''
                ]
            ];
        }

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
