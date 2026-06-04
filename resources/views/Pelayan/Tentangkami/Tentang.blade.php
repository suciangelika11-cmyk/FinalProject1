@extends('Pelayan.layouts.pelayan')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
    /* ─────────────────────────────────────────
       DESIGN TOKENS
       Palette: #769FCD · #B9D7EA · #D6E6F2 · #F7FBFC
    ───────────────────────────────────────── */
    :root {
        /* Brand palette */
        --c1: #769FCD;          /* blue-dark  */
        --c2: #B9D7EA;          /* blue-mid   */
        --c3: #D6E6F2;          /* blue-light */
        --c4: #F7FBFC;          /* blue-pale  */

        /* Derived tints */
        --c1-dim:    rgba(118, 159, 205, 0.10);
        --c1-glow:   rgba(118, 159, 205, 0.18);
        --c1-border: rgba(118, 159, 205, 0.22);
        --c1-strong: rgba(118, 159, 205, 0.45);

        /* Dark surface (hero / navbar) */
        --ink:       #1A2B3C;
        --ink-mid:   #213347;
        --ink-deep:  #2A4A6B;

        /* Text */
        --text:       #1A2B3C;
        --text-muted: #4A6178;
        --text-light: #7C96AE;

        /* Misc */
        --white:      #FFFFFF;
        --radius:     20px;
        --radius-sm:  12px;
        --shadow-sm:  0 2px 12px rgba(118, 159, 205, 0.10);
        --shadow-md:  0 6px 28px rgba(118, 159, 205, 0.16);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Outfit', sans-serif;
        background: var(--c4);
        color: var(--text);
    }

    /* ─────────────────────────────────────────
       HERO
    ───────────────────────────────────────── */
    .hero {
        position: relative;
        background: linear-gradient(135deg, var(--c3) 0%, var(--c2) 50%, var(--c3) 100%);
        padding: 100px 40px 120px;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 70% 90% at 50% 0%, rgba(118, 159, 205, 0.05), transparent 65%);
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -1px; left: 0; right: 0;
        height: 72px;
        background: var(--c4);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .hero-grid-overlay {
        position: absolute;
        inset: 0;
        background-image:
            repeating-linear-gradient(  0deg, transparent, transparent 70px, rgba(118,159,205,0.03) 70px, rgba(118,159,205,0.03) 71px),
            repeating-linear-gradient( 90deg, transparent, transparent 70px, rgba(118,159,205,0.03) 70px, rgba(118,159,205,0.03) 71px);
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
        background: rgba(118, 159, 205, 0.15);
        border: 1px solid rgba(118, 159, 205, 0.25);
        border-radius: 40px;
        padding: 7px 20px;
        font-size: 10px;
        font-weight: 500;
        color: var(--c1);
        letter-spacing: 0.2em;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .hero h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(38px, 6vw, 68px);
        line-height: 1.1;
        margin-bottom: 18px;
        color: var(--ink-deep);
    }

    /* ── PERUBAHAN: warna "Gereja" di hero ── */
    .hero h1 em {
        color: #769FCD !important;
        font-style: italic;
        text-shadow: 0 1px 2px rgba(118, 159, 205, 0.25);
    }

    .hero-sub {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.85;
        font-weight: 300;
    }

    /* ─────────────────────────────────────────
       LAYOUT
    ───────────────────────────────────────── */
    .page-wrap {
        width: 90%;
        max-width: 1060px;
        margin: 0 auto;
        padding: 80px 0 110px;
    }

    .section-divider {
        border: none;
        height: 1px;
        background: var(--c1-border);
        margin: 80px 0;
    }

    /* ─────────────────────────────────────────
       SECTION HEADER
    ───────────────────────────────────────── */
    .section-header {
        text-align: center;
        margin-bottom: 52px;
    }

    .section-label {
        display: inline-block;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        color: var(--c1);
        background: var(--c1-dim);
        border: 1px solid var(--c1-border);
        border-radius: 40px;
        padding: 5px 16px;
        margin-bottom: 14px;
    }

    .section-title {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(26px, 4vw, 36px);
        color: var(--text);
        margin-bottom: 16px;
    }

    .section-rule {
        width: 36px;
        height: 2.5px;
        background: var(--c1);
        margin: 0 auto;
        border-radius: 2px;
        opacity: 0.55;
    }

    /* ─────────────────────────────────────────
       SEJARAH CARD
    ───────────────────────────────────────── */
    .sejarah-card {
        background: var(--white);
        border: 1px solid var(--c1-border);
        border-radius: var(--radius);
        padding: 48px 52px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .sejarah-card::before {
        content: '\201C';
        position: absolute;
        top: -20px; left: 32px;
        font-family: 'Libre Baskerville', serif;
        font-size: 160px;
        color: var(--c1);
        opacity: 0.07;
        line-height: 1;
        pointer-events: none;
    }

    .sejarah-inner {
        display: flex;
        align-items: flex-start;
        gap: 32px;
    }

    .sejarah-icon {
        width: 56px; height: 56px;
        border-radius: 16px;
        background: var(--c1-dim);
        border: 1px solid var(--c1-strong);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: var(--c1);
        flex-shrink: 0;
    }

    .sejarah-text {
        font-size: 15.5px;
        color: var(--text-muted);
        line-height: 1.95;
    }

    /* ─────────────────────────────────────────
       VISI & MISI
    ───────────────────────────────────────── */
    .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    .vm-card {
        background: var(--white);
        border: 1px solid var(--c1-border);
        border-radius: var(--radius);
        padding: 40px 36px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: border-color 0.32s ease, transform 0.32s ease, box-shadow 0.32s ease;
        box-shadow: var(--shadow-sm);
    }

    .vm-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--c1), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .vm-card:hover {
        border-color: var(--c1-strong);
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .vm-card:hover::before { opacity: 1; }

    .vm-icon {
        width: 60px; height: 60px;
        border-radius: 18px;
        background: var(--c1-dim);
        border: 1px solid var(--c1-strong);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--c1);
        margin: 0 auto 24px;
    }

    .vm-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 22px;
        color: var(--text);
        margin-bottom: 16px;
    }

    .vm-text {
        font-size: 14.5px;
        color: var(--text-muted);
        line-height: 1.85;
    }

    /* ─────────────────────────────────────────
       GEMBALA
    ───────────────────────────────────────── */
    .gembala-wrap { max-width: 660px; margin: 0 auto; }

    .gembala-card {
        background: var(--white);
        border: 1px solid var(--c1-border);
        border-radius: var(--radius);
        padding: 52px 44px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-shadow: var(--shadow-sm);
    }

    .gembala-card:hover {
        border-color: var(--c1-strong);
        box-shadow: var(--shadow-md);
    }

    .gembala-card::after {
        content: '';
        position: absolute;
        bottom: -60px; right: -60px;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--c1-dim), transparent 70%);
        pointer-events: none;
    }

    .gembala-photo {
        width: 130px; height: 130px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--c1-strong);
        margin: 0 auto 24px;
        display: block;
        box-shadow: 0 0 0 6px var(--c1-dim);
    }

    .gembala-avatar {
        width: 130px; height: 130px;
        border-radius: 50%;
        background: var(--c3);
        border: 2px solid var(--c1-strong);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: var(--c1);
        margin: 0 auto 24px;
        box-shadow: 0 0 0 6px var(--c1-dim);
    }

    .gembala-name {
        font-family: 'Libre Baskerville', serif;
        font-size: 26px;
        color: var(--text);
        margin-bottom: 12px;
    }

    .gembala-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--c1-dim);
        border: 1px solid var(--c1-strong);
        border-radius: 40px;
        padding: 6px 18px;
        font-size: 11px;
        font-weight: 500;
        color: var(--c1);
        letter-spacing: 0.08em;
        margin-bottom: 20px;
    }

    .gembala-desc {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.9;
        max-width: 480px;
        margin: 0 auto;
    }

    /* ─────────────────────────────────────────
       EMPTY STATE
    ───────────────────────────────────────── */
    .empty-hero {
        position: relative;
        min-height: 360px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 80px 24px;
        background: linear-gradient(135deg, var(--c3) 0%, var(--c2) 100%);
    }

    .empty-hero::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 60% 80% at 50% 0%, rgba(118, 159, 205, 0.04), transparent);
    }

    .empty-hero::after {
        content: '';
        position: absolute;
        bottom: -1px; left: 0; right: 0;
        height: 60px;
        background: var(--c4);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .empty-hero-content { position: relative; z-index: 1; }

    .empty-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(118, 159, 205, 0.15);
        border: 1px solid rgba(118, 159, 205, 0.25);
        border-radius: 40px;
        padding: 7px 20px;
        font-size: 10px;
        font-weight: 500;
        color: var(--c1);
        letter-spacing: 0.2em;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .empty-h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(36px, 6vw, 60px);
        line-height: 1.1;
        margin-bottom: 16px;
        color: var(--ink-deep);
    }

    /* ── PERUBAHAN: warna "Gereja" di empty hero ── */
    .empty-h1 em {
        color: #769FCD !important;
        font-style: italic;
        text-shadow: 0 1px 2px rgba(118, 159, 205, 0.25);
    }

    .empty-sub {
        color: var(--text-muted);
        font-size: 15px;
    }

    .empty-card {
        background: var(--white);
        border: 1px solid var(--c1-border);
        border-radius: var(--radius);
        padding: 64px 48px;
        text-align: center;
        max-width: 480px;
        margin: 0 auto;
        box-shadow: var(--shadow-sm);
    }

    .empty-icon {
        width: 72px; height: 72px;
        border-radius: 18px;
        background: var(--c1-dim);
        border: 1px solid var(--c1-strong);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: var(--c1);
        margin: 0 auto 24px;
    }

    .empty-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 22px;
        color: var(--text);
        margin-bottom: 12px;
    }

    .empty-text {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.8;
    }

    /* ─────────────────────────────────────────
       REVEAL ANIMATION
    ───────────────────────────────────────── */
    .reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.65s ease, transform 0.65s ease;
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* ─────────────────────────────────────────
       RESPONSIVE
    ───────────────────────────────────────── */
    @media (max-width: 768px) {
        .vm-grid            { grid-template-columns: 1fr; }
        .sejarah-card       { padding: 32px 24px; }
        .sejarah-inner      { flex-direction: column; gap: 20px; }
        .gembala-card       { padding: 36px 24px; }
        .page-wrap          { padding: 60px 0 80px; }
        .section-divider    { margin: 52px 0; }
    }

    @media (max-width: 480px) {
        .hero { padding: 72px 20px 100px; }
    }
