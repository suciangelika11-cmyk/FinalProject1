@extends('layouts.app')

@section('content')

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --c1: #769FCD;
            --c2: #B9D7EA;
            --c3: #D6E6F2;
            --c4: #F7FBFC;

            --text: #4B6584;
            --text-soft: #6E7E91;

            --radius: 22px;
        }

        /* ==========================
       HERO
    ========================== */

.pg-hero{
    position:relative;
    padding:110px 0 90px;
    text-align:center;
    overflow:hidden;

    background:linear-gradient(
        135deg,
        #F7FBFC 0%,
        #D6E6F2 55%,
        #B9D7EA 100%
    );

    border-bottom:1px solid rgba(118,159,205,.15);
}

.pg-hero::before{
    content:'';
    position:absolute;
    inset:0;

    background-image:
        linear-gradient(rgba(118,159,205,.08) 1px, transparent 1px),
        linear-gradient(90deg, rgba(118,159,205,.08) 1px, transparent 1px);

    background-size:60px 60px;

    mask-image:radial-gradient(
        ellipse 80% 70% at 50% 50%,
        black 0%,
        transparent 100%
    );
}

.pg-hero::after{
    content:'';
    position:absolute;
    top:-120px;
    left:50%;
    transform:translateX(-50%);
    width:550px;
    height:550px;
    border-radius:50%;

    background:radial-gradient(
        circle,
        rgba(118,159,205,.22),
        transparent 70%
    );
}

.pg-hero .wrap{
    position:relative;
    z-index:2;
}

.pg-hero h1{
    font-family:'Playfair Display',serif;
    font-size:clamp(34px,6vw,58px);
    font-weight:800;
    color:#4B6584;
    margin-bottom:14px;
}

.pg-hero h1 span{
    background:linear-gradient(
        135deg,
        #769FCD,
        #5E87B8,
        #769FCD
    );

    background-size:200% auto;

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.pg-hero p{
    font-size:16px;
    color:#5F738B;
    max-width:520px;
    margin:auto;
    line-height:1.8;
}

        /* ==========================
       SECTION
    ========================== */

        .kh-section {
            background: #F7FBFC;
            padding: 80px 0 100px;
        }

        .tentang-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
        }

        .kh-section-head {
            text-align: center;
            margin-bottom: 60px;
        }

        .kh-label {
            display: block;

            color: var(--c1);

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 10px;

            font-weight: 700;
        }

        .kh-title {
            font-family: 'Playfair Display', serif;

            color: var(--text);

            font-size: clamp(28px, 4vw, 42px);

            margin-bottom: 14px;
        }

        .kh-rule {
            width: 70px;
            height: 3px;

            border-radius: 999px;

            background:
                linear-gradient(90deg,
                    #769FCD,
                    #B9D7EA);

            margin: auto;
        }

        /* ==========================
       ABOUT
    ========================== */

        .about-card {
            background: white;

            border: 1px solid #D6E6F2;

            border-radius: 24px;

            padding: 45px;

            color: #6E7E91;

            line-height: 2;

            margin-bottom: 70px;

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .08);
        }

        /* ==========================
       VISI MISI
    ========================== */

        .visi-misi-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(320px, 1fr));

            gap: 24px;

            margin-bottom: 80px;
        }

        .visi-card,
        .misi-card {
            background: white;

            border: 1px solid #D6E6F2;

            border-radius: 24px;

            padding: 35px;

            transition: .35s;

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .08);
        }

        .visi-card:hover,
        .misi-card:hover {
            transform: translateY(-8px);

            border-color: #769FCD;
        }

        .visi-card h3,
        .misi-card h3 {
            font-family: 'Playfair Display', serif;

            color: #4B6584;

            font-size: 28px;

            margin-bottom: 18px;
        }

        .visi-card p,
        .misi-card p {
            color: #6E7E91;
            line-height: 1.8;
        }

        /* ==========================
       GEMBALA
    ========================== */

        .gembala-section {
            display: grid;
            grid-template-columns: 380px 1fr;

            gap: 40px;
            align-items: center;
        }

        .gembala-image {
            text-align: center;
        }

        .gembala-image img,
        .avatar {
            width: 280px;
            height: 280px;

            border-radius: 50%;

            object-fit: cover;

            margin: auto;

            border: 6px solid white;

            box-shadow:
                0 20px 50px rgba(118, 159, 205, .25);
        }

        .avatar {
            background:
                linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA);

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 80px;
        }

        .gembala-info {
            background: white;

            border: 1px solid #D6E6F2;

            border-radius: 24px;

            padding: 40px;

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .08);
        }

        .gembala-info h3 {
            font-family: 'Playfair Display', serif;

            font-size: 34px;

            color: #4B6584;

            margin-bottom: 10px;
        }

        .gembala-position {
            display: inline-block;

            padding: 6px 14px;

            border-radius: 999px;

            background: #D6E6F2;

            color: #5D87B7;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 1px;

            text-transform: uppercase;

            margin-bottom: 20px;
        }

        .gembala-deskripsi {
            color: #6E7E91;

            line-height: 1.9;

            margin-bottom: 25px;
        }

        .gembala-details {
            background: #F7FBFC;

            border-left: 4px solid #769FCD;

            border-radius: 12px;

            padding: 20px;
        }

        .gembala-details p {
            color: #6E7E91;

            margin-bottom: 10px;
        }

        .gembala-details p:last-child {
            margin-bottom: 0;
        }

        /* ==========================
       RESPONSIVE
    ========================== */

        @media(max-width:900px) {

            .gembala-section {
                grid-template-columns: 1fr;
            }

            .gembala-info {
                text-align: center;
            }
        }

        @media(max-width:768px) {

            .about-card {
                padding: 28px;
            }

            .visi-card,
            .misi-card {
                padding: 28px;
            }

            .gembala-image img,
            .avatar {
                width: 220px;
                height: 220px;
            }
        }
    </style>

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
                            <div class="avatar">👤</div>
                        @endif
                    </div>
                    <div class="gembala-info">
                        <h3>{{ $data->gembala_nama }}</h3>
                        <div class="gembala-position">{{ $data->gembala_jabatan }}</div>
                        <div class="gembala-deskripsi">{{ $data->gembala_deskripsi }}</div>
                        <div class="gembala-details">
                            <p><i class="bi bi-geo-alt"></i> Jalan Gembala Sidang</p>
                            <p><i class="bi bi-envelope"></i> info@gbi.id</p>
                            <p><i class="bi bi-telephone"></i> +62-XXX-XXX-XXXX</p>
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