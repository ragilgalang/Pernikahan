<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password — Wedding Organizations</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --rose: #c0435f; --rose-dark: #9e3350; --rose-soft: #f4dce3;
  --rose-pale: #fdf5f7; --blush: #f0c4d0; --gold: #b8955a;
  --cream: #fffbf8; --white: #ffffff; --ink: #1e1620; --muted: #8b7880;
  --border: #ecdde2;
}
body { font-family:'DM Sans',sans-serif; background:var(--white); color:var(--ink); min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center; overflow-x:hidden; padding:20px; }

/* Decorative floral top */
.floral-top { position:fixed; top:-30px; left:50%; transform:translateX(-50%); width:500px; height:200px; z-index:0; pointer-events:none; opacity:.12; }

/* Card */
.card {
  position:relative; z-index:1;
  background:var(--white); border:1px solid var(--border);
  border-radius:28px; padding:48px 44px;
  width:100%; max-width:440px;
  box-shadow:0 20px 60px rgba(192,67,95,0.14), 0 4px 16px rgba(192,67,95,0.06);
  animation:rise .65s ease both;
}
@keyframes rise { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }

/* Logo / Icon */
.brand-icon {
  width:64px; height:64px; border-radius:18px;
  background:linear-gradient(135deg,var(--rose-soft),var(--blush));
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 20px; box-shadow:0 6px 20px rgba(192,67,95,0.2);
}
.brand-icon svg { width:28px;height:28px;color:var(--rose); }

.brand-name { text-align:center; font-family:'Playfair Display',serif; font-size:16px;font-weight:600;color:var(--muted); letter-spacing:.04em; margin-bottom:28px; }
.brand-name em { color:var(--rose);font-style:italic; }

.card-title { font-family:'Playfair Display',serif; font-size:28px;font-weight:700; color:var(--ink); text-align:center; margin-bottom:8px; }
.card-sub { font-size:14px;color:var(--muted); text-align:center; line-height:1.6; margin-bottom:32px; }

/* Steps indicator */
.steps { display:flex;align-items:center;justify-content:center;gap:0; margin-bottom:32px; }
.step { display:flex;align-items:center;flex-direction:column; gap:6px; }
.step-num { width:32px;height:32px;border-radius:50%; display:flex;align-items:center;justify-content:center; font-size:12px;font-weight:600;letter-spacing:.04em; transition:all .3s; }
.step-num.done { background:var(--rose);color:#fff; }
.step-num.active { background:var(--rose);color:#fff;box-shadow:0 0 0 4px rgba(192,67,95,.2); }
.step-num.waiting { background:var(--border);color:var(--muted); }
.step-label { font-size:10px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--muted);white-space:nowrap; }
.step-label.active { color:var(--rose); }
.step-line { width:48px;height:2px;background:var(--border);margin-bottom:18px;transition:background .3s; }
.step-line.done { background:var(--rose); }

/* Form */
.field { display:flex;flex-direction:column;gap:6px; margin-bottom:16px; }
.field label { font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted); }
.input-wrap { position:relative; }
.input-wrap svg { position:absolute;left:14px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:var(--blush); pointer-events:none; }
.field input {
  width:100%; border:1.5px solid var(--border); background:var(--rose-pale);
  border-radius:12px; padding:14px 15px 14px 42px;
  font-family:'DM Sans',sans-serif;font-size:14px;color:var(--ink);
  outline:none;transition:border-color .2s,box-shadow .2s,background .2s;
}
.field input::placeholder { color:var(--blush); }
.field input:focus { border-color:var(--rose);background:#fff;box-shadow:0 0 0 3px rgba(192,67,95,.1); }

/* OTP Inputs */
.otp-group { display:flex;gap:10px;justify-content:center; }
.otp-input {
  width:52px;height:60px;text-align:center;
  border:1.5px solid var(--border);background:var(--rose-pale);
  border-radius:12px;font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--rose);
  outline:none;transition:all .2s;
}
.otp-input:focus { border-color:var(--rose);background:#fff;box-shadow:0 0 0 3px rgba(192,67,95,.1);transform:scale(1.05); }

/* Password strength */
.strength-bar { display:flex;gap:4px;margin-top:8px; }
.sbar { flex:1;height:3px;border-radius:2px;background:var(--border);transition:background .3s; }
.strength-label { font-size:11px;color:var(--muted);margin-top:4px; }

.btn-main {
  width:100%;background:linear-gradient(135deg,var(--rose) 0%,var(--rose-dark) 100%);
  color:#fff;border:none;border-radius:14px;padding:17px;
  font-family:'DM Sans',sans-serif;font-size:14px;font-weight:600;
  letter-spacing:.1em;text-transform:uppercase;cursor:pointer;
  box-shadow:0 8px 28px rgba(192,67,95,.38);transition:transform .2s,box-shadow .2s;
  position:relative;overflow:hidden; margin-top:8px;
}
.btn-main::before { content:'';position:absolute;top:0;left:-100%;width:100%;height:100%; background:linear-gradient(90deg,transparent,rgba(255,255,255,.14),transparent);transition:left .5s; }
.btn-main:hover::before { left:100%; }
.btn-main:hover { transform:translateY(-2px);box-shadow:0 14px 36px rgba(192,67,95,.46); }

.back-link { display:block;text-align:center;margin-top:20px;font-size:13px;color:var(--muted); text-decoration:none;transition:color .2s; }
.back-link:hover { color:var(--rose); }
.back-link span { color:var(--rose);font-weight:600; }

.resend-row { text-align:center;margin-top:16px;font-size:13px;color:var(--muted); }
.resend-row button { background:none;border:none;color:var(--rose);font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;cursor:pointer;text-decoration:underline;text-underline-offset:2px; }

/* Panels */
.panel { display:none; }
.panel.active { display:block; }

/* Success */
.success-icon { width:72px;height:72px;border-radius:50%;background:linear-gradient(135deg,#e8f5e9,#c8e6c9); display:flex;align-items:center;justify-content:center;margin:0 auto 20px; }
.success-icon svg { width:32px;height:32px;color:#388e3c; }
</style>
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
