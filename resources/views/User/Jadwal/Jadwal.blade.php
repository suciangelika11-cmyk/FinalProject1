@extends('layouts.app')

@section('content')
<style>
/* HERO */
.jd-hero {
    position: relative;
    padding: clamp(70px, 10vw, 110px) 16px clamp(60px, 8vw, 100px);
    text-align: center;
    overflow: hidden;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 50%, #0d1e3a 100%);
    border-bottom: 1px solid rgba(93,146,232,0.1);
}

.jd-hero::before {
    content: '';
    position: absolute; top: -130px; left: 50%; transform: translateX(-50%);
    width: 650px; height: 650px; border-radius: 50%;
    background: radial-gradient(circle, rgba(45,101,200,0.16) 0%, transparent 70%);
    pointer-events: none;
}

.jd-hero .wrap { position: relative; z-index: 1; }

.jd-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 5.5vw, 56px);
    font-weight: 700; color: #fff;
    line-height: 1.12; margin-bottom: 16px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.jd-hero h1 em { font-style: italic; color: #93bef8; }

.jd-hero p {
    font-size: clamp(14px, 2vw, 16px); font-weight: 300;
    color: rgba(255,255,255,0.74);
    max-width: 460px; margin: 0 auto;
    line-height: 1.75;
    animation: fadeUp 0.8s ease 0.4s both;
}

/* SECTIONS */
.jd-weekly { background: #0f2040; padding: clamp(56px, 8vw, 88px) 0; }
.jd-special { background: #0d1e3a; padding: clamp(56px, 8vw, 88px) 0; border-top: 1px solid rgba(93,146,232,0.1); }

/* DAY LABEL */
.jd-day {
    display: flex; align-items: center; gap: 16px; margin-bottom: 26px;
}
.jd-day::before, .jd-day::after {
    content: ''; flex: 1; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(93,146,232,0.22));
}
.jd-day::after { background: linear-gradient(90deg, rgba(93,146,232,0.22), transparent); }
.jd-day-text {
    font-family: 'Playfair Display', serif;
    font-size: clamp(16px, 2.5vw, 20px); font-weight: 600; color: #fff; white-space: nowrap;
}

/* SCHEDULE CARD */
.jd-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.14);
    border-radius: 18px; padding: clamp(20px, 3vw, 28px) clamp(16px, 3vw, 24px); height: 100%;
    position: relative; overflow: hidden;
    transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.3s ease;
    backdrop-filter: blur(8px);
}

.jd-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, #1a4a9e, #5592e8);
    opacity: 0; transition: opacity 0.3s;
}

.jd-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 56px rgba(10,22,40,0.44);
    border-color: rgba(93,146,232,0.32);
}

.jd-card:hover::before { opacity: 1; }

.jd-card-icon {
    width: 48px; height: 48px; border-radius: 13px;
    background: rgba(26,74,158,0.18);
    border: 1px solid rgba(93,146,232,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #93bef8; margin-bottom: 18px;
    flex-shrink: 0;
}

.jd-card-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(15px, 2vw, 17px); font-weight: 600; color: #fff;
    margin-bottom: 12px; line-height: 1.3;
}

.jd-card-meta {
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(255,255,255,0.68); margin-bottom: 6px;
    flex-wrap: wrap;
}

.jd-card-meta i { color: #5592e8; font-size: 12.5px; flex-shrink: 0; }

.jd-card-desc {
    font-size: 13.5px; color: rgba(255,255,255,0.60);
    line-height: 1.65; margin-top: 12px; margin-bottom: 20px;
}

.jd-btn-detail {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 13px; font-weight: 500; color: #93bef8;
    border: 1px solid rgba(93,146,232,0.3);
    border-radius: 999px; padding: 7px 18px;
    text-decoration: none;
    background: rgba(26,74,158,0.1);
    transition: all 0.25s;
    white-space: nowrap;
}

.jd-btn-detail:hover {
    background: #1a4a9e; color: #fff; border-color: #1a4a9e;
}

/* SPECIAL CARD */
.jd-special-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(93,146,232,0.14);
    border-radius: 18px; padding: clamp(22px, 3vw, 32px) clamp(16px, 3vw, 24px); height: 100%;
    position: relative; overflow: hidden;
    transition: all 0.35s ease;
    backdrop-filter: blur(8px);
}

