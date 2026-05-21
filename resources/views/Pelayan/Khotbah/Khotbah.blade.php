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
            --ink-mid: #0D1422;
            --ink-card: rgba(12, 18, 32, 0.97);
            --surface: rgba(255, 255, 255, 0.04);
            --text: #EAE6DF;
            --text-muted: rgba(234, 230, 223, 0.52);
            --border: rgba(201, 169, 110, 0.13);
            --border-strong: rgba(201, 169, 110, 0.28);
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
        }

        /* ================= HERO ================= */

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 65% 90% at 50% 0%,
                    rgba(201, 169, 110, 0.07),
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
            color: var(--text);
        }

        .hero h1 em {
            color: var(--gold);
            font-style: italic;
        }

        .hero-sub {
            color: var(--text-muted);
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
            font-weight: 500;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(26px, 5vw, 40px);
            color: var(--text);
            margin-bottom: 16px;
        }

        .section-rule {
            width: 40px;
            height: 2px;
            background: var(--gold);
            margin: 0 auto;
            opacity: .7;
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
            color: var(--gold);
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 48px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 999px;
            color: var(--text);
            font-size: 14px;
            outline: none;
            transition: .3s;
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        .search-input:focus {
            border-color: var(--border-strong);
            box-shadow: 0 0 0 4px rgba(201, 169, 110, 0.08);
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
            background: linear-gradient(90deg,
                    transparent,
                    var(--gold),
                    transparent);
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
            filter: brightness(.86);
        }

        .khotbah-card:hover .card-thumb img {
            transform: scale(1.06);
        }

        .thumb-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg,
                    rgba(201, 169, 110, 0.08),
                    rgba(201, 169, 110, 0.02));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .thumb-placeholder i {
            font-size: 42px;
            color: var(--gold);
            opacity: .35;
        }

        .thumb-placeholder span {
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--text-muted);
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
            font-weight: 500;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .khotbah-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
            line-height: 1.5;
            color: var(--text);
            margin-bottom: 12px;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .khotbah-desc {
            font-size: 13px;
            color: var(--text-muted);
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
            color: var(--gold-pale);
            border-radius: 999px;
            padding: 11px 22px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: .3s;
        }

        .btn-watch:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--ink);
        }

        .btn-no-video {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
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
            color: var(--gold);
            margin: 0 auto 22px;
            opacity: .7;
        }

        /* ================= PAGINATION ================= */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 55px;
            overflow-x: auto;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 992px) {

            .hero {
                min-height: 330px;
                padding-top: 90px;
            }

            .page-wrap {
                padding: 60px 0 80px;
            }

            .khotbah-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {

            .hero {
                min-height: 300px;
                padding: 90px 18px 60px;
            }

            .hero-sub {
                font-size: 14px;
                line-height: 1.8;
            }

            .section-header {
                margin-bottom: 36px;
            }

            .search-bar {
                margin-bottom: 40px;
            }

            .card-body {
                padding: 20px;
            }

            .khotbah-title {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {

            .page-wrap {
                width: 94%;
                padding: 50px 0 70px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero-eyebrow {
                font-size: 9px;
                padding: 7px 16px;
            }

            .search-input {
                font-size: 13px;
                padding: 13px 18px 13px 44px;
            }

            .khotbah-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .btn-watch {
                width: 100%;
                justify-content: center;
            }

            .card-body {
                padding: 18px;
            }

            .khotbah-desc {
                -webkit-line-clamp: unset;
            }
        }
    </style>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-book-bible" style="font-size:10px;"></i>
                Firman Tuhan
            </div>

            <h1>
                <em>Khotbah</em>
            </h1>

            <p class="hero-sub">
                Mendengarkan Firman Tuhan untuk kehidupan yang lebih bermakna
                dan bertumbuh dalam iman.
            </p>

        </div>
    </section>

    <!-- CONTENT -->
    <div class="page-wrap">

        <div class="section-header">
            <span class="section-label">
                Arsip Khotbah
            </span>

            <h2 class="section-title">
                Koleksi Firman Tuhan
            </h2>

            <div class="section-rule"></div>
        </div>

        <!-- SEARCH -->
        <div class="search-bar">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text" class="search-input" id="searchKhotbah" placeholder="Cari judul khotbah...">

        </div>

        <!-- GRID -->
        <div class="khotbah-grid" id="khotbahGrid">

            @forelse($khotbah as $item)

                <div class="khotbah-card" data-title="{{ strtolower($item->title) }}">

                    <!-- THUMB -->
                    <div class="card-thumb">

                        @if($item->thumbnail)

                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy">

                        @else

                            <div class="thumb-placeholder">
                                <i class="fa-solid fa-play-circle"></i>
                                <span>Video Khotbah</span>
                            </div>

                        @endif

                        @if($item->video)

                            <div class="video-pill">
                                <i class="fa-solid fa-video" style="font-size:9px;"></i>
                                Video
                            </div>

                        @endif

                    </div>

                    <!-- BODY -->
                    <div class="card-body">

                        <div class="khotbah-date">

                            <i class="fa-regular fa-calendar"></i>

                            {{ $item->sermon_date
                ? \Carbon\Carbon::parse($item->sermon_date)->translatedFormat('d F Y')
                : '—' }}

                        </div>

                        <div class="khotbah-title">
                            {{ $item->title }}
                        </div>

                        @if($item->description)

                            <div class="khotbah-desc">
                                {{ $item->description }}
                            </div>

                        @endif

                        <div class="card-footer">

                            @if($item->video)

                                <a href="{{ $item->video }}" target="_blank" rel="noopener" class="btn-watch">

                                    <i class="fa-solid fa-play" style="font-size:10px;"></i>

                                    Tonton Khotbah

                                </a>

                            @else

                                <span class="btn-no-video">

                                    <i class="fa-solid fa-video-slash"></i>

                                    Video tidak tersedia

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>

                    <h4 style="margin-bottom:8px;font-size:18px;">
                        Belum Ada Khotbah
                    </h4>

                    <p style="color:var(--text-muted);font-size:14px;">
                        Khotbah akan segera ditampilkan di sini.
                    </p>

                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if(method_exists($khotbah, 'links') && $khotbah->hasPages())

            <div class="pagination-wrap">
                {{ $khotbah->links() }}
            </div>

        @endif

    </div>

    <script>
        const searchInput = document.getElementById('searchKhotbah');

        document.querySelectorAll('.khotbah-card').forEach(card => {
            card._title = card.dataset.title || '';
        });

        searchInput.addEventListener('input', function () {

            const q = this.value.toLowerCase().trim();

            document.querySelectorAll('.khotbah-card').forEach(card => {

                card.style.display =
                    (!q || card._title.includes(q))
                        ? ''
                        : 'none';

            });

        });
    </script>

@endsection