@extends('Pelayan.layouts.pelayan')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --gold: #C9A84C;
    --gold-light: #F0D48A;
    --gold-dark: #A0722A;
    --navy: #0D1B2A;
    --navy-mid: #1B2F4A;
    --navy-soft: #243B55;
    --navy-card: #1A2E45;
    --cream: #FAF7F2;
    --cream-dark: #F0EAE0;
    --text-main: #FFFFFF;
    --text-muted: #94A3B8;
    --white: #FFFFFF;
    --radius-card: 24px;
    --radius-pill: 100px;
}

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--navy);
    color: var(--text-main);
}

/* ─── HERO ─── */
.hero {
    background: var(--navy);
    position: relative;
    overflow: hidden;
    padding: 110px 0 80px;
    text-align: center;
    border-bottom: 1px solid rgba(201,168,76,0.12);
}

.hero::before {
    content: '';
    position: absolute;
    top: -120px; left: 50%;
    transform: translateX(-50%);
    width: 700px; height: 700px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
    pointer-events: none;
}

.hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80px;
    background: var(--navy-mid);
    clip-path: ellipse(55% 100% at 50% 100%);
}

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(201,168,76,0.15);
    border: 1px solid rgba(201,168,76,0.35);
    border-radius: var(--radius-pill);
    padding: 7px 20px;
    font-size: 13px;
    font-weight: 500;
    color: var(--gold-light);
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 28px;
}

.hero-eyebrow span.dot {
    width: 6px; height: 6px;
    background: var(--gold);
    border-radius: 50%;
    display: inline-block;
}

.hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(36px, 5vw, 58px);
    font-weight: 700;
    color: var(--white);
    line-height: 1.15;
    margin-bottom: 18px;
}

.hero h1 em {
    font-style: italic;
    color: var(--gold-light);
}

.hero p {
    font-size: 17px;
    font-weight: 300;
    color: rgba(255,255,255,0.88);
    max-width: 480px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ─── SECTION HEADER ─── */
.section-header {
    text-align: center;
    margin-bottom: 56px;
}

.section-label {
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: #FFFFFF !important;
    margin-bottom: 14px;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 3.5vw, 40px);
    font-weight: 600;
    color: #FFFFFF !important;
    line-height: 1.2;
    margin-bottom: 16px;
}

.section-rule {
    width: 48px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    border-radius: 99px;
    margin: 0 auto;
}

.section-title,
.day-label-text,
.special-card .card-title,
.schedule-card .card-title {
    color: #FFFFFF !important;
}

/* ─── DAY LABEL ─── */
.day-label {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 32px;
}

.day-label::before,
.day-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.3));
}

.day-label::after {
    background: linear-gradient(90deg, rgba(201,168,76,0.3), transparent);
}

.day-label-text {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--white);
    white-space: nowrap;
}

/* ─── SCHEDULE CARD ─── */
.schedule-card {
    background: var(--navy-card);
    border-radius: var(--radius-card);
    padding: 32px 28px;
    border: 1px solid rgba(201,168,76,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.schedule-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.schedule-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 60px rgba(0,0,0,0.35);
    border-color: rgba(201,168,76,0.4);
}

.schedule-card:hover::before {
    opacity: 1;
}

.card-icon-wrap {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(201,168,76,0.2), rgba(201,168,76,0.08));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: var(--gold-light);
    margin-bottom: 22px;
    flex-shrink: 0;
}

.card-title {
    font-family: 'Playfair Display', serif;
    font-size: 19px;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 16px;
    line-height: 1.3;
}

.card-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13.5px;
    color: rgba(255,255,255,0.78);
    margin-bottom: 8px;
    font-weight: 400;
}

.card-meta i {
    color: var(--gold);
    font-size: 13px;
    flex-shrink: 0;
}

.card-desc {
    font-size: 14px;
    color: rgba(255,255,255,0.78);
    line-height: 1.65;
    margin-top: 14px;
    margin-bottom: 22px;
}

.btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 500;
    color: var(--gold-light);
    border: 1px solid rgba(201,168,76,0.35);
    border-radius: var(--radius-pill);
    padding: 8px 20px;
    text-decoration: none;
    transition: all 0.25s ease;
    background: transparent;
}

.btn-detail:hover {
    background: var(--gold);
    color: var(--navy);
    border-color: var(--gold);
}

/* ─── EMPTY STATE ─── */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: rgba(255,255,255,0.4);
}

/* ─── SPECIAL EVENTS SECTION ─── */
.special-section {
    background: var(--navy);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
    border-top: 1px solid rgba(201,168,76,0.1);
    border-bottom: 1px solid rgba(201,168,76,0.1);
}

.special-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 80px;
    background: var(--navy-mid);
    clip-path: ellipse(55% 100% at 50% 0%);
}

.special-section::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80px;
    background: var(--navy);
    clip-path: ellipse(55% 100% at 50% 100%);
}

