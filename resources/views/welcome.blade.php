@extends('layouts.app')

@section('content')

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;0,700;1,300;1,600&family=Inter:wght@300;400;600;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #769FCD;
            --secondary: #B9D7EA;
            --accent: #D6E6F2;
            --bg: #F7FBFC;

            --text-dark: #2E4A62;
            --text-soft: #5D7B97;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg,
                    #F7FBFC 0%,
                    #D6E6F2 100%);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* HERO */
        .hero-home {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 500px;
            overflow: hidden;
            padding: 0;
            margin: 0;
        }

        .hero-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(.4);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(20, 35, 55, .55),
                    rgba(20, 35, 55, .75));
        }

        .hero-text {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            text-align: center;
            padding: 0 24px;
            color: white;
        }

        /* EYEBROW */
        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: clamp(10px, 1.5vw, 12px);
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .75);
            margin-bottom: clamp(14px, 3vw, 22px);
            animation: fadeUp .8s ease .2s both;
        }

        .hero-eyebrow::before,
        .hero-eyebrow::after {
            content: '';
            width: clamp(24px, 4vw, 40px);
            height: 1px;
            background: rgba(255, 255, 255, .4);
        }

        /* TITLE */
        .hero-text h1 {
            font-family: 'Cormorant Garamond', serif;
            line-height: 1;
            margin-bottom: 18px;
            animation: fadeUp .9s ease .35s both;
        }

        .hero-text h1 .word-selamat {
            display: block;
            font-style: italic;
            font-weight: 300;
            color: rgba(255, 255, 255, .8);
            font-size: clamp(1.8rem, 5vw, 3.8rem);
        }

        .hero-text h1 .word-datang {
            display: block;
            font-weight: 700;
            color: white;
            font-size: clamp(3.2rem, 10vw, 7.5rem);
        }

        .hero-text h1 .word-di {
            display: block;
            font-style: italic;
            color: rgba(255, 255, 255, .7);
            font-size: clamp(1.1rem, 2.8vw, 2rem);
            margin-top: 8px;
        }

        .hero-text h1 .word-church {
            display: block;
            font-size: clamp(2.4rem, 7vw, 5.6rem);
            font-weight: 700;
            background:
                linear-gradient(135deg,
                    #B9D7EA,
                    #FFFFFF,
                    #769FCD);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 5s linear infinite;
        }

        @keyframes shimmer {
            from {
                background-position: -200% center;
            }

            to {
                background-position: 200% center;
            }
        }

        .hero-text p {
            color: rgba(255, 255, 255, .75);
            letter-spacing: .18em;
            text-transform: uppercase;
            font-size: .9rem;
        }

        /* DIVIDER */
        .hero-divider {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin: 24px auto;
        }

        .hero-divider-line {
            width: 70px;
            height: 1px;
            background: rgba(255, 255, 255, .4);
        }

        .hero-divider-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .6);
        }

        .hero-divider-dot.sm {
            width: 3px;
            height: 3px;
            opacity: .5;
        }

        /* SECTION */
        section {
            padding: clamp(48px, 8vw, 100px) 16px;
            color: var(--text-dark);
        }

        section h2 {
            color: var(--text-dark);
            font-weight: 800;
        }

        section p {
            color: var(--text-soft);
        }

        /* CARD */
        .card {
            background: rgba(255, 255, 255, .88);
            border: 1px solid rgba(118, 159, 205, .15);
            border-radius: 24px;
            backdrop-filter: blur(16px);
            padding: clamp(20px, 4vw, 40px);

            box-shadow:
                0 10px 35px rgba(118, 159, 205, .10);

            transition: .4s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow:
                0 25px 60px rgba(118, 159, 205, .18);
        }

        .card h3,
        .card h4 {
            color: var(--text-dark);
            font-weight: 700;
        }

        .card p,
        .card li,
        .card ol {
            color: var(--text-soft);
        }

        /* GRID */
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(450px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: auto;
        }

        /* BUTTON */
        .btn-main {
            display: inline-block;
            background:
                linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA);

            color: var(--text-dark);
            padding: 14px 40px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            border: none;

            box-shadow:
                0 10px 25px rgba(118, 159, 205, .25);
        }

        .btn-main:hover {
            transform: translateY(-2px);
        }

        /* BUTTON COPY */
        .btn-copy {
            margin-top: 15px;
            padding: 12px 30px;
            border-radius: 12px;
            border: none;
            cursor: pointer;

            background:
                linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA);

            color: var(--text-dark);
            font-weight: 700;
        }

        /* DONASI */
.support-section{
    padding:80px 0;
}

.support-title{
    font-size:4rem;
    font-family:'Cormorant Garamond', serif;
    color:#2e4a62;
    margin-bottom:10px;
}

.support-subtitle{
    color:#5d7b97;
    font-size:1.2rem;
    margin-bottom:50px;
}

.support-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
}

