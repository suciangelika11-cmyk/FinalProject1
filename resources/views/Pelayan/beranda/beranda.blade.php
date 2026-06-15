@extends('Pelayan.layouts.pelayan')

@section('page_title', 'Beranda Pelayan')

@section('content')

@include('Pelayan.layouts.LOPBeranda')

    <!-- HERO -->
    <section class="hero">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-vignette"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <span class="dot"></span>
                Gereja Beriman Indonesia
                <span class="dot"></span>
            </div>

            <h1>Selamat Datang di<br><em>GBI Tambunan</em></h1>

            <p class="hero-sub">Tempat bertumbuh dalam iman, doa, dan pelayanan yang penuh kasih bagi semua jemaat.</p>

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
                        memiliki panggilan mulia dari Tuhan untuk berkembang dan melayani.</p>

                    <div class="about-stat-grid">
                        <div class="about-stat reveal">
                            <div class="about-stat-num">3×</div>
                            <div class="about-stat-label">Ibadah setiap Minggu</div>
                        </div>
                        <div class="about-stat reveal">
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
                        <div class="about-quote-ref">— Yohanes 3:16</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DONASI -->
    <!-- DONASI -->
    <section class="qris-section">
        <div class="qris-container">

            <div class="qris-header">
                <span></span>
                <h2>QRIS</h2>
                <span></span>
            </div>

            <div class="qris-card">
                <img src="{{ asset('gambar/qris.jpeg') }}" alt="QRIS GBI Tambunan">
            </div>

            <div class="qris-info">
                <p>Scan QR menggunakan aplikasi e-wallet / mobile banking</p>
                <p>Masukkan nominal dan konfirmasi pembayaran.</p>

                <h4>
                    ❤️ Terima kasih untuk setiap dukungan Anda ❤️
                </h4>
            </div>

        </div>
    </section>

    <div class="page-end">
        <div class="page-end-icon"><i class="fa-solid fa-dove"></i></div>
        <p class="page-end-text">Tuhan memberkati setiap langkah pelayananmu. Terima kasih telah menjadi bagian dari GBI
            Tambunan.</p>
    </div>

    <script src="{{ asset('js/Pelayan/Beranda.js') }}"></script>
    
@endsection