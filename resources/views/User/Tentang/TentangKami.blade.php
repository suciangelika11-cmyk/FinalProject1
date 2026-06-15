@extends('layouts.app')

@section('content')

    @include('layouts.LOTentangKami')

    @if($data)

        <section class="pg-hero">
            <div class="container wrap"></div>
            <div class="kh-hero-ring2"></div>
            <div class="kh-hero-glow"></div>
            <div class="wrap tentang-container">
                <div class="kh-eyebrow"><span class="kh-dot"></span>Tentang Kami<span class="kh-dot"></span></div>
                <h1>Tentang GBI Tambunan</h1>

                <p>
                    Gereja Bethel Indonesia Tambunan hadir untuk melayani jemaat,
                    membangun iman, dan menjadi berkat bagi masyarakat.
                </p>
            </div>
        </section>

        <section class="kh-section">
            <div class="container">

                <!-- SEJARAH / PERJALANAN IMAN KAMI -->
                <div class="kh-section-head">
                    <span class="kh-label">Perjalanan Iman</span>
                    <h2 class="kh-title">Sejarah Gereja Kami</h2>
                    <div class="kh-rule"></div>
                </div>

                <div class="about-card">
                    {{ $data->sejarah }}
                </div>

                <!-- VISI & MISI -->
                <div class="kh-section-head">
                    <span class="kh-label">Arah Pelayanan</span>
                    <h2 class="kh-title">Visi & Misi</h2>
                    <div class="kh-rule"></div>
                </div>

                <div class="visi-misi-grid">
                    <div class="visi-card">
                        <h3>Visi Kami</h3>
                        <p>{{ $data->visi }}</p>
                    </div>

                    <div class="misi-card">
                        <h3>Misi Kami</h3>
                        <p>{{ $data->misi }}</p>
                    </div>
                </div>

                <!-- GEMBALA SIDANG -->
                <div class="kh-section-head">
                    <span class="kh-label">Pemimpin Gereja</span>
                    <h2 class="kh-title">Gembala Sidang</h2>
                    <div class="kh-rule"></div>
                </div>

                <div class="gembala-section">
                    <div class="gembala-image">
                        @if($data->gembala_foto)
                            <img src="{{ asset('storage/' . $data->gembala_foto) }}" alt="{{ $data->gembala_nama }}">
                        @else
                            <div class="avatar">{{ "\u{1F464}" }}</div>
                        @endif
                    </div>

                    <div class="gembala-info">
                        <h3>{{ $data->gembala_nama }}</h3>
                        <div class="gembala-position">{{ $data->gembala_jabatan }}</div>
                        <div class="gembala-deskripsi">{{ $data->gembala_deskripsi }}</div>
                        <div class="gembala-details">
                            <p><i class="bi bi-envelope"></i> info@gbi.id</p>
                            <p><i class="bi bi-telephone"></i> +62-813-8487-1163</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="kh-hero">
            <div class="kh-hero-ring"></div>
            <div class="kh-hero-ring2"></div>
            <div class="kh-hero-glow"></div>
            <div class="wrap container">
                <div class="kh-eyebrow"><span class="kh-dot"></span>Tentang Kami<span class="kh-dot"></span></div>
                <h1>Tentang Gereja Kami</h1>
                <p>Data sedang dalam proses pengisian</p>
            </div>
        </section>

        <div class="kh-wave">
            <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,0 C300,60 900,60 1200,0 L1200,60 L0,60 Z" fill="#071830" />
            </svg>
        </div>

        <section class="kh-section">
            <div class="container">
                <div class="kh-empty" style="padding: 100px 20px;">
                    <div class="kh-empty-icon"><i class="bi bi-building"></i></div>
                    <h4>Informasi Gereja</h4>
                    <p>Data tentang gereja akan segera ditampilkan di sini.</p>
                </div>
            </div>
        </section>

    @endif

@endsection