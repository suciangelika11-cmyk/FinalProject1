@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap');

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy-950: #050d1a;
    --navy-900: #0a1628;
    --navy-800: #0f2040;
    --navy-700: #152b56;
    --navy-600: #1c3a72;
    --navy-500: #1e4a8e;
    --gold:     #c9a84c;
    --gold-lt:  #e8cc80;
    --gold-dim: #8a6b2a;
    --silver:   #a8b8cc;
    --silver-lt:#d4e0ec;
    --white:    #ffffff;
    --text-muted: #7a90a8;
    --card-bg:  #0d1e38;
    --card-border: rgba(201,168,76,0.18);
}

html { scroll-behavior: smooth; }

body {
    background: var(--navy-900);
    font-family: 'DM Sans', sans-serif;
    color: var(--silver-lt);
    -webkit-font-smoothing: antialiased;
}

/* ── ANIMATIONS ── */
@keyframes heroReveal {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes shimmer {
    0%   { background-position: -200% center; }
    100% { background-position: 200% center; }
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.88); }
    to   { opacity: 1; transform: scale(1); }
}
@keyframes lineDraw {
    from { width: 0; }
    to   { width: 60px; }
}
@keyframes orbFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50%       { transform: translateY(-18px) scale(1.04); }
}
@keyframes pulse-ring {
    0%   { box-shadow: 0 0 0 0 rgba(201,168,76,0.25); }
    70%  { box-shadow: 0 0 0 14px rgba(201,168,76,0); }
    100% { box-shadow: 0 0 0 0 rgba(201,168,76,0); }
}
@keyframes cardEntrance {
    from { opacity: 0; transform: translateY(40px) scale(0.96); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}
@keyframes lightboxOpen {
    from { opacity: 0; transform: scale(0.9) translateY(16px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}

/* ── HERO ── */
.hero {
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--navy-950);
    text-align: center;
    padding: 120px 24px 100px;
}

.hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,168,76,0.07) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,0.07) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 60% at 50% 50%, black 0%, transparent 100%);
    pointer-events: none;
}

.hero-orb {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(60px);
    animation: orbFloat 7s ease-in-out infinite;
}
.hero-orb-1 {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(30,74,142,0.6) 0%, transparent 70%);
    top: -120px; left: -100px;
    animation-delay: 0s;
}
.hero-orb-2 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(201,168,76,0.25) 0%, transparent 70%);
    bottom: -80px; right: -60px;
    animation-delay: 3.5s;
}
.hero-orb-3 {
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(21,43,86,0.8) 0%, transparent 70%);
    top: 30%; left: 50%; transform: translateX(-50%);
    animation-delay: 1.5s;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(201,168,76,0.1);
    border: 1px solid rgba(201,168,76,0.3);
    color: var(--gold);
    font-size: 11.5px;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    padding: 8px 20px;
    border-radius: 100px;
    margin-bottom: 28px;
    animation: heroReveal 0.8s ease 0.1s both;
    position: relative;
    z-index: 2;
}
.hero-badge::before {
    content: '';
    width: 6px; height: 6px;
    background: var(--gold);
    border-radius: 50%;
    animation: pulse-ring 2.5s ease-out infinite;
}

.hero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(42px, 7vw, 72px);
    font-weight: 800;
    color: var(--white);
    line-height: 1.1;
    letter-spacing: -0.5px;
    position: relative;
    z-index: 2;
    animation: heroReveal 0.9s ease 0.3s both;
}
.hero-title span {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 50%, var(--gold) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 3.5s linear infinite;
}

.hero-sub {
    font-size: 17px;
    font-weight: 300;
<<<<<<< HEAD
    color: var(--silver);
=======
    color: rgba(255,255,255,0.88);
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    max-width: 500px;
    margin: 20px auto 0;
    line-height: 1.7;
    letter-spacing: 0.3px;
    position: relative;
    z-index: 2;
    animation: heroReveal 0.9s ease 0.5s both;
}

