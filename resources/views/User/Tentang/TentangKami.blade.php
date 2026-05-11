@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
:root{
    --b950:#020810;--b900:#050f1f;--b800:#071830;--b700:#0d2448;
    --b600:#163562;--b500:#1e4a8e;--b400:#2d65bf;--b300:#5592e0;
    --b200:#93bef5;--b100:#d0e6ff;
    --white:#fff;--dim:rgba(255,255,255,.55);
    --r-pill:999px;--r-card:18px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--b900);color:var(--white);-webkit-font-smoothing:antialiased;}

/* HERO */
.kh-hero{position:relative;padding:110px 0 120px;text-align:center;overflow:hidden;background:var(--b950);}
.kh-hero-ring{position:absolute;top:-160px;left:50%;transform:translateX(-50%);width:640px;height:640px;border-radius:50%;border:1px solid rgba(45,101,191,.07);pointer-events:none;}
.kh-hero-ring2{position:absolute;top:-80px;left:50%;transform:translateX(-50%);width:420px;height:420px;border-radius:50%;border:1px solid rgba(45,101,191,.05);pointer-events:none;}
.kh-hero-glow{position:absolute;top:0;left:50%;transform:translateX(-50%);width:560px;height:300px;background:radial-gradient(ellipse at top,rgba(30,74,142,.12) 0%,transparent 70%);pointer-events:none;}

.kh-eyebrow{
    display:inline-flex;align-items:center;gap:8px;
    background:rgba(45,101,191,.12);border:1px solid rgba(45,101,191,.28);
    border-radius:var(--r-pill);padding:6px 20px;
    font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;
    color:var(--b200);margin-bottom:28px;
}
.kh-dot{width:5px;height:5px;border-radius:50%;background:var(--b300);display:inline-block;}

.kh-hero h1{font-family:'Playfair Display',serif;font-size:clamp(34px,6vw,58px);font-weight:700;line-height:1.12;color:var(--white);margin-bottom:18px;}
.kh-hero h1 em{font-style:italic;color:var(--b200);}
.kh-hero p{font-size:15px;font-weight:300;color:rgba(255,255,255,.75);max-width:500px;margin:0 auto;line-height:1.75;}
.kh-hero .wrap{position:relative;z-index:1;}

/* WAVE */
.kh-wave{display:block;width:100%;overflow:hidden;line-height:0;}
.kh-wave svg{display:block;width:100%;height:60px;}

/* SECTION */
.kh-section{background:var(--b800);padding:0 0 90px;}
.kh-section-head{text-align:center;padding:60px 0 44px;}
.kh-label{font-size:10px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--b300);display:block;margin-bottom:12px;}
.kh-title{font-family:'Playfair Display',serif;font-size:clamp(26px,4vw,38px);font-weight:700;color:var(--white);margin-bottom:18px;}
.kh-rule{width:40px;height:2px;background:linear-gradient(90deg,var(--b500),var(--b300));border-radius:99px;margin:0 auto;}

.container{max-width:1180px;margin:0 auto;padding:0 28px;}

/* STATS SECTION */
.stats-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 24px;
    margin-bottom: 80px;
}

.stat-card {
    background:rgba(13,36,72,.5);
    border:1px solid rgba(45,101,191,.1);
    border-radius:var(--r-card);
    padding: 40px 20px;
    text-align: center;
    transition: transform .3s ease,border-color .3s ease;
    backdrop-filter:blur(4px);
}

.stat-card:hover {
    transform: translateY(-7px);
    border-color: rgba(85,146,224,.28);
}

.stat-number {
    font-family: 'Playfair Display', serif;
    font-size: 48px;
    font-weight: 700;
    background: linear-gradient(135deg, var(--b300), var(--b200));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 12px;
}

.stat-label {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    letter-spacing: .04em;
}

/* ABOUT CARD */
.about-card {
    background:rgba(13,36,72,.5);
    border:1px solid rgba(45,101,191,.1);
    border-radius:var(--r-card);
    padding: 50px 40px;
    margin-bottom: 80px;
    line-height: 1.9;
    font-size: 15px;
    color: rgba(255,255,255,.8);
    backdrop-filter:blur(4px);
    transition: border-color .3s ease;
}

