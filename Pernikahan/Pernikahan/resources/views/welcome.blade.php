<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizations — Wujudkan Pernikahan Impianmu</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --rose: #c0435f;
            --rose-dark: #9e3350;
            --rose-soft: #f4dce3;
            --rose-pale: #fdf5f7;
            --gold: #b8955a;
            --ink: #1e1620;
            --muted: #8b7880;
        }
        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
        }
        h1, h2, h3, h4, .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .text-rose { color: var(--rose); }
        .bg-rose { background-color: var(--rose); }
        .bg-rose-pale { background-color: var(--rose-pale); }
        .border-rose { border-color: var(--rose); }
        
        .hero-gradient {
            background: linear-gradient(135deg, #fdf5f7 0%, #f4dce3 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-pattern {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20S-10 18.954-10 30s8.954 20 20 20 20-8.954 20-20zm-20 0c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10-10-4.477-10-10z' fill='%23c0435f' fill-opacity='0.03' fill-rule='evenodd' /%3E%3C/svg%3E");
            opacity: 0.6;
        }
        
        .btn-premium {
            background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(192, 67, 95, 0.2);
        }
        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(192, 67, 95, 0.3);
        }
        
        .card-feature {
            background: white;
            border: 1px solid #ecdde2;
            transition: all 0.3s ease;
        }
        .card-feature:hover {
            transform: translateY(-5px);
            border-color: var(--rose);
            box-shadow: 0 10px 30px rgba(192, 67, 95, 0.08);
        }
    </style>