.hero-divider {
    width: 1px;
    height: 60px;
    background: linear-gradient(to bottom, transparent, var(--gold), transparent);
    margin: 36px auto 0;
    position: relative;
    z-index: 2;
    animation: heroReveal 1s ease 0.7s both;
}

/* ── SECTION ── */
.gallery-section {
    padding: 90px 0 110px;
    position: relative;
}

.gallery-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.3), transparent);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 28px;
}

.section-header {
    text-align: center;
    margin-bottom: 64px;
    animation: fadeUp 0.8s ease 0.1s both;
}

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
<<<<<<< HEAD
    color: var(--gold);
=======
    color: #FFFFFF !important;
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    margin-bottom: 14px;
    display: block;
}

<<<<<<< HEAD
=======
.gallery-section .section-title,
.gallery-section .section-label,
.gallery-section h2.section-title {
    color: #FFFFFF !important;
}

>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
.section-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(30px, 4vw, 42px);
    font-weight: 700;
<<<<<<< HEAD
    color: var(--white);
=======
    color: #FFFFFF !important;
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    line-height: 1.2;
    margin-bottom: 16px;
}

.section-rule {
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold-dim), var(--gold));
    margin: 0 auto;
    border-radius: 2px;
    animation: lineDraw 0.8s ease 0.4s both;
}

/* ── GALLERY GRID ── */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
}

/* ── GALLERY CARD ── */
.gallery-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 20px;
    overflow: hidden;
    cursor: pointer;
    position: relative;
    transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1),
                box-shadow 0.4s ease,
                border-color 0.3s ease;
    animation: cardEntrance 0.7s cubic-bezier(0.34,1.56,0.64,1) both;
    display: flex;
    flex-direction: column;
}

.gallery-card:nth-child(1)  { animation-delay: 0.05s; }
.gallery-card:nth-child(2)  { animation-delay: 0.13s; }
.gallery-card:nth-child(3)  { animation-delay: 0.21s; }
.gallery-card:nth-child(4)  { animation-delay: 0.29s; }
.gallery-card:nth-child(5)  { animation-delay: 0.37s; }
.gallery-card:nth-child(6)  { animation-delay: 0.45s; }
.gallery-card:nth-child(7)  { animation-delay: 0.53s; }
.gallery-card:nth-child(8)  { animation-delay: 0.61s; }
.gallery-card:nth-child(9)  { animation-delay: 0.69s; }

.gallery-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 32px 64px rgba(0,0,0,0.5), 0 0 0 1px rgba(201,168,76,0.3);
    border-color: rgba(201,168,76,0.4);
}

/* Image area */
.card-img-wrap {
    position: relative;
    height: 230px;
    overflow: hidden;
    background: var(--navy-800);
    flex-shrink: 0;
}

.card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.65s cubic-bezier(0.34,1.56,0.64,1);
}
.gallery-card:hover .card-img-wrap img {
    transform: scale(1.1);
}

.card-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        transparent 30%,
        rgba(5,13,26,0.85) 100%
    );
    opacity: 0;
    transition: opacity 0.35s ease;
    display: flex;
    align-items: flex-end;
    padding: 20px;
}
.gallery-card:hover .card-img-overlay {
    opacity: 1;
}

.overlay-zoom {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gold-lt);
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.overlay-zoom svg {
    width: 18px; height: 18px;
    stroke: var(--gold-lt);
    fill: none;
    stroke-width: 2;
    stroke-linecap: round;
}

/* Corner accent */
.card-corner {
    position: absolute;
    top: 0; right: 0;
    width: 0; height: 0;
    border-left: 46px solid transparent;
    border-top: 46px solid rgba(201,168,76,0.12);
    transition: border-color 0.3s ease;
    pointer-events: none;
    z-index: 2;
}
.gallery-card:hover .card-corner {
    border-top-color: rgba(201,168,76,0.28);
}

/* Card placeholder */
.card-placeholder {
    height: 230px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--navy-800), var(--navy-700));
    color: rgba(201,168,76,0.3);
}
.card-placeholder svg {
    width: 44px; height: 44px;
    stroke: currentColor; fill: none;
    stroke-width: 1.5; stroke-linecap: round;
}
.card-placeholder span {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: rgba(201,168,76,0.35);
}

