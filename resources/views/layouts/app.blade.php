<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>GBI Tambunan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donation.css') }}">
    
    <style>
        /* Navbar premium styling */
        .navbar {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: transparent !important;
            box-shadow: none !important;
            transform: translateY(0);
            border-bottom: none !important;
        }

        .navbar.scrolling {
            background: transparent !important;
            border-bottom: none !important;
        }

        .navbar.scrolled {
            background: transparent !important;
            box-shadow: none !important;
            border-bottom: none !important;
        }

        .navbar.hidden {
            transform: translateY(-120%);
            opacity: 0;
        }

        .navbar.visible {
            transform: translateY(0);
            opacity: 1;
        }

        body {
            padding-top: 60px;
        }

        .navbar-brand {
            font-weight: 900 !important;
            font-size: 1.3rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand img {
            margin-right: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.25);
        }

        /* Menu Link Styles */
        .navbar-nav .nav-link {
            font-weight: 600;
            color: #475569 !important;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 8px;
            padding: 8px 12px !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 2.5px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
            transform: translateX(-50%);
            transition: width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .navbar-nav .nav-link:hover {
            color: #667eea !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link:hover::after {
            width: 70%;
        }

        /* Primary Button Styling */
        .navbar-nav .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none !important;
            border-radius: 50px !important;
            font-weight: 800 !important;
            padding: 10px 28px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3) !important;
        }

        .navbar-nav .btn-primary:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4) !important;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border: 1px solid rgba(102, 126, 234, 0.1) !important;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15) !important;
            border-radius: 12px !important;
            background: white !important;
        }

        .dropdown-item {
            color: #475569 !important;
            transition: all 0.2s ease !important;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 100%) !important;
            color: #667eea !important;
        }

        /* Navbar Toggle */
        .navbar-toggler {
            border-color: rgba(102, 126, 234, 0.3) !important;
            width: 40px;
            height: 40px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25) !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23667eea' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }
    </style>
</head>
<body>

<!-- Musik Otomatis Global -->
<audio id="bg-music" src="{{ asset('audio/Yesusku Kau Terindah - OFFICIAL MUSIC VIDEO (1).mp3') }}" autoplay loop muted hidden></audio>
<script>
// Unmute audio setelah user berinteraksi (agar autoplay berjalan di semua browser)
document.addEventListener('DOMContentLoaded', function() {
    const audio = document.getElementById('bg-music');
    // Ambil posisi terakhir dari localStorage
    const lastTime = localStorage.getItem('musicTime');
    if (lastTime) {
        audio.pause();
        audio.currentTime = parseFloat(lastTime);
    }
    // Setelah seek, baru play dan unmute setelah user interaksi
    function enableAudio() {
        if (audio) {
            audio.muted = false;
            audio.play();
        }
        window.removeEventListener('click', enableAudio);
        window.removeEventListener('keydown', enableAudio);
    }
    window.addEventListener('click', enableAudio);
    window.addEventListener('keydown', enableAudio);
    // Simpan posisi setiap detik
    setInterval(() => {
        localStorage.setItem('musicTime', audio.currentTime);
    }, 1000);
});
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" id="mainNavbar">
<div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="/gambar/gbi.jpeg" alt="GBI Tambunan" height="40"> GBI TAMBUNAN</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto menu-navbar align-items-center">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.tentang') }}">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.jadwal') }}">Jadwal</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.galeri') }}">Galeri</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.khotbah') }}">Khotbah</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.kontak') }}">Kontak</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.pengumuman') }}">Pengumuman</a></li>

            @auth
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth

            <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-3" href="{{ route('user.jemaat') }}">Jadi Jemaat</a></li>
        </ul>
    </div>
</div>
</nav>

@yield('content')