.jd-special-card::after {
    content: '';
    position: absolute; bottom: -28px; right: -28px;
    width: 110px; height: 110px; border-radius: 50%;
    background: radial-gradient(circle, rgba(93,146,232,0.07) 0%, transparent 70%);
    pointer-events: none;
}

.jd-special-card:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(93,146,232,0.32);
    transform: translateY(-6px);
    box-shadow: 0 24px 56px rgba(10,22,40,0.4);
}

.jd-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(26,74,158,0.16);
    border: 1px solid rgba(93,146,232,0.28);
    color: #93bef8; border-radius: 999px;
    padding: 4px 13px; font-size: 12px; font-weight: 500; letter-spacing: .04em;
    flex-wrap: wrap;
}

.jd-empty { text-align: center; padding: 52px 20px; color: rgba(255,255,255,0.5); }
.jd-empty i { font-size: 40px; color: rgba(93,146,232,0.36); display: block; margin-bottom: 12px; }

/* RESPONSIVE */
@media (max-width: 576px) {
    .jd-day { gap: 10px; }
    .jd-card:hover { transform: none; }
    .jd-special-card:hover { transform: none; }
}
</style>

<section class="jd-hero">
    <div class="wrap container">
        <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
            <span class="eyebrow-dot"></span>Gereja Terbuka Untuk Semua<span class="eyebrow-dot"></span>
        </div>
        <h1>Jadwal Ibadah<br><em>&amp; Kegiatan Jemaat</em></h1>
        <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan yang penuh kasih</p>
    </div>
</section>

<!-- JADWAL MINGGUAN -->
<section class="jd-weekly">
    <div class="global-container">
        <div class="section-head">
            <span class="section-label">Setiap Minggu</span>
            <h2 class="section-title">Jadwal Mingguan</h2>
            <div class="section-rule"></div>
        </div>

        @forelse($jadwalMingguan as $hari => $kegiatanList)
        <div class="jd-day mb-4"><span class="jd-day-text">{{ $hari }}</span></div>
        <div class="row g-3 mb-5">
            @foreach($kegiatanList as $kegiatan)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="jd-card">
                    <div class="jd-card-icon"><i class="{{ $kegiatan->icon ?: 'bi bi-calendar-heart' }}"></i></div>
                    <h3 class="jd-card-title">{{ $kegiatan->title }}</h3>
                    <div class="jd-card-meta"><i class="bi bi-clock"></i><span>{{ $kegiatan->start_time }}{{ $kegiatan->end_time ? ' – '.$kegiatan->end_time : '' }} WIB</span></div>
                    <div class="jd-card-meta"><i class="bi bi-geo-alt-fill"></i><span>{{ $kegiatan->location ?: 'Lokasi menyusul' }}</span></div>
                    @if($kegiatan->description)<p class="jd-card-desc">{{ $kegiatan->description }}</p>@endif
                    <a href="#" class="jd-btn-detail">Lihat Detail <i class="bi bi-arrow-right" style="font-size:11px;"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        @empty
        <div class="jd-empty"><i class="bi bi-calendar2-x"></i><p>Jadwal mingguan belum tersedia.</p></div>
        @endforelse
    </div>
</section>

<!-- ACARA KHUSUS -->
<section class="jd-special">
    <div class="global-container">
        <div class="section-head">
            <span class="section-label">Akan Datang</span>
            <h2 class="section-title">Acara Khusus</h2>
            <div class="section-rule"></div>
        </div>
        <div class="row g-3 justify-content-center">
            @forelse($acaraKhusus as $acara)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="jd-special-card">
                    <div class="jd-card-icon"><i class="{{ $acara->icon ?: 'bi bi-stars' }}"></i></div>
                    <h3 class="jd-card-title">{{ $acara->title }}</h3>
                    <p class="jd-card-desc">{{ $acara->description }}</p>
                    <div class="jd-badge"><i class="bi bi-calendar2-check" style="font-size:11px;"></i>{{ $acara->day ?: 'Acara Khusus' }}</div>
                </div>
            </div>
            @empty
            <div class="jd-empty"><i class="bi bi-calendar2-x"></i><p style="color:rgba(255,255,255,.4);">Belum ada acara khusus.</p></div>
            @endforelse
        </div>
    </div>
</section>
@endsection