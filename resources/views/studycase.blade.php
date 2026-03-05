<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data - Study Case</title>
    <link rel="stylesheet" href="{{ asset('css/studycase.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        /* Menggunakan ulang font agar tidak tertimpa bootstrap */
        body { font-family: 'DM Sans', sans-serif; background: #fefafb; }
        .page-link { color: #c0435f; border-color: #f0e1e6; font-size: 13px; font-weight: 600; padding: 10px 16px; border-radius: 8px !important; margin: 0 4px; box-shadow: none; }
        .page-link:hover { background-color: #fdf5f7; border-color: #f4dce3; color: #9e3350; }
        .page-item.active .page-link { background-color: #c0435f; border-color: #c0435f; color: white; }
        .page-item.disabled .page-link { color: #ccc; background-color: #fafafa; border-color: #eee; }
        .pagination { justify-content: center; margin-top: 30px; }
        .page-item:first-child .page-link, .page-item:last-child .page-link { border-radius: 8px; }
        table { margin-bottom: 0 !important; }
        th { background: #fdf5f7 !important; color: #8b7880 !important; font-size: 11px !important; text-transform: uppercase; letter-spacing: 0.1em; border-top: none !important; border-bottom: 2px solid #f0e1e6 !important; }
        td { font-size: 13px !important; color: #1e1620 !important; vertical-align: middle !important; border-color: #f0e1e6 !important; }
        .table-hover tbody tr:hover { background-color: #fffbf8; }
        .badge-category { background: #fffbf8; border: 1px solid #f0e1e6; color: #8b7880; padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 600; }
    </style>
</head>
<body>
    <nav class="navbar" style="border-bottom: 2px dashed rgba(192,67,95,0.2); padding: 20px 40px; background: white; display: flex; align-items: center; justify-content: center;">
        <a href="{{ route('dashboard') }}" style="position:absolute; left:40px; text-decoration:none; color:#8b7880; font-size:12px; font-weight:600; display:flex; align-items:center; gap:8px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Kembali
        </a>
        <div class="brand-name" style="font-family:'Playfair Display',serif; font-size:16px; font-weight:700; color:#1e1620; letter-spacing:.04em;">Wedding <em style="color:#c0435f; font-style:italic;">Organizations</em></div>
    </nav>

    <div class="container" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
        <div class="page-header" style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-family:'Playfair Display',serif; font-size:32px; font-weight:700; color:#1e1620; margin-bottom:8px;">Laporan Study Case</h1>
            <p style="color:#8b7880; font-size:14px;">Menampilkan tabel data dummy (Venue) dari Database Seeder, tertampil per 10 baris</p>
        </div>

        <div class="card" style="background: white; border: 1px solid #f0e1e6; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(192,67,95,0.05); overflow-x: auto;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 style="font-family:'Playfair Display', serif; font-size: 18px; font-weight: 700; color: #1e1620; margin: 0;">Total Data Venue: {{ $venues->total() }}</h2>
                <div style="font-size: 12px; color: #8b7880;">Halaman {{ $venues->currentPage() }} dari {{ $venues->lastPage() }}</div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Venue</th>
                            <th>Kategori</th>
                            <th>Pemilik/PIC</th>
                            <th>Kapasitas</th>
                            <th>Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($venues as $venue)
                            <tr>
                                <td style="color: #c0435f; font-weight: 700;">#{{ $venue->id }}</td>
                                <td style="font-weight: 600;">{{ $venue->name }}</td>
                                <td><span class="badge-category">{{ ucfirst($venue->category) }}</span></td>
                                <td>{{ $venue->owner }}</td>
                                <td>{{ number_format($venue->capacity ?? 0, 0, ',', '.') }} Pax</td>
                                <td style="font-family:'Playfair Display',serif; font-weight:700;">{{ $venue->price }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4" style="color: #8b7880;">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Wrapper -->
            <div>
                {{ $venues->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</body>
</html>
