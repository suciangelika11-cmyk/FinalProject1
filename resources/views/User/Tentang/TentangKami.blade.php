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

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
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

.hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    opacity: 0.3;
    pointer-events: none;
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

/* ──── SECTION TITLE ──── */
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

/* ──── CARDS ──── */
.card-modern {
    border: none;
    border-radius: 20px;
    padding: 25px;
    background: white;
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    height: 100%;
    position: relative;
    overflow: hidden;
}

.card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.card-modern:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(0,91,234,0.2);
}

.card-modern:hover::before {
    left: 100%;
}

.icon-modern {
    width: 70px;
    height: 70px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin-bottom: 18px;
    background: linear-gradient(135deg, rgba(0,91,234,0.15), rgba(0,198,251,0.1));
    transition: all 0.35s ease;
    position: relative;
}

.card-modern:hover .icon-modern {
    transform: scale(1.15) rotate(5deg);
    box-shadow: 0 8px 20px rgba(0,91,234,0.25);
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

.section-plain {
    padding: 100px 0;
    position: relative;
}

/* ──── SEJARAH CARD ──── */
.sejarah-card {
    border: none;
    border-radius: 20px;
    padding: 50px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.sejarah-card::before {
    content: '\201C';
    position: absolute;
    top: -20px;
    left: 30px;
    font-size: 140px;
    color: #005bea;
    opacity: 0.08;
    font-family: Georgia, serif;
    line-height: 1;
}

.sejarah-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.sejarah-card:hover::after {
    transform: scaleX(1);
}

.sejarah-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,91,234,0.15);
}

/* ──── VISI MISI CARDS ──── */
.visi-misi-card {
    border: none;
    border-radius: 20px;
    padding: 40px 30px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    height: 100%;
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    overflow: hidden;
}

.visi-misi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.visi-misi-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(0,91,234,0.2);
}

.visi-misi-card:hover::before {
    transform: scaleX(1);
}

.visi-misi-card .accent-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    border-radius: 20px 20px 0 0;
    display: none;
}

.visi-misi-card h4 {
    transition: all 0.35s ease;
}

.visi-misi-card:hover h4 {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ──── GEMBALA CARD ──── */
.gembala-card {
    border: none;
    border-radius: 20px;
    padding: 50px 40px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    max-width: 680px;
    margin: 0 auto;
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
    overflow: hidden;
}

.gembala-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(0,198,251,0.1) 0%, transparent 70%);
    transition: all 0.6s ease;
    pointer-events: none;
}

.gembala-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(0,91,234,0.2);
}

.gembala-card:hover::before {
    top: -30%;
    right: -30%;
}

.gembala-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 5px solid white;
    box-shadow: 0 10px 35px rgba(0,91,234,0.3);
    transition: all 0.35s ease;
    position: relative;
    z-index: 1;
}

.gembala-img:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 45px rgba(0,91,234,0.4);
}

.gembala-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    color: white;
    margin: 0 auto 25px;
    box-shadow: 0 10px 35px rgba(0,91,234,0.3);
    animation: float 3s ease-in-out infinite;
}

.gembala-avatar::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.3), transparent);
    border-radius: 50%;
}

.gembala-card h4 {
    font-size: 24px;
    transition: all 0.35s ease;
    position: relative;
    z-index: 1;
}

.gembala-card:hover h4 {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.badge-jabatan {
    display: inline-block;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    color: white;
    border-radius: 30px;
    padding: 8px 20px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 18px;
    transition: all 0.35s ease;
    box-shadow: 0 4px 15px rgba(0,91,234,0.2);
    position: relative;
    z-index: 1;
}

.badge-jabatan:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,91,234,0.3);
}

/* ──── TEXT CONTENT ──── */
.sejarah-card p,
.visi-misi-card p,
.gembala-card p {
    transition: color 0.35s ease;
    position: relative;
}

/* ──── EMPTY STATE ──── */
.empty-state-card {
    border: 2px dashed rgba(0,91,234,0.2);
    border-radius: 20px;
    padding: 60px 40px;
    background: linear-gradient(135deg, rgba(0,91,234,0.05), rgba(0,198,251,0.05));
    text-align: center;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* ──── RESPONSIVE ──── */
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

    .sejarah-card {
        padding: 30px 20px;
    }

    .gembala-card {
        padding: 35px 20px;
    }

    .section-bg, .section-plain {
        padding: 60px 0;
    }
}
</style>

@if($data)

