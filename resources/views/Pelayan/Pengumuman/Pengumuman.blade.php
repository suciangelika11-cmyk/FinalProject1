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
            --gold: #7FCBF5;
            --gold-pale: #E5F7FF;
            --gold-dim: rgba(127, 203, 245, 0.14);

            --ink: #07111F;
            --ink-mid: #0B1830;
            --ink-card: rgba(10, 20, 40, 0.97);

            --surface: rgba(255, 255, 255, 0.04);

            /* FONT COLORS */
            --text: #F2FBFF;
            --text-muted: rgba(210, 240, 255, 0.78);

            --border: rgba(127, 203, 245, 0.14);
            --border-strong: rgba(127, 203, 245, 0.32);

            --radius: 20px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(180deg, #07111F 0%, #0B1D3A 100%);
            color: var(--text);
        }

<<<<<<< HEAD
        /* ================= HERO ================= */
        .hero {
            position: relative;
            min-height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            padding: 100px 20px 80px;
            background: var(--ink-mid);
            border-bottom: 1px solid var(--border);
        }
=======
        /* HERO */
>>>>>>> 345e4aa07069f33de2acccec842637325bed1e18

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 65% 90% at 50% 0%,
                    rgba(127, 203, 245, 0.12),
                    transparent 65%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
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
            font-size: clamp(42px, 8vw, 72px);
            line-height: 1.1;
            margin-bottom: 18px;
            color: #FFFFFF;
        }

        .hero h1 em {
            color: #7FCBF5;
            font-style: italic;
        }

        .hero-sub {
            color: #DDF4FF;
            font-size: 15px;
            line-height: 1.9;
            font-weight: 300;
        }

        /* ================= PAGE ================= */
        .page-wrap {
            width: 92%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 70px 0 100px;
        }

        /* ================= SECTION ================= */
        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #9DDAFF;
            display: block;
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(26px, 5vw, 40px);
            color: #FFFFFF;
            margin-bottom: 16px;
        }

        .section-rule {
            width: 40px;
            height: 2px;
            background: #7FCBF5;
            margin: 0 auto;
            opacity: .8;
        }

        /* ================= SEARCH ================= */
        .search-bar {
            max-width: 520px;
            margin: 0 auto 50px;
            position: relative;
        }

        .search-bar i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #7FCBF5;
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 48px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            border-radius: 999px;
            color: #FFFFFF;
            font-size: 14px;
            outline: none;
            transition: .3s;
        }

        .search-input::placeholder {
            color: rgba(220, 240, 255, 0.58);
        }

        .search-input:focus {
            border-color: var(--border-strong);
            box-shadow: 0 0 0 4px rgba(127, 203, 245, 0.08);
        }

        /* ================= GRID ================= */
        .khotbah-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
        }

        /* ================= CARD ================= */
        .khotbah-card {
            background: var(--ink-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: .35s ease;
            position: relative;
        }

        .khotbah-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(
                90deg,
                transparent,
                #7FCBF5,
                transparent
            );
            opacity: 0;
            transition: .3s;
        }

        .khotbah-card:hover {
            transform: translateY(-6px);
            border-color: var(--border-strong);
            box-shadow: 0 22px 56px rgba(0, 0, 0, .45);
        }

        .khotbah-card:hover::after {
            opacity: 1;
        }

        /* ================= THUMB ================= */
        .card-thumb {
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            position: relative;
            background: var(--ink-mid);
        }

        .card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s ease;
            filter: brightness(.92);
        }

        .khotbah-card:hover .card-thumb img {
            transform: scale(1.06);
        }

        .thumb-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(
                135deg,
                rgba(127, 203, 245, 0.08),
                rgba(127, 203, 245, 0.02)
            );

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .thumb-placeholder i {
            font-size: 42px;
            color: #7FCBF5;
            opacity: .5;
        }

        .thumb-placeholder span {
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #CFEFFF;
        }

        .video-pill {
            position: absolute;
            top: 14px;
            right: 14px;
            background: rgba(0, 0, 0, .58);
            backdrop-filter: blur(6px);
            color: var(--gold-pale);
            font-size: 10px;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid rgba(255, 255, 255, .08);
        }

        /* ================= BODY ================= */
        .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .khotbah-date {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #9DDAFF;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .khotbah-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
            line-height: 1.5;
            color: #FFFFFF;
            margin-bottom: 12px;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .khotbah-desc {
            font-size: 13px;
            color: #D6EEFF;
            line-height: 1.8;
            flex: 1;
            margin-bottom: 22px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .05);
        }

        .btn-watch {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold-dim);
            border: 1px solid var(--border-strong);
            color: #E7F8FF;
            border-radius: 999px;
            padding: 11px 22px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: .3s;
        }

        .btn-watch:hover {
            background: #7FCBF5;
            border-color: #7FCBF5;
            color: #07111F;
        }

        .btn-no-video {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #CDEBFF;
            font-size: 12px;
            padding: 10px 0;
        }

        /* ================= EMPTY ================= */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1/-1;
        }

        .empty-icon {
            width: 78px;
            height: 78px;
            border-radius: 18px;
            background: var(--gold-dim);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #7FCBF5;
            margin: 0 auto 22px;
            opacity: .8;
        }

        /* ================= PAGINATION ================= */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 55px;
            overflow-x: auto;
        }
    </style>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fa-solid fa-bullhorn" style="font-size:10px;"></i>
                Informasi Gereja
            </div>
            <h1>Pengumuman <em>Gereja</em></h1>
            <p class="hero-sub">Informasi terbaru dan pengumuman resmi dari gereja untuk seluruh jemaat</p>
        </div>
    </section>

    <!-- CONTENT -->
    <div class="page-wrap">
        <div class="section-header">
            <span class="section-label">Terkini</span>
            <h2 class="section-title">Berita &amp; Pengumuman</h2>
            <div class="section-rule"></div>
        </div>

        <div class="pengumuman-grid">
            @forelse($pengumuman as $item)
                <div class="pengumuman-card">

                    <div class="card-img">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy">
                        @else
                            <div class="card-img-placeholder">
                                <i class="fa-regular fa-newspaper"></i>
                                <span>Pengumuman</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="card-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $item->publish_date
                ? \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d F Y')
                : '—' }}
                        </div>

                        <h3 class="card-title">{{ $item->title }}</h3>

                        <div class="card-excerpt">
                            {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('pelayan.pengumuman.show', $item->id) }}" class="btn-read">
                                <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i>
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="empty-state">
                    <div class="empty-icon"><i class="fa-regular fa-newspaper"></i></div>
                    <h4 style="margin-bottom:8px;font-size:18px;">Belum Ada Pengumuman</h4>
                    <p style="color:var(--text-muted);font-size:14px;">Pengumuman akan segera ditampilkan di sini. Tetap update!
                    </p>
                </div>
            @endforelse
        </div>
    </div>

@endsection