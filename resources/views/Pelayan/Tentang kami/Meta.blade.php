@extends('Pelayan.layouts.pelayan')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
:root {
    --gold: #C9A96E;
    --gold-pale: #E8D5A3;
    --gold-dim: rgba(201,169,110,0.12);
    --ink: #0A0E17;
    --ink-mid: #0D1422;
    --ink-card: rgba(12,18,32,0.97);
    --surface: rgba(255,255,255,0.04);
    --surface-hover: rgba(255,255,255,0.07);
    --text: #EAE6DF;
    --text-muted: rgba(234,230,223,0.52);
    --border: rgba(201,169,110,0.13);
    --border-strong: rgba(201,169,110,0.28);
    --radius: 20px;
    --radius-sm: 12px;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Outfit', sans-serif; background: var(--ink); color: var(--text); }

/* ── HERO ── */
.hero {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    padding: 100px 24px 130px;
    background: var(--ink-mid);
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 70% 100% at 50% 0%, rgba(201,169,110,0.08), transparent 65%);
}

.hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80px;
    background: var(--ink);
    clip-path: ellipse(55% 100% at 50% 100%);
}

.hero-grid-overlay {
    position: absolute;
    inset: 0;
    background-image:
        repeating-linear-gradient(0deg, transparent, transparent 70px, rgba(201,169,110,0.025) 70px, rgba(201,169,110,0.025) 71px),
        repeating-linear-gradient(90deg, transparent, transparent 70px, rgba(201,169,110,0.025) 70px, rgba(201,169,110,0.025) 71px);
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
    color: var(--text);
}

.hero h1 em { color: var(--gold); font-style: italic; }

.hero-sub {
    color: var(--text-muted);
    font-size: 15px;
    line-height: 1.85;
    font-weight: 300;
}

/* ── PAGE ── */
.page-wrap {
    width: 90%;
    max-width: 1060px;
    margin: 0 auto;
    padding: 80px 0 110px;
}

/* ── SECTION HEADER ── */
.section-header {
    text-align: center;
    margin-bottom: 52px;
}

.section-label {
    display: inline-block;
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 12px;
}

.section-title {
    font-family: 'Libre Baskerville', serif;
    font-size: clamp(26px, 4vw, 38px);
    color: var(--text);
    margin-bottom: 14px;
}

.section-rule {
    width: 36px; height: 2px;
    background: var(--gold);
    margin: 0 auto;
    opacity: 0.6;
}

/* ── DIVIDER LINE ── */
.section-divider {
    border: none;
    height: 1px;
    background: var(--border);
    margin: 80px 0;
}

/* ── SEJARAH ── */
.sejarah-card {
    background: var(--ink-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 48px 52px;
    position: relative;
    overflow: hidden;
}

.sejarah-card::before {
    content: '\201C';
    position: absolute;
    top: -20px;
    left: 32px;
    font-family: 'Libre Baskerville', serif;
    font-size: 160px;
    color: var(--gold);
    opacity: 0.06;
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
    background: var(--gold-dim);
    border: 1px solid var(--border-strong);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    color: var(--gold);
    flex-shrink: 0;
}

.sejarah-text {
    font-size: 15.5px;
    color: var(--text-muted);
    line-height: 1.9;
}

/* ── VISI MISI ── */
.vm-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.vm-card {
    background: var(--ink-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 40px 36px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.32s ease;
}

.vm-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity: 0;
    transition: opacity 0.3s;
}

.vm-card:hover {
    border-color: var(--border-strong);
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.4);
}

.vm-card:hover::before { opacity: 1; }

.vm-icon {
    width: 60px; height: 60px;
    border-radius: 18px;
    background: var(--gold-dim);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    color: var(--gold);
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

/* ── GEMBALA ── */
.gembala-wrap {
    max-width: 660px;
    margin: 0 auto;
}

.gembala-card {
    background: var(--ink-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 52px 44px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: border-color 0.3s;
}

.gembala-card:hover {
    border-color: var(--border-strong);
}

.gembala-card::after {
    content: '';
    position: absolute;
    bottom: -60px; right: -60px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201,169,110,0.05), transparent 70%);
    pointer-events: none;
}

.gembala-photo {
    width: 130px; height: 130px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--border-strong);
    margin: 0 auto 24px;
    display: block;
    box-shadow: 0 0 0 6px rgba(201,169,110,0.07);
}

.gembala-avatar {
    width: 130px; height: 130px;
    border-radius: 50%;
    background: var(--gold-dim);
    border: 2px solid var(--border-strong);
    display: flex; align-items: center; justify-content: center;
    font-size: 48px;
    color: var(--gold);
    margin: 0 auto 24px;
    box-shadow: 0 0 0 6px rgba(201,169,110,0.06);
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
    background: var(--gold-dim);
    border: 1px solid var(--border-strong);
    border-radius: 40px;
    padding: 6px 18px;
    font-size: 11px;
    font-weight: 500;
    color: var(--gold-pale);
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

/* ── EMPTY STATE ── */
.empty-hero {
    position: relative;
    min-height: 360px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 80px 24px;
    background: var(--ink-mid);
    border-bottom: 1px solid var(--border);
}

.empty-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 80% at 50% 0%, rgba(201,169,110,0.06), transparent);
}

.empty-hero-content {
    position: relative;
    z-index: 1;
}

.empty-card {
    background: var(--ink-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 64px 48px;
    text-align: center;
    max-width: 480px;
    margin: 0 auto;
}

.empty-icon {
    width: 72px; height: 72px;
    border-radius: 18px;
    background: var(--gold-dim);
    border: 1px solid var(--border-strong);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: var(--gold);
    margin: 0 auto 24px;
    opacity: 0.7;
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

/* ── REVEAL ANIMATION ── */
.reveal {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}

.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ── RESPONSIVE ── */
@media(max-width: 768px) {
    .vm-grid { grid-template-columns: 1fr; }
    .sejarah-card { padding: 32px 24px; }
    .sejarah-inner { flex-direction: column; gap: 20px; }
    .gembala-card { padding: 36px 24px; }
    .page-wrap { padding: 60px 0 80px; }
    .section-divider { margin: 52px 0; }
}

@media(max-width: 480px) {
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
        <span class="section-label">Arah & Tujuan</span>
        <h2 class="section-title">Visi &amp; Misi</h2>
        <div class="section-rule"></div>
    </div>

    <div class="vm-grid">
        <div class="vm-card reveal">
            <div class="vm-icon">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h3 class="vm-title">Visi</h3>
            <p class="vm-text">{{ $data->visi }}</p>
        </div>

        <div class="vm-card reveal" style="transition-delay:0.1s;">
            <div class="vm-icon">
                <i class="fa-solid fa-bullseye"></i>
            </div>
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
        <div class="hero-eyebrow" style="display:inline-flex;align-items:center;gap:10px;background:var(--gold-dim);border:1px solid var(--border-strong);border-radius:40px;padding:7px 20px;font-size:10px;font-weight:500;color:var(--gold-pale);letter-spacing:0.2em;text-transform:uppercase;margin-bottom:24px;">
            <i class="fa-solid fa-church" style="font-size:10px;"></i>
            Gereja Beriman Indonesia
        </div>
        <h1 style="font-family:'Libre Baskerville',serif;font-size:clamp(36px,6vw,60px);line-height:1.1;margin-bottom:16px;">
            Tentang <span style="color:var(--gold);font-style:italic;">Gereja</span>
        </h1>
        <p style="color:var(--text-muted);font-size:15px;">Mengenal lebih dalam rumah Tuhan kita</p>
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