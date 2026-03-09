<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Wedding Organizations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map-container {
            margin-top: 10px;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #eee;
            position: relative;
        }
        #map {
            height: 200px;
            width: 100%;
            z-index: 1;
        }
        .map-overlay-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
            background: white;
            border: none;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--rose);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        .map-overlay-btn:hover {
            background: var(--rose);
            color: white;
        }
        .location-display {
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: 8px;
            font-style: italic;
            display: block;
            min-height: 1.2em;
        }
    </style>
</head>
<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>


    <!-- Right Sidebar -->
    <aside class="sidebar sidebar-right" id="rightSidebar">
        <p class="sidebar-label" style="text-align:right">Jelajahi</p>
        <ul class="sidebar-menu" style="text-align:right">
            <li><a href="{{ route('venues.index') }}">Review & Rating</a></li>
            <li><a href="{{ route('suggestions.create') }}">Saran</a></li>
            <li><a href="{{ route('studycase.index') }}">Study Case</a></li>
        </ul>

        <p class="sidebar-label" style="text-align:right; margin-top: 20px;">Akun</p>
        <ul class="sidebar-menu" style="text-align:right">
            <li><a href="{{ route('orders') }}">Pemesanan Saya</a></li>
            <li><a href="#">Privasi</a></li>
            <li><a href="{{ route('logout') }}" class="danger">Keluar</a></li>
        </ul>
    </aside>

    <!-- Header -->
    <div class="header-bg">
        <div class="top-nav">
            <a href="{{ route('profile.edit') }}" class="nav-profile-btn" aria-label="Profil">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
            </a>

            <button class="nav-hamburger" id="toggleRight" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>

        <!-- Flower SVG illustration -->
        <svg class="header-flower" viewBox="0 0 200 180" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Large center flower -->
            <ellipse cx="100" cy="90" rx="18" ry="18" fill="#fff" stroke="#ccc" stroke-width="1"/>
            <circle cx="100" cy="90" r="10" fill="#f0e0e8" stroke="#bbb" stroke-width="0.8"/>
            <!-- Petals top -->
            <path d="M100 72 Q104 55 100 45 Q96 55 100 72" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <path d="M100 72 Q113 58 118 48 Q106 58 100 72" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <path d="M100 72 Q87 58 82 48 Q94 58 100 72" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <!-- Petals bottom -->
            <path d="M100 108 Q104 125 100 135 Q96 125 100 108" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <path d="M100 108 Q113 122 118 132 Q106 122 100 108" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <path d="M100 108 Q87 122 82 132 Q94 122 100 108" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <!-- Petals side -->
            <path d="M82 90 Q65 86 55 90 Q65 94 82 90" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <path d="M118 90 Q135 86 145 90 Q135 94 118 90" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <!-- Small flower left -->
            <circle cx="52" cy="70" r="8" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <circle cx="52" cy="70" r="4" fill="#f8e0ea" stroke="#bbb" stroke-width="0.6"/>
            <path d="M52 62 Q54 56 52 52 Q50 56 52 62" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M52 78 Q54 84 52 88 Q50 84 52 78" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M44 70 Q38 68 35 70 Q38 72 44 70" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M60 70 Q66 68 69 70 Q66 72 60 70" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <!-- Small flower right -->
            <circle cx="148" cy="70" r="8" fill="#fff" stroke="#ccc" stroke-width="0.8"/>
            <circle cx="148" cy="70" r="4" fill="#f8e0ea" stroke="#bbb" stroke-width="0.6"/>
            <path d="M148 62 Q150 56 148 52 Q146 56 148 62" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M148 78 Q150 84 148 88 Q146 84 148 78" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M140 70 Q134 68 131 70 Q134 72 140 70" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <path d="M156 70 Q162 68 165 70 Q162 72 156 70" fill="#fff" stroke="#ccc" stroke-width="0.6"/>
            <!-- Leaves -->
            <path d="M72 115 Q60 100 68 88 Q72 102 72 115" fill="#d4e8d4" stroke="#b8d0b8" stroke-width="0.8"/>
            <path d="M128 115 Q140 100 132 88 Q128 102 128 115" fill="#d4e8d4" stroke="#b8d0b8" stroke-width="0.8"/>
            <path d="M80 130 Q65 118 70 106 Q78 118 80 130" fill="#c8e0c8" stroke="#b0ceb0" stroke-width="0.8"/>
            <path d="M120 130 Q135 118 130 106 Q122 118 120 130" fill="#c8e0c8" stroke="#b0ceb0" stroke-width="0.8"/>
        </svg>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Wedding Organizations</h1>

        @if(session('success'))
        <div class="success-alert" id="successAlert">
            <div class="alert-icon">✓</div>
            <div class="alert-content">
                <strong>Berhasil!</strong>
                <p>{{ session('success') }}</p>
            </div>
            <button class="alert-close" onclick="this.parentElement.style.display='none'">&times;</button>
        </div>
        @endif

        <div class="search-card">
            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active" data-action="venues">Venue</div>
                <div class="tab" data-action="vendors">Vendor</div>
            </div>

            <form id="searchForm" action="{{ route('venues.index') }}" method="GET">
                <!-- Category -->
                <div class="field">
                    <div class="field-label">Kategori</div>
                    <div class="select-wrap">
                        <select name="category" id="categorySelect">
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                        </select>
                    </div>
                </div>

                <!-- Date range -->
                <div class="field">
                    <div class="field-label">Tanggal</div>
                    <div class="date-row">
                        <input type="date" name="date_start" id="dateStart" class="pill-date">
                        <input type="date" name="date_end" id="dateEnd" class="pill-date">
                    </div>
                </div>

                <!-- Location (Map) -->
                <div class="field">
                    <div class="field-label">Lokasi</div>
                    <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                        <input type="text" id="addressSearch" placeholder="Ketik alamat (misal: Monas, Jakarta)..." style="flex: 1; padding: 10px 15px; border-radius: 20px; border: 1px solid #ddd; font-size: 0.8rem;">
                        <button type="button" id="btnSearch" style="background: var(--rose); color: white; border: none; padding: 0 15px; border-radius: 20px; font-size: 0.75rem; cursor: pointer;">Cari</button>
                    </div>
                    <div id="map-container">
                        <div id="map"></div>
                        <button type="button" class="map-overlay-btn" id="btnLocate">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Gunakan Lokasi Saya
                        </button>
                    </div>
                    <span class="location-display" id="locationText">Klik peta untuk pilih lokasi...</span>
                    <input type="hidden" name="location" id="locationInput">
                </div>

                <div class="divider">✦</div>

                <button type="submit" class="btn-go">Masuk</button>
            </form>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
    const rightSidebar = document.getElementById('rightSidebar');
    const overlay      = document.getElementById('overlay');

    function openSidebar(sb) {
        sb.classList.add('active');
        overlay.classList.add('active');
    }
    function closeAll() {
        rightSidebar.classList.remove('active');
        overlay.classList.remove('active');
    }

    document.getElementById('toggleRight').addEventListener('click', e => {
        e.stopPropagation();
        rightSidebar.classList.contains('active') ? closeAll() : openSidebar(rightSidebar);
    });
    overlay.addEventListener('click', closeAll);

    // ── Deklarasi semua elemen & fungsi validasi DULU ──
    const btnGo       = document.querySelector('.btn-go');
    const categoryEl  = document.getElementById('categorySelect');
    const dateStartEl = document.getElementById('dateStart');
    const dateEndEl   = document.getElementById('dateEnd');
    const locationEl  = document.getElementById('locationInput');
    const tabs        = document.querySelectorAll('.tab');
    const form        = document.getElementById('searchForm');

    // Opsi kategori per tab
    const venueOptions = [
        { value: 'gedung',  label: 'Gedung / Ballroom' },
        { value: 'taman',   label: 'Taman / Outdoor' },
        { value: 'resort',  label: 'Resort / Hotel' },
        { value: 'pulau',   label: 'Pulau / Tepi Laut' },
    ];
    const vendorOptions = [
        { value: 'katering',     label: 'Katering (Catering)' },
        { value: 'dekorasi',     label: 'Dekorasi (Decorator)' },
        { value: 'mua',          label: 'Makeup Artist (MUA) & Hairstylist' },
        { value: 'busana',       label: 'Busana Pengantin (Wedding Attire)' },
        { value: 'dokumentasi',  label: 'Dokumentasi (Fotografer & Videografer)' },
        { value: 'hiburan',      label: 'Hiburan (Entertainment)' },
        { value: 'suvenir',      label: 'Undangan & Suvenir' },
        { value: 'kue',          label: 'Kue Pernikahan (Wedding Cake)' },
        { value: 'cincin',       label: 'Cincin Pernikahan' },
        { value: 'transportasi', label: 'Transportasi & Akomodasi' },
    ];

    // Cek validasi: semua field harus terisi
    function checkFields() {
        const allFilled =
            categoryEl.value !== '' &&
            dateStartEl.value !== '' &&
            dateEndEl.value !== '' &&
            locationEl.value.trim() !== '';
        btnGo.disabled = !allFilled;
    }

    // Isi dropdown sesuai tab yang dipilih, lalu validasi ulang
    function setOptions(optList) {
        categoryEl.innerHTML = '<option value="" disabled selected>-- Pilih Kategori --</option>';
        optList.forEach(({ value, label }) => {
            const opt = document.createElement('option');
            opt.value = value;
            opt.textContent = label;
            categoryEl.appendChild(opt);
        });
        checkFields();
    }

    // Tab switching
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            if (tab.dataset.action === 'vendors') {
                form.action = "{{ route('flowers.index') }}";
                setOptions(vendorOptions);
            } else {
                form.action = "{{ route('venues.index') }}";
                setOptions(venueOptions);
            }
        });
    });

    // Listener perubahan field → validasi
    [categoryEl, dateStartEl, dateEndEl, locationEl].forEach(el => {
        el.addEventListener('change', checkFields);
        el.addEventListener('input',  checkFields);
    });

    // --- MAP INITIALIZATION ---
    const map = L.map('map').setView([-6.2000, 106.8166], 13); // Default Jakarta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker = null;
    const locationText = document.getElementById('locationText');

    function updateLocation(lat, lng, label = null) {
        if (!marker) {
            marker = L.marker([lat, lng]).addTo(map);
        } else {
            marker.setLatLng([lat, lng]);
        }
        
        if (label) {
            locationEl.value = label;
            locationText.textContent = label;
            checkFields();
        } else {
            // Reverse Geocoding via Nominatim
            locationText.textContent = "Mencari alamat...";
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name.split(',').slice(0, 3).join(',');
                    locationEl.value = address;
                    locationText.textContent = address;
                    checkFields();
                })
                .catch(() => {
                    const fallback = `Lokasi: ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
                    locationEl.value = fallback;
                    locationText.textContent = fallback;
                    checkFields();
                });
        }
    }

    map.on('click', function(e) {
        updateLocation(e.latlng.lat, e.latlng.lng);
    });

    document.getElementById('btnLocate').addEventListener('click', () => {
        if (navigator.geolocation) {
            locationText.textContent = "Mendeteksi lokasi...";
            navigator.geolocation.getCurrentPosition(position => {
                const { latitude, longitude } = position.coords;
                map.setView([latitude, longitude], 15);
                updateLocation(latitude, longitude);
            }, () => {
                alert("Gagal mendeteksi lokasi. Pastikan izin lokasi aktif.");
            });
        } else {
            alert("Browser Anda tidak mendukung deteksi lokasi.");
        }
    });

    // --- MANUAL SEARCH LOGIC ---
    const addressSearch = document.getElementById('addressSearch');
    const btnSearch = document.getElementById('btnSearch');

    function searchAddress() {
        const query = addressSearch.value;
        if (!query) return;

        locationText.textContent = "Mencari lokasi...";
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const { lat, lon, display_name } = data[0];
                    const latitude = parseFloat(lat);
                    const longitude = parseFloat(lon);
                    
                    map.setView([latitude, longitude], 15);
                    updateLocation(latitude, longitude, display_name.split(',').slice(0, 3).join(','));
                } else {
                    alert("Lokasi tidak ditemukan. Coba kata kunci lain.");
                    locationText.textContent = "Klik peta untuk pilih lokasi...";
                }
            })
            .catch(() => {
                alert("Terjadi kesalahan saat mencari lokasi.");
                locationText.textContent = "Klik peta untuk pilih lokasi...";
            });
    }

    btnSearch.addEventListener('click', searchAddress);
    addressSearch.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchAddress();
        }
    });

    // --- DEBOUNCED LIVE SEARCH ---
    let searchTimeout = null;
    addressSearch.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        const query = addressSearch.value;
        if (query.length < 3) return; // Cari hanya jika minimal 3 karakter

        searchTimeout = setTimeout(() => {
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        const { lat, lon, display_name } = data[0];
                        const latitude = parseFloat(lat);
                        const longitude = parseFloat(lon);
                        
                        
                        map.panTo([latitude, longitude], { animate: true, duration: 1 });
                        if (!marker) {
                            marker = L.marker([latitude, longitude]).addTo(map);
                        } else {
                            marker.setLatLng([latitude, longitude]);
                        }
                        
                        // Update display text without changing the input value to not interrupt user
                        locationText.textContent = display_name.split(',').slice(0, 3).join(',');
                        locationEl.value = locationText.textContent;
                        checkFields();
                    }
                })
                .catch(err => console.error("Live search error:", err));
        }, 1000); // Tunggu 1 detik setelah berhenti mengetik
    });

    // Inisialisasi: tampilkan Venue dan nonaktifkan tombol GO
    setOptions(venueOptions);   
    btnGo.disabled = true;      
</script>
</body>
</html>
