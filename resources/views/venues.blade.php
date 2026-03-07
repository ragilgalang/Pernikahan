<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Venue - Wedding Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/venues.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global-layout.css') }}">
</head>
<body>
    @php
        $categoryMap = [
            'gedung' => 'Gedung / Ballroom',
            'taman'  => 'Taman / Outdoor',
            'resort' => 'Resort / Hotel',
            'pulau'  => 'Pulau / Tepi Laut'
        ];
        $selectedCategory = request('category');
        $categoryName = $categoryMap[$selectedCategory] ?? 'Semua Venue';
    @endphp

    <div class="sticky-top-list">
        <div class="header-bg">
            <div class="top-nav">
                <div class="nav-left">
                    <a href="{{ route('dashboard') }}" class="back-button" title="Kembali ke Dashboard">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    </a>
                    <div class="profile-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                </div>
                <div class="menu-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="sticky-controls">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="DARI" value="{{ request('date_start', date('Y-m-d')) }}" readonly>
                <input type="text" class="search-input" placeholder="KE" value="{{ request('date_end', date('Y-m-d', strtotime('+1 day'))) }}" readonly>
            </div>

            <div class="filter-container">
                <a href="{{ route('venues.index', request()->except('category')) }}" class="filter-pill {{ !$selectedCategory ? 'active' : '' }}">Semua</a>
                @foreach($categoryMap as $key => $label)
                    <a href="{{ route('venues.index', array_merge(request()->query(), ['category' => $key])) }}" class="filter-pill {{ $selectedCategory == $key ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="page-content" style="padding-top: 0;">

        <div class="main-content">
            <h2 class="section-title">Pilihan {{ $categoryName }} Untuk Anda</h2>

            <div class="venue-grid">
                @foreach($venues as $index => $venue)
                <a href="{{ route('venues.show', array_merge(['id' => $venue->id], request()->query())) }}" class="venue-card" style="text-decoration: none; color: inherit;">
                    <div class="image-container">
                        <img src="{{ $venue->image }}" alt="{{ $venue->name }}" loading="lazy">
                        <!-- Navigation dots -->
                        <div class="dots-container">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="venue-header">
                            <span class="venue-name">{{ $venue->name }}</span>
                            <span class="owner-name text-muted">{{ $venue->owner }}</span>
                        </div>
                        <p class="venue-location">{{ $venue->location }}</p>
                        <div class="venue-price-tag">
                            IDR {{ number_format((float)$venue->price, 0, ',', '.') }} / Malam
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Performance Optimization: Instant.page -->
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipSbmfOOiyv9D41tqtGj73T9MToG+8m/N8eO0vHnF+mX402p99xUqS7B"></script>
</body>
</html>
