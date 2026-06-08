@extends('layouts.app')

@section('content')
    <style>
        /* =====================================
           HERO
        ===================================== */

        .jd-hero {
            position: relative;
            padding: clamp(75px, 10vw, 120px) 16px clamp(65px, 8vw, 95px);
            overflow: hidden;
            text-align: center;

            background:
                radial-gradient(circle at top left, rgba(118, 159, 205, .25), transparent 35%),
                radial-gradient(circle at bottom right, rgba(185, 215, 234, .35), transparent 35%),
                linear-gradient(135deg,
                    #F7FBFC 0%,
                    #D6E6F2 50%,
                    #B9D7EA 100%);

            border-bottom: 1px solid rgba(118, 159, 205, .15);
        }

        .jd-hero::before {
            content: '';
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(rgba(118, 159, 205, .08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(118, 159, 205, .08) 1px, transparent 1px);

            background-size: 60px 60px;

            mask-image: radial-gradient(circle at center, black 20%, transparent 85%);

            pointer-events: none;
        }

        .jd-hero .wrap {
            position: relative;
            z-index: 2;
            max-width: 720px;
            margin: auto;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;

            color: #769FCD;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;

            margin-bottom: 20px;
        }

        .eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #769FCD;
        }

        .jd-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(45px, 7vw, 70px);
            font-weight: 700;
            line-height: 1.08;

            color: #4B6584;

            margin-bottom: 18px;
        }

        .jd-hero h1 em {
            font-style: normal;

            background: linear-gradient(135deg,
                    #769FCD,
                    #5E87B8);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .jd-hero p {
            font-size: clamp(14px, 2vw, 16px);
            font-weight: 400;
            line-height: 1.8;

            color: #66788C;

            max-width: 520px;
            margin: auto;
        }

        /* =====================================
           SECTION
        ===================================== */

        .jd-weekly,
        .jd-special {
            padding: clamp(60px, 8vw, 95px) 0;
        }

        .jd-weekly {
            background: #F7FBFC;
        }

        .jd-special {
            background: #EEF5FA;
            border-top: 1px solid #D6E6F2;
        }

        .global-container {
            width: 100%;
            max-width: 1280px;
            margin: auto;
            padding: 0 18px;
        }

        .section-head {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-label {
            display: inline-block;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;

            color: #769FCD;

            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 700;

            line-height: 1.2;
            color: #4B6584;

            margin-bottom: 18px;
        }

        .section-rule {
            width: 65px;
            height: 3px;
            border-radius: 999px;

            background: linear-gradient(90deg,
                    #769FCD,
                    #B9D7EA);

            margin: auto;
        }

        /* =====================================
           DAY TITLE
        ===================================== */

        .jd-day {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .jd-day::before,
        .jd-day::after {
            content: '';
            flex: 1;
            height: 1px;

            background: linear-gradient(90deg,
                    transparent,
                    rgba(118, 159, 205, .35));
        }

        .jd-day::after {
            background: linear-gradient(90deg,
                    rgba(118, 159, 205, .35),
                    transparent);
        }

        .jd-day-text {
            font-family: 'Playfair Display', serif;
            font-size: clamp(18px, 2.5vw, 22px);
            font-weight: 700;

            color: #4B6584;

            white-space: nowrap;
        }

        /* =====================================
           CARD
        ===================================== */

        .jd-card,
        .jd-special-card {
            position: relative;
            height: 100%;

            overflow: hidden;

            border-radius: 22px;

            background: #FFFFFF;
            border: 1px solid #D6E6F2;

            padding: 24px;

            transition:
                transform .35s ease,
                box-shadow .35s ease,
                border-color .3s ease;

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .10);
        }

        .jd-card::before,
        .jd-special-card::before {
            content: '';

            position: absolute;
            top: 0;
            left: 0;
            right: 0;

            height: 3px;

            background: linear-gradient(90deg,
                    #769FCD,
                    #B9D7EA);

            opacity: 0;
            transition: opacity .3s ease;
        }

        .jd-card:hover,
        .jd-special-card:hover {
            transform: translateY(-8px);

            border-color: #769FCD;

            box-shadow:
                0 20px 40px rgba(118, 159, 205, .22);
        }

        .jd-card:hover::before,
        .jd-special-card:hover::before {
            opacity: 1;
        }

        .jd-card-icon {
            width: 54px;
            height: 54px;

            border-radius: 16px;

            background: #D6E6F2;
            border: 1px solid #B9D7EA;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #769FCD;
            font-size: 22px;

            margin-bottom: 20px;
        }

        .jd-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;

            color: #4B6584;

            line-height: 1.35;
            margin-bottom: 16px;
        }

        .jd-card-meta {
            display: flex;
            align-items: flex-start;
            gap: 8px;

            margin-bottom: 8px;

            color: #6E7E91;
            font-size: 13.5px;
            line-height: 1.6;
        }

        .jd-card-meta i {
            color: #769FCD;
            font-size: 13px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .jd-card-desc {
            margin-top: 14px;
            margin-bottom: 22px;

            font-size: 14px;
            line-height: 1.7;

            color: #7A8796;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

            overflow: hidden;
        }

        /* =====================================
           BUTTON
        ===================================== */

        .jd-btn-detail {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            border-radius: 999px;
            padding: 10px 18px;

            background: #D6E6F2;
            border: 1px solid #B9D7EA;

            color: #4B6584;
            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition: .3s;
        }

        .jd-btn-detail:hover {
            background: #769FCD;
            border-color: #769FCD;
            color: white;
        }

        /* =====================================
           BADGE
        ===================================== */

        .jd-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            border-radius: 999px;

            padding: 7px 14px;
            margin-top: 14px;

            background: #D6E6F2;
            border: 1px solid #B9D7EA;

            color: #4B6584;

            font-size: 12px;
            font-weight: 600;
        }

        /* =====================================
           EMPTY
        ===================================== */

        .jd-empty {
            text-align: center;
            padding: 70px 20px;
            color: #7A8796;
        }

        .jd-empty i {
            font-size: 44px;
            color: #769FCD;

            display: block;
            margin-bottom: 14px;
        }

        /* =====================================
           ANIMATION
        ===================================== */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media(max-width:768px) {

            .section-head {
                margin-bottom: 44px;
            }

            .jd-card,
            .jd-special-card {
                padding: 20px;
            }

            .jd-card-title {
                font-size: 18px;
            }
        }

        @media(max-width:576px) {

            .jd-day {
                gap: 10px;
            }

            .jd-day-text {
                font-size: 18px;
            }

            .jd-card:hover,
            .jd-special-card:hover {
                transform: none;
            }

            .jd-btn-detail {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- HERO -->
    <section class="jd-hero">
        <div class="wrap container">
            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Gereja Terbuka Untuk Semua
                <span class="eyebrow-dot"></span>
            </div>

            <h1>
                Jadwal Ibadah<br>
                <em>&amp; Kegiatan Jemaat</em>
            </h1>

            <p>
                Mari bertumbuh bersama dalam iman, doa, dan persekutuan
                yang penuh kasih di dalam Tuhan.
            </p>
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

                <div class="jd-day">
                    <span class="jd-day-text">{{ $hari }}</span>
                </div>

                <div class="row g-4 mb-5">
                    @foreach($kegiatanList as $kegiatan)

                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="jd-card">

                                <div class="jd-card-icon">
                                    <i class="{{ $kegiatan->icon ?: 'bi bi-calendar-heart' }}"></i>
                                </div>

                                <h3 class="jd-card-title">
                                    {{ $kegiatan->title }}
                                </h3>

                                <div class="jd-card-meta">
                                    <i class="bi bi-clock"></i>
                                    <span>
                                        {{ $kegiatan->start_time }}
                                        @if($kegiatan->end_time)
                                            - {{ $kegiatan->end_time }}
                                        @endif
                                        WIB
                                    </span>
                                </div>

                                <div class="jd-card-meta">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>
                                        {{ $kegiatan->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                @if($kegiatan->description)
                                    <p class="jd-card-desc">
                                        {{ \Illuminate\Support\Str::limit($kegiatan->description, 140, '...') }}
                                    </p>
                                @endif

                                <a href="{{ route('user.jadwal.show', $kegiatan->id) }}" class="jd-btn-detail">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>
                        </div>

                    @endforeach
                </div>

            @empty

                <div class="jd-empty">
                    <i class="bi bi-calendar2-x"></i>
                    <p>Jadwal mingguan belum tersedia.</p>
                </div>

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

            <div class="row g-4 justify-content-center">

                @forelse($acaraKhusus as $acara)

                    <div class="col-12 col-sm-6 col-lg-4">

                        <div class="jd-special-card">

                            <div class="jd-card-icon">
                                <i class="{{ $acara->icon ?: 'bi bi-stars' }}"></i>
                            </div>

                            <h3 class="jd-card-title">
                                {{ $acara->title }}
                            </h3>

                            <p class="jd-card-desc">
                                {{ $acara->description }}
                            </p>

                            <div class="jd-badge">
                                <i class="bi bi-calendar2-check"></i>
                                {{ $acara->day ?: 'Acara Khusus' }}
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="jd-empty">
                        <i class="bi bi-calendar2-x"></i>
                        <p>Belum ada acara khusus.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>
@endsection