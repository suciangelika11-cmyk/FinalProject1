<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pelayan - GBI Tambunan')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donation.css') }}">

    <style>
        body {
            padding-top: 70px;
        }

        .navbar {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: #ffffff !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08) !important;
        }

        .navbar-brand {
            font-weight: 900 !important;
            font-size: 1.3rem;
            color: #60a5fa !important;
        }

        .navbar-brand:hover {
            transform: scale(1.03);
        }

        .navbar-brand img {
            margin-right: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(96, 165, 250, 0.25);
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            color: #1f2937 !important;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 6px;
            padding: 8px 12px !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 2.5px;
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            border-radius: 2px;
            transform: translateX(-50%);
            transition: width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .navbar-nav .nav-link:hover {
            color: #1f2937 !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 70%;
        }

        .navbar-nav .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%) !important;
            border: none !important;
            border-radius: 50px !important;
            font-weight: 800 !important;
            padding: 10px 28px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3) !important;
        }

        .navbar-nav .btn-primary:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4) !important;
        }

        .navbar-toggler {
            border-color: rgba(96, 165, 250, 0.3) !important;
            width: 40px;
            height: 40px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(96, 165, 250, 0.25) !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%2360a5fa' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        .navbar-nav .dropdown-menu {
            border: 1px solid rgba(96, 165, 250, 0.1) !important;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15) !important;
            border-radius: 12px !important;
            background: white !important;
        }

        .navbar-nav .dropdown-item {
            color: #475569 !important;
        }

        .navbar-nav .dropdown-item:hover {
            background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 100%) !important;
            color: #3b82f6 !important;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 120px;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" id="pelayanNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pelayan.home') }}">
            <i class="bi bi-house-fill"></i> Pelayan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pelayanMenu" aria-controls="pelayanMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="pelayanMenu">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.home') ? 'active' : '' }}" href="{{ route('pelayan.home') }}"><i class="bi bi-house-door-fill"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.jadwal_ibadah') ? 'active' : '' }}" href="{{ route('pelayan.jadwal_ibadah') }}"><i class="bi bi-calendar-event-fill"></i> Jadwal Ibadah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.kegiatan_pelayan') ? 'active' : '' }}" href="{{ route('pelayan.kegiatan_pelayan') }}"><i class="bi bi-calendar-check-fill"></i> Kegiatan Pelayan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.absensi') ? 'active' : '' }}" href="{{ route('pelayan.absensi') }}"><i class="bi bi-check2-square"></i> Absensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.khotbah') ? 'active' : '' }}" href="{{ route('pelayan.khotbah') }}"><i class="bi bi-journal-bookmark-fill"></i> Khotbah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.pengumuman') ? 'active' : '' }}" href="{{ route('pelayan.pengumuman') }}"><i class="bi bi-bell-fill"></i> Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->routeIs('pelayan.tentang') ? 'active' : '' }}" href="{{ route('pelayan.tentang') }}"><i class="bi bi-info-circle-fill"></i> Tentang Kami</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="pelayanProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="pelayanProfile">
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
