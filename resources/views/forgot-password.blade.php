<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password — Wedding Organizations</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
</head>
<body>

<div class="card">


  <div class="brand-name">Wedding <em>Organizations</em></div>


  <!-- Panel 1: Email -->
  <div class="panel active" id="p1">
    <div class="card-title">Lupa Password?</div>
    <div class="card-sub">Masukkan email Anda dan kami akan mengirimkan kode verifikasi untuk mereset password.</div>
    <div class="field">
      <label>Alamat Email</label>
      <div class="input-wrap">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <input type="email" id="emailInput" placeholder="email@contoh.com">
      </div>
    </div>
    <button class="btn-main" onclick="goStep(2)">Kirim Kode Verifikasi</button>
    <a href="{{ route('login') }}" class="back-link">Ingat password? <span>Masuk sekarang</span></a>
  </div>

  <!-- Panel 2: OTP -->
  <div class="panel" id="p2">
    <div class="card-title">Masukkan Kode</div>
    <div class="card-sub">Kode 4 digit telah dikirim ke <strong id="emailShow" style="color:var(--rose)">email@contoh.com</strong></div>
    <div class="otp-group" style="margin-bottom:24px;">
      <input class="otp-input" maxlength="1" oninput="otpNext(this,0)">
      <input class="otp-input" maxlength="1" oninput="otpNext(this,1)">
      <input class="otp-input" maxlength="1" oninput="otpNext(this,2)">
      <input class="otp-input" maxlength="1" oninput="otpNext(this,3)">
    </div>
    <button class="btn-main" onclick="goStep(3)">Verifikasi Kode</button>
    <div class="resend-row">Tidak menerima kode? <button onclick="resend()">Kirim ulang</button></div>
    <a href="#" class="back-link" onclick="goStep(1)">← Ganti email</a>
  </div>

  <!-- Panel 3: New Password -->
  <div class="panel" id="p3">
    <div class="card-title">Password Baru</div>
    <div class="card-sub">Buat password baru yang kuat untuk akun Anda.</div>
    <div class="field">
      <label>Password Baru</label>
      <div class="input-wrap">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
        <input type="password" id="newPass" placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)">
      </div>
      <div class="strength-bar">
        <div class="sbar" id="sb1"></div>
        <div class="sbar" id="sb2"></div>
        <div class="sbar" id="sb3"></div>
        <div class="sbar" id="sb4"></div>
      </div>
      <div class="strength-label" id="strengthLabel">Ketikkan password untuk melihat kekuatannya</div>
    </div>
    <div class="field">
      <label>Konfirmasi Password</label>
      <div class="input-wrap">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
        <input type="password" placeholder="Ulangi password">
      </div>
    </div>
    <button class="btn-main" onclick="goStep(4)">Reset Password</button>
  </div>

  <!-- Panel 4: Success -->
  <div class="panel" id="p4">
    <div class="success-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <div class="card-title" style="margin-bottom:12px;">Password Berhasil Direset!</div>
    <div class="card-sub" style="margin-bottom:28px;">Password Anda telah diperbarui. Silakan login dengan password baru Anda.</div>
    <button class="btn-main" onclick="window.location.href='{{ route('login') }}'">Masuk Sekarang</button>
  </div>

</div>

<script>
function goStep(n) {
  // Show email in step 2
  if(n===2) { document.getElementById('emailShow').textContent = document.getElementById('emailInput').value || 'email@contoh.com'; }
  // Hide all panels
  document.querySelectorAll('.panel').forEach(p=>p.classList.remove('active'));
  document.getElementById('p'+n).classList.add('active');
  // Update step indicators (removed)
}
function otpNext(el, idx) {
  const inputs = document.querySelectorAll('.otp-input');
  if(el.value && idx<3) inputs[idx+1].focus();
}
function resend(){ alert('Kode telah dikirim ulang!'); }
function checkStrength(v) {
  const bars=[document.getElementById('sb1'),document.getElementById('sb2'),document.getElementById('sb3'),document.getElementById('sb4')];
  const lbl=document.getElementById('strengthLabel');
  let score=0;
  if(v.length>=8)score++;
  if(/[A-Z]/.test(v))score++;
  if(/[0-9]/.test(v))score++;
  if(/[^A-Za-z0-9]/.test(v))score++;
  const colors=['#f44336','#ff9800','#ffc107','#4caf50'];
  const labels=['Lemah','Cukup','Baik','Sangat Kuat'];
  bars.forEach((b,i)=>{ b.style.background=i<score?colors[score-1]:getComputedStyle(document.documentElement).getPropertyValue('--border'); });
  lbl.textContent=score>0?labels[score-1]:'Ketikkan password untuk melihat kekuatannya';
  lbl.style.color=score>0?colors[score-1]:getComputedStyle(document.documentElement).getPropertyValue('--muted');
}
</script>
</body>
</html>