{{-- ── HERO ── --}}
<section class="hero">
    <div class="container">
        <h1>{{ $data->header_title }}</h1>
        <p>{{ $data->header_description }}</p>
    </div>
</section>

{{-- ── SEJARAH ── --}}
<section class="section-plain">
    <div class="container">
        <div class="text-center mb-5 scroll-reveal">
            <h2 class="section-title">Sejarah Gereja</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-card scroll-reveal" style="animation-delay: 0.2s;">
            <div class="d-flex align-items-start gap-4 flex-wrap flex-md-nowrap">
                <div class="icon-modern bg-primary bg-opacity-25 text-primary flex-shrink-0">
                    <i class="bi bi-book-half"></i>
                </div>
                <p class="text-muted mb-0" style="line-height:1.85;font-size:15.5px;">
                    {{ $data->sejarah }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ── VISI & MISI ── --}}
<section class="section-bg">
    <div class="container">
        <div class="text-center mb-5 scroll-reveal">
            <h2 class="section-title">Visi &amp; Misi</h2>
            <div class="divider"></div>
        </div>
        <div class="row g-4 justify-content-center">

            <div class="col-md-5">
                <div class="visi-misi-card scroll-reveal-left text-center" style="animation-delay: 0.1s;">
                    <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Visi</h4>
                    <p class="text-muted mb-0" style="line-height:1.8;">{{ $data->visi }}</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="visi-misi-card scroll-reveal-right text-center" style="animation-delay: 0.2s;">
                    <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Misi</h4>
                    <p class="text-muted mb-0" style="line-height:1.8;">{{ $data->misi }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── GEMBALA ── --}}
<section class="section-plain">
    <div class="container">
        <div class="text-center mb-5 scroll-reveal">
            <h2 class="section-title">Gembala Sidang</h2>
            <div class="divider"></div>
        </div>

        <div class="gembala-card text-center scroll-reveal-scale" style="animation-delay: 0.15s;">

            @if($data->gembala_foto)
                <img src="{{ asset('storage/' . $data->gembala_foto) }}"
                     class="gembala-img mb-4"
                     alt="{{ $data->gembala_nama }}">
            @else
                <div class="gembala-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif

            <h4 class="fw-bold mb-1">{{ $data->gembala_nama }}</h4>

            @if($data->gembala_jabatan)
                <div class="badge-jabatan">{{ $data->gembala_jabatan }}</div>
            @endif

            @if($data->gembala_deskripsi)
                <p class="text-muted mt-2 mb-0"
                   style="line-height:1.85;font-size:14.5px;max-width:480px;margin:0 auto;">
                    {{ $data->gembala_deskripsi }}
                </p>
            @endif

        </div>
    </div>
</section>

@else

{{-- ── EMPTY STATE ── --}}
<section class="hero">
    <div class="container">
        <h1>Tentang Gereja</h1>
        <p>Mengenal lebih dalam rumah Tuhan kita</p>
    </div>
</section>

<section class="section-plain">
    <div class="container text-center">
        <div class="empty-state-card">
            <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto mb-3">
                <i class="bi bi-info-circle"></i>
            </div>
            <h4 class="fw-bold mb-2">Data Belum Tersedia</h4>
            <p class="text-muted mb-0">Informasi tentang gereja belum diisi. Silakan hubungi administrator.</p>
        </div>
    </div>
</section>

@endif

@endsection

<script>
// ──── SCROLL REVEAL ANIMATIONS ────
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all scroll-reveal elements
    document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale').forEach(el => {
        observer.observe(el);
    });
});

// ──── RIPPLE EFFECT ON CARD CLICK ────
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card-modern, .sejarah-card, .visi-misi-card, .gembala-card');
    
    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
});

// ──── SMOOTH SCROLL BEHAVIOR ────
if (!CSS.supports('scroll-behavior', 'smooth')) {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

// ──── PARALLAX EFFECT ON HERO ────
window.addEventListener('scroll', function() {
    const hero = document.querySelector('.hero');
    if (hero) {
        const scrolled = window.scrollY;
        hero.style.backgroundPosition = `center ${scrolled * 0.5}px`;
    }
});

// ──── ADD RIPPLE EFFECT STYLES ────
const style = document.createElement('style');
style.textContent = `
    .card-modern, .sejarah-card, .visi-misi-card, .gembala-card {
        position: relative;
        overflow: hidden;
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0) 70%);
        transform: scale(0);
        animation: rippleAnimation 0.6s ease-out;
        pointer-events: none;
    }

    @keyframes rippleAnimation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>