<footer class="text-white py-5">
<div class="container">
    <div class="row mb-5">
        <!-- Left Column -->
        <div class="col-md-4 mb-4 mb-md-0 footer-section">
            <div class="mb-4">
                <div class="footer-logo-box">
                    <div class="logo-icon">
                        <span>GBI</span>
                    </div>
                    <div>
                        <h5 style="font-weight: 700; margin-bottom: 2px;">GBI Tambunan</h5>
                        <small style="color: #b0b9c6;">Gereja Bethel Indonesia</small>
                    </div>
                </div>
            </div>
            <p class="footer-desc">Bersama membangun tubuh Kristus dalam kesatuan, kasih, dan pelayanan. Bergabunglah dengan keluarga rohani kami.</p>
            <div class="social-links">
                <a href="https://web.facebook.com/GBITAMBUNANN?rdid=zpGHgA8KUOTtVrdh&share_url=https%253A%252F%252Fweb.facebook.com%252Fshare%252F1B1rxgFbQi%252F%253F_rdc%253D1%2526_rdr#"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/gbitambunan_/"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@gbitambunan2080"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="col-md-4 mb-4 mb-md-0 footer-section">
            <h5>Menu</h5>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('user.tentang') }}">Tentang Kami</a></li>
                <li><a href="{{ route('user.jadwal') }}">Jadwal</a></li>
                <li><a href="{{ route('user.galeri') }}">Galeri</a></li>
                <li><a href="{{ route('user.khotbah') }}">Khotbah</a></li>
                <li><a href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>

        <!-- Right Column -->
        <div class="col-md-4 footer-section">
            <h5>Kontak</h5>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <small style="color: #b0b9c6; line-height: 1.6;">Jl. Pasar Tambunan Desa No.4<br>Lumban Pea, Kec. Balige<br>Toba, Sumatera Utara</small>
                </div>
            </div>

            <div class="contact-item flex-center">
                <div class="contact-icon">
                    <i class="bi bi-telephone"></i>
                </div>
                <div>
                    <a href="tel:+6285370385542" class="text-white text-decoration-none" style="color: #b0b9c6;">+62 853-7038-5542</a>
                </div>
            </div>

            <div class="contact-item flex-center">
                <div class="contact-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <a href="mailto:gbitambunan01@gmail.com" class="text-white text-decoration-none" style="color: #b0b9c6;">gbitambunan01@gmail.com</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="footer-divider">

    <!-- Bottom Section -->
    <div class="footer-bottom">
        <p class="copyright">© 2025 GBI Tambunan. All rights reserved. Made with <span class="heart">❤</span> for God's glory.</p>
        <p class="built-with">Built with <strong>Team 05</strong></p>
    </div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scroll-animations.js') }}"></script>

<script>
    // Enhanced navbar scroll animation dengan smooth behavior
    const navbar = document.getElementById('mainNavbar');
    let lastScrollTop = 0;
    let lastScrollTime = 0;
    let scrollVelocity = 0;
    let scrollTimeout;
    const scrollThreshold = 5;
    const hideThreshold = 100;

    window.addEventListener('scroll', () => {
        requestAnimationFrame(() => {
            const scrollTop = window.scrollY;
            const currentTime = Date.now();
            const timeDelta = currentTime - lastScrollTime;
            
            // Hitung scroll velocity untuk smooth animation
            if (timeDelta > 0) {
                scrollVelocity = (scrollTop - lastScrollTop) / timeDelta;
            }

            // Add scrolling class saat sedang scroll
            navbar.classList.add('scrolling');
            
            // Clear timeout sebelumnya
            clearTimeout(scrollTimeout);
            
            // Remove scrolling class setelah selesai scroll
            scrollTimeout = setTimeout(() => {
                navbar.classList.remove('scrolling');
            }, 150);

            // Add/remove scrolled class untuk background transition yang lebih solid
            if (scrollTop > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.remove('hidden');
                navbar.classList.add('visible');
            }

            // Show/hide navbar berdasarkan scroll direction
            if (scrollTop > hideThreshold) {
                if (scrollTop > lastScrollTop && scrollVelocity > 0.2) {
                    // Scrolling DOWN dengan kecepatan - hide navbar
                    navbar.classList.add('hidden');
                    navbar.classList.remove('visible');
                } else if (scrollTop < lastScrollTop || scrollVelocity < -0.1) {
                    // Scrolling UP - show navbar
                    navbar.classList.remove('hidden');
                    navbar.classList.add('visible');
                }
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            lastScrollTime = currentTime;
        });
    }, { passive: true });

    // Smooth scroll behavior untuk links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

</body>
</html>
