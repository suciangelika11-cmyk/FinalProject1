@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --gold: #C9A84C;
    --gold-light: #F0D48A;
    --gold-dim: rgba(201,168,76,0.18);
    --navy: #0B1829;
    --navy2: #13243A;
    --navy3: #1C3354;
    --muted: #8A95A3;
    --r-pill: 999px;
    --r-card: 18px;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--navy2);
    color: #fff;
}

/* ── HERO ── */
.hero {
    position: relative;
    padding: 100px 0 110px;
    text-align: center;
    overflow: hidden;
    background: var(--navy);
}

.hero-bg-ring {
    position: absolute;
    top: -160px; left: 50%;
    transform: translateX(-50%);
    width: 600px; height: 600px;
    border-radius: 50%;
    border: 1px solid rgba(201,168,76,0.07);
    pointer-events: none;
}

.hero-bg-ring2 {
    position: absolute;
    top: -80px; left: 50%;
    transform: translateX(-50%);
    width: 400px; height: 400px;
    border-radius: 50%;
    border: 1px solid rgba(201,168,76,0.05);
    pointer-events: none;
}

.hero-glow {
    position: absolute;
    top: 0; left: 50%;
    transform: translateX(-50%);
    width: 500px; height: 280px;
    background: radial-gradient(ellipse at top, rgba(201,168,76,0.09) 0%, transparent 70%);
    pointer-events: none;
}

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(201,168,76,0.12);
    border: 1px solid rgba(201,168,76,0.28);
    border-radius: var(--r-pill);
    padding: 6px 18px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #FFFFFF !important;
    margin-bottom: 28px;
}

.eyebrow-dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--gold);
    display: inline-block;
}

.hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(34px, 6vw, 58px);
    font-weight: 700;
    line-height: 1.12;
    color: #FFFFFF !important;
    margin-bottom: 18px;
}

.hero h1 em { font-style: italic; color: var(--gold-light); }

.hero p {
    font-size: 15px;
    font-weight: 300;
    color: rgba(255,255,255,0.88);
    max-width: 420px;
    margin: 0 auto;
    line-height: 1.75;
}

/* ── WAVE ── */
.wave-sep { display: block; width: 100%; overflow: hidden; line-height: 0; }
.wave-sep svg { display: block; width: 100%; height: 60px; }

/* ── BODY ── */
.khotbah-section { background: var(--navy2); padding: 0 0 90px; }

.section-header { text-align: center; padding: 60px 0 44px; }

.section-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: #FFFFFF !important;
    display: block;
    margin-bottom: 12px;
}

.khotbah-section .section-title,
.section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(26px, 4vw, 38px);
    font-weight: 600;
    color: #FFFFFF !important;
    line-height: 1.2;
    margin-bottom: 18px;
}

.section-rule {
    width: 40px; height: 2px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    border-radius: 99px;
    margin: 0 auto;
}

/* ── SEARCH ── */
.search-wrap {
    max-width: 480px;
    margin: 0 auto 48px;
    position: relative;
}

.search-icon {
    position: absolute;
    left: 18px; top: 50%;
    transform: translateY(-50%);
    color: rgba(201,168,76,0.6);
    pointer-events: none;
    display: flex;
    align-items: center;
}

.search-input {
    width: 100%;
    padding: 14px 22px 14px 46px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(201,168,76,0.2);
    border-radius: var(--r-pill);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #fff;
    outline: none;
    transition: border-color 0.25s, background 0.25s;
}

.search-input:focus {
    border-color: var(--gold);
    background: rgba(201,168,76,0.06);
}

.search-input::placeholder { color: rgba(255,255,255,0.25); font-weight: 300; }

/* ── GRID ── */
.khotbah-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
}

/* ── CARD ── */
.khotbah-card {
    background: var(--navy3);
    border-radius: var(--r-card);
    border: 1px solid rgba(201,168,76,0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, border-color 0.3s ease;
    position: relative;
}

.khotbah-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 2;
}

.khotbah-card:hover { transform: translateY(-7px); border-color: rgba(201,168,76,0.32); }
.khotbah-card:hover::before { opacity: 1; }

/* THUMB */
.card-thumb {
    height: 195px;
    overflow: hidden;
    position: relative;
    background: var(--navy);
    flex-shrink: 0;
}

.card-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.khotbah-card:hover .card-thumb img { transform: scale(1.05); }

.thumb-placeholder {
    width: 100%; height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: var(--navy);
}

.thumb-placeholder-icon {
    width: 56px; height: 56px;
    border-radius: 50%;
    border: 1.5px solid rgba(201,168,76,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(240,212,138,0.55);
    font-size: 22px;
}

.thumb-placeholder-label {
    font-size: 10px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    font-weight: 500;
    color: rgba(240,212,138,0.35);
}

.video-badge {
    position: absolute;
    top: 12px; right: 12px;
    background: rgba(11,24,41,0.8);
    color: var(--gold-light);
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.06em;
    padding: 4px 12px;
    border-radius: var(--r-pill);
    display: flex;
    align-items: center;
    gap: 5px;
    border: 1px solid rgba(201,168,76,0.2);
    z-index: 1;
}

.vid-dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--gold);
    animation: pulse 1.6s infinite;
}

@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }

/* CARD BODY */
.card-body-inner {
    padding: 22px 20px 18px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.khotbah-date {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 10px;
}

.khotbah-title {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 600;
    color: #FFFFFF;
    line-height: 1.4;
    margin-bottom: 9px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.khotbah-desc {
    font-size: 13px;
    color: rgba(255,255,255,0.82);
    line-height: 1.7;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 18px;
}

.card-footer-inner {
    border-top: 1px solid rgba(201,168,76,0.1);
    padding-top: 14px;
}

.btn-tonton {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.3);
    color: var(--gold-light);
    border-radius: var(--r-pill);
    padding: 9px 18px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.25s, border-color 0.25s;
}

.btn-tonton:hover {
    background: rgba(201,168,76,0.28);
    border-color: rgba(201,168,76,0.55);
    color: var(--gold-light);
}

.btn-play {
    width: 20px; height: 20px;
    border-radius: 50%;
    background: var(--gold);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.btn-play i { font-size: 8px; color: var(--navy); margin-left: 1px; }

.btn-no-video {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: rgba(255,255,255,0.22);
    font-size: 12px;
    font-weight: 400;
}

/* EMPTY */
.empty-wrap {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
}

.empty-icon {
    width: 72px; height: 72px;
    border-radius: 50%;
    border: 1.5px solid rgba(201,168,76,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: rgba(240,212,138,0.55);
    margin: 0 auto 22px;
}

.empty-wrap h4 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 8px;
}

.empty-wrap p { font-size: 14px; color: rgba(255,255,255,0.4); }

/* PAGINATION */
.pagination .page-link {
    border-radius: var(--r-pill) !important;
    margin: 0 3px;
    background: transparent;
    border: 1px solid rgba(201,168,76,0.2) !important;
    color: rgba(255,255,255,0.6);
    font-size: 13px;
    font-weight: 500;
    transition: all 0.2s;
}

.pagination .page-item.active .page-link {
    background: var(--gold-dim) !important;
    border-color: rgba(201,168,76,0.4) !important;
    color: var(--gold-light);
}

.pagination .page-link:hover {
    background: rgba(201,168,76,0.1) !important;
    border-color: rgba(201,168,76,0.4) !important;
    color: var(--gold-light);
}

@media (max-width: 576px) {
    .khotbah-grid { grid-template-columns: 1fr; }
}

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</style>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-bg-ring"></div>
    <div class="hero-bg-ring2"></div>
    <div class="hero-glow"></div>
    <div class="container position-relative" style="z-index:1;">
        <div class="hero-eyebrow">
            <span class="eyebrow-dot"></span>
            Firman Tuhan
            <span class="eyebrow-dot"></span>
        </div>
        <h1>Khotbah &amp;<br><em>Pengajaran</em></h1>
        <p>Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna dan penuh anugerah</p>
    </div>
</section>

{{-- Wave Divider --}}
<div class="wave-sep">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,0 C300,60 900,60 1200,0 L1200,60 L0,60 Z" fill="#13243A"/>
    </svg>
</div>

{{-- ── KHOTBAH LIST ── --}}
<section class="khotbah-section">
    <div class="container">

        <div class="section-header">
            <span class="section-label">Arsip Khotbah</span>
            <h2 class="section-title">Firman Tuhan</h2>
            <div class="section-rule"></div>
        </div>

        {{-- Search --}}
        <div class="search-wrap">
            <span class="search-icon">
                <i class="bi bi-search" style="font-size:14px;"></i>
            </span>
            <input type="text"
                   class="search-input"
                   id="searchKhotbah"
                   placeholder="Cari judul khotbah…">
        </div>

        {{-- Grid --}}
        <div class="khotbah-grid" id="khotbahGrid">

            @forelse($khotbah as $item)
            <div class="khotbah-card" data-title="{{ strtolower($item->title) }}">

                <div class="card-thumb">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                             alt="{{ $item->title }}"
                             loading="lazy">
                    @else
                        <div class="thumb-placeholder">
                            <div class="thumb-placeholder-icon">
                                <i class="bi bi-play-circle"></i>
                            </div>
                            <span class="thumb-placeholder-label">Video Khotbah</span>
                        </div>
                    @endif

                    @if($item->video)
                        <div class="video-badge">
                            <span class="vid-dot"></span>
                            Video
                        </div>
                    @endif
                </div>

                <div class="card-body-inner">
                    <div class="khotbah-date">
                        <i class="bi bi-calendar3" style="font-size:10px;"></i>
                        {{ $item->sermon_date
                            ? \Carbon\Carbon::parse($item->sermon_date)->translatedFormat('d F Y')
                            : '—' }}
                    </div>

                    <div class="khotbah-title">{{ $item->title }}</div>

                    @if($item->description)
                        <div class="khotbah-desc">{{ $item->description }}</div>
                    @endif

                    <div class="card-footer-inner">
                        @if($item->video)
                            <a href="{{ $item->video }}"
                               target="_blank"
                               rel="noopener"
                               class="btn-tonton">
                                <span class="btn-play">
                                    <i class="bi bi-play-fill"></i>
                                </span>
                                Tonton Khotbah
                            </a>
                        @else
                            <span class="btn-no-video">
                                <i class="bi bi-camera-video-off" style="font-size:12px;"></i>
                                Video Tidak Tersedia
                            </span>
                        @endif
                    </div>
                </div>

            </div>
            @empty
            <div class="empty-wrap">
                <div class="empty-icon">
                    <i class="bi bi-camera-video"></i>
                </div>
                <h4>Belum Ada Khotbah</h4>
                <p>Khotbah akan segera ditampilkan di sini. Tetap semangat!</p>
            </div>
            @endforelse

        </div>

        @if(method_exists($khotbah, 'links') && $khotbah->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $khotbah->links() }}
            </div>
        @endif

    </div>
</section>

<script>
    const searchInput = document.getElementById('searchKhotbah');
    const cards = document.querySelectorAll('.khotbah-card');

    searchInput.addEventListener('input', function () {
        const q = this.value.toLowerCase().trim();
        cards.forEach(card => {
            const match = !q || card.dataset.title.includes(q);
            card.style.display = match ? '' : 'none';
        });
    });
</script>

@endsection