.support-card{
    background:#fff;
    border-radius:28px;
    padding:28px;
    display:flex;
    flex-direction:column;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.card-header h3{
    font-size:2rem;
    color:#2e4a62;
    font-family:'Cormorant Garamond', serif;
    margin:0;
}

.card-header span{
    color:#9ebce0;
    font-size:1.5rem;
}

.qris-wrapper{
    border:1px solid #dce7f3;
    border-radius:20px;
    overflow:hidden;
    padding:20px;
    max-width:420px;
    margin:auto;
}

.qris-wrapper img{
    max-height:350px;
    object-fit:contain;
}

.qris-info{
    text-align:center;
    margin-top:20px;
    color:#5d7b97;
}

.thank-you{
    margin-top:15px;
    color:#2673d6;
    font-weight:600;
}

.join-banner{
    background:linear-gradient(
        135deg,
        #5ca8f5,
        #2673d6
    );
    border-radius:18px;
    padding:30px;
    color:white;

    display:flex;
    justify-content:space-between;
    align-items:center;

    min-height:180px;
}

.join-content h4{
    font-size:2.5rem;
    font-weight:700;
    margin-bottom:20px;
    color:white;
}

.join-content p{
    color:white;
    font-size:1.05rem;
    line-height:1.8;
}

.join-icon{
    font-size:7rem;
    opacity:.18;
}

.join-buttons{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    margin-top:25px;
    margin-bottom:25px;
}

.join-top-text{
    text-align:center;
    color:#35557b;
    line-height:2;
    font-size:1.1rem;
    margin-bottom:25px;
}

.btn-primary,
.btn-secondary{
    flex:1;
    text-align:center;
    padding:16px;
    border-radius:15px;
    text-decoration:none;
    font-weight:700;
}

.btn-primary{
    background:#2673d6;
    color:white;
}

.btn-secondary{
    border:2px solid #2673d6;
    color:#2673d6;
}

.join-features{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    text-align:center;
    padding-top:25px;
    border-top:1px solid #e6edf6;
}

.feature{
    padding:10px;
}

.feature-icon{
    font-size:2rem;
    margin-bottom:10px;
}

.feature p{
    color:#5d7b97;
    font-size:.95rem;
}

@media(max-width:992px){

    .support-grid{
        grid-template-columns:1fr;
    }

    .support-title{
        font-size:3rem;
    }

    .join-features{
        grid-template-columns:1fr;
        gap:20px;
    }
}
        /* ANIMATION */
        .scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: .8s;
        }

        .scroll.show {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* MOBILE */
        @media(max-width:768px) {

            .grid-3 {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .grid-2 {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .card {
                border-radius: 18px;
            }
        }

        @media(min-width:480px) and (max-width:768px) {

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
                @foreach($ibadahs as $ibadah)
                    <div class="card scroll">
                        <h3>{{ $ibadah->nama_sesi }}</h3>
                        <p>{{ \Carbon\Carbon::parse($ibadah->jam_ibadah)->format('H:i') }} WIB</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- DUKUNG BERSAMA -->
    <section class="support-section">
        <div class="container">

            <h2 class="support-title">Dukung Bersama</h2>
            <p class="support-subtitle">
                Dukung pelayanan dan bertumbuh bersama dalam keluarga GBI Tambunan
            </p>

            <div class="support-grid">

                <!-- CARD QRIS -->
                <div class="support-card">

                    <div class="card-header">
                        <span>• • •</span>
                        <h3>QRIS</h3>
                        <span>• • •</span>
                    </div>

                    <div class="qris-wrapper">
                        <img src="{{ asset('gambar/qris.jpeg') }}" alt="QRIS">
                    </div>

                    <div class="qris-info">
                        <p>
                            Scan QR menggunakan aplikasi e-wallet / mobile banking
                        </p>

                        <p>
                            Masukkan nominal dan konfirmasi pembayaran.
                        </p>

                        <div class="thank-you">
                            ❤️ Terima kasih untuk setiap dukungan Anda ❤️
                        </div>
                    </div>

                </div>

                <!-- CARD BERGABUNG -->
                <div class="support-card">

                    <div class="card-header">
                        <span>• • •</span>
                        <h3>Bergabunglah dengan Kami</h3>
                        <span>• • •</span>
                    </div>

                    <div class="join-banner">

                        <div class="join-content">
                            <h4>Bergabunglah dengan Kami</h4>

                            <p>
                                Kami mengundang Anda untuk menjadi bagian dari
                                keluarga besar GBI Tambunan. Datang dan rasakan
                                kasih Tuhan bersama kami.
                            </p>
                        </div>

                        <div class="join-icon">
                            ⛪
                        </div>

                    </div>

                    <div class="join-buttons">

                        <a href="{{ route('user.jemaat') }}" class="btn-primary">
                            📍 Jadi Jemaat
                        </a>

                        <a href="{{ route('user.kontak') }}" class="btn-secondary">
                            👥 Hubungi Kami
                        </a>

                    </div>

                    <div class="join-features">

                        <div class="feature">
                            <div class="feature-icon">👥</div>
                            <p>Daftar menjadi jemaat</p>
                        </div>

                        <div class="feature">
                            <div class="feature-icon">🤝</div>
                            <p>Hubungi tim pelayanan</p>
                        </div>

                        <div class="feature">
                            <div class="feature-icon">❤️</div>
                            <p>Bertumbuh bersama</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <script>
        function copyRek() {
            let text = document.getElementById("rek").innerText;
            navigator.clipboard.writeText(text);
            let btn = document.querySelector(".btn-copy");
            btn.innerText = "Tersalin ✓";
            setTimeout(() => { btn.innerText = "Salin"; }, 2000);
        }

        document.addEventListener("DOMContentLoaded", () => {
            const obs = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) e.target.classList.add("show");
                });
            }, { threshold: 0.1 });
            document.querySelectorAll(".scroll").forEach(el => obs.observe(el));
        });
    </script>

@endsection