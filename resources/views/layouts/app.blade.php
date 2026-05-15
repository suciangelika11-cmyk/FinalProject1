<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GBI Tambunan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Navbar premium styling */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 12px 0;
            background: rgba(10,22,40,0.92);
            border-bottom: 1px solid rgba(93,146,232,0.1);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            transition: background 0.4s ease, border-color 0.4s ease,
                        padding 0.35s ease, box-shadow 0.4s ease;
        }

        .navbar.scrolling {
            background: rgba(255,255,255,0.98);
            border-bottom: 1px solid rgba(26,74,158,0.12);
            box-shadow: 0 4px 32px rgba(10,22,40,0.12);
            padding: 8px 0;
        }

        .navbar.scrolled {
            background: #ffffff !important;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            background: transparent !important;
            box-shadow: none !important;
            transform: translateY(0);
            border-bottom: none !important;
    }
        /* ════════════════════════════════════════
           DESIGN TOKENS
        ════════════════════════════════════════ */
        :root {
            --navy:       #0a1628;
            --navy-mid:   #102040;
            --blue-deep:  #153565;
            --blue-main:  #1a4a9e;
            --blue-mid:   #2d65c8;
            --blue-light: #5592e8;
            --blue-pale:  #93bef8;
            --blue-mist:  #c8e0fd;
            --blue-ghost: #e8f2ff;

            --white: #ffffff;
            --dim-1: rgba(255,255,255,0.90);
            --dim-2: rgba(255,255,255,0.70);
            --dim-3: rgba(255,255,255,0.50);
            --dim-4: rgba(255,255,255,0.25);

            --gold:    #d4a844;
            --gold-lt: #f0d070;

            --bg-hero:    #0d1f40;
            --bg-section: #102444;
            --bg-alt:     #0f1e3a;
            --bg-card:    rgba(255,255,255,0.07);
            --bg-card-hov:rgba(255,255,255,0.11);

            --border-card:  rgba(93,146,232,0.18);
            --border-hover: rgba(93,146,232,0.45);

            --font-display: 'Playfair Display', serif;
            --font-body:    'DM Sans', sans-serif;

            --r-sm:  8px;
            --r-md:  14px;
            --r-lg:  20px;
            --r-xl:  28px;
            --r-pill:999px;
        }

        /* ════════════════════════════════════════
           RESET & BASE
        ════════════════════════════════════════ */

        .navbar.hidden {
            transform: translateY(-120%);
            opacity: 0;
        }

        .navbar.visible {
            transform: translateY(0);
            opacity: 1;
        }
        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-body);
            background: var(--bg-hero);
            color: var(--white);
            padding-top: 70px;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        img { max-width: 100%; height: auto; }

        /* ════════════════════════════════════════
           NAVBAR
        ════════════════════════════════════════ */

        /* Brand */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-logo-wrap {
            width: 38px; height: 38px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.45);
            flex-shrink: 0;
            transition: border-color 0.4s;
        }

        .navbar-scrolled .brand-logo-wrap {
            border-color: var(--blue-pale);
        }

        .brand-logo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .brand-title {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 15px;
            line-height: 1.2;
            color: var(--white);
            display: block;
            transition: color 0.4s;
        }

        .navbar-scrolled .brand-title { color: var(--navy); }

        .brand-sub {
            font-size: 10px;
            font-weight: 400;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--dim-3);
            display: block;
            transition: color 0.4s;
        }

        .navbar-scrolled .brand-sub { color: var(--blue-mid); }

        /* Nav links */
        .navbar-nav .nav-link {
            font-family: var(--font-body);
            font-weight: 500;
            font-size: 13.5px;
            color: var(--dim-1) !important;
            position: relative;
            padding: 6px 10px !important;
            margin: 0 1px;
            transition: color 0.3s;
        }

        .navbar-scrolled .navbar-nav .nav-link {
            color: #374151 !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px; left: 50%;
            width: 0; height: 2px;
            background: var(--blue-pale);
            border-radius: 2px;
            transform: translateX(-50%);
            transition: width 0.3s, background 0.4s;
        }

        .navbar-scrolled .navbar-nav .nav-link::after {
            background: var(--blue-main);
        }

        .navbar-nav .nav-link:hover { color: var(--white) !important; }
        .navbar-nav .nav-link:hover::after { width: 55%; }

        .navbar-scrolled .navbar-nav .nav-link:hover { color: var(--blue-main) !important; }

        .navbar-nav .nav-link.active { color: var(--white) !important; }
        .navbar-nav .nav-link.active::after { width: 55%; }

        .navbar-scrolled .navbar-nav .nav-link.active { color: var(--blue-main) !important; }
        .navbar-scrolled .navbar-nav .nav-link.active::after { background: var(--blue-main); }

        /* Mobile nav collapse */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(10,22,40,0.97);
                border-top: 1px solid rgba(93,146,232,0.1);
                padding: 16px 16px 20px;
                margin-top: 8px;
                border-radius: 0 0 16px 16px;
            }

            .navbar-scrolled .navbar-collapse {
                background: rgba(255,255,255,0.98);
                border-top: 1px solid rgba(26,74,158,0.1);
            }

            .navbar-nav .nav-link {
                padding: 10px 12px !important;
                border-radius: 8px;
            }

            .navbar-nav .nav-link:hover,
            .navbar-nav .nav-link.active {
                background: rgba(93,146,232,0.1);
            }

            .navbar-scrolled .navbar-nav .nav-link:hover,
            .navbar-scrolled .navbar-nav .nav-link.active {
                background: var(--blue-ghost);
            }

            .navbar-nav .nav-link::after { display: none; }

            .btn-nav-cta {
                margin-top: 8px;
                width: 100% !important;
                justify-content: center !important;
            }

            .user-pill {
                margin-top: 8px;
                width: 100%;
                justify-content: center;
            }
        }

        /* CTA Button */
        .btn-nav-cta {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 36px !important;
            padding: 0 20px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            white-space: nowrap !important;
            background: transparent !important;
            color: var(--white) !important;
            border: 1.5px solid rgba(255,255,255,0.8) !important;
            border-radius: var(--r-pill) !important;
            text-decoration: none !important;
            transition: background 0.3s, border-color 0.3s, color 0.3s, transform 0.25s !important;
        }

        .navbar-scrolled .btn-nav-cta {
            background: linear-gradient(135deg, var(--blue-main), var(--blue-mid)) !important;
            border-color: transparent !important;
            color: var(--white) !important;
            box-shadow: 0 6px 18px rgba(26,74,158,0.35) !important;
        }

        .btn-nav-cta:hover {
            background: rgba(255,255,255,0.15) !important;
        }

        .navbar-scrolled .btn-nav-cta:hover {
            background: linear-gradient(135deg, var(--blue-deep), var(--blue-main)) !important;
        }

        .btn-nav-cta::after, .btn-nav-cta::before { display: none !important; }

        /* User pill */
        .user-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--white) !important;
            padding: 5px 13px 5px 5px !important;
            border-radius: var(--r-pill);
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            text-decoration: none;
            transition: background 0.3s, color 0.4s, border-color 0.4s;
        }

        .navbar-scrolled .user-pill {
            color: var(--navy) !important;
            background: var(--blue-ghost);
            border-color: rgba(26,74,158,0.15);
        }

        .user-pill::after { display: none !important; }
        .user-pill:hover { background: rgba(255,255,255,0.2); }
        .navbar-scrolled .user-pill:hover { background: #d4e8ff; }

        .user-avatar {
            width: 26px; height: 26px;
            border-radius: 50%;
            background: var(--blue-main);
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 700; color: var(--white);
            flex-shrink: 0;
        }

        /* Dropdown */
        .dropdown-menu {
            border: 1px solid rgba(26,74,158,0.12) !important;
            border-radius: var(--r-md) !important;
            box-shadow: 0 12px 32px rgba(10,22,40,0.14) !important;
            padding: 6px !important;
            min-width: 160px;
        }

        .dropdown-item {
            border-radius: var(--r-sm) !important;
            font-size: 13.5px;
            color: #374151 !important;
            padding: 8px 14px !important;
            transition: background 0.18s !important;
        }

        .dropdown-item:hover {
            background: var(--blue-ghost) !important;
            color: var(--blue-main) !important;
        }

        /* Toggler */
        .navbar-toggler {
            border: 1.5px solid rgba(255,255,255,0.38) !important;
            border-radius: var(--r-sm) !important;
            padding: 5px 9px !important;
            transition: border-color 0.4s !important;
        }

        .navbar-scrolled .navbar-toggler {
            border-color: rgba(26,74,158,0.25) !important;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.18) !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        .navbar-scrolled .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231a4a9e' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        /* ════════════════════════════════════════
           SHARED UTILITIES
        ════════════════════════════════════════ */
        .section-label {
            display: block;
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--blue-pale);
            margin-bottom: 10px;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(24px, 4vw, 40px);
            font-weight: 700;
            color: var(--white);
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .section-rule {
            width: 44px;
            height: 2px;
            background: linear-gradient(90deg, var(--blue-main), var(--blue-pale));
            border-radius: 2px;
            margin: 0 auto;
        }

        .section-head {
            text-align: center;
            margin-bottom: clamp(32px, 6vw, 56px);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(93,146,232,0.14);
            border: 1px solid rgba(93,146,232,0.3);
            border-radius: var(--r-pill);
            padding: 6px 16px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue-mist);
            margin-bottom: 22px;
        }

        .eyebrow-dot {
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--blue-light);
            display: inline-block;
            flex-shrink: 0;
        }

        .card-base {
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: var(--r-lg);
            backdrop-filter: blur(8px);
            transition: transform 0.35s cubic-bezier(.34,1.56,.64,1),
                        box-shadow 0.35s ease,
                        border-color 0.3s ease;
        }

        .card-base:hover {
            transform: translateY(-8px);
            box-shadow: 0 28px 56px rgba(10,22,40,0.45);
            border-color: var(--border-hover);
        }

        .global-container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 clamp(16px, 4vw, 28px);
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes shimmerText {
            0%   { background-position: -200% center; }
            100% { background-position:  200% center; }
        }

        /* ════════════════════════════════════════
           FOOTER
        ════════════════════════════════════════ */
        .site-footer {
            background: var(--navy);
            color: var(--white);
            padding: clamp(48px, 8vw, 72px) 0 0;
            border-top: 1px solid rgba(93,146,232,0.12);
        }

        .footer-brand-logo {
            width: 48px; height: 48px;
            background: rgba(255,255,255,0.08);
            border-radius: var(--r-md);
            border: 1.5px solid rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-weight: 700; font-size: 14px; color: var(--white);
            flex-shrink: 0;
        }

        .footer-brand-name {
            font-family: var(--font-display);
            font-weight: 700; font-size: 16px;
            color: var(--white); margin: 0; line-height: 1.2;
        }

        .footer-brand-sub {
            font-size: 10.5px; color: var(--blue-pale);
            letter-spacing: 1.2px; text-transform: uppercase; font-weight: 300;
        }

        .footer-desc {
            font-size: 13.5px;
            color: var(--dim-3);
            line-height: 1.75; font-weight: 300;
            margin: 18px 0 22px;
        }

        .footer-socials { display: flex; gap: 9px; flex-wrap: wrap; }

        .footer-socials a {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--dim-2);
            font-size: 15px; text-decoration: none;
            transition: background 0.25s, color 0.25s, transform 0.2s;
        }

        .footer-socials a:hover {
            background: rgba(93,146,232,0.2);
            color: var(--blue-mist);
            transform: translateY(-3px);
        }

        .footer-heading {
            font-family: var(--font-display);
            font-size: 14px; font-weight: 700;
            color: var(--white); margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .footer-nav { list-style: none; padding: 0; margin: 0; }
        .footer-nav li { margin-bottom: 8px; }

        .footer-nav li a {
            color: var(--dim-3);
            text-decoration: none;
            font-size: 13.5px; font-weight: 300;
            display: flex; align-items: center; gap: 8px;
            transition: color 0.2s, gap 0.2s;
        }

        .footer-nav li a::before {
            content: '';
            width: 4px; height: 4px;
            border-radius: 50%;
            background: var(--blue-pale);
            opacity: 0.5; flex-shrink: 0;
            transition: opacity 0.2s;
        }

        .footer-nav li a:hover { color: var(--blue-mist); gap: 12px; }
        .footer-nav li a:hover::before { opacity: 1; }

        .footer-contact-item {
            display: flex; align-items: flex-start;
            gap: 12px; margin-bottom: 14px;
        }

        .footer-contact-icon {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: rgba(93,146,232,0.12);
            border: 1px solid rgba(93,146,232,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; color: var(--blue-pale);
            flex-shrink: 0; margin-top: 1px;
        }

        .footer-contact-text {
            font-size: 13px;
            color: var(--dim-3);
            font-weight: 300; line-height: 1.65;
        }

        .footer-contact-text a {
            color: var(--dim-3);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-contact-text a:hover { color: var(--blue-mist); }

        .footer-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.07);
            margin: clamp(32px, 5vw, 48px) 0 0;
        }

        .footer-bottom {
            padding: 20px 0;
            display: flex; justify-content: space-between;
            align-items: center; flex-wrap: wrap; gap: 10px;
        }

        .footer-copyright {
            font-size: 12.5px; color: rgba(255,255,255,0.30);
            font-weight: 300; margin: 0;
        }

        .footer-copyright .heart { color: #f87171; }

        .footer-built {
            font-size: 12.5px; color: rgba(255,255,255,0.30); margin: 0;
        }

        .footer-built strong { color: var(--blue-pale); font-weight: 500; }

        /* ════════════════════════════════════════
           RESPONSIVE UTILITIES
        ════════════════════════════════════════ */
        @media (max-width: 576px) {
            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 6px;
            }
            .eyebrow {
                font-size: 10px;
                letter-spacing: 1px;
                padding: 5px 12px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" id="mainNavbar">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-logo-wrap">
                <img src="/gambar/gbi.jpeg" alt="GBI Tambunan">
            </div>
            <div>
                <span class="brand-title">GBI Tambunan</span>
                <span class="brand-sub">Gereja Bethel Indonesia</span>
            </div>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#menuNav" aria-label="Toggle navigation"
                aria-expanded="false" aria-controls="menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.pengumuman') ? 'active' : '' }}"
                       href="{{ route('user.pengumuman') }}">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.jadwal') ? 'active' : '' }}"
                       href="{{ route('user.jadwal') }}">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.galeri') ? 'active' : '' }}"
                       href="{{ route('user.galeri') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.khotbah') ? 'active' : '' }}"
                       href="{{ route('user.khotbah') }}">Khotbah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.pelayanan') ? 'active' : '' }}"
                       href="{{ route('user.pelayanan') }}">Pelayanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.kontak') ? 'active' : '' }}"
                       href="{{ route('user.kontak') }}">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.tentang') ? 'active' : '' }}"
                       href="{{ route('user.tentang') }}">Tentang Kami</a>
                </li>

                @auth
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="user-pill dropdown-toggle" href="#" id="userMenu"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item ms-lg-2">
                    <a class="nav-link btn-nav-cta" href="{{ route('user.jemaat') }}">
                        Jadi Jemaat
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <div class="col-lg-4 col-md-12">
                <div class="d-flex align-items-center gap-3 mb-1">
                    <div class="footer-brand-logo">GBI</div>
                    <div>
                        <p class="footer-brand-name">GBI Tambunan</p>
                        <span class="footer-brand-sub">Gereja Bethel Indonesia</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Bersama membangun tubuh Kristus dalam kesatuan, kasih, dan pelayanan.
                    Bergabunglah dengan keluarga rohani kami.
                </p>
                <div class="footer-socials">
                    <a href="https://web.facebook.com/GBITAMBUNANN" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/gbitambunan_/" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@gbitambunan2080" target="_blank" rel="noopener" aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="col-6 col-lg-2 col-md-3">
                <h6 class="footer-heading">Menu</h6>
                <ul class="footer-nav">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('user.tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('user.jadwal') }}">Jadwal</a></li>
                    <li><a href="{{ route('user.galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('user.khotbah') }}">Khotbah</a></li>
                    <li><a href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2 col-md-3">
                <h6 class="footer-heading">Info</h6>
                <ul class="footer-nav">
                    <li><a href="{{ route('user.kontak') }}">Kontak</a></li>
                    <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a></li>
                    <li><a href="{{ route('user.jemaat') }}">Jadi Jemaat</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h6 class="footer-heading">Kontak Kami</h6>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="footer-contact-text">
                        Jl. Pasar Tambunan Desa No.4<br>
                        Lumban Pea, Kec. Balige<br>
                        Toba, Sumatera Utara
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="bi bi-telephone"></i></div>
                    <div class="footer-contact-text">
                        <a href="tel:+6285370385542">+62 853-7038-5542</a>
                    </div>
                </div>

                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="bi bi-envelope"></i></div>
                    <div class="footer-contact-text">
                        <a href="mailto:gbitambunan01@gmail.com">gbitambunan01@gmail.com</a>
                    </div>
                </div>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <p class="footer-copyright">
                © 2025 GBI Tambunan. All rights reserved. Made with <span class="heart">❤</span> for God's glory.
            </p>
            <p class="footer-built">Built with <strong>Team 05</strong></p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function () {
    const navbar = document.getElementById('mainNavbar');
    window.addEventListener('scroll', () => {
        requestAnimationFrame(() => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });
    }, { passive: true });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
})();
</script>

</body>
</html>