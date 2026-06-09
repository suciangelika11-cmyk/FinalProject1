@extends('layouts.app')

@section('content')

    @include('layouts.LOWelcome')

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
    <section class="ibadah-section">
        <div class="container ">
            <h2 class="ibadah-title">Ibadah Minggu</h2>
            <div class="ibadah-grid">
                @foreach($ibadahs as $ibadah)

                    <div class=" ibadah-card">

                        <h3>
                            {{ $ibadah->title }}
                        </h3>

                        <div class="ibadah-time">
                            {{ \Carbon\Carbon::parse($ibadah->start_time)->format('H:i') }} WIB
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </section>


    <!-- DUKUNG BERSAMA -->
    <section class="support-section section-light">
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

    <script src="{{ asset('js/User/Welcome.js') }}"></script>

@endsection