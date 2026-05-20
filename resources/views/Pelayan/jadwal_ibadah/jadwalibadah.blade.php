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
            --gold: #C9A96E;
            --gold-pale: #E8D5A3;
            --gold-dim: rgba(201, 169, 110, 0.12);
            --ink: #0A0E17;
            --ink-mid: #0E1524;
            --ink-card: rgba(15, 22, 38, 0.95);
            --surface: rgba(255, 255, 255, 0.04);
            --surface-hover: rgba(255, 255, 255, 0.07);
            --text: #EAE6DF;
            --text-muted: rgba(234, 230, 223, 0.52);
            --border: rgba(201, 169, 110, 0.13);
            --border-strong: rgba(201, 169, 110, 0.3);
            --radius: 20px;
            --radius-sm: 12px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--ink);
            color: var(--text);
        }

        /* HERO */

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 100% at 50% 0%, rgba(201, 169, 110, 0.08), transparent 65%);
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: var(--ink);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 680px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 7px 20px;
            font-size: 10px;
            font-weight: 500;
            color: var(--gold-pale);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(38px, 6vw, 68px);
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero h1 em {
            color: var(--gold);
            font-style: italic;
        }

        .hero-sub {
            color: var(--text-muted);
            font-size: 15px;
            line-height: 1.8;
            font-weight: 300;
        }

        /* WEEKLY SECTION */
        .weekly {
            background: var(--ink);
            padding: 80px 0 100px;
        }

        .jadwal-container {
            width: 90%;
            max-width: 1160px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 64px;
        }

        .section-label {
            display: inline-block;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(26px, 4vw, 40px);
            color: var(--text);
            margin-bottom: 18px;
        }

        .section-rule {
            width: 40px;
            height: 2px;
            background: var(--gold);
            margin: 0 auto;
            opacity: 0.7;
        }

        /* DAY DIVIDER */
        .day-divider {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
            margin-top: 52px;
        }

        .day-divider:first-child {
            margin-top: 0;
        }

        .day-divider::before,
        .day-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .day-name {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            color: var(--text);
            white-space: nowrap;
            letter-spacing: 0.02em;
        }

        /* SCHEDULE CARD */
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 22px;
            margin-bottom: 20px;
        }

        .schedule-card {
            background: var(--ink-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 32px 28px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            transition: all 0.32s ease;
            height: 100%;
        }

        .schedule-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .schedule-card:hover {
            border-color: var(--border-strong);
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .schedule-card:hover::before {
            opacity: 1;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--gold);
            margin-bottom: 20px;
        }

        .card-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
            color: var(--text);
            margin-bottom: 16px;
            line-height: 1.35;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .card-meta i {
            color: var(--gold);
            font-size: 12px;
        }

        .card-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.7;
            margin: 14px 0 20px;
            flex: 1;
        }

        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 500;
            color: var(--gold-pale);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 8px 18px;
            text-decoration: none;
            transition: all 0.25s;
            width: fit-content;
        }

        .btn-detail:hover {
            background: var(--gold);
            color: var(--ink);
            border-color: var(--gold);
        }

        /* SPECIAL SECTION */
        .special {
            background: var(--ink-mid);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            border-top: 1px solid var(--border);
        }

        .special::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 50% 60% at 50% 50%, rgba(201, 169, 110, 0.04), transparent 70%);
        }

        .special-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 36px 30px;
            height: 100%;
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }

        .special-card:hover {
            background: var(--surface-hover);
            border-color: var(--border-strong);
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .badge-day {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 6px 16px;
            font-size: 11px;
            color: var(--gold-pale);
            margin-top: 18px;
        }

        /* EMPTY */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 40px;
            color: var(--gold);
            opacity: 0.3;
            margin-bottom: 16px;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {

            .weekly,
            .special {
                padding: 60px 0;
            }

            .schedule-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- HERO -->
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

    <!-- JADWAL MINGGUAN -->
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

    <!-- ACARA KHUSUS -->
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
                    <div class="empty-state" style="grid-column:1/-1;">
                        <div class="empty-icon"><i class="fa-regular fa-calendar-xmark"></i></div>
                        <p>Belum ada acara khusus.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection