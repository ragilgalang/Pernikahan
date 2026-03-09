<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $venue['name'] }} - Wedding Organizations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/venue-detail.css') }}">
</head>
<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Left Sidebar -->
    <aside class="sidebar sidebar-left" id="leftSidebar">
        <p class="sidebar-label">Jelajahi</p>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
            <li><a href="{{ route('venues.index') }}">Gedung</a></li>
            <li><a href="{{ route('flowers.index') }}">Vendor</a></li>
        </ul>
    </aside>

    <!-- Right Sidebar -->
    <aside class="sidebar sidebar-right" id="rightSidebar">
        <p class="sidebar-label" style="text-align:right">Akun</p>
        <ul class="sidebar-menu">
            @auth
                <li><p style="padding: 12px 28px; font-size: 0.8rem; color: #888; text-align: right;">{{ Auth::user()->name }}</p></li>
                <li><a href="{{ route('orders') }}">Pemesanan Saya</a></li>
                <li><a href="{{ route('logout') }}" class="danger" style="color: #c0445e;">Keluar</a></li>
            @else
                <li><a href="{{ route('login') }}">Masuk</a></li>
                <li><a href="{{ route('register') }}">Daftar</a></li>
            @endauth
        </ul>
    </aside>

    <!-- ══ CURVED HEADER ══════════════════════════════════ -->
    <header class="curved-header">
        <div class="header-nav">
            <a href="{{ route('venues.index') }}" class="nav-circle-btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <div class="header-center-floral">
                <svg width="180" height="auto" viewBox="0 0 100 60" style="opacity: 0.8;">
                    <path d="M30 40 C 35 25, 45 20, 50 30 C 55 20, 65 25, 70 40" fill="none" stroke="#8a3047" stroke-width="0.5" />
                    <circle cx="50" cy="25" r="15" fill="#f5dde4" opacity="0.6" />
                    <path d="M50 10 Q 55 25 50 40 Q 45 25 50 10" fill="#c9637a" />
                    <path d="M40 20 Q 50 25 60 20 Q 50 35 40 20" fill="#c9637a" opacity="0.7" />
                </svg>
            </div>
            <div class="nav-menu-btn" id="toggleRight">
                <span></span><span></span><span></span>
            </div>
        </div>
    </header>

    <!-- ══ SEARCH PILLS ═══════════════════════════════════ -->
    <div class="search-pills-row">
        <div class="pill-input">KE</div>
        <div class="pill-input">DARI</div>
    </div>

    <!-- ══ MAIN CONTENT PANELS ════════════════════════════ -->
    <div class="panels-container">
        
        <!-- PANEL KIRI: Gallery & Core Info -->
        <div class="panel panel-left">
            <div class="venue-showcase">
                <div class="main-gallery-card">
                    <img src="{{ !empty($venue['gallery']) ? $venue['gallery'][0] : $venue['image'] }}" alt="{{ $venue['name'] }}">
                    <div class="gallery-arrows">
                        <span class="arr-l">&lt;</span>
                        <span class="arr-r">&gt;</span>
                    </div>
                    <div class="gallery-dots">
                        <span class="d active"></span><span class="d"></span><span class="d"></span>
                    </div>
                </div>

                <div class="venue-meta">
                    <div class="meta-top">
                        <h1 class="venue-name-style">{{ $venue['name'] }}</h1>
                        <div class="rating-tag">{{ $venue['rating'] }} ★</div>
                        <div class="owner-mini-name">{{ $venue['owner']['name'] }}</div>
                    </div>
                    <p class="location-sub">{{ $venue['location'] }}</p>
                    <div class="vendor-action-row">
                        <button class="btn-vendor-contact">Contact Vendor</button>
                    </div>
                </div>

                <div class="secondary-gallery">
                    @foreach(array_slice($venue['gallery'] ?? [], 1, 6) as $img)
                        <div class="gal-item">
                            <img src="{{ $img }}" alt="Preview">
                        </div>
                    @endforeach
                </div>

                <div class="info-blocks">
                    <div class="info-block">
                        <h3>About</h3>
                        <p>{{ $venue['about'] }}</p>
                    </div>
                    <div class="info-block">
                        <h3>Features</h3>
                        <p>{{ $venue['features'] }}</p>
                    </div>
                </div>
                
                <!-- Re-adding the Price in a nice way if needed, though reference puts it differently -->
                <div class="price-strip">
                    <span class="p-amount">{{ $venue['price'] }}</span>
                    <span class="p-lbl">/ Malam</span>
                    @auth
                        <a href="{{ route('checkout') }}" class="btn-book-now">Pesan Sekarang</a>
                    @else
                        <a href="{{ route('login', ['redirect_to' => route('checkout')]) }}" class="btn-book-now">Pesan Sekarang</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- PANEL KANAN: Owner, Testimonials, Map -->
        <div class="panel panel-right">
            <div class="section-group">
                <h3 class="panel-section-title">Property owner</h3>
                <div class="owner-premium-card">
                    <div class="owner-avatar">
                        <img src="{{ $venue['owner']['image'] }}" alt="Owner">
                    </div>
                    <div class="owner-details">
                        <h4>{{ $venue['owner']['name'] }}</h4>
                        <p>{{ $venue['owner']['bio'] }}</p>
                        <button class="btn-contact-vendor-alt">Contact Vendor</button>
                    </div>
                </div>
            </div>

            <div class="section-group testimonial-block">
                <div class="testi-slider">
                    <span class="nav-t">&lt;</span>
                    <div class="testi-text-wrap">
                        <div class="testi-stars">
                            @for($i=1; $i<=5; $i++)
                                <span class="star" style="color: {{ $i <= ($venue['testimonials'][0]['rating'] ?? 5) ? '#ffc107' : '#e0e0e0' }}">★</span>
                            @endfor
                        </div>
                        <p>"{{ $venue['testimonials'][0]['text'] }}"</p>
                        <span class="testi-author">- {{ $venue['testimonials'][0]['author'] }}</span>
                    </div>
                    <span class="nav-t">&gt;</span>
                </div>
            </div>

            <div class="section-group map-block">
                <div class="modern-map-container">
                    <!-- Placeholder graphic for map as in reference -->
                    <div class="map-artwork-simple">
                        <svg viewBox="0 0 400 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="240" fill="#e9f3f8"/>
                            <path d="M0 80h400M0 160h400M120 0v240M280 0v240" stroke="#fff" stroke-width="8"/>
                            <circle cx="210" cy="110" r="10" fill="#c9637a" />
                            <circle cx="210" cy="110" r="20" stroke="#c9637a" stroke-opacity="0.2" stroke-width="5" />
                        </svg>
                        <div class="map-label-overlay">
                            114, Ayush, Doddabalapur, Bengaluru 560041
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const leftSidebar  = document.getElementById('leftSidebar');
        const rightSidebar = document.getElementById('rightSidebar');
        const overlay      = document.getElementById('overlay');

        function openSidebar(sb) {
            sb.classList.add('active');
            overlay.classList.add('active');
        }
        function closeAll() {
            leftSidebar.classList.remove('active');
            rightSidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        document.getElementById('toggleRight').addEventListener('click', e => {
            e.stopPropagation();
            rightSidebar.classList.contains('active') ? closeAll() : openSidebar(rightSidebar);
        });
        overlay.addEventListener('click', closeAll);

        // Simple Gallery & Slider logic could be added here
        document.querySelectorAll('.gal-item').forEach(item => {
            item.addEventListener('click', () => {
                const mainImg = document.querySelector('.main-gallery-card img');
                mainImg.src = item.querySelector('img').src;
            });
        });
    </script>
</body>
</html>
