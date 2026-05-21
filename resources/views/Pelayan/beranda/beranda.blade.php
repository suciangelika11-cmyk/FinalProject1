@extends('Pelayan.layouts.pelayan')

@section('page_title', 'Beranda Pelayan')

@section('content')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        :root {
            --blue-light: #ADE1FB;
            --blue-mid: #266CA9;
            --blue-dark: #0F2573;
            --navy: #041D56;
            --navy-dark: #01082D;

            --ink: #0A0E17;
            --ink-card: rgba(14, 20, 35, 0.92);
            --ink-mid: #111827;

            --surface: rgba(255, 255, 255, 0.04);
            --surface-hover: rgba(255, 255, 255, 0.07);

            --text: #EAE6DF;
            --text-muted: rgba(173, 225, 251, 0.7);

            --border: rgba(38, 108, 169, 0.2);
            --border-strong: rgba(173, 225, 251, 0.35);

            --radius: 18px;
            --radius-sm: 10px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--navy-dark);
            color: var(--blue-light);
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* HERO */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.28) saturate(0.6);
            z-index: 1;
        }

        .hero-vignette {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 70% at 50% 60%, transparent 30%, rgba(1, 8, 45, 0.9) 100%),
                linear-gradient(180deg, rgba(1, 8, 45, 0.2) 0%, transparent 30%, transparent 70%, var(--navy-dark) 100%);
            z-index: 2;
        }

        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(173, 225, 251, 0.08) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 0 24px;
            max-width: 820px;
            animation: fadeUp 1.2s ease both;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(38, 108, 169, 0.15);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 8px 22px;
            font-size: 11px;
            font-weight: 500;
            color: var(--blue-light);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 32px;
        }

        .hero-badge .dot {
            width: 5px;
            height: 5px;
            background: var(--blue-mid);
            border-radius: 50%;
        }

        .hero h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(42px, 7vw, 82px);
            line-height: 1.1;
            color: var(--blue-light);
            margin-bottom: 20px;
            letter-spacing: -0.02em;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--blue-mid);
        }

        .hero-sub {
            color: rgba(173, 225, 251, 0.8);
            font-size: 17px;
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 48px;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--blue-mid);
            color: white;
            padding: 16px 38px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: all 0.3s ease;
        }

        .hero-cta:hover {
            background: var(--blue-light);
            color: var(--navy-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(173, 225, 251, 0.25);
        }

        .hero-scroll {
            position: absolute;
            bottom: 36px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--blue-light);
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            animation: bounce 2s infinite;
        }

        .hero-scroll-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--blue-light), transparent);
        }

        /* SECTION */
        .sessions-section,
        .donasi-section {
            position: relative;
            z-index: 1;
            padding: 100px 0;
            background: var(--navy);
        }

        .about-section {
            padding: 100px 0;
            background: var(--navy-dark);
        }

        .beranda-container {
            width: 90%;
            max-width: 1160px;
            margin: 0 auto;
        }

        .section-eyebrow {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .section-eyebrow::before,
        .section-eyebrow::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .section-eyebrow span {
            color: var(--blue-mid);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .section-title {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(28px, 4vw, 46px);
            text-align: center;
            margin-bottom: 56px;
            color: var(--blue-light);
        }

        .sessions-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 48px;
        }

        .session-card,
        .about-stat,
        .about-box,
        .donasi-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: all 0.35s ease;
        }

        .session-card {
            padding: 44px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .session-card:hover,
        .donasi-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--border-strong);
            transform: translateY(-6px);
        }

        .session-number {
            font-size: 11px;
            color: var(--blue-mid);
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .session-time {
            font-family: 'Libre Baskerville', serif;
            font-size: 42px;
            color: var(--blue-light);
            margin-bottom: 8px;
        }

        .session-wib {
            font-size: 13px;
            color: rgba(173, 225, 251, 0.7);
        }

        .about-heading {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(26px, 3.5vw, 42px);
            line-height: 1.25;
            margin-bottom: 24px;
            color: var(--blue-light);
        }

        .about-text,
        .about-quote,
        .donasi-card-sub,
        .page-end-text {
            color: rgba(173, 225, 251, 0.8);
        }

        .about-stat {
            padding: 24px;
        }

        .about-stat-num {
            font-family: 'Libre Baskerville', serif;
            font-size: 36px;
            color: var(--blue-mid);
            margin-bottom: 6px;
        }

        .about-stat-label {
            font-size: 12px;
            color: rgba(173, 225, 251, 0.7);
        }

        .about-box {
            padding: 48px;
            text-align: center;
        }

        .about-cross {
            font-size: 64px;
            color: var(--blue-mid);
            margin-bottom: 24px;
        }

        .about-quote {
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
            font-style: italic;
            line-height: 1.7;
        }

        .donasi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .donasi-card {
            padding: 44px;
        }

        .donasi-card-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(38, 108, 169, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--blue-light);
            margin-bottom: 24px;
        }

        .donasi-card h3 {
            font-family: 'Libre Baskerville', serif;
            font-size: 22px;
            margin-bottom: 12px;
            color: var(--blue-light);
        }

        .donasi-placeholder {
            background: rgba(38, 108, 169, 0.08);
            border: 1px dashed var(--border-strong);
            border-radius: 12px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blue-light);
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 28px;
        }

        .rek-number {
            font-family: 'Libre Baskerville', serif;
            font-size: 26px;
            letter-spacing: 0.06em;
            margin-bottom: 18px;
            color: var(--blue-light);
        }

        .btn-copy,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(38, 108, 169, 0.12);
            border: 1px solid var(--border-strong);
            color: var(--blue-light);
            padding: 12px 28px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.25s;
            text-decoration: none;
        }

        .btn-copy:hover,
        .btn-outline:hover {
            background: var(--blue-light);
            color: var(--navy-dark);
            border-color: var(--blue-light);
        }

        .steps {
            margin-top: 24px;
            list-style: none;
            counter-reset: steps;
        }

        .steps li {
            counter-increment: steps;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: rgba(173, 225, 251, 0.75);
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .steps li::before {
            content: counter(steps);
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: rgba(38, 108, 169, 0.15);
            border: 1px solid var(--border-strong);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: var(--blue-light);
            flex-shrink: 0;
        }

        .page-end {
            padding: 60px 0;
            background: var(--navy-dark);
            text-align: center;
            border-top: 1px solid var(--border);
        }

        .page-end-icon {
            font-size: 28px;
            color: var(--blue-mid);
            margin-bottom: 16px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(32px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(8px);
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media(max-width: 900px) {
            .sessions-grid,
            .donasi-grid,
            .about-inner {
                grid-template-columns: 1fr;
            }

            .about-inner {
                gap: 48px;
            }
        }

        @media(max-width: 600px) {
            .about-stat-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    <!-- HERO -->
    <section class="hero">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-vignette"></div>
        <div class="hero-glow"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <span class="dot"></span>
                Gereja Beriman Indonesia
                <span class="dot"></span>
            </div>

            <h1>Selamat Datang di<br><em>GBI Tambunan</em></h1>

            <p class="hero-sub">Tempat bertumbuh dalam iman, doa, dan pelayanan<br>yang penuh kasih bagi semua jemaat.</p>

        </div>

        <div class="hero-scroll">
            <div class="hero-scroll-line"></div>
            <span>Scroll</span>
        </div>
    </section>

    <!-- IBADAH MINGGU -->
    <section class="sessions-section">
        <div class="beranda-container">
            <div class="section-eyebrow reveal">
                <span>Ibadah Mingguan</span>
            </div>
            <h2 class="section-title reveal">Jadwal Ibadah Minggu</h2>

            <div class="sessions-grid">
                <div class="session-card reveal">
                    <div class="session-number">Sesi I</div>
                    <div class="session-time">09:00</div>
                    <div class="session-wib">WIB — Pagi</div>
                </div>
                <div class="session-card reveal">
                    <div class="session-number">Sesi II</div>
                    <div class="session-time">11:00</div>
                    <div class="session-wib">WIB — Siang</div>
                </div>
                <div class="session-card reveal">
                    <div class="session-number">Sesi III</div>
                    <div class="session-time">16:00</div>
                    <div class="session-wib">WIB — Sore</div>
                </div>
            </div>

            <div class="text-center reveal" style="text-align:center;">
                <a href="{{ route('user.jemaat') }}" class="btn-outline">
                    <i class="fa-solid fa-user-plus"></i>
                    Daftarkan Diri Sebagai Jemaat
                </a>
            </div>
        </div>
    </section>

<<<<<<< HEAD:resources/views/Pelayan/beranda/beranda.blade.php
=======
    <!-- TENTANG -->
    <section class="about-section">
        <div class="beranda-container">
            <div class="about-inner">
                <div class="reveal">
                    <div class="about-label">Tentang Kami</div>
                    <h2 class="about-heading">Gereja yang Fokus Pada Pertumbuhan Rohani</h2>
                    <p class="about-text">GBI Tambunan adalah gereja yang berkomitmen untuk membangun jemaat yang kuat dalam
                        iman, aktif dalam pelayanan, dan penuh kasih dalam persekutuan. Kami percaya bahwa setiap orang
                        memiliki panggilan mulia dari Tuhan.</p>

                    <div class="about-stat-grid">
                        <div class="about-stat">
                            <div class="about-stat-num">3×</div>
                            <div class="about-stat-label">Ibadah setiap Minggu</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-num">∞</div>
                            <div class="about-stat-label">Kasih yang tercurah</div>
                        </div>
                    </div>
                </div>

                <div class="about-visual reveal">
                    <div class="about-box">
                        <div class="about-cross">
                            <i class="fa-solid fa-cross"></i>
                        </div>
                        <p class="about-quote">"Karena begitu besar kasih Allah akan dunia ini, sehingga Ia telah
                            mengaruniakan Anak-Nya yang tunggal."</p>
                        <div style="margin-top:20px;font-size:12px;color:var(--gold);letter-spacing:0.1em;">— Yohanes 3:16
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
>>>>>>> 345e4aa07069f33de2acccec842637325bed1e18:resources/views/Pelayan/beranda.blade.php

    <!-- DONASI -->
    <section class="donasi-section">
        <div class="beranda-container">
            <div class="section-eyebrow reveal"><span>Persembahan & Donasi</span></div>
            <h2 class="section-title reveal">Dukung Pelayanan Gereja</h2>

            <div class="donasi-grid">
                <div class="donasi-card reveal">
                    <div class="donasi-card-icon"><i class="fa-solid fa-qrcode"></i></div>
                    <h3>Bayar via QRIS</h3>
                    <p class="donasi-card-sub">Scan QR Code menggunakan aplikasi dompet digitalmu</p>

                    <div class="donasi-placeholder">
                        <img src="{{ asset('gambar/qris.jpeg') }}" class="qris-img">
                    </div>

                    <ol class="steps">
                        <li>Buka aplikasi pembayaran digital</li>
                        <li>Scan QR Code di atas</li>
                        <li>Masukkan nominal donasi</li>
                        <li>Konfirmasi pembayaran</li>
                    </ol>
                </div>

                <div class="donasi-card reveal">
                    <div class="donasi-card-icon"><i class="fa-solid fa-building-columns"></i></div>
                    <h3>Transfer Bank</h3>
                    <p class="donasi-card-sub">Transfer langsung ke rekening gereja kami</p>

                    <div class="donasi-placeholder">
                        [ NAMA BANK ]
                    </div>

                    <div class="rek-number" id="rek">1 2 3 4 5 6 7 8 9</div>
                    <button onclick="copyRek()" class="btn-copy">
                        <i class="fa-regular fa-copy"></i>
                        Salin Nomor Rekening
                    </button>

                    <ol class="steps" style="margin-top:20px;">
                        <li>Buka aplikasi mobile banking</li>
                        <li>Transfer ke nomor di atas</li>
                        <li>Konfirmasi kepada pengurus</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="page-end">
        <div class="page-end-icon"><i class="fa-solid fa-dove"></i></div>
        <p class="page-end-text">Tuhan memberkati setiap langkah pelayananmu.</p>
    </div>

    <script>
        function copyRek() {
            const text = document.getElementById('rek').innerText.replace(/\s/g, '');
            navigator.clipboard.writeText(text);
            const btn = document.querySelector('.btn-copy');
            const orig = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
            btn.style.background = 'var(--gold)';
            btn.style.color = 'var(--ink)';
            setTimeout(() => {
                btn.innerHTML = orig;
                btn.style.background = '';
                btn.style.color = '';
            }, 2200);
        }

        const obs = new IntersectionObserver(entries => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add('visible'), i * 80);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
    </script>

@endsection