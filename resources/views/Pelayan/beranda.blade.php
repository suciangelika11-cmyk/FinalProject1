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
            --gold: #C9A96E;
            --gold-pale: #E8D5A3;
            --gold-dim: rgba(201, 169, 110, 0.15);
            --ink: #0A0E17;
            --ink-card: rgba(14, 20, 35, 0.92);
            --ink-mid: #111827;
            --surface: rgba(255, 255, 255, 0.04);
            --surface-hover: rgba(255, 255, 255, 0.07);
            --text: #EAE6DF;
            --text-muted: rgba(234, 230, 223, 0.55);
            --border: rgba(201, 169, 110, 0.14);
            --border-strong: rgba(201, 169, 110, 0.32);
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
            background: var(--ink);
            color: var(--text);
            overflow-x: hidden;
        }

        /* NOISE OVERLAY */
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
                radial-gradient(ellipse 80% 70% at 50% 60%, transparent 30%, rgba(10, 14, 23, 0.85) 100%),
                linear-gradient(180deg, rgba(10, 14, 23, 0.2) 0%, transparent 30%, transparent 70%, var(--ink) 100%);
            z-index: 2;
        }

        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 169, 110, 0.06) 0%, transparent 70%);
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
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 8px 22px;
            font-size: 11px;
            font-weight: 500;
            color: var(--gold-pale);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 32px;
        }

        .hero-badge .dot {
            width: 5px;
            height: 5px;
            background: var(--gold);
            border-radius: 50%;
        }

        .hero h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(42px, 7vw, 82px);
            line-height: 1.1;
            color: var(--text);
            margin-bottom: 20px;
            letter-spacing: -0.02em;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--gold);
        }

        .hero-sub {
            color: var(--text-muted);
            font-size: 17px;
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 48px;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold);
            color: var(--ink);
            padding: 16px 38px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: all 0.3s ease;
        }

        .hero-cta:hover {
            background: var(--gold-pale);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(201, 169, 110, 0.3);
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
            color: var(--text-muted);
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            animation: bounce 2s infinite;
        }

        .hero-scroll-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--gold), transparent);
        }

        /* SESSIONS */
        .sessions-section {
            position: relative;
            z-index: 1;
            padding: 100px 0;
            background: var(--ink-mid);
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
            color: var(--gold);
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
            color: var(--text);
        }

        .sessions-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 48px;
        }

        .session-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 44px 32px;
            text-align: center;
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .session-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0;
            transition: opacity 0.35s;
        }

        .session-card:hover {
            background: var(--surface-hover);
            border-color: var(--border-strong);
            transform: translateY(-6px);
        }

        .session-card:hover::before {
            opacity: 1;
        }

        .session-number {
            font-size: 11px;
            color: var(--gold);
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .session-time {
            font-family: 'Libre Baskerville', serif;
            font-size: 42px;
            color: var(--text);
            margin-bottom: 8px;
        }

        .session-wib {
            font-size: 13px;
            color: var(--text-muted);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border-strong);
            color: var(--gold-pale);
            padding: 14px 36px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            background: transparent;
            cursor: pointer;
        }

        .btn-outline:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--ink);
        }

        /* ABOUT */
        .about-section {
            padding: 100px 0;
            background: var(--ink);
        }

        .about-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .about-label {
            color: var(--gold);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .about-heading {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(26px, 3.5vw, 42px);
            line-height: 1.25;
            margin-bottom: 24px;
            color: var(--text);
        }

        .about-text {
            color: var(--text-muted);
            line-height: 1.9;
            font-size: 15px;
            margin-bottom: 32px;
        }

        .about-stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .about-stat {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 24px;
        }

        .about-stat-num {
            font-family: 'Libre Baskerville', serif;
            font-size: 36px;
            color: var(--gold);
            margin-bottom: 6px;
        }

        .about-stat-label {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 300;
        }

        .about-visual {
            position: relative;
        }

        .about-box {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 48px;
            text-align: center;
        }

        .about-cross {
            font-size: 64px;
            color: var(--gold);
            margin-bottom: 24px;
        }

        .about-quote {
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
            font-style: italic;
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* DONASI */
        .donasi-section {
            padding: 100px 0;
            background: var(--ink-mid);
        }

        .donasi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .donasi-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 44px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .donasi-card:hover {
            border-color: var(--border-strong);
        }

        .donasi-card-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--gold);
            margin-bottom: 24px;
        }

        .donasi-card h3 {
            font-family: 'Libre Baskerville', serif;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .donasi-card-sub {
            color: var(--text-muted);
            font-size: 13px;
            margin-bottom: 30px;
        }

        .donasi-placeholder {
            background: rgba(201, 169, 110, 0.07);
            border: 1px dashed var(--border-strong);
            border-radius: 12px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
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
            color: var(--gold-pale);
        }

        .btn-copy {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            color: var(--gold-pale);
            padding: 12px 28px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.25s;
        }

        .btn-copy:hover {
            background: var(--gold);
            color: var(--ink);
            border-color: var(--gold);
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
            color: var(--text-muted);
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .steps li::before {
            content: counter(steps);
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: var(--gold);
            flex-shrink: 0;
        }

        /* FOOTER AREA */
        .page-end {
            padding: 60px 0;
            background: var(--ink);
            text-align: center;
            border-top: 1px solid var(--border);
        }

        .page-end-icon {
            font-size: 28px;
            color: var(--gold);
            margin-bottom: 16px;
        }

        .page-end-text {
            font-family: 'Libre Baskerville', serif;
            font-style: italic;
            font-size: 18px;
            color: var(--text-muted);
        }

        /* ANIMATIONS */
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

        /* RESPONSIVE */
        @media(max-width: 900px) {
            .sessions-grid {
                grid-template-columns: 1fr;
            }

            .about-inner {
                grid-template-columns: 1fr;
                gap: 48px;
            }

            .donasi-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 600px) {
            .sessions-grid {
                grid-template-columns: 1fr;
            }

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

            <a href="{{ route('user.jemaat') }}" class="hero-cta">
                <i class="fa-solid fa-church"></i>
                Bergabung Sebagai Jemaat
            </a>
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
                        [ QR CODE ]
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