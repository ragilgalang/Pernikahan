<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Wedding Organizations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Right Sidebar -->
    <aside class="sidebar sidebar-right" id="rightSidebar">
        <p class="sidebar-label" style="text-align:right">Jelajahi</p>
        <ul class="sidebar-menu" style="text-align:right">
            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
            <li><a href="{{ route('venues.index') }}">Gedung</a></li>
            <li><a href="{{ route('flowers.index') }}">Vendor</a></li>
            <li><a href="#">Acara</a></li>
            <li><a href="{{ route('reviews.index', ['type' => 'Venue', 'id' => 1]) }}">Review & Rating</a></li>
            <li><a href="{{ route('suggestions.create') }}">Saran</a></li>
            <li><a href="{{ route('studycase.index') }}">Study Case</a></li>
        </ul>
        
        <p class="sidebar-label" style="text-align:right; margin-top: 20px;">Akun</p>
        <ul class="sidebar-menu" style="text-align:right">
            @auth
                <li><p style="padding: 12px 28px; font-size: 0.8rem; color: #888;">{{ Auth::user()->name }}</p></li>
                <li><a href="{{ route('orders') }}">Pemesanan Saya</a></li>
                <li><a href="{{ route('profile.edit') }}">Edit Profil</a></li>
                <li><a href="{{ route('logout') }}" class="danger" style="color: #c0445e;">Keluar</a></li>
            @else
                <li><a href="{{ route('login') }}">Masuk</a></li>
                <li><a href="{{ route('register') }}">Daftar</a></li>
            @endauth
        </ul>
    </aside>

    <header class="curved-header">
        <div class="header-nav">
            <a href="{{ route('dashboard') }}" class="nav-circle-btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <div class="header-center-floral">
                <p style="font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: #8a3047; font-weight: 600;">
                    Wedding <span style="font-style: italic; color: #c0445e;">Organizations</span>
                </p>
            </div>
            <div class="nav-menu-btn" id="toggleRight">
                <span></span><span></span><span></span>
            </div>
        </div>
        <h1 class="page-title">Edit Profil</h1>
        <p class="page-subtitle">Perbarui informasi akun dan preferensi Anda</p>
    </header>

    <main class="profile-container">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Section Avatar -->
            <div class="profile-section">
                <div class="avatar-wrapper">
                    <div class="avatar-circle">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                        @else
                            <span class="initials">{{ substr($user->name, 0, 1) }}</span>
                        @endif
                        <label for="avatar_input" class="btn-edit-avatar">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </label>
                    </div>
                    <div class="avatar-info">
                        <h3>Foto Profil</h3>
                        <p>Format JPG, PNG. Maksimal 5MB</p>
                        <input type="file" id="avatar_input" name="avatar" style="display: none;" onchange="this.form.submit()">
                        <button type="button" class="btn-upload" onclick="document.getElementById('avatar_input').click()">Unggah Foto</button>
                    </div>
                </div>
            </div>

            <!-- Section Informasi Pribadi -->
            <div class="profile-section">
                <div class="section-header">
                    <div class="section-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h2>Informasi Pribadi</h2>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="Bapak">
                    </div>
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Shrikanth">
                    </div>
                    <div class="form-group full">
                        <label>Nama Pengguna</label>
                        <input type="text" name="username" value="{{ $user->username }}" placeholder="@shrikanth.wedding">
                    </div>
                    <div class="form-group full">
                        <label>Jenis Kelamin</label>
                        <div class="gender-options">
                            <div class="gender-pill">
                                <input type="radio" name="gender" id="g_pria" value="Pria" {{ $user->gender == 'Pria' ? 'checked' : '' }}>
                                <label for="g_pria">♂ Pria</label>
                            </div>
                            <div class="gender-pill">
                                <input type="radio" name="gender" id="g_wanita" value="Wanita" {{ $user->gender == 'Wanita' ? 'checked' : '' }}>
                                <label for="g_wanita">♀ Wanita</label>
                            </div>
                            <div class="gender-pill">
                                <input type="radio" name="gender" id="g_lainnya" value="Lainnya" {{ $user->gender == 'Lainnya' ? 'checked' : '' }}>
                                <label for="g_lainnya">○ Lainnya</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('dashboard') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-save">SIMPAN PERUBAHAN</button>
            </div>
        </form>
    </main>

    <footer class="simple-footer">
        <p>&copy; 2026 Wedding Organizations. All rights reserved.</p>
    </footer>

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
    </script>
</body>
</html>
