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
            --blue-mid: #B9D7EA;
            --blue-pale: #D6E6F2;
            --blue-ghost: #F7FBFC;

            /* ── Turunan Fungsional ── */
            --accent: var(--blue-deep);
            --accent-dim: rgba(118, 159, 205, 0.14);

            --ink: #1A2B3C;
            --ink-mid: #2E4A63;
            --ink-muted: #5C7A95;

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
            font-size: clamp(45px, 7.5vw, 68px);
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
                   GRID
                ============================================================ */
        .pengumuman-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 320px));
            gap: 22px;
            justify-content: center;
        }

        /* ============================================================
                   CARD
                ============================================================ */
        .pengumuman-card {
            background: var(--surface);
            border: 1.5px solid var(--blue-pale);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
            position: relative;
            max-width: 320px;
            margin: 0 auto;
        }

        .pengumuman-card::after {
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

        .pengumuman-card:hover {
            transform: translateY(-5px);
            border-color: var(--blue-mid);
            box-shadow: 0 18px 44px rgba(118, 159, 205, 0.18);
        }

        .pengumuman-card:hover::after {
            opacity: 1;
        }

        /* ============================================================
                   CARD IMAGE
                ============================================================ */
        .card-img {
            width: 100%;
            aspect-ratio: 4/3;
            overflow: hidden;
            position: relative;
            background: var(--surface-alt);
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .pengumuman-card:hover .card-img img {
            transform: scale(1.05);
        }

        .card-img-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--blue-pale), var(--surface-alt));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .card-img-placeholder i {
            font-size: 40px;
            color: var(--blue-deep);
            opacity: .40;
        }

        .card-img-placeholder span {
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--ink-muted);
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

        .card-date {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--blue-deep);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .card-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 15px;
            line-height: 1.55;
            color: var(--ink);
            margin: 0 0 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-excerpt {
            font-size: 12px;
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

        .btn-read {
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

        .btn-read:hover {
            background: var(--blue-deep);
            border-color: var(--blue-deep);
            color: #FFFFFF;
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

        @media(max-width:576px) {

            .pengumuman-card {
                margin: 0 auto;
            }

            .card-img {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card-img img {
                width: auto;
                max-width: 100%;
                margin: 0 auto;
                display: block;
            }

            .pengumuman-grid {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .pengumuman-card {
                width: 100%;
                max-width: 320px;
            }

        }
    </style>

    <!-- ── HERO ─────────────────────────────────────────────── -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-bullhorn" style="font-size:10px;"></i>
                Informasi Gereja
            </div>

            <h1>Pengumuman <em>Gereja</em></h1>

            <p class="hero-sub">
                Informasi terbaru dan pengumuman resmi dari gereja untuk seluruh jemaat.
            </p>

        </div>
    </section>

    <!-- ── CONTENT ───────────────────────────────────────────── -->
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
                    <div class="empty-icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>
                    <h4>Belum Ada Pengumuman</h4>
                    <p>Pengumuman akan segera ditampilkan di sini. Tetap update!</p>
                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if(method_exists($pengumuman, 'links') && $pengumuman->hasPages())
            <div class="pagination-wrap">
                {{ $pengumuman->links() }}
            </div>
        @endif

    </div>

@endsection