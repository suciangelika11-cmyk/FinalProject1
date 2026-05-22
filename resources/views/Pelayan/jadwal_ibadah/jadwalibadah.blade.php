@extends('Pelayan.layouts.pelayan')

@section('content')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
    :root {
        --blue-light: #ADE1FB;
        --blue-mid: #266CA9;
        --blue-dark: #0F2573;
        --navy: #041D56;
        --navy-dark: #01082D;

        --ink: #0A0E17;
        --ink-mid: #0D1422;
        --ink-card: rgba(12, 19, 34, 0.96);

        --surface: rgba(255, 255, 255, 0.04);

        --text: #ADE1FB;
        --text-muted: rgba(173, 225, 251, 0.72);

        --border: rgba(38, 108, 169, 0.2);
        --border-strong: rgba(173, 225, 251, 0.35);

        --radius: 22px;

        --purple-dim: rgba(38, 108, 169, 0.12);
        --purple: #266CA9;

        --green-dim: rgba(15, 37, 115, 0.12);
        --green: #0F2573;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        overflow-x: hidden;
    }

    body {
        font-family: 'Outfit', sans-serif;
        background: var(--navy-dark);
        color: var(--blue-light);
    }

    /* ================= WRAPPER UTAMA JADWAL ================= */
    .jadwal-container {
        width: min(92%, 1180px);
        margin: 0 auto;
        padding: 60px 0;
    }

    /* ================= HERO ================= */
    .hero {
        position: relative;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
        padding: 120px 24px 110px;
        background: var(--navy);
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(
                ellipse 70% 100% at 50% 0%,
                rgba(173, 225, 251, 0.08),
                transparent 65%
            );
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: var(--navy-dark);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 720px;
        width: 100%;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(38, 108, 169, 0.15);
        border: 1px solid var(--border-strong);
        border-radius: 40px;
        padding: 8px 20px;
        font-size: 10px;
        font-weight: 500;
        color: var(--blue-light);
        letter-spacing: .22em;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .hero h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(38px, 6vw, 70px);
        line-height: 1.1;
        margin-bottom: 18px;
        color: var(--blue-light);
    }

    .hero h1 em {
        color: var(--blue-mid);
        font-style: italic;
    }

    .hero-sub {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.9;
        font-weight: 300;
        max-width: 620px;
        margin: auto;
    }

    /* ================= SECTION HEADERS ================= */
    .section-header {
        margin-bottom: 40px;
    }

    .section-label {
        color: var(--blue-mid);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .22em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .section-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 32px;
        color: var(--blue-light);
        margin-bottom: 12px;
    }

    .section-rule {
        width: 60px;
        height: 3px;
        background: var(--blue-mid);
        border-radius: 2px;
    }

    /* ================= DAY DIVIDER ================= */
    .day-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 40px 0 24px;
    }

    .day-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    .day-name {
        color: var(--blue-light);
        font-weight: 600;
        font-size: 18px;
        letter-spacing: 0.05em;
    }

    /* ================= GRID & CARDS ================= */
    .schedule-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .schedule-card, .special-card {
        background: var(--ink-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 30px;
        display: flex;
        flex-direction: column;
        transition: .35s ease;
    }

    .schedule-card:hover, .special-card:hover {
        border-color: var(--border-strong);
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .4);
    }

    .card-icon {
        width: 46px;
        height: 46px;
        background: rgba(38, 108, 169, 0.15);
        color: var(--blue-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .card-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 22px;
        color: var(--blue-light);
        margin-bottom: 16px;
    }

    .card-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 12px;
    }

    .card-meta i {
        color: var(--blue-mid);
        width: 16px;
    }

    .card-desc {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.6;
        margin-top: 10px;
        margin-bottom: 20px;
        flex: 1;
    }

    .btn-detail {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--blue-light);
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        margin-top: auto;
        transition: 0.2s;
    }

    .btn-detail:hover {
        color: var(--blue-mid);
    }

    .badge-day {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(38, 108, 169, 0.12);
        border: 1px solid var(--border-strong);
        border-radius: 40px;
        padding: 6px 14px;
        font-size: 11px;
        color: var(--blue-light);
        width: fit-content;
        margin-top: 15px;
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
        text-align: center;
        padding: 40px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px dashed var(--border);
        border-radius: var(--radius);
        color: var(--text-muted);
        grid-column: 1 / -1;
    }

    .empty-icon {
        font-size: 36px;
        color: var(--blue-mid);
        margin-bottom: 12px;
    }

    /* ================= RESPONSIVE ================= */
    @media(max-width:768px) {
        .hero {
            min-height: 360px;
            padding: 100px 20px 90px;
        }

        .hero h1 {
            font-size: clamp(30px, 10vw, 48px);
        }

        .jadwal-container {
            width: 90%;
            padding: 40px 0;
        }

        .section-title {
            font-size: 26px;
        }

        .schedule-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fa-solid fa-church" style="font-size:10px;"></i>
                Gereja Terbuka Untuk Semua
            </div>
            <h1>Jadwal Ibadah<br><em>&amp; Kegiatan Jemaat</em></h1>
            <p class="hero-sub">Mari bertumbuh bersama dalam iman, doa, dan persekutuan yang penuh kasih</p>
        </div>
    </section>

    <section class="weekly">
        <div class="jadwal-container">
            <div class="section-header">
                <div class="section-label">Setiap Minggu</div>
                <h2 class="section-title">Jadwal Mingguan</h2>
                <div class="section-rule"></div>
            </div>

            @forelse ($jadwalMingguan as $hari => $kegiatanList)
                <div class="day-divider">
                    <span class="day-name">{{ $hari }}</span>
                </div>

                <div class="schedule-grid">
                    @foreach ($kegiatanList as $kegiatan)
                        <div class="schedule-card">
                            <div class="card-icon">
                                <i class="{{ $kegiatan->icon ?: 'fa-solid fa-calendar-heart' }}"></i>
                            </div>

                            <h3 class="card-title">{{ $kegiatan->title }}</h3>

                            <div class="card-meta">
                                <i class="fa-regular fa-clock"></i>
                                <span>
                                    {{ $kegiatan->start_time }}
                                    {{ $kegiatan->end_time ? '– ' . $kegiatan->end_time : '' }} WIB
                                </span>
                            </div>

                            <div class="card-meta">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $kegiatan->location ?: 'Lokasi menyusul' }}</span>
                            </div>

                            @if ($kegiatan->description)
                                <p class="card-desc">{{ $kegiatan->description }}</p>
                            @else
                                <div style="flex:1;"></div>
                            @endif

                            <a href="#" class="btn-detail">
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon"><i class="fa-regular fa-calendar-xmark"></i></div>
                    <p>Jadwal mingguan belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="special">
        <div class="jadwal-container" style="position:relative;z-index:1;">
            <div class="section-header">
                <div class="section-label">Akan Datang</div>
                <h2 class="section-title">Acara Khusus</h2>
                <div class="section-rule"></div>
            </div>

            <div class="schedule-grid">
                @forelse ($acaraKhusus as $acara)
                    <div class="special-card">
                        <div class="card-icon">
                            <i class="{{ $acara->icon ?: 'fa-solid fa-star' }}"></i>
                        </div>
                        <h3 class="card-title">{{ $acara->title }}</h3>
                        <p class="card-desc">{{ $acara->description }}</p>
                        <div class="badge-day">
                            <i class="fa-regular fa-calendar-check" style="font-size:10px;"></i>
                            {{ $acara->day ?: 'Acara Khusus' }}
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon"><i class="fa-regular fa-calendar-xmark"></i></div>
                        <p>Belum ada acara khusus.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection