@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

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
    overflow: hidden;
}
.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.4) blur(2px);
}
.hero-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle, rgba(0,0,0,0.4), rgba(0,0,0,0.85));
}
.hero-text {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    text-align: center;
}
.hero-text h1 {
    font-size: 3rem;
    font-weight: 900;
}
.hero-text p {
    opacity: 0.9;
}

/* SECTION */
section {
    padding: 100px 20px;
}

/* CARD */
.card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    transition: 0.4s;
}
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 70px rgba(0,0,0,0.4);
}

/* GRID */
.grid-3 {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 25px;
}
.grid-2 {
    display: grid;
    grid-template-columns: repeat(2,1fr);
    gap: 40px;
    max-width: 1200px;
    margin: auto;
}

/* BUTTON */
.btn-main {
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    padding: 14px 40px;
    border-radius: 999px;
    color: white;
    font-weight: 700;
    border: none;
}

/* DONASI */
.donasi-section {
    background: linear-gradient(135deg, #0f172a, #1e3a8a);
}

.donasi-title {
    font-size: 3rem;
    font-weight: 900;
}

.donasi-sub {
    margin-bottom: 60px;
    opacity: 0.8;
}

/* BOX */
.donasi-box {
    border: 2px dashed rgba(255,255,255,0.4);
    padding: 100px 20px;
    border-radius: 15px;
    margin: 25px 0;
}

/* REKENING */
.rek {
    font-size: 1.4rem;
    font-weight: bold;
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

/* SCROLL */
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
@media(max-width:768px){
    .grid-3, .grid-2 {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- HERO -->
<section class="hero-home">
    <video autoplay muted loop class="hero-video">
        <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>

    <div class="hero-text">
        <h1>Selamat Datang di GBI Tambunan</h1>
        <p>Tempat bertumbuh dalam iman dan pelayanan</p>
    </div>
</section>

<!-- SESI -->
<section>
    <div class="container text-center">
        <h2 class="scroll">Ibadah Minggu</h2>

        <div class="grid-3">
            <div class="card scroll"><h3>SESI 1</h3><p>09:00 WIB</p></div>
            <div class="card scroll"><h3>SESI 2</h3><p>11:00 WIB</p></div>
            <div class="card scroll"><h3>SESI 3</h3><p>16:00 WIB</p></div>
        </div>

        <br>
        <a href="{{ route('user.jemaat') }}" class="btn-main">Jadi Jemaat</a>
    </div>
</section>

<!-- TENTANG -->
<section>
    <div class="container text-center">
        <h2 class="scroll">Tentang GBI Tambunan</h2>
        <p class="scroll">Gereja yang fokus pada pertumbuhan rohani dan pelayanan.</p>
    </div>
</section>

<!-- DONASI -->
<section class="donasi-section">
    <div class="container text-center">

        <h2 class="donasi-title scroll">Donasi</h2>
        <p class="donasi-sub scroll">Dukung pelayanan melalui QRIS & Transfer</p>

        <div class="grid-2">

            <!-- QRIS -->
            <div class="card scroll">
                <h3>QRIS</h3>

                <div class="donasi-box">
                    QR CODE
                    <!-- <img src="{{ asset('gambar/qris.png') }}" width="250"> -->
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

                <div class="donasi-box">
                    BANK
                </div>

                <p id="rek" class="rek">123456789</p>

                <button onclick="copyRek()" class="btn-copy">
                    Salin
                </button>

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
// COPY
function copyRek(){
    let text = document.getElementById("rek").innerText;
    navigator.clipboard.writeText(text);

    let btn = document.querySelector(".btn-copy");
    btn.innerText = "Tersalin ✓";

    setTimeout(()=>{
        btn.innerText = "Salin";
    },2000);
}

// SCROLL ANIMATION
document.addEventListener("DOMContentLoaded",()=>{
    const obs = new IntersectionObserver(entries=>{
        entries.forEach(e=>{
            if(e.isIntersecting){
                e.target.classList.add("show");
            }
        });
    });

    document.querySelectorAll(".scroll").forEach(el=>{
        obs.observe(el);
    });
});
</script>

@endsection