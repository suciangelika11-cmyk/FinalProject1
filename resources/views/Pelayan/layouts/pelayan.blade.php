<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pelayan - GBI Tambunan')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --navy: #0a1628;
            --blue-main: #769FCD;
            --blue-mid: #B9D7EA;
            --blue-light: #D6E6F2;
            --blue-pale: #F7FBFC;
            --blue-ghost: #F7FBFC;
            --white: #ffffff;

            --bg-card: rgba(118, 159, 205, 0.08);
            --border-card: rgba(118, 159, 205, 0.2);

            --font-display: 'Playfair Display', serif;
            --font-body: 'DM Sans', sans-serif;

            --r-sm: 8px;
            --r-md: 14px;
            --r-lg: 20px;
            --r-pill: 999px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: #f5f7fa;
            color: #0a1628;
            padding-top: 75px;
            overflow-x: hidden;
        }

        /* ═════════ NAVBAR ═════════ */
        #mainNavbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 14px 0;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(118, 159, 205, 0.15);
            backdrop-filter: blur(18px);
            transition: 0.4s;
            box-shadow: 0 2px 12px rgba(118, 159, 205, 0.08);
        }

        #mainNavbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 32px rgba(118, 159, 205, 0.12);
            padding: 10px 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo-wrap {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(118, 159, 205, 0.3);
        }

        .brand-logo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-title {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            color: #769FCD;
            transition: 0.4s;
        }

        #mainNavbar.scrolled .brand-title {
            color: #769FCD;
        }

        .brand-sub {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #B9D7EA;
        }

        #mainNavbar.scrolled .brand-sub {
            color: #B9D7EA;
        }

        .navbar-nav .nav-link {
            color: #0a1628 !important;
            font-size: 13.5px;
            font-weight: 500;
            padding: 6px 10px !important;
            position: relative;
            transition: 0.3s;
        }

        #mainNavbar.scrolled .nav-link {
            color: #0a1628 !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 2px;
            background: #769FCD;
            transform: translateX(-50%);
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 60%;
        }

        .navbar-nav .nav-link:hover {
            color: #769FCD !important;
        }

        #mainNavbar.scrolled .nav-link:hover {
            color: #769FCD !important;
        }

        /* USER */
        .user-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #D6E6F2;
            border: 1px solid #B9D7EA;
            border-radius: 999px;
            padding: 5px 14px 5px 5px !important;
            color: #0a1628 !important;
            text-decoration: none;
            font-size: 13px;
        }

        #mainNavbar.scrolled .user-pill {
            background: #D6E6F2;
            color: #0a1628 !important;
            border-color: #B9D7EA;
        }

        .user-pill::after {
            display: none !important;
        }

        .user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #769FCD;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        /* TOGGLER */
        .navbar-toggler {
            border: 1.5px solid #769FCD !important;
            padding: 5px 9px !important;
        }

        .navbar-toggler:focus {
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23769FCD' stroke-linecap='round' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        #mainNavbar.scrolled .navbar-toggler-icon {
            background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23769FCD' stroke-linecap='round' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e\");
        }

        .qris-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* DROPDOWN */
        .dropdown-menu {
            border: none;
            border-radius: 14px;
            padding: 8px;
            background: #ffffff;
            box-shadow: 0 12px 32px rgba(118, 159, 205, 0.15);
        }

        .dropdown-item {
            border-radius: 10px;
            font-size: 13px;
            padding: 9px 14px;
            color: #0a1628;
        }

        .dropdown-item:hover {
            background: #D6E6F2;
            color: #769FCD;
        }

        /* CONTENT */
        .main-content {
            min-height: 70vh;
        }

        /* ═════════ FOOTER ═════════ */
        .site-footer {
            background: #6B8DAE;
            padding: 70px 0 0;
            margin-top: 80px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
        }

        .footer-brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .footer-brand-name {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            color: white;
        }

        .footer-brand-sub {
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-desc {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.8;
            font-size: 13px;
            margin: 18px 0;
        }

        .footer-socials {
            display: flex;
            gap: 10px;
        }

        .footer-socials a {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.3s;
            text-decoration: none;
        }

        .footer-socials a:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: white;
            transform: translateY(-3px);
        }

        .footer-heading {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 18px;
            color: white;
        }

        .footer-nav {
            list-style: none;
            padding: 0;
        }

        .footer-nav li {
            margin-bottom: 10px;
        }

        .footer-nav a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-nav a:hover {
            color: white;
        }

        .footer-contact-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .footer-contact-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.9);
        }

        .footer-contact-text {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.7;
        }

        .footer-contact-text a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-contact-text a:hover {
            color: white;
            text-decoration: underline;
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, 0.1);
            margin-top: 45px;
        }

        .footer-bottom {
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer-copyright,
        .footer-built {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .heart {
            color: #f87171;
        }

        .hero {
            position: relative;
            min-height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            padding: 100px 24px 120px;
            background: var(--ink-mid);
        }

        @media(max-width:991px) {

            .navbar-collapse {
                margin-top: 16px;
                background: rgba(255, 255, 255, 0.98);
                padding: 20px;
                border-radius: 20px;
            }

            #mainNavbar.scrolled .navbar-collapse {
                background: white;
            }

            .navbar-nav {
                gap: 10px;
            }

            .brand-title {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const audio = document.getElementById('bg-music');

            const lastTime = localStorage.getItem('musicTime');

            if (lastTime) {
                audio.currentTime = parseFloat(lastTime);
            }

            function enableAudio() {
                audio.muted = false;
                audio.play();

                window.removeEventListener('click', enableAudio);
                window.removeEventListener('keydown', enableAudio);
            }

            window.addEventListener('click', enableAudio);
            window.addEventListener('keydown', enableAudio);

            setInterval(() => {
                localStorage.setItem('musicTime', audio.currentTime);
            }, 1000);
        });
    </script>

    <!-- ═════════ NAVBAR ═════════ -->
    <nav class="navbar navbar-expand-lg" id="mainNavbar">

        <div class="container">

            <a class="navbar-brand" href="{{ route('pelayan.home') }}">

                <div class="brand-logo-wrap">
                    <img src="/gambar/gbi.jpeg" alt="GBI">
                </div>

                <div>
                    <span class="brand-title">Pelayan GBI</span><br>
                    <span class="brand-sub">GBI Tambunan</span>
                </div>

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pelayanMenu">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="pelayanMenu">

                <ul class="navbar-nav mx-auto align-items-center gap-1">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.home') ? 'active' : '' }}"
                            href="{{ route('pelayan.home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.jadwal_ibadah') ? 'active' : '' }}"
                            href="{{ route('pelayan.jadwal_ibadah') }}">
                            Jadwal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.kegiatan_pelayan') ? 'active' : '' }}"
                            href="{{ route('pelayan.kegiatan_pelayan') }}">
                            Kegiatan Pelayanan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.absensi') ? 'active' : '' }}"
                            href="{{ route('pelayan.absensi') }}">
                            Absensi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.khotbah') ? 'active' : '' }}"
                            href="{{ route('pelayan.khotbah') }}">
                            Khotbah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.pengumuman') ? 'active' : '' }}"
                            href="{{ route('pelayan.pengumuman') }}">
                            Pengumuman
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelayan.tentang') ? 'active' : '' }}"
                            href="{{ route('pelayan.tentang') }}">
                            Tentang
                        </a>
                    </li>

                </ul>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">

                        <a class="user-pill dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- ═════════ CONTENT ═════════ -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- ═════════ FOOTER ═════════ -->
    <footer class="site-footer">

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="footer-brand-logo">
                            <img src="/gambar/logo-gbi-official.png" alt="GBI Tambunan">
                        </div>

                        <div>
                            <p class="footer-brand-name">
                                GBI Tambunan
                            </p>

                            <span class="footer-brand-sub">
                                Gereja Bethel Indonesia
                            </span>
                        </div>

                    </div>

                    <p class="footer-desc">
                        Bersama membangun tubuh Kristus dalam kesatuan,
                        kasih, dan pelayanan.
                    </p>

                    <div class="footer-socials">

                        <a href="https://web.facebook.com/GBITAMBUNANN" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/gbitambunan_/" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="https://www.youtube.com/@gbitambunan2080" target="_blank">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@gbi.tambunan" target="_blank">
                            <i class="bi bi-tiktok"></i>
                        </a>

                    </div>

                </div>

                <div class="col-lg-2">

                    <h6 class="footer-heading">
                        Menu
                    </h6>

                    <ul class="footer-nav">

                        <li>
                            <a href="{{ route('pelayan.home') }}">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pelayan.jadwal_ibadah') }}">
                                Jadwal
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pelayan.kegiatan_pelayan') }}">
                                Kegiatan Pelayanan
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pelayan.absensi') }}">
                                Absensi
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="col-lg-2">

                    <h6 class="footer-heading">
                        Info
                    </h6>

                    <ul class="footer-nav">

                        <li>
                            <a href="{{ route('pelayan.pengumuman') }}">
                                Pengumuman
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pelayan.tentang') }}">
                                Tentang
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="col-lg-4">

                    <h6 class="footer-heading">
                        Kontak
                    </h6>

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div class="footer-contact-text">
                            Jl. Pasar Tambunan Desa No.4<br>
                            Lumban Pea, Balige
                        </div>

                    </div>

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div class="footer-contact-text">
                            <a href="tel:+6285370385542">
                                +62 853-7038-5542
                            </a>
                        </div>

                    </div>

                    <div class="footer-contact-item">

                        <div class="footer-contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div class="footer-contact-text">
                            <a href="mailto:gbitambunan01@gmail.com">
                                gbitambunan01@gmail.com
                            </a>
                        </div>

                    </div>

                </div>

            </div>

            <hr class="footer-divider">

            <div class="footer-bottom">

                <p class="footer-copyright">
                    © 2025 GBI Tambunan.
                    Made with <span class="heart">❤</span>
                </p>

                <p class="footer-built">
                    Built by <strong>Team 05 PA I - IT Del</strong>
                </p>

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

        })();
    </script>

</body>

</html>