/* Card body */
.card-body {
    padding: 22px 24px 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    border-top: 1px solid rgba(201,168,76,0.1);
}

.card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--white);
    line-height: 1.4;
    margin-bottom: 9px;
    transition: color 0.3s ease;
}
.gallery-card:hover .card-title {
    color: var(--gold-lt);
}

.card-desc {
    font-size: 13.5px;
    font-weight: 300;
<<<<<<< HEAD
    color: var(--text-muted);
=======
    color: rgba(255,255,255,0.78);
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    line-height: 1.7;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 16px;
}

.card-date {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12px;
    font-weight: 500;
<<<<<<< HEAD
    color: var(--gold-dim);
=======
    color: rgba(255,255,255,0.78);
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    letter-spacing: 0.3px;
}
.card-date svg {
    width: 13px; height: 13px;
    stroke: var(--gold-dim); fill: none;
    stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round;
    flex-shrink: 0;
}

/* ── PAGINATION ── */
.pagination-wrap {
    display: flex;
    justify-content: center;
    margin-top: 56px;
}
.pagination-wrap .pagination {
    display: flex;
    gap: 6px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.pagination-wrap .page-item .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px; height: 40px;
    border-radius: 10px;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    color: var(--silver);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}
.pagination-wrap .page-item.active .page-link,
.pagination-wrap .page-item .page-link:hover {
    background: linear-gradient(135deg, var(--gold-dim), var(--gold));
    border-color: transparent;
    color: var(--navy-950);
    font-weight: 700;
}

/* ── EMPTY STATE ── */
.empty-state {
    text-align: center;
    padding: 80px 20px;
    animation: fadeUp 0.8s ease both;
}
.empty-icon {
    width: 90px; height: 90px;
    background: rgba(201,168,76,0.08);
    border: 1px solid rgba(201,168,76,0.2);
    border-radius: 22px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 24px;
}
.empty-icon svg {
    width: 40px; height: 40px;
    stroke: var(--gold); fill: none;
    stroke-width: 1.5; stroke-linecap: round;
}
.empty-state h4 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 10px;
}
.empty-state p {
    font-size: 14.5px;
<<<<<<< HEAD
    color: var(--text-muted);
=======
    color: rgba(255,255,255,0.78);
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    font-weight: 300;
}

/* ── LIGHTBOX ── */
.lightbox-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(5,13,26,0.96);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 24px;
    backdrop-filter: blur(12px);
}
.lightbox-overlay.open {
    display: flex;
    animation: fadeIn 0.25s ease;
}
.lightbox-inner {
    position: relative;
    max-width: 960px;
    width: 100%;
    animation: lightboxOpen 0.38s cubic-bezier(0.34,1.56,0.64,1);
}
.lightbox-inner img {
    width: 100%;
    border-radius: 18px;
    display: block;
    max-height: 78vh;
    object-fit: contain;
    background: var(--navy-900);
    box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(201,168,76,0.15);
}
.lightbox-close {
    position: absolute;
    top: -52px; right: 0;
    background: rgba(201,168,76,0.12);
    border: 1px solid rgba(201,168,76,0.25);
    color: var(--gold-lt);
    width: 42px; height: 42px;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.lightbox-close:hover {
    background: rgba(201,168,76,0.22);
    transform: scale(1.08) rotate(90deg);
}
.lightbox-caption {
    text-align: center;
    margin-top: 22px;
}
.lightbox-caption .lb-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 20px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 8px;
}
.lightbox-caption .lb-desc {
    font-size: 14px;
    color: var(--silver);
    font-weight: 300;
    max-width: 580px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ── FOOTER STRIP ── */
.gallery-footer-strip {
    background: var(--navy-950);
    border-top: 1px solid rgba(201,168,76,0.12);
    padding: 36px 0;
    text-align: center;
}
.gallery-footer-strip p {
    font-size: 13px;
<<<<<<< HEAD
    color: var(--text-muted);
=======
    color: rgba(255,255,255,0.78);
>>>>>>> fa8896a708d4b4921ee0efdd5a5aae60dafbb094
    letter-spacing: 0.3px;
}

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
    .hero { padding: 90px 20px 80px; }
    .gallery-section { padding: 60px 0 80px; }
    .gallery-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
    .card-img-wrap { height: 180px; }
    .card-body { padding: 16px 18px 18px; }
    .card-title { font-size: 15px; }
}
@media (max-width: 520px) {
    .gallery-grid { grid-template-columns: 1fr; }
    .card-img-wrap { height: 220px; }
}
</style>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-bg-grid"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>
    <div>
        <div class="hero-badge">
            Galeri Gereja
        </div>
        <h1 class="hero-title">Momen <span>Bersejarah</span><br>dalam Iman Kita</h1>
        <p class="hero-sub">Abadikan setiap perjalanan rohani, perayaan, dan kebersamaan yang mempererat persekutuan kita.</p>
        <div class="hero-divider"></div>
    </div>
