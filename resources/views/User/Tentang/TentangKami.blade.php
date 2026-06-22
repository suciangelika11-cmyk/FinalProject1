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

<section class="pg-hero">
    <div class="container wrap"></div>
    <div class="kh-hero-ring2"></div>
    <div class="kh-hero-glow"></div>

    <div class="wrap tentang-container">
        <div class="kh-eyebrow">
            <span class="kh-dot"></span>
            Tentang Kami
            <span class="kh-dot"></span>
        </div>

        <h1>Tentang GBI Tambunan</h1>

        <p>
            Informasi gereja sedang dipersiapkan dan akan segera tersedia.
        </p>
    </div>
</section>

<section class="kh-section">
    <div class="container">

        <div class="kh-section-head">
            <span class="kh-label">Perjalanan Iman</span>
            <h2 class="kh-title">Sejarah Gereja Kami</h2>
            <div class="kh-rule"></div>
        </div>

        <div class="about-card kh-empty-card">
            <div class="kh-empty-icon">⛪</div>

            <h3>Data Sejarah Belum Tersedia</h3>

            <p>
                Informasi sejarah gereja akan ditampilkan setelah data ditambahkan oleh administrator.
            </p>
        </div>

        <div class="kh-section-head">
            <span class="kh-label">Arah Pelayanan</span>
            <h2 class="kh-title">Visi & Misi</h2>
            <div class="kh-rule"></div>
        </div>

        <div class="visi-misi-grid">
            <div class="visi-card">
                <h3>Visi Kami</h3>
                <p>Belum ada data visi gereja.</p>
            </div>

            <div class="misi-card">
                <h3>Misi Kami</h3>
                <p>Belum ada data misi gereja.</p>
            </div>
        </div>

        <div class="kh-section-head">
            <span class="kh-label">Pemimpin Gereja</span>
            <h2 class="kh-title">Gembala Sidang</h2>
            <div class="kh-rule"></div>
        </div>

        <div class="gembala-section">
            <div class="gembala-image">
                <div class="avatar">👤</div>
            </div>

            <div class="gembala-info">
                <h3>Belum Ada Data</h3>
                <div class="gembala-position">Gembala Sidang</div>

                <div class="gembala-deskripsi">
                    Informasi gembala sidang akan ditampilkan setelah data tersedia.
                </div>
            </div>
        </div>

    </div>
</section>

@endif

@endsection