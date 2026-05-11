@extends('Pelayan.layouts.pelayan')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
:root {
    --gold: #C9A96E;
    --gold-pale: #E8D5A3;
    --gold-dim: rgba(201,169,110,0.12);
    --ink: #0A0E17;
    --ink-mid: #0D1422;
    --ink-card: rgba(12,18,32,0.97);
    --surface: rgba(255,255,255,0.04);
    --text: #EAE6DF;
    --text-muted: rgba(234,230,223,0.52);
    --border: rgba(201,169,110,0.13);
    --border-strong: rgba(201,169,110,0.28);
    --radius: 20px;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Outfit', sans-serif; background: var(--ink); color: var(--text); }

/* HERO */
.hero {
    position: relative;
    min-height: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    padding: 80px 24px;
    background: var(--ink-mid);
    border-bottom: 1px solid var(--border);
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 65% 90% at 50% 0%, rgba(201,169,110,0.07), transparent 65%);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 640px;
}

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--gold-dim);
    border: 1px solid var(--border-strong);
    border-radius: 40px;
    padding: 7px 20px;
    font-size: 10px;
    font-weight: 500;
    color: var(--gold-pale);
    letter-spacing: 0.2em;
    text-transform: uppercase;
    margin-bottom: 24px;
}

.hero h1 {
    font-family: 'Libre Baskerville', serif;
    font-size: clamp(36px, 6vw, 64px);
    line-height: 1.1;
    margin-bottom: 16px;
}

.hero h1 em { color: var(--gold); font-style: italic; }
.hero-sub { color: var(--text-muted); font-size: 15px; line-height: 1.8; font-weight: 300; }

/* PAGE */
.page-wrap {
    width: 90%;
    max-width: 1140px;
    margin: 0 auto;
    padding: 72px 0 100px;
}

.section-header {
    text-align: center;
    margin-bottom: 52px;
}

.section-label {
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--gold);
    display: block;
    margin-bottom: 12px;
}

.section-title {
    font-family: 'Libre Baskerville', serif;
    font-size: clamp(26px, 4vw, 38px);
    color: var(--text);
    margin-bottom: 16px;
}

.section-rule {
    width: 36px; height: 2px;
    background: var(--gold);
    margin: 0 auto;
    opacity: 0.6;
}

/* GRID */
.pengumuman-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
    gap: 22px;
}

/* CARD */
.pengumuman-card {
    background: var(--ink-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative;
    transition: all 0.32s ease;
}

.pengumuman-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 1;
}

.pengumuman-card:hover {
    border-color: var(--border-strong);
    transform: translateY(-6px);
    box-shadow: 0 22px 56px rgba(0,0,0,0.4);
}

.pengumuman-card:hover::before { opacity: 1; }

/* IMAGE */
.card-img {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.card-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    filter: brightness(0.82);
    transition: transform 0.5s ease, filter 0.3s;
}

.pengumuman-card:hover .card-img img {
    transform: scale(1.05);
    filter: brightness(0.92);
}

.card-img-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(201,169,110,0.07), rgba(201,169,110,0.02));
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 10px;
    border-bottom: 1px solid var(--border);
}

.card-img-placeholder i {
    font-size: 36px;
    color: var(--gold);
    opacity: 0.3;
}

.card-img-placeholder span {
    font-size: 10px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--text-muted);
}

/* BODY */
.card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.card-date {
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 7px;
}

.card-title {
    font-family: 'Libre Baskerville', serif;
    font-size: 17px;
    color: var(--text);
    line-height: 1.45;
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-excerpt {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.75;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 20px;
}

.card-footer {
    padding-top: 14px;
    border-top: 1px solid rgba(255,255,255,0.05);
}

.btn-read {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--gold-dim);
    border: 1px solid var(--border-strong);
    color: var(--gold-pale);
    border-radius: 40px;
    padding: 10px 22px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.25s;
}

.btn-read:hover {
    background: var(--gold);
    color: var(--ink);
    border-color: var(--gold);
}

/* EMPTY */
.empty-state {
    text-align: center;
    padding: 70px 20px;
    grid-column: 1/-1;
}

.empty-icon {
    width: 72px; height: 72px;
    border-radius: 18px;
    background: var(--gold-dim);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: var(--gold);
    margin: 0 auto 20px;
    opacity: 0.6;
}

/* RESPONSIVE */
@media(max-width: 576px) {
    .pengumuman-grid { grid-template-columns: 1fr; }
}
</style>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-eyebrow">
            <i class="fa-solid fa-bullhorn" style="font-size:10px;"></i>
            Informasi Gereja
        </div>
        <h1>Pengumuman <em>Gereja</em></h1>
        <p class="hero-sub">Informasi terbaru dan pengumuman resmi dari gereja untuk seluruh jemaat</p>
    </div>
</section>

<!-- CONTENT -->
<div class="page-wrap">
    <div class="section-header">
        <span class="section-label">Terkini</span>
        <h2 class="section-title">Berita &amp; Pengumuman</h2>
        <div class="section-rule"></div>
    </div>

    <div class="pengumuman-grid">
        @forelse($pengumuman as $item)
            <div class="pengumuman-card">

                <div class="card-img">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title }}" loading="lazy">
                    @else
                        <div class="card-img-placeholder">
                            <i class="fa-regular fa-newspaper"></i>
                            <span>Pengumuman</span>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="card-date">
                        <i class="fa-regular fa-calendar"></i>
                        {{ $item->publish_date
                            ? \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d F Y')
                            : '—' }}
                    </div>

                    <h3 class="card-title">{{ $item->title }}</h3>

                    <div class="card-excerpt">
                        {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('pelayan.pengumuman.show', $item->id) }}" class="btn-read">
                            <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i>
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        @empty
            <div class="empty-state">
                <div class="empty-icon"><i class="fa-regular fa-newspaper"></i></div>
                <h4 style="margin-bottom:8px;font-size:18px;">Belum Ada Pengumuman</h4>
                <p style="color:var(--text-muted);font-size:14px;">Pengumuman akan segera ditampilkan di sini. Tetap update!</p>
            </div>
        @endforelse
    </div>
</div>

@endsection