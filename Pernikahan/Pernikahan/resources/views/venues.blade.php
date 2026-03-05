<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Venue - Wedding Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/venues.css') }}">
</head>
<body>
    <div class="header-bg">
        <div class="top-nav">
            <a href="{{ route('profile.edit') }}" class="profile-icon" style="text-decoration: none;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
        <!-- Center Floral Decoration - Mocking with a placeholder icon or text -->
        <div style="text-align: center; z-index: 5;">
            <img src="https://www.transparenttextures.com/patterns/floral-paper.png" style="opacity: 0.1; position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            <svg width="120" height="120" viewBox="0 0 100 100" style="opacity: 0.8; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                <circle cx="50" cy="50" r="40" fill="none" stroke="#d13d6a" stroke-width="0.5" stroke-dasharray="2 2" />
                <path d="M50 20 C 55 35, 75 35, 80 50 C 75 65, 55 65, 50 80 C 45 65, 25 65, 20 50 C 25 35, 45 35, 50 20" fill="#f9d8e4" opacity="0.6" />
                <circle cx="50" cy="50" r="5" fill="#d13d6a" opacity="0.4" />
            </svg>
        </div>
    </div>

    <div class="search-container">
        <input type="text" class="search-input" placeholder="KE">
        <input type="text" class="search-input" placeholder="DARI">
    </div>

    <div class="main-content">
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

        <div class="filter-container">
            <a href="{{ route('venues.index') }}" class="filter-pill {{ !$selectedCategory ? 'active' : '' }}">Semua</a>
            @foreach($categoryMap as $key => $label)
                <a href="{{ route('venues.index', ['category' => $key]) }}" class="filter-pill {{ $selectedCategory == $key ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <h2 class="section-title">Pilihan {{ $categoryName }} Untuk Anda</h2>

        <div class="venue-grid">
            @foreach($venues as $index => $venue)
            <a href="{{ route('venues.show', $venue->id) }}" class="venue-card" style="text-decoration: none; color: inherit;">
                <div class="image-container">
                    <img src="{{ $venue->image }}" alt="{{ $venue->name }}">
                    
                    <div class="nav-arrow left"><span>&lt;</span></div>
                    <div class="nav-arrow right"><span>&gt;</span></div>
                    
                    <div class="dots-container">
                        <span class="dot {{ $index % 3 == 0 ? 'active' : '' }}"></span>
                        <span class="dot {{ $index % 3 == 1 ? 'active' : '' }}"></span>
                        <span class="dot {{ $index % 3 == 2 ? 'active' : '' }}"></span>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="venue-header">
                        <div>
                            <span class="venue-name">{{ $venue->name }}</span>
                            <span class="venue-rating">4.5 ★</span>
                        </div>
                        <span class="owner-name text-muted">{{ $venue->owner }}</span>
                    </div>
                    <div class="venue-location">
                        {{ $venue->location }}
                    </div>
                    <div>
                        <span class="venue-price-tag">{{ $venue->price }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