</section>

{{-- ── GALLERY ── --}}
<section class="gallery-section">
    <div class="container">

        <div class="section-header">
            <span class="section-label">Koleksi Foto</span>
            <h2 class="section-title">Kenangan yang Terpatri</h2>
            <div class="section-rule"></div>
        </div>

        @if($galeris->isNotEmpty())

        <div class="gallery-grid" id="galleryGrid">
            @foreach($galeris as $item)
            <div class="gallery-card"
                 onclick="openLightbox(
                   '{{ $item->image ? asset('storage/' . $item->image) : '' }}',
                   `{{ addslashes($item->title ?? '') }}`,
                   `{{ addslashes($item->description ?? '') }}`
                 )">

                <div class="card-corner"></div>

                @if($item->image)
                <div class="card-img-wrap">
                    <img src="{{ asset('storage/' . $item->image) }}"
                         alt="{{ $item->title ?? 'Foto Galeri' }}"
                         loading="lazy">
                    <div class="card-img-overlay">
                        <div class="overlay-zoom">
                            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                            Lihat Foto
                        </div>
                    </div>
                </div>
                @else
                <div class="card-placeholder">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    <span>Foto</span>
                </div>
                @endif

                <div class="card-body">
                    @if($item->title)
                        <div class="card-title">{{ $item->title }}</div>
                    @endif
                    @if($item->description)
                        <div class="card-desc">{{ $item->description }}</div>
                    @endif
                    @if($item->event_date)
                        <div class="card-date">
                            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            {{ $item->event_date->translatedFormat('d F Y') }}
                        </div>
                    @elseif($item->created_at)
                        <div class="card-date">
                            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            {{ $item->created_at->translatedFormat('d F Y') }}
                        </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if(method_exists($galeris, 'links') && $galeris->hasPages())
            <div class="pagination-wrap">
                {{ $galeris->links() }}
            </div>
        @endif

        @else

        <div class="empty-state">
            <div class="empty-icon">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
            <h4>Belum Ada Foto</h4>
            <p>Galeri foto gereja akan segera ditampilkan di sini.</p>
        </div>

        @endif

    </div>
</section>

{{-- ── FOOTER STRIP ── --}}
<div class="gallery-footer-strip">
    <p>Setiap gambar adalah saksi bisu dari perjalanan iman kita bersama.</p>
</div>

{{-- ── LIGHTBOX ── --}}
<div class="lightbox-overlay" id="lightbox" onclick="handleLightboxClick(event)">
    <div class="lightbox-inner">
        <button class="lightbox-close" id="lightboxCloseBtn" onclick="closeLightbox()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-caption">
            <div class="lb-title" id="lightboxTitle"></div>
            <div class="lb-desc" id="lightboxDesc"></div>
        </div>
    </div>
</div>

<script>
function openLightbox(src, title, desc) {
    if (!src) return;
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxTitle').textContent = title || '';
    document.getElementById('lightboxDesc').textContent = desc || '';
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
}
function handleLightboxClick(e) {
    if (e.target === document.getElementById('lightbox')) closeLightbox();
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLightbox();
});
</script>

@endsection