<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>GBI Tambunan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --blue-deep:  #020d1a;
            --blue-dark:  #071e3d;
            --blue-mid:   #0d3571;
            --blue-main:  #1a56b0;
            --blue-light: #4a8fd4;
            --blue-soft:  #93c5fd;
            --blue-pale:  #eff6ff;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
        }

        /* ================= NAVBAR ================= */
        .navbar-brand img {
            border-radius: 50%;
            object-fit: cover;
        }

        .menu-navbar .nav-link {
            font-weight: 500;
            margin-left: 8px;
            transition: 0.3s;
        }

        .menu-navbar .nav-link:hover {
            color: var(--blue-main) !important;
        }

        /* ================= FOOTER ================= */
        .site-footer {
            background: #020d1a;
            color: white;
            padding: 72px 0 0;
            position: relative;
            overflow: hidden;
        }

        .site-footer::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(26,86,176,0.22) 0%, transparent 70%);
            pointer-events: none;
        }

        .site-footer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(74,143,212,0.10) 0%, transparent 70%);
            pointer-events: none;
        }

        .footer-inner {
            position: relative;
            z-index: 1;
        }

        .footer-brand-logo {
            width: 52px;
            height: 52px;
            background: rgba(255,255,255,0.08);
            border-radius: 14px;
            border: 1.5px solid rgba(255,255,255,0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }

        .footer-brand-name {
            font-weight: 700;
            font-size: 20px;
            color: white;
            margin: 0;
            line-height: 1.2;
        }

        .footer-brand-sub {
            font-size: 11px;
            color: var(--blue-soft);
            letter-spacing: 1.2px;
            text-transform: uppercase;
            font-weight: 300;
        }

        .footer-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.55);
            line-height: 1.8;
            margin: 20px 0 24px;
        }

        .footer-socials {
            display: flex;
            gap: 10px;
        }

        .footer-socials a {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.11);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.65);
            font-size: 16px;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-socials a:hover {
            background: rgba(147,197,253,0.18);
            color: var(--blue-soft);
            transform: translateY(-3px);
        }

        .footer-heading {
            font-size: 17px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(26,86,176,0.28);
        }

        .footer-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-nav li {
            margin-bottom: 10px;
        }

        .footer-nav li a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .footer-nav li a:hover {
            color: var(--blue-soft);
            padding-left: 5px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 18px;
        }

        .footer-contact-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(147,197,253,0.10);
            border: 1px solid rgba(147,197,253,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blue-soft);
            flex-shrink: 0;
        }

        .footer-contact-text {
            font-size: 14px;
            color: rgba(255,255,255,0.55);
            line-height: 1.7;
        }

        .footer-contact-text a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
        }

        .footer-contact-text a:hover {
            color: var(--blue-soft);
        }

        .footer-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.08);
            margin: 50px 0 0;
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
            font-size: 13px;
            color: rgba(255,255,255,0.35);
            margin: 0;
        }

        .footer-built strong {
            color: var(--blue-soft);
        }

        .heart {
            color: #f87171;
        }

        @media(max-width:768px){
            .footer-bottom{
                flex-direction: column;
                text-align:center;
            }
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/gambar/gbi.jpeg" alt="GBI Tambunan" height="40">
            GBI TAMBUNAN
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto menu-navbar align-items-center">

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('user.tentang') }}">Tentang Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('user.jadwal') }}">Jadwal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('user.khotbah') }}">Khotbah</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('user.pelayanan') }}">Pelayanan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('user.pengumuman') }}">Pengumuman</a>
                </li>

                @auth
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userMenu"
                       role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white ms-3 px-3"
                       href="{{ route('user.jemaat') }}">
                        Jadi Jemaat
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<!-- ================= CONTENT ================= -->
@yield('content')

<!-- ================= FOOTER ================= -->
<footer class="site-footer">

    <div class="container footer-inner">

        <div class="row g-5">

            <!-- Brand -->
            <div class="col-lg-4 col-md-6">

                <div class="d-flex align-items-center gap-3 mb-2">

                    <div class="footer-brand-logo">
                        GBI
                    </div>

                    <div>
                        <p class="footer-brand-name">GBI Tambunan</p>
                        <span class="footer-brand-sub">
                            Gereja Bethel Indonesia
                        </span>
                    </div>

                </div>

                <p class="footer-desc">
                    Bersama membangun tubuh Kristus dalam kesatuan,
                    kasih, dan pelayanan. Bergabunglah dengan keluarga
                    rohani kami.
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

                </div>
            </div>

            <!-- Menu -->
            <div class="col-lg-2 col-md-3 col-6">

                <h6 class="footer-heading">Menu</h6>

                <ul class="footer-nav">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('user.tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('user.jadwal') }}">Jadwal</a></li>
                    <li><a href="{{ route('user.khotbah') }}">Khotbah</a></li>
                    <li><a href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
                    <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>

            </div>

            <!-- Info -->
            <div class="col-lg-2 col-md-3 col-6">

                <h6 class="footer-heading">Info</h6>

                <ul class="footer-nav">
                    <li><a href="{{ route('user.kontak') }}">Kontak</a></li>
                    <li><a href="{{ route('user.jemaat') }}">Jadi Jemaat</a></li>
                </ul>

            </div>

            <!-- Kontak -->
            <div class="col-lg-4 col-md-6">

                <h6 class="footer-heading">Kontak Kami</h6>

                <div class="footer-contact-item">

                    <div class="footer-contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <div class="footer-contact-text">
                        Jl. Pasar Tambunan Desa No.4 <br>
                        Lumban Pea, Kec. Balige <br>
                        Toba, Sumatera Utara
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
                All rights reserved.
                Made with <span class="heart">❤</span>
                for God's glory.
            </p>

            <p class="footer-built">
                Built with <strong>Team 05</strong>
            </p>

        </div>

    </div>

</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>