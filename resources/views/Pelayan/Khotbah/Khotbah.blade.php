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
            /* ── Palet Utama ── */
            --blue-deep: #769FCD;
            /* aksen primer */
            --blue-mid: #B9D7EA;
            /* aksen sekunder / border tegas */
            --blue-pale: #D6E6F2;
            /* latar kartu / border halus */
            --blue-ghost: #F7FBFC;
            /* latar halaman */

            /* ── Turunan Fungsional ── */
            --accent: var(--blue-deep);
            --accent-dim: rgba(118, 159, 205, 0.14);
            --accent-glow: rgba(118, 159, 205, 0.22);

            --ink: #1A2B3C;
            /* teks utama */
            --ink-mid: #2E4A63;
            /* teks sekunder */
            --ink-muted: #5C7A95;
            /* teks halus */

            --surface: #FFFFFF;
            --surface-alt: #EEF5FB;

            --border: rgba(118, 159, 205, 0.22);
            --border-strong: rgba(118, 159, 205, 0.45);

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
            background: var(--blue-ghost);
            color: var(--ink);
        }

        /* ============================================================
               HERO
            ============================================================ */
        .hero {
            position: relative;
            padding: 90px 6% 80px;
            background: linear-gradient(160deg, #DEEEF8 0%, #EEF5FB 60%, var(--blue-ghost) 100%);
            border-bottom: 1px solid var(--border);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(118, 159, 205, 0.10);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(185, 215, 234, 0.14);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 680px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(118, 159, 205, 0.12);
            border: 1px solid var(--border-strong);
            border-radius: 999px;
            padding: 7px 18px;
            font-size: 10px;
            font-weight: 600;
            color: var(--blue-deep);
            letter-spacing: 0.20em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(47px, 7.5vw, 70px);
            line-height: 1.12;
            margin: 0 0 16px;
            color: var(--ink);
        }

        .hero h1 em {
            color: var(--blue-deep);
            font-style: italic;
        }

        .hero-sub {
            color: var(--ink-muted);
            font-size: 15px;
            line-height: 1.9;
            font-weight: 300;
            max-width: 480px;
        }

        /* ============================================================
               PAGE WRAP
            ============================================================ */
        .page-wrap {
            width: 92%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 64px 0 100px;
        }

        /* ============================================================
               SECTION HEADER
            ============================================================ */
        .section-header {
            text-align: center;
            margin-bottom: 44px;
        }

        .section-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--blue-deep);
            display: block;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(24px, 4.5vw, 38px);
            color: var(--ink);
            margin: 0 0 16px;
        }

        .section-rule {
            width: 36px;
            height: 2.5px;
            border-radius: 99px;
            background: var(--blue-deep);
            margin: 0 auto;
            opacity: .7;
        }

        /* ============================================================
               SEARCH BAR
            ============================================================ */
        .search-bar {
            max-width: 500px;
            margin: 0 auto 46px;
            position: relative;
        }

        .search-bar i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--blue-deep);
            font-size: 14px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 14px 20px 14px 48px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 999px;
            color: var(--ink);
            font-size: 14px;
            outline: none;
            transition: border-color .25s, box-shadow .25s;
            font-family: 'Outfit', sans-serif;
        }

        .search-input::placeholder {
            color: var(--ink-muted);
        }

        .search-input:focus {
            border-color: var(--blue-deep);
            box-shadow: 0 0 0 4px rgba(118, 159, 205, 0.15);
        }

        /* ============================================================
               GRID
            ============================================================ */
        .khotbah-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
            gap: 22px;
        }

        /* ============================================================
               CARD
            ============================================================ */
        .khotbah-card {
            background: var(--surface);
            border: 1.5px solid var(--blue-pale);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
            position: relative;
        }

        .khotbah-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--blue-deep);
            opacity: 0;
            transition: opacity .3s;
        }

        .khotbah-card:hover {
            transform: translateY(-5px);
            border-color: var(--blue-mid);
            box-shadow: 0 18px 44px rgba(118, 159, 205, 0.18);
        }

        .khotbah-card:hover::after {
            opacity: 1;
        }

        /* ============================================================
               THUMBNAIL
            ============================================================ */
        .card-thumb {
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            position: relative;
            background: var(--surface-alt);
        }

        .card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .khotbah-card:hover .card-thumb img {
            transform: scale(1.05);
        }

        .thumb-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--blue-pale), var(--surface-alt));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .thumb-placeholder i {
            font-size: 40px;
            color: var(--blue-deep);
            opacity: .40;
        }

        .thumb-placeholder span {
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--ink-muted);
        }

        .video-pill {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(6px);
            color: var(--blue-deep);
            font-size: 10px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid var(--border-strong);
        }

        /* ============================================================
               CARD BODY
            ============================================================ */
        .card-body {
            padding: 22px 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .khotbah-date {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--blue-deep);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .khotbah-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 17px;
            line-height: 1.55;
            color: var(--ink);
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .khotbah-desc {
            font-size: 13px;
            color: var(--ink-muted);
            line-height: 1.8;
            flex: 1;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            padding-top: 16px;
            border-top: 1px solid var(--blue-pale);
        }

        .btn-watch {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--accent-dim);
            border: 1.5px solid var(--border-strong);
            color: var(--blue-deep);
            border-radius: 999px;
            padding: 10px 20px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: background .25s, color .25s, border-color .25s;
            font-family: 'Outfit', sans-serif;
        }

        .btn-watch:hover {
            background: var(--blue-deep);
            border-color: var(--blue-deep);
            color: #FFFFFF;
        }

        .btn-no-video {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--ink-muted);
            font-size: 12px;
            padding: 10px 0;
        }

        /* ============================================================
               EMPTY STATE
            ============================================================ */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1/-1;
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            border-radius: 18px;
            background: var(--surface-alt);
            border: 1.5px solid var(--blue-pale);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--blue-deep);
            margin: 0 auto 20px;
        }

        .empty-state h4 {
            margin: 0 0 8px;
            font-size: 17px;
            color: var(--ink);
        }

        .empty-state p {
            color: var(--ink-muted);
            font-size: 14px;
            margin: 0;
        }

        /* ============================================================
               PAGINATION
            ============================================================ */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 52px;
            overflow-x: auto;
        }
    </style>

    <!-- ── HERO ─────────────────────────────────────────────── -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-book-bible" style="font-size:10px;"></i>
                Firman Tuhan
            </div>

            <h1><em>Khotbah</em></h1>

            <p class="hero-sub">
                Mendengarkan Firman Tuhan untuk kehidupan yang lebih bermakna
                dan bertumbuh dalam iman.
            </p>

        </div>
    </section>

    <!-- ── CONTENT ───────────────────────────────────────────── -->
    <div class="page-wrap">

        <div class="section-header">
            <span class="section-label">Arsip Khotbah</span>
            <h2 class="section-title">Koleksi Firman Tuhan</h2>
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

                        <div class="khotbah-title">{{ $item->title }}</div>

                        @if($item->description)
                            <div class="khotbah-desc">{{ $item->description }}</div>
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
                    <h4>Belum Ada Khotbah</h4>
                    <p>Khotbah akan segera ditampilkan di sini.</p>
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
                card.style.display = (!q || card._title.includes(q)) ? '' : 'none';
            });
        });
    </script>

@endsection