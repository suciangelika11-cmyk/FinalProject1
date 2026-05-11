@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;0,700;1,300;1,600&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #020617, #0f172a, #1e3a8a);
    color: #ffffff;
}

.hero-home,
.hero-text,
section,
.card,
.card h3,
.card p,
.card ol,
.card li,
.hero-text h1,
.hero-text p,
section h2,
section p,
.donasi-title,
.donasi-sub,
.rek {
    color: #ffffff;
}

/* HERO */
.hero-home {
    position: relative;
    height: 100vh;
    min-height: 400px;
    overflow: hidden;
}
.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.35) blur(2px);
}
.hero-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at center, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.75) 100%);
}
.hero-text {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    text-align: center;
    padding: 0 24px;
}

/* EYEBROW */
.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Inter', sans-serif;
    font-size: clamp(10px, 1.5vw, 12px);
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    margin-bottom: clamp(14px, 3vw, 22px);
    animation: fadeUp 0.8s ease 0.2s both;
}
.hero-eyebrow::before,
.hero-eyebrow::after {
    content: '';
    display: inline-block;
    width: clamp(24px, 4vw, 40px);
    height: 1px;
    background: rgba(255,255,255,0.3);
}

/* MAIN TITLE */
.hero-text h1 {
    font-family: 'Cormorant Garamond', serif;
    line-height: 1.0;
    margin: 0 0 clamp(10px, 2vw, 18px);
    animation: fadeUp 0.9s ease 0.35s both;
}

.hero-text h1 .word-selamat {
    display: block;
    font-weight: 300;
    font-style: italic;
    color: rgba(255,255,255,0.7);
    font-size: clamp(1.8rem, 5vw, 3.8rem);
    letter-spacing: 0.04em;
    margin-bottom: 2px;
}

.hero-text h1 .word-datang {
    display: block;
    font-weight: 700;
    font-style: normal;
    color: #ffffff;
    font-size: clamp(3.2rem, 10vw, 7.5rem);
    line-height: 0.88;
    letter-spacing: -0.03em;
}

.hero-text h1 .word-di {
    display: block;
    font-weight: 300;
    font-style: italic;
    color: rgba(255,255,255,0.55);
    font-size: clamp(1.1rem, 2.8vw, 2rem);
    letter-spacing: 0.12em;
    margin-top: 8px;
}

.hero-text h1 .word-church {
    display: block;
    font-weight: 700;
    font-style: normal;
    font-size: clamp(2.4rem, 7vw, 5.6rem);
    letter-spacing: -0.02em;
    line-height: 1;
    background: linear-gradient(130deg, #bfdbfe 0%, #c4b5fd 45%, #93c5fd 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 4s linear infinite;
}

@keyframes shimmer {
    0%   { background-position: -200% center; }
    100% { background-position:  200% center; }
}

/* DIVIDER */
.hero-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin: clamp(18px, 3vw, 28px) auto;
    animation: fadeUp 0.9s ease 0.5s both;
}
.hero-divider-line {
    display: inline-block;
    width: clamp(36px, 7vw, 70px);
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(255,255,255,0.35));
}
.hero-divider-line.flip {
    background: linear-gradient(to left, transparent, rgba(255,255,255,0.35));
}
.hero-divider-dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: rgba(255,255,255,0.45);
    display: inline-block;
}
.hero-divider-dot.sm {
    width: 3px; height: 3px;
    opacity: 0.3;
}

/* SUBTITLE */
.hero-text p {
    font-family: 'Inter', sans-serif;
    font-size: clamp(0.78rem, 1.8vw, 0.92rem);
    font-weight: 300;
    letter-spacing: 0.18em;
    color: rgba(255,255,255,0.48);
    text-transform: uppercase;
    opacity: 1;
    animation: fadeUp 0.9s ease 0.6s both;
    margin: 0;
}

/* SCROLL INDICATOR */
.hero-scroll {
    position: absolute;
    bottom: 28px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    animation: fadeUp 1s ease 1.1s both;
}
.hero-scroll span {
    font-size: 9px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.3);
    font-family: 'Inter', sans-serif;
}
.hero-scroll-line {
    width: 1px;
    height: 36px;
    background: linear-gradient(to bottom, rgba(255,255,255,0.45), transparent);
    animation: scrollPulse 2.2s ease infinite;
}
@keyframes scrollPulse {
    0%, 100% { opacity: 0.3; transform: scaleY(0.8) translateY(-4px); }
    50%       { opacity: 1;   transform: scaleY(1)   translateY(0); }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* SECTION */
section {
    padding: clamp(48px, 8vw, 100px) 16px;
}

/* CARD */
.card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: clamp(20px, 4vw, 40px);
    transition: 0.4s;
}
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 70px rgba(0,0,0,0.4);
}

/* GRID */
.grid-3 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}
.grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    max-width: 1200px;
    margin: auto;
}

