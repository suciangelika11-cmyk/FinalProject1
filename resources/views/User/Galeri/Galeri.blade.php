@extends('layouts.app')

@section('content')

<style>
body {
    background: #f4f9ff;
}

/* ──── ANIMATIONS ──── */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-60px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(60px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes scaleUp {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes glow {
    0%, 100% {
        box-shadow: 0 8px 25px rgba(0,91,234,0.1);
    }
    50% {
        box-shadow: 0 12px 35px rgba(0,91,234,0.25);
    }
}

/* Scroll reveal utility classes */
.scroll-reveal {
    opacity: 0;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal.in-view {
    animation-play-state: running;
}

.scroll-reveal-left {
    opacity: 0;
    animation: slideInLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal-right {
    opacity: 0;
    animation: slideInRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal-scale {
    opacity: 0;
    animation: scaleUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

/* Stagger delays */
.scroll-reveal:nth-child(1), .scroll-reveal-left:nth-child(1), .scroll-reveal-right:nth-child(1), .scroll-reveal-scale:nth-child(1) { animation-delay: 0s; }
.scroll-reveal:nth-child(2), .scroll-reveal-left:nth-child(2), .scroll-reveal-right:nth-child(2), .scroll-reveal-scale:nth-child(2) { animation-delay: 0.15s; }
.scroll-reveal:nth-child(3), .scroll-reveal-left:nth-child(3), .scroll-reveal-right:nth-child(3), .scroll-reveal-scale:nth-child(3) { animation-delay: 0.3s; }
.scroll-reveal:nth-child(4), .scroll-reveal-left:nth-child(4), .scroll-reveal-right:nth-child(4), .scroll-reveal-scale:nth-child(4) { animation-delay: 0.45s; }
.scroll-reveal:nth-child(5), .scroll-reveal-left:nth-child(5), .scroll-reveal-right:nth-child(5), .scroll-reveal-scale:nth-child(5) { animation-delay: 0.6s; }
.scroll-reveal:nth-child(6), .scroll-reveal-left:nth-child(6), .scroll-reveal-right:nth-child(6), .scroll-reveal-scale:nth-child(6) { animation-delay: 0.75s; }

/* ──── HERO SECTION ──── */
.hero {
    background: linear-gradient(135deg, #005bea 0%, #00c6fb 100%);
    padding: 120px 0;
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: 
        repeating-linear-gradient(
            45deg,
            transparent,
            transparent 40px,
            rgba(255,255,255,0.04) 40px,
            rgba(255,255,255,0.04) 41px
        ),
        radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(0,0,0,0.1) 0%, transparent 50%);
    pointer-events: none;
    animation: fadeIn 1.2s ease-out;
}

.hero h1 {
    font-weight: 800;
    font-size: 48px;
    position: relative;
    z-index: 1;
    margin: 0;
    animation: fadeUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.hero p {
    opacity: 0.95;
    font-size: 18px;
    position: relative;
    z-index: 1;
    animation: fadeUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both;
    font-weight: 300;
    letter-spacing: 0.5px;
}

/* ──── SECTION STYLING ──── */
.section-title {
    font-weight: 700;
    font-size: 36px;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    border-radius: 20px;
    animation: scaleUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.divider {
    height: 4px;
    width: 80px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    margin: 15px auto 30px;
    border-radius: 20px;
    animation: scaleUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
}

.section-plain {
    padding: 100px 0;
}

.section-bg {
    background: linear-gradient(180deg, #eaf4ff 0%, #ffffff 100%);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.section-bg::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(0,198,251,0.1) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
}

/* ── FILTER TABS ── */
.filter-wrap {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
    margin-bottom: 50px;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both;
}

.filter-btn {
    border: 2px solid #e2e8f0;
    background: white;
    border-radius: 50px;
    padding: 10px 24px;
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    overflow: hidden;
}

.filter-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    border-color: transparent;
    color: white;
    box-shadow: 0 8px 25px rgba(0,91,234,0.3);
    transform: translateY(-4px);
}

/* ── GALLERY GRID ── */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 28px;
}

/* ── GALLERY CARD ── */
.gallery-card {
    border: none;
    border-radius: 24px;
    overflow: hidden;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.gallery-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0,91,234,0.05), rgba(0,198,251,0.05));
    opacity: 0;
    transition: opacity 0.35s ease;
    pointer-events: none;
    z-index: 1;
}

.gallery-card:hover {
    transform: translateY(-16px);
    box-shadow: 0 25px 60px rgba(0,91,234,0.2);
}

.gallery-card:hover::before {
    opacity: 1;
}

.gallery-card .img-wrap {
    width: 100%;
    height: 240px;
    overflow: hidden;
    position: relative;
}

.gallery-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    display: block;
}

.gallery-card:hover img {
    transform: scale(1.12);
}

.gallery-card .img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,27,80,0) 0%, rgba(0,27,80,0.8) 100%);
    opacity: 0;
    transition: opacity 0.35s ease;
    display: flex;
    align-items: flex-end;
    padding: 20px;
    z-index: 2;
}

.gallery-card:hover .img-overlay {
    opacity: 1;
}

.img-overlay-text {
    color: white;
    font-size: 14px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: 0.5px;
}

.gallery-card .img-placeholder {
    width: 100%;
    height: 240px;
    background: linear-gradient(135deg, #eaf4ff, #dbeafe);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #3b82f6;
    gap: 10px;
}

.gallery-card .img-placeholder i {
    font-size: 48px;
    opacity: 0.5;
}

.gallery-card .img-placeholder span {
    font-size: 13px;
    letter-spacing: 1px;
    text-transform: uppercase;
    opacity: 0.5;
    font-weight: 700;
}

/* Card body */
.gallery-body {
    padding: 24px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.gallery-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #005bea15, #00c6fb15);
    color: #005bea;
    border-radius: 30px;
    padding: 6px 14px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 12px;
    width: fit-content;
    transition: all 0.35s ease;
}

.gallery-card:hover .gallery-category {
    background: linear-gradient(135deg, #005bea25, #00c6fb25);
    transform: scale(1.05);
}

.gallery-title {
    font-weight: 700;
    font-size: 18px;
    color: #1e293b;
    margin-bottom: 10px;
    line-height: 1.4;
    transition: all 0.35s ease;
}

.gallery-card:hover .gallery-title {
    color: #005bea;
}

.gallery-desc {
    font-size: 14px;
    color: #64748b;
    line-height: 1.7;
    margin-bottom: 16px;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: all 0.35s ease;
}

.gallery-card:hover .gallery-desc {
    color: #475569;
}

.gallery-date {
    font-size: 12.5px;
    color: #94a3b8;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
}

/* ── LIGHTBOX ── */
.lightbox-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.92);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
    backdrop-filter: blur(8px);
}

.lightbox-overlay.open {
    display: flex;
    animation: fadeIn 0.3s ease;
}

.lightbox-inner {
    position: relative;
    max-width: 900px;
    width: 100%;
    animation: scaleUp 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.lightbox-inner img {
    width: 100%;
    border-radius: 20px;
    display: block;
    max-height: 80vh;
    object-fit: contain;
    background: #000;
    box-shadow: 0 25px 60px rgba(0,0,0,0.3);
}

.lightbox-close {
    position: absolute;
    top: -50px;
    right: 0;
    background: rgba(255,255,255,0.15);
    border: none;
    color: white;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.35s ease;
    backdrop-filter: blur(8px);
}

.lightbox-close:hover {
    background: rgba(255,255,255,0.25);
    transform: scale(1.1);
}

.lightbox-caption {
    color: rgba(255,255,255,0.9);
    text-align: center;
    margin-top: 20px;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.3px;
}

/* ── EMPTY STATE ── */
.empty-wrap {
    text-align: center;
    padding: 80px 20px;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.empty-icon {
    width: 100px;
    height: 100px;
    border-radius: 24px;
    background: linear-gradient(135deg, #005bea15, #00c6fb15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: #005bea;
    margin: 0 auto 24px;
    box-shadow: 0 8px 25px rgba(0,91,234,0.1);
}

.empty-wrap h4 {
    font-size: 22px;
    font-weight: 700;
    color: #1e293b;
}

.empty-wrap p {
    font-size: 15px;
    color: #64748b;
}

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
    .hero {
        padding: 80px 0;
    }

    .hero h1 {
        font-size: 36px;
    }

    .section-title {
        font-size: 28px;
    }

    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }

    .section-plain {
        padding: 60px 0;
    }
}

@media (max-width: 576px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }

    .gallery-card .img-wrap {
        height: 220px;
    }

    .gallery-body {
        padding: 20px;
    }

    .filter-wrap {
        gap: 10px;
        margin-bottom: 40px;
    }

    .filter-btn {
        padding: 8px 20px;
        font-size: 12.5px;
    }
}
</style>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="container">
        <h1>Galeri Gereja</h1>
        <p>Momen-momen indah dalam perjalanan iman kita bersama</p>
    </div>
</section>

{{-- ── GALERI ── --}}
<section class="section-plain">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Koleksi Foto</h2>
            <div class="divider"></div>
        </div>

        @if($galeris->isNotEmpty())

        {{-- Grid --}}
        <div class="gallery-grid" id="galleryGrid">
            @foreach($galeris as $item)
              <div class="gallery-card"
                  onclick="openLightbox(
                    '{{ $item->image ? asset('storage/' . $item->image) : '' }}',
                    `{{ addslashes($item->title ?? '') }}`,
                    `{{ addslashes($item->description ?? '') }}`
                  )">

                <div class="img-wrap">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title ?? 'Foto Galeri' }}"
                             loading="lazy">
                        <div class="img-overlay">
                            <span class="img-overlay-text">
                                <i class="bi bi-zoom-in"></i> Lihat Foto
                            </span>
                        </div>
                    @else
                        <div class="img-placeholder">
                            <i class="bi bi-image"></i>
                            <span>Foto</span>
                        </div>
                    @endif
                </div>

                <div class="gallery-body">
                    @if($item->title)
                        <div class="gallery-title">{{ $item->title }}</div>
                    @endif

                    @if($item->description)
                        <div class="gallery-desc">{{ $item->description }}</div>
                    @endif

                    @if($item->event_date)
                        <div class="gallery-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $item->event_date->translatedFormat('d F Y') }}
                        </div>
                    @elseif($item->created_at)
                        <div class="gallery-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $item->created_at->translatedFormat('d F Y') }}
                        </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if(method_exists($galeris, 'links') && $galeris->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $galeris->links() }}
            </div>
        @endif

        @else

        {{-- Empty State --}}
        <div class="empty-wrap">
            <div class="empty-icon">
                <i class="bi bi-images"></i>
            </div>
            <h4 class="fw-bold mb-2">Belum Ada Foto</h4>
            <p class="text-muted">Galeri foto gereja akan ditampilkan di sini.</p>
        </div>

        @endif

    </div>
</section>

{{-- ── LIGHTBOX ── --}}
<div class="lightbox-overlay" id="lightbox" onclick="closeLightbox(event)">
    <div class="lightbox-inner">
        <button class="lightbox-close" onclick="closeLightbox()">
            <i class="bi bi-x-lg"></i>
        </button>
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-caption">
            <div id="lightboxTitle" style="font-size:18px;font-weight:bold;margin-bottom:8px;"></div>
            <div id="lightboxDesc" style="font-size:15px;"></div>
        </div>
    </div>
</div>

<script>

    // ── Lightbox ──
    function openLightbox(src, title, desc) {
        if (!src) return;
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightboxTitle').textContent = title || '';
        document.getElementById('lightboxDesc').textContent = desc || '';
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(e) {
        if (e && e.target !== document.getElementById('lightbox') &&
            !e.target.classList.contains('lightbox-close') &&
            !e.target.closest('.lightbox-close')) return;
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            document.getElementById('lightbox').classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    // ── Filter ──
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.gallery-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            cards.forEach(card => {
                const match = filter === 'all' || card.dataset.category === filter;
                card.style.display = match ? '' : 'none';
            });
        });
    });
</script>

@endsection