.about-card:hover {
    border-color: rgba(85,146,224,.28);
}

/* VISI MISI GRID */
.visi-misi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 80px;
}

.visi-card, .misi-card {
    background:rgba(13,36,72,.5);
    border:1px solid rgba(45,101,191,.1);
    border-radius:var(--r-card);
    padding: 40px 32px;
    transition: transform .3s ease,border-color .3s ease;
    backdrop-filter:blur(4px);
}

.visi-card:hover, .misi-card:hover {
    transform: translateY(-7px);
    border-color: rgba(85,146,224,.28);
}

.visi-card h3, .misi-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--b300), var(--b200));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.visi-card p, .misi-card p {
    font-size: 14px;
    color: rgba(255,255,255,.75);
    line-height: 1.8;
}

/* GEMBALA SECTION */
.gembala-section {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 50px;
    align-items: center;
    margin-bottom: 80px;
}

.gembala-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.gembala-image img {
    width: 280px;
    height: 280px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgba(85,146,224,.4);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    transition: transform .3s ease, border-color .3s ease;
}

.gembala-image img:hover {
    transform: scale(1.02);
    border-color: rgba(85,146,224,.8);
}

.avatar {
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--b700), var(--b500));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 90px;
    border: 3px solid rgba(85,146,224,.4);
}

.gembala-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--white);
}

.gembala-position {
    display: inline-block;
    background: rgba(45,101,191,.15);
    border: 1px solid rgba(45,101,191,.25);
    border-radius: var(--r-pill);
    padding: 4px 16px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--b300);
    margin-bottom: 20px;
}

.gembala-deskripsi {
    font-size: 14px;
    color: rgba(255,255,255,.75);
    line-height: 1.8;
    margin-bottom: 24px;
}

.gembala-details {
    background: rgba(13,36,72,.3);
    border-left: 3px solid var(--b300);
    padding: 18px 22px;
    border-radius: 12px;
}

.gembala-details p {
    font-size: 13px;
    color: rgba(255,255,255,.7);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.gembala-details p:last-child {
    margin-bottom: 0;
}

.gembala-details i {
    width: 20px;
    color: var(--b300);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .kh-hero {
        padding: 80px 0;
    }
    
    .stats-section {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .visi-misi-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .gembala-section {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
    }
    
    .gembala-image img, .avatar {
        width: 200px;
        height: 200px;
        font-size: 70px;
    }
    
    .about-card {
        padding: 30px 24px;
    }
    
    .visi-card, .misi-card {
        padding: 30px 24px;
    }
    
    .gembala-details p {
        text-align: left;
    }
}
</style>

@if($data)

<section class="kh-hero">
    <div class="kh-hero-ring"></div>
    <div class="kh-hero-ring2"></div>
    <div class="kh-hero-glow"></div>
    <div class="wrap container">
        <div class="kh-eyebrow"><span class="kh-dot"></span>Tentang Kami<span class="kh-dot"></span></div>
        <h1>{{ $data->header_title ?? 'Tentang Gereja Kami' }}</h1>
        <p>{{ $data->header_description ?? 'Mengenal lebih dekat komunitas iman kami yang berdedikasi untuk melayani dan memuliakan Tuhan' }}</p>
    </div>
</section>

<div class="kh-wave">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,0 C300,60 900,60 1200,0 L1200,60 L0,60 Z" fill="#071830"/>
    </svg>
</div>

<section class="kh-section">
    <div class="container">

        <!-- STATISTICS SECTION -->
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-number">1978</div>
                <div class="stat-label">Sejak Berdiri</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">2.4K+</div>
                <div class="stat-label">Jemaat Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">12</div>
                <div class="stat-label">Pelayanan</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">40+</div>
                <div class="stat-label">Tahun Pelayanan</div>
            </div>
        </div>

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
                    <img src="{{ asset('storage/'.$data->gembala_foto) }}" alt="{{ $data->gembala_nama }}">
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
        <path d="M0,0 C300,60 900,60 1200,0 L1200,60 L0,60 Z" fill="#071830"/>
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