/* ─── SPECIAL CARD ─── */
.special-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(201,168,76,0.25);
    border-radius: var(--radius-card);
    padding: 36px 28px;
    height: 100%;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.special-card::after {
    content: '';
    position: absolute;
    bottom: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201,168,76,0.08) 0%, transparent 70%);
    pointer-events: none;
}

.special-card:hover {
    background: rgba(255,255,255,0.09);
    border-color: rgba(201,168,76,0.5);
    transform: translateY(-6px);
    box-shadow: 0 24px 60px rgba(0,0,0,0.35);
}

.special-card .card-icon-wrap {
    background: linear-gradient(135deg, rgba(201,168,76,0.25), rgba(201,168,76,0.1));
    color: var(--gold-light);
}

.special-card .card-title { color: var(--white); }
.special-card .card-desc  { color: rgba(255,255,255,0.82); }

.badge-gold {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(201,168,76,0.15);
    border: 1px solid rgba(201,168,76,0.35);
    color: var(--gold-light);
    border-radius: var(--radius-pill);
    padding: 5px 14px;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.04em;
}

/* ─── WEEKLY SECTION ─── */
.weekly-section {
    background: var(--navy-mid);
    padding: 100px 0;
}

/* ─── RESPONSIVE ─── */
@media (max-width: 768px) {
    .hero { padding: 80px 0 60px; }
    .weekly-section, .special-section { padding: 80px 0; }
}
</style>

<!-- ════════════════════════════
     HERO
════════════════════════════ -->
<section class="hero">
    <div class="container position-relative" style="z-index: 1;">
        <div class="hero-eyebrow">
            <span class="dot"></span>
            Gereja Terbuka Untuk Semua
            <span class="dot"></span>
        </div>
        <h1>Jadwal Ibadah<br><em>&amp; Kegiatan Jemaat</em></h1>
        <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan yang penuh kasih</p>
    </div>
</section>


<!-- ════════════════════════════
     JADWAL MINGGUAN
════════════════════════════ -->
<section class="weekly-section">
    <div class="container">

        <div class="section-header">
            <span class="section-label">Setiap Minggu</span>
            <h2 class="section-title">Jadwal Mingguan</h2>
            <div class="section-rule"></div>
        </div>

        @forelse ($jadwalMingguan as $hari => $kegiatanList)

            <div class="day-label mb-4">
                <span class="day-label-text">{{ $hari }}</span>
            </div>

            <div class="row g-4 mb-5">
                @foreach ($kegiatanList as $kegiatan)
                    <div class="col-md-6 col-lg-4">
                        <div class="schedule-card">
                            <div class="card-icon-wrap">
                                <i class="{{ $kegiatan->icon ?: 'bi bi-calendar-heart' }}"></i>
                            </div>

                            <h3 class="card-title">{{ $kegiatan->title }}</h3>

                            <div class="card-meta">
                                <i class="bi bi-clock"></i>
                                <span>
                                    {{ $kegiatan->start_time }}
                                    {{ $kegiatan->end_time ? '– ' . $kegiatan->end_time : '' }} WIB
                                </span>
                            </div>

                            <div class="card-meta">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>{{ $kegiatan->location ?: 'Lokasi menyusul' }}</span>
                            </div>

                            @if ($kegiatan->description)
                                <p class="card-desc">{{ $kegiatan->description }}</p>
                            @else
                                <div style="flex:1;"></div>
                            @endif

                            <a href="#" class="btn-detail">
                                Lihat Detail
                                <i class="bi bi-arrow-right" style="font-size:12px;"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        @empty
            <div class="empty-state">
                <i class="bi bi-calendar2-x" style="font-size:48px; color:rgba(201,168,76,0.5); display:block; margin-bottom:16px;"></i>
                <p>Jadwal mingguan belum tersedia.</p>
            </div>
        @endforelse

    </div>
</section>


<!-- ════════════════════════════
     ACARA KHUSUS
════════════════════════════ -->
<section class="special-section">
    <div class="container position-relative" style="z-index: 1;">

        <div class="section-header">
            <span class="section-label">Akan Datang</span>
            <h2 class="section-title">Acara Khusus</h2>
            <div class="section-rule"></div>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($acaraKhusus as $acara)
                <div class="col-md-6 col-lg-4">
                    <div class="special-card">
                        <div class="card-icon-wrap">
                            <i class="{{ $acara->icon ?: 'bi bi-stars' }}"></i>
                        </div>

                        <h3 class="card-title">{{ $acara->title }}</h3>
                        <p class="card-desc">{{ $acara->description }}</p>

                        <div class="badge-gold">
                            <i class="bi bi-calendar2-check" style="font-size:11px;"></i>
                            {{ $acara->day ?: 'Acara Khusus' }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="bi bi-calendar2-x" style="font-size:48px; color:rgba(201,168,76,0.5); display:block; margin-bottom:16px;"></i>
                    <p style="color:rgba(255,255,255,0.45);">Belum ada acara khusus.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection