<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Bunga - Wedding Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/flowers.css') }}">
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
        
        <!-- Center Floral Decoration -->
        <div style="text-align: center; z-index: 5;">
            <svg width="200" height="auto" viewBox="0 0 200 120" style="filter: drop-shadow(0 4px 10px rgba(0,0,0,0.1));">
                <!-- Simple Line Art Flower Representation -->
                <path d="M100 20 Q 110 40, 100 60 Q 90 40, 100 20" fill="#fff" opacity="0.8" />
                <path d="M100 60 Q 120 70, 140 60 Q 120 50, 100 60" fill="#fff" opacity="0.8" />
                <path d="M100 60 Q 80 70, 60 60 Q 80 50, 100 60" fill="#fff" opacity="0.8" />
                <path d="M100 60 Q 110 80, 100 100 Q 90 80, 100 60" fill="#fff" opacity="0.8" />
                <circle cx="100" cy="60" r="10" fill="#f9d8e4" />
                <circle cx="100" cy="60" r="4" fill="#d13d6a" />
                <!-- Extra Petals -->
                <path d="M100 60 L 120 40" stroke="#fff" stroke-width="2" opacity="0.5" />
                <path d="M100 60 L 80 40" stroke="#fff" stroke-width="2" opacity="0.5" />
                <path d="M100 60 L 120 80" stroke="#fff" stroke-width="2" opacity="0.5" />
                <path d="M100 60 L 80 80" stroke="#fff" stroke-width="2" opacity="0.5" />
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
                'katering' => 'Katering',
                'dekorasi' => 'Dekorasi',
                'mua'      => 'MUA & Hair',
                'busana'   => 'Busana',
                'dokumentasi' => 'Dokumentasi',
                'hiburan'  => 'Hiburan',
                'undangan' => 'Undangan',
                'kue'      => 'Kue',
                'cincin'   => 'Cincin',
                'transport' => 'Transport'
            ];
            $selectedCategory = request('category');
            $categoryName = $categoryMap[$selectedCategory] ?? 'Vendor Pilihan';
        @endphp

        <div class="filter-container">
            <a href="{{ route('flowers.index') }}" class="filter-pill {{ !$selectedCategory ? 'active' : '' }}">Semua</a>
            @foreach($categoryMap as $key => $label)
                <a href="{{ route('flowers.index', ['category' => $key]) }}" class="filter-pill {{ $selectedCategory == $key ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <h2 class="section-title">{{ $categoryName }} Terbaik Untuk Anda</h2>

        <div class="venue-grid">
            @foreach($vendors as $index => $vendor)
            <a href="{{ route('flowers.show', $vendor->id) }}" class="venue-card" style="text-decoration: none; color: inherit;">
                <div class="image-container">
                    <img src="{{ $vendor['image'] }}" alt="{{ $vendor['name'] }}">
                    
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
                        <span class="venue-name">{{ $vendor['name'] }}</span>
                        <span class="owner-name text-muted">{{ $vendor['owner'] }}</span>
                    </div>
                    <div class="venue-location">
                        {{ $vendor['location'] }}
                    </div>
                    <div>
                        <span class="venue-price-tag">{{ $vendor['rating'] }} ★ - {{ $vendor['type'] }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