</head>
<body class="bg-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-pink-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-rose tracking-tight">Wedding <em>Organizations</em></h1>
            <div class="space-x-8 hidden md:flex items-center text-sm font-medium">
                <a href="#about" class="hover:text-rose transition-colors">About</a>
                <a href="{{ route('dashboard') }}" class="hover:text-rose transition-colors">Dashboard</a>
                @auth
                @endauth
            </div>
            <!-- Mobile Menu Toggle (Simplified) -->
            <button class="md:hidden text-rose">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient pt-40 pb-32 px-6 relative">
        <div class="hero-pattern"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="text-rose font-semibold tracking-widest text-xs uppercase mb-4 block">The Ultimate Wedding Marketplace</span>
            <h2 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">Wujudkan Pernikahan <br><span class="italic text-rose">Impianmu</span> Bersama Kami</h2>
            <p class="text-lg md:text-xl text-muted mb-10 max-w-2xl mx-auto leading-relaxed">Temukan venue eksklusif dan rangkaian bunga terindah untuk hari paling spesial dalam hidupmu.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-5">
                <a href="{{ route('dashboard') }}" class="btn-premium text-white px-10 py-4 rounded-full font-bold transition-all flex items-center justify-center gap-2">
                    Cari Venue
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-32 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold mb-4">Layanan Kami</h2>
                <p class="text-muted max-w-xl mx-auto">Kami menyediakan layanan terbaik untuk memastikan pernikahan Anda berjalan sempurna tanpa hambatan.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-feature p-10 rounded-3xl text-center">
                    <div class="w-16 h-16 bg-rose-pale rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <span class="text-3xl text-rose">💐</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-[#1e1620]">Layanan Vendor</h3>
                    <p class="text-muted leading-relaxed">perusahaan penyedia layanan dan produk spesifik (seperti katering, dekorasi, dokumentasi, busana, dan venue) yang bekerja sama dengan calon pengantin untuk merencanakan serta melaksanakan pernikahan impian.</p>
                </div>
                <div class="card-feature p-10 rounded-3xl text-center">
                    <div class="w-16 h-16 bg-rose-pale rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <span class="text-3xl text-rose">🏛️</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-[#1e1620]">Venue Eksklusif</h3>
                    <p class="text-muted leading-relaxed">Akses ke gedung-gedung termewah dan taman outdoor tersembunyi yang siap menyambut tamu spesial Anda.</p>
                </div>
                <div class="card-feature p-10 rounded-3xl text-center">
                    <div class="w-16 h-16 bg-rose-pale rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <span class="text-3xl text-rose">🛒</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-[#1e1620]">Booking Mudah</h3>
                    <p class="text-muted leading-relaxed">Pantau semua pesanan dan kelola anggaran pernikahan Anda dalam satu dashboard yang intuitif dan aman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-32 px-6 bg-rose-pale relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-rose/5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-rose/5 rounded-full -ml-48 -mb-48"></div>
        
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/venues/Taman/Bumi Samami.webp') }}" alt="Our Story" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-8 -right-8 bg-white p-8 rounded-2xl shadow-xl hidden md:block">
                        <p class="text-rose font-playfair italic text-2xl">"Love is the <br> master key."</p>
                    </div>
                </div>
                
                <div>
                    <span class="text-rose font-semibold tracking-widest text-xs uppercase mb-4 block">Tentang Kami</span>
                    <h2 class="text-4xl font-bold mb-6 leading-tight">Dedikasi Kami untuk <br>Momen <span class="italic text-rose">Terindah Anda</span></h2>
                    <p class="text-muted mb-6 leading-relaxed">
                        Wedding Organizations lahir dari keinginan untuk menyederhanakan proses perencanaan pernikahan yang seringkali melelahkan. Kami percaya bahwa setiap pasangan berhak mendapatkan perayaan yang mencerminkan kisah cinta unik mereka.
                    </p>
                    <p class="text-muted mb-8 leading-relaxed">
                        Dengan kurasi vendor terbaik dan teknologi yang memudahkan, kami bukan sekadar marketplace, melainkan partner setia yang menemani setiap langkah Anda menuju pelaminan. Dari gedung mewah hingga detail katering terkecil, semua tersedia dalam satu genggaman.
                    </p>
                    <div class="flex items-center gap-4 py-6 border-t border-rose/10">
                        <div class="text-center px-4">
                            <span class="block text-2xl font-bold text-rose">500+</span>
                            <span class="text-xs text-muted uppercase tracking-tighter">Vendor Mitrra</span>
                        </div>
                        <div class="w-px h-10 bg-rose/10"></div>
                        <div class="text-center px-4">
                            <span class="block text-2xl font-bold text-rose">1.2k</span>
                            <span class="text-xs text-muted uppercase tracking-tighter">Pernikahan Sukses</span>
                        </div>
                        <div class="w-px h-10 bg-rose/10"></div>
                        <div class="text-center px-4">
                            <span class="block text-2xl font-bold text-rose">4.9/5</span>
                            <span class="text-xs text-muted uppercase tracking-tighter">Rating Kepuasan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold">Inspirasi Pernikahan</h2>
                    <p class="text-muted">Temukan ide terbaik dari koleksi venue dan vendor kami.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-rose font-bold text-sm tracking-widest uppercase hover:underline">Lihat Semua</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-[600px]">
                <!-- Large Image (Left) -->
                <div class="md:col-span-7 relative overflow-hidden rounded-3xl group">
                    <img src="{{ asset('images/venues/Taman/Bumi Samami.webp') }}" alt="Venue Outdoor" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-8">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-rose text-white text-[10px] px-3 py-1 rounded-full uppercase font-bold tracking-widest inline-block">Venue Utama</span>
                                <span class="bg-white/20 backdrop-blur-sm text-white text-[10px] px-3 py-1 rounded-full font-bold inline-block">4.9 ★</span>
                            </div>
                            <h3 class="text-white text-2xl font-bold">Bumi Samami - Garden Party</h3>
                        </div>
                    </div>
                </div>
                
                <!-- Small Images (Right Grid) -->
                <div class="md:col-span-5 grid grid-cols-2 gap-4 h-full">
                    <div class="relative overflow-hidden rounded-2xl group">
                        <img src="{{ asset('images/venues/Ballroom/Gedung Sampoerna Strategic Square.jpg') }}" alt="Ballroom" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-white/90 text-rose text-[9px] px-2 py-0.5 rounded-full font-bold">4.8 ★</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl group">
                        <img src="{{ asset('images/venues/Ballroom/Lippo-Kuningan-Grand-Ballroom.webp') }}" alt="Grand Ballroom" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-white/90 text-rose text-[9px] px-2 py-0.5 rounded-full font-bold">4.7 ★</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl group">
                        <img src="{{ asset('images/venues/Taman/Gunung Pancar.webp') }}" alt="Outdoor" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-white/90 text-rose text-[9px] px-2 py-0.5 rounded-full font-bold">4.9 ★</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl group">
                        <img src="{{ asset('images/venues/Ballroom/Pati-Unus-Hall.webp') }}" alt="Hall" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-white/90 text-rose text-[9px] px-2 py-0.5 rounded-full font-bold">4.6 ★</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 px-6 bg-rose-pale/50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <span class="text-rose font-semibold tracking-widest text-xs uppercase mb-4 block">Testimonial</span>
                <h2 class="text-4xl font-bold mb-4">Apa Kata Mereka?</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl border border-pink-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-yellow-400 mb-4 text-sm">★★★★★</div>
                    <p class="text-muted italic mb-6 leading-relaxed">"Sangat membantu untuk mencari venue outdoor! Proses bookingnya cepat dan vendor yang direkomendasikan benar-benar berkualitas."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-rose-pale rounded-full flex items-center justify-center font-bold text-rose text-xs">RS</div>
                        <div>
                            <h4 class="font-bold text-sm">Rina & Surya</h4>
                            <p class="text-[10px] text-muted">Bumi Samami, Nov 2025</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl border border-pink-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-yellow-400 mb-4 text-sm">★★★★★</div>
                    <p class="text-muted italic mb-6 leading-relaxed">"Dashboardnya sangat memudahkan saya mengelola budget katering dan dekorasi. Semua detail transparan dan aman."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-rose-pale rounded-full flex items-center justify-center font-bold text-rose text-xs">AD</div>
                        <div>
                            <h4 class="font-bold text-sm">Adit & Dinda</h4>
                            <p class="text-[10px] text-muted">Sampoerna Strategic, Jan 2026</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl border border-pink-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-yellow-400 mb-4 text-sm">★★★★★</div>
                    <p class="text-muted italic mb-6 leading-relaxed">"Vendor MUA dan Busana yang saya temukan di sini luar biasa. Tim Wedding Organizations sangat responsif membantu sinkronisasi jadwal."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-rose-pale rounded-full flex items-center justify-center font-bold text-rose text-xs">MA</div>
                        <div>
                            <h4 class="font-bold text-sm">Maya & Aris</h4>
                            <p class="text-[10px] text-muted">Gunung Pancar, Feb 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-16 text-center bg-white border-t border-pink-50 text-muted">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-rose mb-6">Wedding <em>Organizations</em></h2>
            <div class="flex justify-center gap-8 mb-8 text-sm font-medium">
                <a href="#" class="hover:text-rose transition-colors">Instagram</a>
                <a href="#" class="hover:text-rose transition-colors">Facebook</a>
                <a href="#" class="hover:text-rose transition-colors">Twitter</a>
                <a href="#" class="hover:text-rose transition-colors">Contact</a>
            </div>
            <p class="text-xs tracking-widest uppercase opacity-60">
                © {{ date('Y') }}  Wedding Organizations Marketplace. Crafted with love.
            </p>
        </div>
    </footer>

</body>
</html>
