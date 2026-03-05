<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout — Wedding Organizations</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>
<body>

    <!-- ══ CURVED HEADER ══════════════════════════════════ -->
    <header class="curved-header">
        <div class="header-nav">
            <a href="javascript:history.back()" class="nav-circle-btn">
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
            <div class="nav-brand">Wedding <em>Organizations</em></div>
        </div>
    </header>

    <!-- ══ SEARCH PILLS ═══════════════════════════════════ -->
    <div class="search-pills-row">
        <div class="pill-input">KE: Jakarta</div>
        <div class="pill-input">DARI: Bali</div>
    </div>

    <!-- ══ MAIN CONTENT PANELS ════════════════════════════ -->
    <main>
        
        <!-- PANEL KIRI: Venue Info -->
        <div class="panel panel-left">
            <div class="venue-card-modern">
                <div class="venue-img-wrap">
                    <img src="{{ $booking['image'] }}" alt="{{ $booking['item_name'] }}" id="main-v-img">
                    <div class="venue-arrows">
                        <span onclick="cycleImg(-1)">&lt;</span>
                        <span onclick="cycleImg(1)">&gt;</span>
                    </div>
                    <div class="venue-dots" id="v-dots">
                        <!-- Dots populated by JS -->
                    </div>
                </div>
                <div class="venue-details">
                    <div class="venue-host">{{ $booking['owner'] }}</div>
                    <h2 class="venue-name">{{ $booking['item_name'] }}</h2>
                    <div class="venue-loc">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ $booking['location'] }}
                    </div>
                    <div class="venue-meta-footer">
                        <div class="price-box">{{ $booking['price_per_night'] }} <span>/ Malam</span></div>
                        <button class="btn-edit-small">Edit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- PANEL KANAN: Checkout Process -->
        <div class="panel panel-right">
            
            <div class="price-summary-box">
                <h3 class="section-title-alt">Ringkasan Harga</h3>
                @foreach($booking['summary'] as $label => $price)
                    <div class="p-row {{ $label == 'Total' ? 'total' : '' }}">
                        <span class="lbl">{{ $label }}</span>
                        <span class="val">{{ $price }}</span>
                    </div>
                @endforeach
            </div>

            <div class="payment-options-block">
                <h3 class="section-title-alt">Metode Pembayaran</h3>
                <div class="pay-tabs-modern">
                    <button class="pay-tab active" onclick="setTab(this,'card')">Kredit/Debit</button>
                    <button class="pay-tab" onclick="setTab(this,'upi')">UPI</button>
                    <button class="pay-tab" onclick="setTab(this,'bank')">Transfer</button>
                </div>

                <form action="{{ route('checkout.pay') }}" method="POST" id="checkout-form">
                    @csrf
                    <!-- Card Form -->
                    <div id="form-card">
                        <div class="form-group">
                            <label>Nama Pemegang Kartu</label>
                            <input type="text" placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label>Nomor Kartu</label>
                            <input type="text" id="cardnum" placeholder="XXXX  XXXX  XXXX  XXXX">
                        </div>
                        <div style="display:flex; gap:10px;">
                            <div class="form-group" style="flex:1;">
                                <label>Masa Berlaku</label>
                                <input type="text" placeholder="MM/YY">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label>CVV</label>
                                <input type="password" placeholder="***">
                            </div>
                        </div>
                    </div>

                    <!-- Other forms (hidden) -->
                    <div id="form-upi" style="display:none;">
                        <div class="form-group">
                            <label>UPI ID</label>
                            <input type="text" placeholder="username@upi">
                        </div>
                    </div>
                    <div id="form-bank" style="display:none;">
                        <div class="form-group">
                            <label>Bank Tujuan</label>
                            <input type="text" placeholder="Nama Bank">
                        </div>
                    </div>

                    <button type="button" class="btn-pay-modern" id="pay-btn" onclick="handlePay()">
                        PAY NOW — {{ $booking['summary']['Total'] ?? end($booking['summary']) }}
                    </button>
                </form>
            </div>
            
        </div>

    </main>

    <script>
        const imgs = ["{{ $booking['image'] }}", "https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=900&q=85"];
        let cur = 0;
        
        function cycleImg(dir) {
            cur = (cur + dir + imgs.length) % imgs.length;
            document.getElementById('main-v-img').src = imgs[cur];
            renderDots();
        }

        function renderDots() {
            const dots = document.getElementById('v-dots');
            dots.innerHTML = '';
            imgs.forEach((_, i) => {
                const d = document.createElement('div');
                d.className = 'vdot' + (i === cur ? ' on' : '');
                dots.appendChild(d);
            });
        }
        renderDots();

        function setTab(btn, form) {
            document.querySelectorAll('.pay-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            ['card','upi','bank'].forEach(f => {
                document.getElementById('form-' + f).style.display = f === form ? 'block' : 'none';
            });
        }

        function handlePay() {
            const btn = document.getElementById('pay-btn');
            btn.innerHTML = 'Memproses...';
            btn.disabled = true;
            setTimeout(() => {
                btn.innerHTML = 'Berhasil!';
                btn.style.background = '#4caf50';
                setTimeout(() => document.getElementById('checkout-form').submit(), 1000);
            }, 1500);
        }

        // Card format
        const cn = document.getElementById('cardnum');
        if(cn) cn.addEventListener('input', e => {
            let v = e.target.value.replace(/\D/g,'').slice(0,16);
            e.target.value = v.replace(/(.{4})/g,'$1  ').trim();
        });
    </script>
</body>
</html>
