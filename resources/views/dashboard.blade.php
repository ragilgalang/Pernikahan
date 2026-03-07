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
    <link rel="stylesheet" href="{{ asset('css/global-layout.css') }}">
</head>
<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Left Sidebar -->
    <aside class="sidebar sidebar-left" id="leftSidebar">
        <p class="sidebar-label">Jelajahi</p>
        <ul class="sidebar-menu">
            <li><a href="{{ route('venues.index') }}">Gedung</a></li>
            <li><a href="{{ route('flowers.index') }}">Vendor</a></li>
            <li><a href="#">Acara</a></li>
            <li><a href="#">Tips &amp; Trik</a></li>
        </ul>
    </aside>

    <!-- Right Sidebar -->
    <aside class="sidebar sidebar-right" id="rightSidebar">
        <p class="sidebar-label" style="text-align:right">Akun</p>
        <ul class="sidebar-menu">
            <li><a href="{{ route('profile.edit') }}">Pengaturan</a></li>
            <li><a href="{{ route('orders') }}">Pemesanan Sebelumnya</a></li>
            <li><a href="{{ route('rating') }}">View Rating</a></li>
            <li><a href="{{ route('saran') }}">Saran</a></li>
            <li><a href="{{ route('studycase') }}">Study Case</a></li>
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

        <!-- Flower SVG illustration dihilangkan agar lebih bersih -->
        {{-- @include('components.flower-svg') --}}
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
                        <input type="date" name="date_start" id="dateStart" class="pill-date" value="{{ date('Y-m-d') }}">
                        <input type="date" name="date_end" id="dateEnd" class="pill-date">
                    </div>
                </div>

                <!-- Location -->
                <div class="field">
                    <div class="field-label">Lokasi</div>
                    <input type="text" name="location" id="locationInput" placeholder="Cari lokasi...">
                </div>

                <div class="divider">✦</div>

                <button type="submit" class="btn-go">GO</button>
            </form>
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

    // Toggle left button is now removed as it links to profile edit directly
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

    // Cegah submit jika field belum lengkap
    form.addEventListener('submit', function(e) {
        const allFilled =
            categoryEl.value !== '' &&
            dateStartEl.value !== '' &&
            dateEndEl.value !== '' &&
            locationEl.value.trim() !== '';
        if (!allFilled) {
            e.preventDefault();
            alert('Harap isi semua field sebelum melanjutkan.');
        }
    });

    // ── Inisialisasi: tampilkan Venue dan nonaktifkan tombol GO ──
    setOptions(venueOptions);   // mengisi dropdown & memanggil checkFields()
    btnGo.disabled = true;      // pastikan tombol disabled saat pertama buka
</script>
    <!-- Performance Optimization: Instant.page -->
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipSbmfOOiyv9D41tqtGj73T9MToG+8m/N8eO0vHnF+mX402p99xUqS7B"></script>
</body>
</html>
