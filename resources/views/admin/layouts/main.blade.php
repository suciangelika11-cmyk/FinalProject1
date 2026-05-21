<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin – GBI Tambunan</title>

  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

  @php
    use App\Models\Jemaat;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    $authUser = Auth::user();

    $displayRole = match ($authUser->role ?? '') {
      'admin' => 'Admin',
      'pelayanan' => 'Pelayanan',
      default => 'Administrator',
    };

    $displayName = $authUser->name ?? 'Admin GBI';

    $displayPhoto = null;

    if (!empty($authUser->foto) && Storage::disk('public')->exists($authUser->foto)) {
      $displayPhoto = Storage::url($authUser->foto);
    }

    $pendingJemaatCount = Jemaat::where('status', 'pending')->count();

    $words = preg_split('/\s+/', trim($displayName));
    $initials = '';

    if (!empty($words)) {
      foreach ($words as $word) {
        if (!empty($word)) {
          $initials .= strtoupper(substr($word, 0, 1));
        }

        if (strlen($initials) >= 2) {
          break;
        }
      }
    }

    $initials = $initials ?: 'A';
  @endphp

  <style>
    :root {
      --bg: #f4f6f9;
      --white: #ffffff;
      --border: #e4e8ef;
      --border2: #d0d7e3;
      --text: #1a2233;
      --muted: #7a8499;
      --cyan: #1da8e0;
      --cyan-dk: #0d85b5;
      --cyan-lt: #e8f6fd;
      --gold: #c89b3c;
      --gold-lt: #fdf6e3;
      --danger: #e05555;
      --danger-lt: #fdf0f0;
      --success: #2ea86a;
      --success-lt: #e8f7ef;
      --purple: #8b5cf6;
      --purple-lt: #f3f0ff;
      --sidebar: #1e2430;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: var(--bg);
      font-family: 'Nunito', sans-serif;
      color: var(--text);
      min-height: 100vh;
    }

    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 200;
      height: 66px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px 0 0;
      background: var(--white);
      border-bottom: 1px solid var(--border);
      box-shadow: 0 1px 12px rgba(0, 0, 0, .08);
    }

    .topbar-left {
      display: flex;
      align-items: center;
      width: 250px;
      height: 100%;
      flex-shrink: 0;
      background: var(--white);
      padding: 0 18px;
      border-right: 1px solid var(--border);
    }

    .hamburger {
      background: none;
      border: none;
      color: var(--muted);
      font-size: 20px;
      cursor: pointer;
      margin-right: 12px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }

    .brand-logo {
      width: 38px;
      height: 38px;
      background: linear-gradient(135deg, var(--cyan), var(--gold));
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Rajdhani', sans-serif;
      font-weight: 700;
      font-size: 14px;
      color: #fff;
      flex-shrink: 0;
    }

    .brand-name {
      font-family: 'Rajdhani', sans-serif;
      font-size: 18px;
      font-weight: 800;
      color: var(--text);
    }

    .brand-name span {
      color: var(--cyan);
    }

    .topbar-nav {
      display: flex;
      align-items: center;
      gap: 6px;
      flex: 1;
      padding: 0 14px;
      overflow-x: auto;
      white-space: nowrap;
    }

    .topbar-nav::-webkit-scrollbar {
      height: 0;
    }

    .topbar-nav a {
      color: var(--muted);
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      padding: 9px 11px;
      border-radius: 8px;
      transition: all .18s;
      flex-shrink: 0;
    }

    .topbar-nav a:hover {
      color: var(--text);
      background: #f0f2f5;
    }

    .topbar-nav a.active {
      color: var(--cyan);
      background: var(--cyan-lt);
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-shrink: 0;
    }

    .btn-viewsite {
      background: var(--cyan-lt);
      border: 1px solid rgba(29, 168, 224, .3);
      color: var(--cyan);
      font-family: 'Nunito', sans-serif;
      font-size: 13px;
      font-weight: 700;
      padding: 8px 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: all .18s;
    }

    .btn-viewsite:hover {
      background: var(--cyan);
      color: #fff;
    }

    .topbar-register {
      display: flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      color: var(--muted);
      font-size: 13px;
      font-weight: 700;
      white-space: nowrap;
    }

    .topbar-register .bell {
      display: inline-flex;
      width: 30px;
      height: 30px;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background: rgba(29, 168, 224, .1);
    }

    .avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), var(--cyan));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 700;
      color: #fff;
      cursor: pointer;
      overflow: hidden;
      text-transform: uppercase;
      text-decoration: none;
    }

    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      display: block;
    }

    .sidebar {
      position: fixed;
      top: 66px;
      left: 0;
      bottom: 0;
      width: 240px;
      background: var(--sidebar);
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      z-index: 100;
      transition: transform .25s ease;
      transform: translateX(0);
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    .sidebar-user {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 18px 18px 14px;
      border-bottom: 1px solid rgba(255, 255, 255, .07);
    }

    .sidebar-user .ava {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), var(--cyan));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0;
      overflow: hidden;
      text-transform: uppercase;
    }

    .sidebar-user .ava img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      display: block;
    }

    .sidebar-user .info strong {
      display: block;
      font-size: 14px;
      font-weight: 700;
      color: #fff;
    }

    .sidebar-user .info span {
      font-size: 11px;
      color: var(--cyan);
    }

    .sidebar-search {
      display: flex;
      align-items: center;
      gap: 8px;
      margin: 12px 14px;
      background: rgba(255, 255, 255, .07);
      border: 1px solid rgba(255, 255, 255, .1);
      border-radius: 7px;
      padding: 7px 12px;
    }

    .sidebar-search input {
      background: none;
      border: none;
      outline: none;
      color: #fff;
      font-family: 'Nunito', sans-serif;
      font-size: 13px;
      flex: 1;
    }

    .sidebar-search input::placeholder {
      color: rgba(255, 255, 255, .3);
    }

    .nav-section {
      padding: 10px 18px 4px;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1.4px;
      color: rgba(255, 255, 255, .25);
      text-transform: uppercase;
    }

    .sidebar nav a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 18px;
      font-size: 13.5px;
      font-weight: 600;
      line-height: 1.3;
      color: rgba(255, 255, 255, .5);
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all .15s;
    }

    .sidebar nav a .ico {
      flex-shrink: 0;
    }

    .sidebar nav a span:not(.ico) {
      min-width: 0;
    }

    .sidebar nav a:hover {
      color: #fff;
      background: rgba(255, 255, 255, .06);
    }

    .sidebar nav a.active {
      color: #fff;
      border-left-color: var(--cyan);
      background: rgba(29, 168, 224, .15);
    }

    .sidebar nav a .ico {
      font-size: 15px;
      width: 20px;
      text-align: center;
    }

    .sidebar-footer {
      margin-top: auto;
      padding: 14px 18px;
      border-top: 1px solid rgba(255, 255, 255, .07);
      font-size: 11px;
      color: rgba(255, 255, 255, .3);
    }

    .sidebar-footer strong {
      color: rgba(255, 255, 255, .6);
      display: block;
    }

    .sidebar-backdrop {
      position: fixed;
      inset: 66px 0 0 0;
      background: rgba(0, 0, 0, .35);
      opacity: 0;
      visibility: hidden;
      transition: opacity .2s ease, visibility .2s ease;
      z-index: 105;
      pointer-events: none;
    }

    body.sidebar-open .sidebar-backdrop {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
    }

    .wrapper {
      margin-left: 240px;
      padding-top: 66px;
      min-height: 100vh;
      transition: margin-left .25s ease;
      width: calc(100% - 240px);
    }

    .wrapper.sidebar-closed {
      margin-left: 0;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-track {
      background: var(--bg);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--border2);
      border-radius: 3px;
    }

    @media(max-width:900px) {

      .topbar {
        height: 64px;
        padding: 0 10px;
      }

      .topbar-left {
        width: auto;
        padding: 0;
        border-right: none;
        flex: 1;
      }

      .hamburger {
        display: inline-flex;
        width: 36px;
        height: 36px;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
        border-radius: 8px;
        font-size: 22px;
        background: transparent;
      }

      .brand-logo {
        width: 34px;
        height: 34px;
        font-size: 12px;
      }

      .brand-name {
        font-size: 15px;
        white-space: nowrap;
      }

      .topbar-nav {
        display: none;
      }

      .topbar-right {
        gap: 6px;
      }

      .topbar-right a span:nth-child(2),
      .btn-viewsite {
        display: none !important;
      }

      .avatar {
        width: 32px;
        height: 32px;
      }

      .sidebar {
        top: 64px;
        left: 0;
        bottom: 0;
        width: 270px;
        max-width: 82vw;
        transform: translateX(-100%);
        z-index: 300;
        box-shadow: 12px 0 30px rgba(0, 0, 0, .25);
      }

      .sidebar.open {
        transform: translateX(0);
      }

      .sidebar-backdrop {
        inset: 64px 0 0 0;
        z-index: 250;
        background: rgba(0, 0, 0, .45);
      }

      .wrapper {
        margin-left: 0;
        padding-top: 64px;
        width: 100%;
      }

      body.sidebar-open {
        overflow: hidden;
      }
    }

    @media(max-width:480px) {

      .brand-name {
        font-size: 13px;
      }

      .sidebar {
        width: 255px;
      }

      .sidebar-user {
        padding: 14px;
      }

      .sidebar nav a {
        padding: 9px 14px;
        font-size: 12.5px;
      }

      .sidebar-search {
        margin: 10px 12px;
      }
    }
  </style>

  @stack('styles')
</head>

<body>

  <header class="topbar">
    <div class="topbar-left">
      <button class="hamburger" type="button" aria-label="Toggle sidebar">☰</button>

      <a class="brand" href="{{ route('admin.dashboard') }}">
        <div class="brand-logo">GBI</div>
        <span class="brand-name">GBI <span>Tambunan</span></span>
      </a>
    </div>

    <nav class="topbar-nav">
      <a href="{{ route('admin.dashboard') }}" @if(request()->routeIs('admin.dashboard')) class="active"
      @endif>Beranda</a>
      <a href="{{ route('tentang.index') }}" @if(request()->routeIs('tentang.*')) class="active" @endif>Tentang Kami</a>
      <a href="{{ route('jadwal.index') }}" @if(request()->routeIs('jadwal.*')) class="active" @endif>Jadwal Ibadah</a>
      <a href="{{ route('absensi.index') }}" @if(request()->routeIs('absensi.*')) class="active" @endif>Absensi</a>
      <a href="{{ route('galeri.index') }}" @if(request()->routeIs('galeri.*')) class="active" @endif>Galeri</a>
      <a href="{{ route('khotbah.index') }}" @if(request()->routeIs('khotbah.*')) class="active" @endif>Khotbah</a>
      <a href="{{ route('pelayanan.index') }}" @if(request()->routeIs('pelayanan.*')) class="active"
      @endif>Pelayanan</a>
      <a href="{{ route('kegiatan.index') }}" @if(request()->routeIs('kegiatan.*')) class="active" @endif>Kegiatan
        Pelayanan</a>
      <a href="{{ route('kontak.index') }}" @if(request()->routeIs('kontak.*')) class="active" @endif>Kontak</a>
      <a href="{{ route('pengumuman.index') }}" @if(request()->routeIs('pengumuman.*')) class="active"
      @endif>Pengumuman</a>
      <a href="{{ route('accounts.index') }}" @if(request()->routeIs('accounts.*')) class="active" @endif>Akun</a>
    </nav>

    <div class="topbar-right">
      <a href="{{ route('jemaat.index') }}"
        style="display:flex; align-items:center; gap:6px; text-decoration:none; color:var(--muted); font-size:14px; font-weight:700;">
        <span
          style="display:inline-flex; width:30px; height:30px; align-items:center; justify-content:center; border-radius:50%; background:rgba(29,168,224,.1);">🔔</span>

        <span>Pendaftaran</span>

        @if($pendingJemaatCount > 0)
          <span style="background:#ef4444; color:#fff; padding:4px 8px; border-radius:999px; font-size:12px;">
            {{ $pendingJemaatCount }}
          </span>
        @endif
      </a>

      <button class="btn-viewsite" onclick="window.open('{{ route('home') }}','_blank')">
        🌐 Lihat Website
      </button>

      <a href="{{ route('profil.index') }}" class="avatar">
        @if($displayPhoto)
          <img src="{{ $displayPhoto }}" alt="{{ $displayName }}">
        @else
          {{ $initials }}
        @endif
      </a>
    </div>
  </header>

  <aside class="sidebar">

    <div class="sidebar-user">
      <div class="ava">
        @if($displayPhoto)
          <img src="{{ $displayPhoto }}" alt="{{ $displayName }}">
        @else
          {{ $initials }}
        @endif
      </div>

      <div class="info">
        <strong>{{ $displayName }}</strong>
        <span>{{ $displayRole }}</span>
      </div>
    </div>

    <div class="nav-section">Menu Utama</div>

    <nav>
      <a href="{{ route('admin.dashboard') }}" @if(request()->routeIs('admin.dashboard')) class="active" @endif>
        <span class="ico"><i class="ri-dashboard-line"></i></span> Dashboard
      </a>

      <a href="{{ route('tentang.index') }}" @if(request()->routeIs('tentang.*')) class="active" @endif>
        <span class="ico"><i class="ri-information-line"></i></span>Tentang Kami
      </a>

      <a href="{{ route('jadwal.index') }}" @if(request()->routeIs('jadwal.*')) class="active" @endif>
        <span class="ico"><i class="ri-calendar-2-line"></i></span>Jadwal Ibadah
      </a>

      <a href="{{ route('absensi.index') }}" @if(request()->routeIs('absensi.*')) class="active" @endif>
        <span class="ico"><i class="ri-checkbox-circle-line"></i></span>Absensi
      </a>

      <a href="{{ route('galeri.index') }}" @if(request()->routeIs('galeri.*')) class="active" @endif>
        <span class="ico"><i class="ri-image-line"></i></span>Galeri
      </a>

      <a href="{{ route('khotbah.index') }}" @if(request()->routeIs('khotbah.*')) class="active" @endif>
        <span class="ico"><i class="ri-book-line"></i></span>Khotbah
      </a>

      <a href="{{ route('pelayanan.index') }}" @if(request()->routeIs('pelayanan.*')) class="active" @endif>
        <span class="ico"><i class="ri-service-line"></i></span>Pelayanan
      </a>

      <a href="{{ route('kegiatan.index') }}" @if(request()->routeIs('kegiatan.*')) class="active" @endif>
        <span class="ico"><i class="ri-calendar-event-line"></i></span>Kegiatan Pelayanan
      </a>

      <a href="{{ route('kontak.index') }}" @if(request()->routeIs('kontak.*')) class="active" @endif>
        <span class="ico"><i class="ri-phone-line"></i></span>Kontak
      </a>

      <a href="{{ route('pengumuman.index') }}" @if(request()->routeIs('pengumuman.*')) class="active" @endif>
        <span class="ico"><i class="ri-notification-2-line"></i></span>Pengumuman
      </a>

      <a href="{{ route('jemaat.index') }}" @if(request()->routeIs('jemaat.*')) class="active" @endif>
        <span class="ico"><i class="ri-group-line"></i></span>Jemaat

        @if($pendingJemaatCount > 0)
          <span
            style="font-size:11px; background:#ef4444; color:#fff; padding:2px 8px; border-radius:999px; margin-left:6px;">
            {{ $pendingJemaatCount }}
          </span>
        @endif
      </a>

      <a href="{{ route('accounts.index') }}" @if(request()->routeIs('accounts.*')) class="active" @endif>
        <span class="ico"><i class="ri-lock-line"></i></span> Akun
      </a>
    </nav>

    <div class="nav-section">Pengaturan</div>

    <nav>
      <a href="{{ route('profil.index') }}" @if(request()->routeIs('profil.*')) class="active" @endif>
        <span class="ico"><i class="ri-user-line"></i></span> Profil Admin
      </a>

      <a href="{{ route('logout') }}" onclick="confirmLogout(event)">
        <span class="ico"><i class="ri-logout-box-r-line"></i></span> Keluar
      </a>
    </nav>

    <div class="sidebar-footer">
      <strong>Kelompok 5 PA-1</strong>
      Version 1.0.0
    </div>
  </aside>

  <div class="sidebar-backdrop" onclick="closeSidebar()"></div>

  <div class="wrapper">
    @yield('content')
  </div>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
    @csrf
  </form>

  @stack('scripts')

  <script>
    function confirmLogout(e) {
      e.preventDefault();

      if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logout-form').submit();
      }
    }

    function closeSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const wrapper = document.querySelector('.wrapper');

      sidebar.classList.remove('open');
      document.body.classList.remove('sidebar-open');

      if (window.innerWidth > 900) {
        sidebar.classList.remove('closed');
        wrapper.classList.remove('sidebar-closed');
      }
    }

    document.addEventListener('DOMContentLoaded', function () {
      const hamburger = document.querySelector('.hamburger');
      const sidebar = document.querySelector('.sidebar');
      const wrapper = document.querySelector('.wrapper');
      const backdrop = document.querySelector('.sidebar-backdrop');
      const sidebarLinks = document.querySelectorAll('.sidebar nav a');

      if (!hamburger || !sidebar || !wrapper || !backdrop) {
        return;
      }

      const isMobile = () => window.matchMedia('(max-width:900px)').matches;

      const hideSidebar = () => {
        sidebar.classList.remove('open');
        document.body.classList.remove('sidebar-open');
      };

      const toggleSidebar = () => {
        if (isMobile()) {
          sidebar.classList.toggle('open');
          document.body.classList.toggle('sidebar-open', sidebar.classList.contains('open'));
        } else {
          const isClosed = sidebar.classList.toggle('closed');
          wrapper.classList.toggle('sidebar-closed', isClosed);
        }
      };

      hamburger.addEventListener('click', function (event) {
        event.preventDefault();
        toggleSidebar();
      });

      backdrop.addEventListener('click', function () {
        hideSidebar();
      });

      sidebarLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          if (isMobile()) {
            hideSidebar();
          }
        });
      });

      window.addEventListener('resize', function () {
        if (window.innerWidth > 900) {
          sidebar.classList.remove('open');
          document.body.classList.remove('sidebar-open');
        } else {
          sidebar.classList.remove('closed');
          wrapper.classList.remove('sidebar-closed');
        }
      });
    });
  </script>

</body>

</html>