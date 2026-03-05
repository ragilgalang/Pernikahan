<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Wedding Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="header">
        <div class="floral-patterns"></div>
        <h1 class="header-text">WEDDING ORGANIZATIONS</h1>
    </div>

    <div class="container" id="login-container">
        <div class="card">
            <h2 class="card-title">Sign In</h2>
            <form action="{{ route('login', ['redirect_to' => request()->query('redirect_to')]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="contoh@email.com" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="password-field-container">
                        <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                        <span class="password-toggle-icon" onclick="togglePassword('password')">
                            <svg id="eye-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><circle cx="12" cy="12" r="3" /></svg>
                        </span>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                    <button type="submit" class="btn-go">Masuk</button>
                    <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 4px;">
                        <a href="{{ route('forgot-password') }}" style="color: #c0435f; font-size: 0.85rem; text-decoration: none; font-weight: 500;">Lupa Password?</a>
                        <a href="{{ route('register') }}" style="color: #555; font-size: 0.85rem; text-decoration: none; font-weight: 500;">Daftar Akun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Optional: change icon based on state
            const icon = document.querySelector(`#eye-${inputId}`);
        }

        const container = document.getElementById('login-container');
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 60;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 60;
            container.style.transform = `translate(${xAxis}px, ${yAxis}px)`;
        });
    </script>
</body>
</html>
