@extends('layouts.app')

@section('content')

<style>
* {
    scroll-behavior: smooth;
}

body {
    background: #0f172a;
    color: white;
}

/* ===== KEYFRAME ANIMATIONS ===== */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes scaleUp {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
    }
}

@keyframes glow {
    0%, 100% {
        box-shadow: 0 0 20px rgba(248, 113, 113, 0), 0 10px 40px rgba(0,0,0,0.3);
    }
    50% {
        box-shadow: 0 0 30px rgba(248, 113, 113, 0.4), 0 10px 40px rgba(0,0,0,0.3);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes countUp {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* ===== HERO SECTION ===== */
.hero {
    background: linear-gradient(135deg, #1e3a8a 0%, #0ea5e9 100%);
    padding: 120px 20px;
    border-radius: 20px;
    text-align: center;
    margin-bottom: 100px;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%);
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 1;
    animation: slideDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.hero h1 {
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 20px;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s both;
}

.hero p {
    font-size: 18px;
    color: rgba(255,255,255,0.9);
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both;
}

/* ===== STATS SECTION ===== */
.stats-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 30px;
    margin-bottom: 100px;
}

.stat-card {
    background: linear-gradient(135deg, #1e3a8a 0%, #0ea5e9 100%);
    padding: 40px 20px;
    border-radius: 16px;
    text-align: center;
    border: 2px solid rgba(248, 113, 113, 0.3);
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    animation: countUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.stat-card:hover {
    transform: translateY(-12px);
    border-color: rgba(248, 113, 113, 0.8);
    box-shadow: 0 20px 40px rgba(248, 113, 113, 0.2), 0 0 30px rgba(248, 113, 113, 0.3);
}

.stat-number {
    font-size: 36px;
    font-weight: bold;
    color: #fbbf24;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 14px;
    color: rgba(255,255,255,0.8);
}

/* ===== SECTION STYLES ===== */
.section {
    margin-bottom: 100px;
    opacity: 0;
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.section.scroll-reveal {
    animation: none;
}

.section.active {
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.title {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
    animation: slideInLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s both;
}

.title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #fbbf24, transparent);
    animation: slideInLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.25s both;
}

.subtitle {
    font-size: 14px;
    color: #94a3b8;
    line-height: 1.8;
}

.card {
    background: #1e293b;
    border-radius: 16px;
    padding: 50px 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    border: 1px solid rgba(248, 113, 113, 0.1);
}

.card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(248, 113, 113, 0.2), 0 10px 30px rgba(0,0,0,0.3);
    border-color: rgba(248, 113, 113, 0.4);
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(248, 113, 113, 0.05) 0%, transparent 100%);
    border-radius: 16px;
    opacity: 0;
    transition: opacity 0.35s ease;
    pointer-events: none;
}

.card:hover::before {
    opacity: 1;
}

/* ===== GRID LAYOUT ===== */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
    margin-top: 30px;
}

.grid-item {
    animation: scaleUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.grid-item:nth-child(2) {
    animation: slideInRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s both;
}

/* ===== VISI MISI CARDS ===== */
.grid-item h4 {
    font-size: 24px;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all 0.35s ease;
}

.grid-item:hover h4 {
    filter: brightness(1.2);
}

/* ===== GEMBALA SECTION ===== */
.gembala-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-top: 40px;
}

.gembala-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.gembala-image img,
.avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fbbf24;
    box-shadow: 0 0 40px rgba(248, 113, 113, 0.3), 0 20px 60px rgba(0,0,0,0.4);
    animation: float 4s ease-in-out infinite, fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
}

.avatar {
    background: linear-gradient(135deg, #1e3a8a 0%, #0ea5e9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    margin: 0;
}

.gembala-info {
    animation: slideInRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
}

.gembala-info h4 {
    font-size: 28px;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.gembala-info .subtitle {
    font-size: 16px;
    margin-bottom: 20px;
    color: #fbbf24;
    font-weight: 500;
}

.gembala-details {
    background: rgba(248, 113, 113, 0.05);
    border-left: 3px solid #fbbf24;
    padding: 20px 20px 20px 25px;
    border-radius: 8px;
    margin-top: 20px;
    line-height: 1.8;
}

.gembala-details p {
    font-size: 14px;
    color: #cbd5e1;
}

/* ===== PERJALANAN SECTION ===== */
.sejarah-card {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.8));
    padding: 50px 40px;
    border-radius: 16px;
    border-left: 4px solid #fbbf24;
    line-height: 2;
    animation: slideInLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
    font-size: 16px;
}

.sejarah-card:hover {
    box-shadow: 0 20px 50px rgba(248, 113, 113, 0.15);
}

/* ===== CENTER UTILITY ===== */
.center {
    text-align: center;
}

/* ===== SCROLL REVEAL ANIMATIONS ===== */
.scroll-reveal {
    opacity: 0;
}

.scroll-reveal.active {
    animation: fadeUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal-left {
    opacity: 0;
}

.scroll-reveal-left.active {
    animation: slideInLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal-right {
    opacity: 0;
}

.scroll-reveal-right.active {
    animation: slideInRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.scroll-reveal-scale {
    opacity: 0;
}

.scroll-reveal-scale.active {
    animation: scaleUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .hero {
        padding: 80px 20px;
    }

    .hero h1 {
        font-size: 32px;
    }

    .hero p {
        font-size: 16px;
    }

    .stats-section {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .title {
        font-size: 28px;
    }

    .grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .gembala-section {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .card {
        padding: 30px 20px;
    }

    .sejarah-card {
        padding: 30px 20px;
    }
}
</style>

@if($data)

<div class="container">

    <!-- HERO SECTION -->
    <div class="hero">
        <div class="hero-content">
            <h1>{{ $data->header_title }}</h1>
            <p>{{ $data->header_description }}</p>
        </div>
    </div>

    <!-- STATISTICS SECTION -->
    <div class="stats-section scroll-reveal">
        <div class="stat-card">
            <div class="stat-number">1978</div>
            <div class="stat-label">Sejak Berdiri</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">2.4K+</div>
            <div class="stat-label">Jemaat Aktif</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">12</div>
            <div class="stat-label">Pelayanan</div>
        </div>
    </div>

    <!-- SEJARAH / PERJALANAN IMAN KAMI -->
    <div class="section scroll-reveal">
        <div class="title">Perjalanan Iman Kami</div>
        <div class="sejarah-card">
            {{ $data->sejarah }}
        </div>
    </div>

    <!-- VISI MISI -->
    <div class="section scroll-reveal">
        <div class="title">Visi & Misi</div>
        <div class="grid">
            <div class="card grid-item scroll-reveal-left">
                <h4>Visi</h4>
                <p class="subtitle">{{ $data->visi }}</p>
            </div>

            <div class="card grid-item scroll-reveal-right">
                <h4>Misi</h4>
                <p class="subtitle">{{ $data->misi }}</p>
            </div>
        </div>
    </div>

    <!-- GEMBALA SIDANG -->
    <div class="section scroll-reveal">
        <div class="title center">Gembala Sidang</div>
        
        <div class="gembala-section">
            <div class="gembala-image">
                @if($data->gembala_foto)
                    <img src="{{ asset('storage/'.$data->gembala_foto) }}" alt="{{ $data->gembala_nama }}">
                @else
                    <div class="avatar">👤</div>
                @endif
            </div>

            <div class="gembala-info">
                <h4>{{ $data->gembala_nama }}</h4>
                <p class="subtitle">{{ $data->gembala_jabatan }}</p>
                <p style="font-size: 15px; line-height: 1.8; color: #cbd5e1;">{{ $data->gembala_deskripsi }}</p>
                
                <div class="gembala-details">
                    <p><strong>📍 Alamat:</strong> Jalan Gembala Sidang</p>
                    <p><strong>📧 Email:</strong> info@gbi.id</p>
                    <p><strong>📞 Kontak:</strong> +62-XXX-XXX-XXXX</p>
                </div>
            </div>
        </div>
    </div>

</div>

@else

<div class="container center">
    <h2 style="color: #94a3b8; margin-top: 50px;">Data belum tersedia</h2>
</div>

@endif

<!-- SCROLL REVEAL JAVASCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Optional: unobserve after animation
                // observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all scroll-reveal elements
    document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale').forEach(el => {
        observer.observe(el);
    });

    // Counter animation for statistics
    const stats = document.querySelectorAll('.stat-card');
    let hasAnimated = false;

    const countObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                animateStats();
            }
        });
    }, { threshold: 0.5 });

    document.querySelector('.stats-section') && countObserver.observe(document.querySelector('.stats-section'));

    function animateStats() {
        const counts = [
            { element: document.querySelector('.stat-card:nth-child(1) .stat-number'), end: 1978 },
            { element: document.querySelector('.stat-card:nth-child(2) .stat-number'), text: '2.4K+' },
            { element: document.querySelector('.stat-card:nth-child(3) .stat-number'), end: 12 }
        ];

        counts.forEach((item, index) => {
            if (!item.element) return;
            
            if (item.text) {
                // For text values, just show them
                setTimeout(() => {
                    item.element.textContent = item.text;
                }, index * 100);
            } else {
                // For numbers, animate counting
                let current = 0;
                const increment = Math.ceil(item.end / 30);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= item.end) {
                        item.element.textContent = item.end;
                        clearInterval(timer);
                    } else {
                        item.element.textContent = current;
                    }
                }, 30);
            }
        });
    }

    // Ripple effect on card click
    document.querySelectorAll('.card').forEach(card => {
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

            // Add ripple style if not exists
            if (!document.querySelector('style[data-ripple]')) {
                const style = document.createElement('style');
                style.setAttribute('data-ripple', 'true');
                style.textContent = `
                    .ripple {
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(248, 113, 113, 0.6);
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
            }

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });
});
</script>

@endsection
