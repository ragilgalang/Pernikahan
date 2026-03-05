<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Wedding Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Kembali
        </a>
        <div class="brand-name">Wedding <em>Organizations</em></div>
    </nav>

    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Photo Card -->
            <div class="card photo-card">
                <div class="avatar-wrap" onclick="document.getElementById('profile_photo').click()" style="cursor: pointer;">
                    <div class="avatar" id="avatarPreview" style="overflow: hidden;">S</div>
                    <div class="edit-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </div>
                </div>
                <div class="photo-info">
                    <h3>Foto Profil</h3>
                    <p>Format JPG, PNG. Maksimal 5MB</p>
                    <input type="file" id="profile_photo" name="profile_photo" accept="image/png, image/jpeg, image/jpg" style="display: none;">
                    <button type="button" class="btn-outline" onclick="document.getElementById('profile_photo').click()">UNGGAH FOTO</button>
                </div>
            </div>
            <div class="card form-card">
                <div class="section-title">
                    <div class="section-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    Informasi Pribadi
                </div>

                <div class="row">
                    <div class="col field">
                        <label>Nama Depan</label>
                        <input type="text" name="first_name" value="Bapak">
                    </div>
                    <div class="col field">
                        <label>Nama Belakang</label>
                        <input type="text" name="last_name" value="Shrikanth">
                    </div>
                </div>
                <div class="row">
                    <div class="col field">
                        <label>Alamat Email</label>
                        <input type="text" name="username" value="@shrikanth.wedding">
                    </div>
                </div>
                
                <div class="field" style="margin-top: 10px;">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label class="radio-box">
                            <input type="radio" name="gender" value="pria" checked>
                            <span class="radio-label">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="10" cy="14" r="5"></circle>
                                    <line x1="14" y1="10" x2="21" y2="3"></line>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                </svg>
                                Pria
                            </span>
                        </label>
                        <label class="radio-box">
                            <input type="radio" name="gender" value="wanita">
                            <span class="radio-label">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="10" r="5"></circle>
                                    <line x1="12" y1="15" x2="12" y2="21"></line>
                                    <line x1="9" y1="18" x2="15" y2="18"></line>
                                </svg>
                                Wanita
                            </span>
                        </label>
                        <label class="radio-box">
                            <input type="radio" name="gender" value="lainnya">
                            <span class="radio-label">
                                <span style="font-size:10px;">○</span>
                                Lainnya
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Password Card -->
            <div class="card form-card">
                <div class="section-title">
                    <div class="section-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    Keamanan Akun
                </div>
                
                <div class="row">
                    <div class="col field">
                        <label>Password Saat Ini</label>
                        <div class="password-wrap">
                            <input type="password" id="current_password" name="current_password" placeholder="••••••••">
                            <span class="password-toggle" onclick="togglePassword('current_password')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col field">
                        <label>Password Baru</label>
                        <div class="password-wrap">
                            <input type="password" id="new_password" name="new_password" placeholder="Minimal 8 karakter">
                            <span class="password-toggle" onclick="togglePassword('new_password')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col field">
                        <label>Konfirmasi Password</label>
                        <div class="password-wrap">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Ulangi password baru">
                            <span class="password-toggle" onclick="togglePassword('new_password_confirmation')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action-bar" style="margin-bottom: 40px;">
                <a href="{{ route('dashboard') }}" class="btn-cancel" style="display:inline-flex; align-items:center; text-decoration:none;">Batal</a>
                <button type="submit" class="btn-save">SIMPAN PERUBAHAN</button>
            </div>
        </form>
    </div>

    <script>
        // Preview Image Photo
        document.getElementById('profile_photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarDiv = document.getElementById('avatarPreview');
                    avatarDiv.innerHTML = `<img src="${e.target.result}" style="width:100%; height:100%; object-fit:cover;">`;
                }
                reader.readAsDataURL(file);
            }
        });

        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            // Opsi untuk bisa mengganti icon mata tercoret jika diinginkan nantinya:
            // const iconSVG = passwordInput.nextElementSibling.querySelector('svg');
        }
    </script>
</body>
</html>
