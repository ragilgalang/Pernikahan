<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Vendor - {{ $vendor['name'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/flower-detail.css') }}">
</head>
<body>
    <!-- --- HEADER --- -->
    <div class="header-bg">
        <div class="top-nav">
            <div class="nav-left">
                <a href="{{ route('flowers.index') }}" class="back-btn" title="Kembali ke Daftar Vendor">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </a>
                <div class="profile-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
            </div>
            <div class="menu-icon" id="toggleRight">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- --- DATE INFO --- -->
    <div style="display: flex; gap: 24px; justify-content: center; margin-top: -25px; position: relative; z-index: 20;">
        <div style="background: white; padding: 12px 40px; border-radius: 50px; border: 1.5px solid var(--primary-light); color: var(--text-muted); font-size: 0.85rem; font-weight: 500; min-width: 200px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);">{{ request('date_start', date('Y-m-d')) }}</div>
        <div style="background: white; padding: 12px 40px; border-radius: 50px; border: 1.5px solid var(--primary-light); color: var(--text-muted); font-size: 0.85rem; font-weight: 500; min-width: 200px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);">{{ request('date_end', date('Y-m-d', strtotime('+1 day'))) }}</div>
    </div>


    <div class="main-content">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="hero-img-container">
                <img src="{{ $vendor['main_image'] }}" alt="{{ $vendor['name'] }}">
                <div style="position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%); display: flex; gap: 5px;">
                    <span style="width: 6px; height: 6px; background: #fff; border-radius: 50%;"></span>
                    <span style="width: 6px; height: 6px; background: rgba(255,255,255,0.5); border-radius: 50%;"></span>
                    <span style="width: 6px; height: 6px; background: rgba(255,255,255,0.5); border-radius: 50%;"></span>
                </div>
                <div class="slider-arrow left">&lt;</div>
                <div class="slider-arrow right">&gt;</div>
            </div>

            <div class="vendor-info">
                <div>
                    <h1 class="vendor-name">{{ $vendor['name'] }} <span class="rating"><span>{{ $vendor['rating'] }}</span> ★</span></h1>
                    <div class="location-text">{{ $vendor['location'] }}</div>
                </div>
                <div style="text-align: right;">
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <button class="btn-contact">Hubungi Vendor</button>
                        <a href="{{ route('checkout', request()->query()) }}" class="btn-book">Pesan Sekarang</a>
                    </div>
                    <div class="price-display">{{ $vendor['price'] }}</div>
                </div>
            </div>

            <div class="categories-grid">
                @foreach($vendor['categories'] as $cat)
                <div class="category-card">
                    <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}">
                    <div class="category-overlay">
                        <span class="category-name">{{ $cat['name'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="info-section">
                <div class="info-col">
                    <h3>Tentang</h3>
                    <p>{{ $vendor['about'] }}</p>
                </div>
                <div class="info-col">
                    <h3>Fitur</h3>
                    @foreach($vendor['features'] as $feature)
                    <p>{{ $feature }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <div class="section-label">Pemilik Properti</div>
            <div class="owner-premium-card">
                <div class="owner-image-box">
                    <img src="{{ $vendor['owner']['image'] }}" alt="{{ $vendor['owner']['name'] }}">
                </div>
                <div class="owner-detail-box">
                    <h4>{{ $vendor['owner']['name'] }}</h4>
                    <div class="owner-bio-bubble">
                        {{ $vendor['owner']['bio'] }}
                    </div>
                </div>
            </div>

            <div class="testi-row">
                <p class="testi-text">
                    "{{ $vendor['testimonials'][0]['text'] }}"<br>
                    <span style="font-weight: 700; font-style: normal; font-size: 0.7rem;">- {{ $vendor['testimonials'][0]['author'] }}</span>
                </p>
            </div>

            <div class="map-view">
                <!-- Using an image to mock map like in design -->
                <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=800&q=80" class="map-mock-bg" alt="Map">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(211, 230, 240, 0.4);"></div>
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="#d13d6a" stroke="white" stroke-width="1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3" fill="white"></circle></svg>
                    <div style="background: white; padding: 2px 8px; border-radius: 10px; font-size: 0.6rem; margin-top: 5px; font-weight: 700;">Lokasi Vendor</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