</style>

@if($data)

    {{-- ── HERO ── --}}
    <section class="hero">
        <div class="hero-grid-overlay"></div>
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fa-solid fa-church" style="font-size:10px;"></i>
                Gereja Beriman Indonesia
            </div>
            <h1>{{ $data->header_title ?? 'Tentang' }} <em>Gereja</em></h1>
            <p class="hero-sub">{{ $data->header_description ?? 'Mengenal lebih dalam rumah Tuhan kita' }}</p>
        </div>
    </section>

    <div class="page-wrap">

        {{-- ── SEJARAH ── --}}
        <div class="section-header reveal">
            <span class="section-label">Latar Belakang</span>
            <h2 class="section-title">Sejarah Gereja</h2>
            <div class="section-rule"></div>
        </div>

        <div class="sejarah-card reveal">
            <div class="sejarah-inner">
                <div class="sejarah-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <p class="sejarah-text">{{ $data->sejarah }}</p>
            </div>
        </div>

        <hr class="section-divider">

        {{-- ── VISI & MISI ── --}}
        <div class="section-header reveal">
            <span class="section-label">Arah &amp; Tujuan</span>
            <h2 class="section-title">Visi &amp; Misi</h2>
            <div class="section-rule"></div>
        </div>

        <div class="vm-grid">
            <div class="vm-card reveal">
                <div class="vm-icon"><i class="fa-solid fa-eye"></i></div>
                <h3 class="vm-title">Visi</h3>
                <p class="vm-text">{{ $data->visi }}</p>
            </div>
            <div class="vm-card reveal" style="transition-delay: 0.1s;">
                <div class="vm-icon"><i class="fa-solid fa-bullseye"></i></div>
                <h3 class="vm-title">Misi</h3>
                <p class="vm-text">{{ $data->misi }}</p>
            </div>
        </div>

        <hr class="section-divider">

        {{-- ── GEMBALA ── --}}
        <div class="section-header reveal">
            <span class="section-label">Kepemimpinan</span>
            <h2 class="section-title">Gembala Sidang</h2>
            <div class="section-rule"></div>
        </div>

        <div class="gembala-wrap">
            <div class="gembala-card reveal">

                @if($data->gembala_foto)
                    <img src="{{ asset('storage/' . $data->gembala_foto) }}"
                         class="gembala-photo"
                         alt="{{ $data->gembala_nama }}">
                @else
                    <div class="gembala-avatar">
                        <i class="fa-solid fa-person"></i>
                    </div>
                @endif

                <h3 class="gembala-name">{{ $data->gembala_nama }}</h3>

                @if($data->gembala_jabatan)
                    <div class="gembala-badge">
                        <i class="fa-solid fa-cross" style="font-size:9px;"></i>
                        {{ $data->gembala_jabatan }}
                    </div>
                @endif

                @if($data->gembala_deskripsi)
                    <p class="gembala-desc">{{ $data->gembala_deskripsi }}</p>
                @endif

            </div>
        </div>

    </div>

@else

    {{-- ── EMPTY STATE ── --}}
    <section class="empty-hero">
        <div class="empty-hero-content">
            <div class="empty-eyebrow">
                <i class="fa-solid fa-church" style="font-size:10px;"></i>
                Gereja Beriman Indonesia
            </div>
            <h1 class="empty-h1">
                Tentang <em>Gereja</em>
            </h1>
            <p class="empty-sub">Mengenal lebih dalam rumah Tuhan kita</p>
        </div>
    </section>

    <div class="page-wrap">
        <div class="empty-card">
            <div class="empty-icon">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <h3 class="empty-title">Data Belum Tersedia</h3>
            <p class="empty-text">Informasi tentang gereja belum diisi. Silakan hubungi administrator.</p>
        </div>
    </div>

@endif

<script>
    const obs = new IntersectionObserver(entries => {
        entries.forEach((e, i) => {
            if (e.isIntersecting) {
                setTimeout(() => e.target.classList.add('visible'), i * 90);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>

@endsection