/* BUTTON */
.btn-main {
    display: inline-block;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    padding: 14px 40px;
    border-radius: 999px;
    color: white;
    font-weight: 700;
    border: none;
    text-decoration: none;
    margin-top: 16px;
}

/* DONASI */
.donasi-section {
    background: linear-gradient(135deg, #0f172a, #1e3a8a);
}

.donasi-title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 900;
    margin-bottom: 12px;
}

.donasi-sub {
    margin-bottom: 40px;
    opacity: 0.8;
}

/* BOX */
.donasi-box {
    border: 2px dashed rgba(255,255,255,0.4);
    padding: clamp(40px, 8vw, 100px) 20px;
    border-radius: 15px;
    margin: 25px 0;
    text-align: center;
}

/* REKENING */
.rek {
    font-size: 1.4rem;
    font-weight: bold;
    word-break: break-all;
}

/* BUTTON COPY */
.btn-copy {
    margin-top: 15px;
    padding: 12px 30px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg,#3b82f6,#6366f1);
    color: white;
    cursor: pointer;
}

/* SCROLL ANIMATION */
.scroll {
    opacity: 0;
    transform: translateY(40px);
    transition: 0.8s;
}
.scroll.show {
    opacity: 1;
    transform: translateY(0);
}

/* RESPONSIVE */
@media(max-width: 768px){
    .grid-3 {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .grid-2 {
        grid-template-columns: 1fr;
        gap: 24px;
    }
    .card {
        border-radius: 14px;
    }
    .hero-scroll { bottom: 16px; }
}

@media(min-width: 480px) and (max-width: 768px){
    .grid-3 {
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }
}
</style>

<!-- HERO -->
<section class="hero-home">
    <video autoplay muted loop playsinline class="hero-video">
        <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>

    <div class="hero-text">
        <div class="hero-eyebrow">
            Gereja Bethel Indonesia
        </div>

        <h1>
            <span class="word-selamat">Selamat</span>
            <span class="word-datang">Datang</span>
            <span class="word-di">di</span>
            <span class="word-church">GBI Tambunan</span>
        </h1>

        <div class="hero-divider">
            <span class="hero-divider-line"></span>
            <span class="hero-divider-dot sm"></span>
            <span class="hero-divider-dot"></span>
            <span class="hero-divider-dot sm"></span>
            <span class="hero-divider-line flip"></span>
        </div>

        <p>Tempat bertumbuh dalam iman dan pelayanan</p>
    </div>

    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="hero-scroll-line"></div>
    </div>
</section>

<!-- SESI -->
<section>
    <div class="container text-center">
        <h2 class="scroll">Ibadah Minggu</h2>

        <div class="grid-3" style="margin: 32px 0 24px;">
            <div class="card scroll"><h3>SESI 1</h3><p>09:00 WIB</p></div>
            <div class="card scroll"><h3>SESI 2</h3><p>11:00 WIB</p></div>
            <div class="card scroll"><h3>SESI 3</h3><p>16:00 WIB</p></div>
        </div>

        <a href="{{ route('user.jemaat') }}" class="btn-main">Jadi Jemaat</a>
    </div>
</section>

<!-- DONASI -->
<section class="donasi-section">
    <div class="container text-center">

        <h2 class="donasi-title scroll">Donasi</h2>
        <p class="donasi-sub scroll">Dukung pelayanan melalui QRIS &amp; Transfer</p>

        <div class="grid-2">

            <!-- QRIS -->
            <div class="card scroll">
                <h3>QRIS</h3>
                <div class="donasi-box">
                    QR CODE
                    <!-- <img src="{{ asset('gambar/qris.png') }}" width="250" style="max-width:100%;height:auto;"> -->
                </div>
                <ol style="text-align:left;">
                    <li>Scan QR</li>
                    <li>Masukkan nominal</li>
                    <li>Konfirmasi</li>
                </ol>
            </div>

            <!-- TRANSFER -->
            <div class="card scroll">
                <h3>Transfer Bank</h3>
                <div class="donasi-box">BANK</div>
                <p id="rek" class="rek">123456789</p>
                <button onclick="copyRek()" class="btn-copy">Salin</button>
                <ol style="text-align:left;">
                    <li>Transfer</li>
                    <li>Masukkan rekening</li>
                    <li>Konfirmasi</li>
                </ol>
            </div>

        </div>
    </div>
</section>

<script>
function copyRek(){
    let text = document.getElementById("rek").innerText;
    navigator.clipboard.writeText(text);
    let btn = document.querySelector(".btn-copy");
    btn.innerText = "Tersalin ✓";
    setTimeout(()=>{ btn.innerText = "Salin"; }, 2000);
}

document.addEventListener("DOMContentLoaded",()=>{
    const obs = new IntersectionObserver(entries=>{
        entries.forEach(e=>{
            if(e.isIntersecting) e.target.classList.add("show");
        });
    },{threshold:0.1});
    document.querySelectorAll(".scroll").forEach(el=> obs.observe(el));
});
</script>

@endsection