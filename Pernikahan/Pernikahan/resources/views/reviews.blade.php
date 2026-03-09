<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review & Rating - Marriage Organizations</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
</head>
<body>
    <div class="review-container">
        <header class="review-header">
            <div style="display: flex; justify-content: flex-start; margin-bottom: 20px;">
                <a href="javascript:history.back()" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: var(--rose-dk); font-weight: 600; font-size: 0.9rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Kembali
                </a>
            </div>
            <p style="text-transform: uppercase; letter-spacing: 2px; font-weight: 700; font-size: 0.7rem; color: #d13d6a; margin-bottom: 20px;">Wedding <span style="font-family: 'Playfair Display', serif; font-style: italic; text-transform: none; letter-spacing: 0;">Organizations</span></p>
            <h1>Review & Rating</h1>
            <p>Bagikan pengalaman Anda dan bantu calon pengantin lainnya</p>
        </header>

        <div class="review-grid">
            <!-- LEFT COLUMN: WRITE REVIEW -->
            <div class="review-form-column">
                <div class="review-form-card">
                    <div class="section-title-box">
                        <div class="icon-wrap">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </div>
                        <h2>Tulis Ulasan</h2>
                    </div>

                    @if(session('success'))
                        <div style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem; border: 1px solid #c8e6c9;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div style="background: #ffebee; color: #c62828; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem; border: 1px solid #ffcdd2;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="item-preview-card">
                        <img src="{{ $item->image ?? $item['image'] ?? asset('images/placeholder.jpg') }}" class="item-img" alt="Item">
                        <div class="item-info">
                            <h4>{{ $item->name ?? $item['name'] }}</h4>
                            <p>{{ $item->location ?? $item['location'] }}</p>
                            <p style="color: #d13d6a; font-weight: 600; margin-top: 4px;">Pemesanan: {{ date('d F Y') }}</p>
                        </div>
                    </div>

                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_type" value="{{ $type }}">
                        <input type="hidden" name="item_id" value="{{ $id }}">

                        <div class="rating-question">
                            <label>PENILAIAN KESELURUHAN</label>
                            <div class="star-rating" id="overall-stars">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>
                            <input type="hidden" name="rating_overall" id="overall-input" value="0">
                            <p style="font-size: 0.7rem; color: var(--text-muted); margin-top: 8px;">Klik bintang untuk memberi penilaian</p>
                        </div>

                        <div class="aspect-grid">
                            <div class="aspect-box">
                                <label>VENUE & FASILITAS</label>
                                <div class="star-rating mini" data-target="venue-input">
                                    <span class="star" data-value="1">★</span>
                                    <span class="star" data-value="2">★</span>
                                    <span class="star" data-value="3">★</span>
                                    <span class="star" data-value="4">★</span>
                                    <span class="star" data-value="5">★</span>
                                </div>
                                <input type="hidden" name="rating_venue_fasilitas" id="venue-input" value="0">
                            </div>
                            <div class="aspect-box">
                                <label>KATERING</label>
                                <div class="star-rating mini" data-target="katering-input">
                                    <span class="star" data-value="1">★</span>
                                    <span class="star" data-value="2">★</span>
                                    <span class="star" data-value="3">★</span>
                                    <span class="star" data-value="4">★</span>
                                    <span class="star" data-value="5">★</span>
                                </div>
                                <input type="hidden" name="rating_katering" id="katering-input" value="0">
                            </div>
                            <div class="aspect-box">
                                <label>PELAYANAN</label>
                                <div class="star-rating mini" data-target="pelayanan-input">
                                    <span class="star" data-value="1">★</span>
                                    <span class="star" data-value="2">★</span>
                                    <span class="star" data-value="3">★</span>
                                    <span class="star" data-value="4">★</span>
                                    <span class="star" data-value="5">★</span>
                                </div>
                                <input type="hidden" name="rating_pelayanan" id="pelayanan-input" value="0">
                            </div>
                            <div class="aspect-box">
                                <label>HARGA</label>
                                <div class="star-rating mini" data-target="harga-input">
                                    <span class="star" data-value="1">★</span>
                                    <span class="star" data-value="2">★</span>
                                    <span class="star" data-value="3">★</span>
                                    <span class="star" data-value="4">★</span>
                                    <span class="star" data-value="5">★</span>
                                </div>
                                <input type="hidden" name="rating_harga" id="harga-input" value="0">
                            </div>
                        </div>

                        <div class="comment-area">
                            <label>ULASAN ANDA</label>
                            <textarea name="comment" rows="4" placeholder="Ceritakan pengalaman pernikahan Anda di venue ini. Apa yang paling berkesan? Adakah hal yang perlu ditingkatkan?"></textarea>
                        </div>

                        <div class="upload-section">
                            <label style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 10px;">TAMBAH FOTO (OPSIONAL)</label>
                            <div class="upload-box">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </div>
                        </div>

                        <div class="anonymous-toggle">
                            <input type="checkbox" name="is_anonymous" id="is_anonymous">
                            <label for="is_anonymous">Posting Anonim — Nama Anda tidak akan ditampilkan</label>
                        </div>

                        <button type="submit" class="btn-submit-review">KIRIM ULASAN</button>
                    </form>
                </div>
            </div>

            <!-- RIGHT COLUMN: STATS & LIST -->
            <div class="review-stats-column">
                <div class="stats-card">
                    <h3 style="font-size: 1rem; color: var(--text-muted); margin-bottom: 25px;">Statistik Rating</h3>
                    
                    <div class="avg-rating-box">
                        <span class="avg-val">{{ $averageRating }}</span>
                        <div class="avg-stars">
                            @for($i=1; $i<=5; $i++)
                                <span style="color: {{ $i <= $averageRating ? '#ffc107' : '#e0e0e0' }}">★</span>
                            @endfor
                        </div>
                        <span class="total-verif">dari {{ $totalReviews }} ulasan terverifikasi</span>
                    </div>

                    <div class="stat-bars">
                        @foreach([5, 4, 3, 2, 1] as $star)
                        <div class="bar-row">
                            <span style="width: 15px;">{{ $star }}</span>
                            <div class="bar-bg">
                                <div class="bar-fill" style="width: {{ $distribution[$star] }}%;"></div>
                            </div>
                            <span style="width: 30px; text-align: right;">{{ $distribution[$star] }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="latest-reviews-title">
                    <h3>Ulasan Terbaru</h3>
                    <a href="#" style="font-size: 0.7rem; color: var(--rose-main); text-decoration: none; font-weight: 700;">Terbaru ▾</a>
                </div>

                <div class="reviews-list">
                    @forelse($reviews as $rev)
                    <div class="review-item">
                        <div class="review-user-info">
                            <div class="user-meta">
                                <div class="user-avatar">
                                    {{ $rev->is_anonymous ? '?' : strtoupper(substr($rev->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="user-name">{{ $rev->is_anonymous ? 'Anonim' : $rev->user->name }}</span>
                                    <span class="review-date">{{ $rev->created_at->format('j F Y') }}</span>
                                </div>
                            </div>
                            <div class="review-stars">
                                @for($i=1; $i<=5; $i++)
                                    <span style="color: {{ $i <= $rev->rating_overall ? '#ffc107' : '#e0e0e0' }}">★</span>
                                @endfor
                            </div>
                        </div>
                        <p class="review-text">{{ $rev->comment }}</p>
                        <div class="review-tags">
                            @if($rev->rating_venue_fasilitas >= 4) <span class="tag">Venue Indah</span> @endif
                            @if($rev->rating_pelayanan >= 4) <span class="tag">Pelayanan Ramah</span> @endif
                            @if($rev->rating_harga >= 4) <span class="tag">Harga Kompetitif</span> @endif
                        </div>
                    </div>
                    @empty
                    <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                        <p>Belum ada ulasan untuk item ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.star-rating').forEach(ratingBox => {
            const stars = ratingBox.querySelectorAll('.star');
            const targetId = ratingBox.dataset.target || ratingBox.id.replace('-stars', '-input');
            const hiddenInput = document.getElementById(targetId);

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const val = star.dataset.value;
                    hiddenInput.value = val;
                    
                    // Reset all
                    stars.forEach(s => s.classList.remove('active'));
                    
                    // Highlight selected and previous
                    stars.forEach(s => {
                        if (parseInt(s.dataset.value) <= parseInt(val)) {
                            s.classList.add('active');
                        }
                    });
                });

                star.addEventListener('mouseover', () => {
                    const val = star.dataset.value;
                    stars.forEach(s => {
                        if (parseInt(s.dataset.value) <= parseInt(val)) {
                            s.style.color = '#ffc107';
                        } else {
                            s.style.color = '#e0e0e0';
                        }
                    });
                });

                star.addEventListener('mouseout', () => {
                    const currentVal = hiddenInput.value;
                    stars.forEach(s => {
                        if (parseInt(s.dataset.value) <= parseInt(currentVal)) {
                            s.style.color = '#ffc107';
                        } else {
                            s.style.color = '#e0e0e0';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
