@extends('layouts.app')

@section('content')

@php
    $gereja = "GBI Tambunan";
    $whatsapp = $kontak && $kontak->phone
        ? preg_replace('/[^0-9]/', '', $kontak->phone)
        : '6281632228286';
@endphp

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap');

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy-950: #050d1a;
    --navy-900: #0a1628;
    --navy-800: #0f2040;
    --navy-700: #152b56;
    --navy-600: #1c3a72;
    --gold:     #c9a84c;
    --gold-lt:  #e8cc80;
    --gold-dim: #8a6b2a;
    --silver:   #a8b8cc;
    --silver-lt:#d4e0ec;
    --white:    #ffffff;
    --text-muted: #7a90a8;
    --card-bg:  #0d1e38;
    --card-border: rgba(201,168,76,0.18);
    --green:    #2dd4a0;
    --orange:   #f59a45;
    --purple:   #a78bfa;
}

html { scroll-behavior: smooth; }

body {
    background: var(--navy-900);
    font-family: 'DM Sans', sans-serif;
    color: var(--silver-lt);
    -webkit-font-smoothing: antialiased;
}

/* ── ANIMATIONS ── */
@keyframes heroReveal {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes shimmer {
    0%   { background-position: -200% center; }
    100% { background-position: 200% center; }
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn  { from { opacity: 0; } to { opacity: 1; } }
@keyframes orbFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50%       { transform: translateY(-18px) scale(1.04); }
}
@keyframes pulse-ring {
    0%   { box-shadow: 0 0 0 0 rgba(201,168,76,0.25); }
    70%  { box-shadow: 0 0 0 14px rgba(201,168,76,0); }
    100% { box-shadow: 0 0 0 0 rgba(201,168,76,0); }
}
@keyframes lineDraw {
    from { width: 0; }
    to   { width: 60px; }
}
@keyframes slideLeft {
    from { opacity: 0; transform: translateX(-36px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes slideRight {
    from { opacity: 0; transform: translateX(36px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* ── HERO ── */
.hero {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--navy-950);
    text-align: center;
    padding: 110px 24px 90px;
}
.hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,168,76,0.07) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,0.07) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 60% at 50% 50%, black 0%, transparent 100%);
    pointer-events: none;
}
.hero-orb {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(60px);
    animation: orbFloat 7s ease-in-out infinite;
}
.hero-orb-1 {
    width: 460px; height: 460px;
    background: radial-gradient(circle, rgba(30,74,142,0.6) 0%, transparent 70%);
    top: -100px; left: -80px; animation-delay: 0s;
}
.hero-orb-2 {
    width: 360px; height: 360px;
    background: radial-gradient(circle, rgba(201,168,76,0.2) 0%, transparent 70%);
    bottom: -60px; right: -40px; animation-delay: 3.5s;
}
.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(201,168,76,0.1);
    border: 1px solid rgba(201,168,76,0.3);
    color: var(--gold);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    padding: 8px 20px;
    border-radius: 100px;
    margin-bottom: 24px;
    animation: heroReveal 0.8s ease 0.1s both;
    position: relative; z-index: 2;
}
.hero-badge::before {
    content: '';
    width: 6px; height: 6px;
    background: var(--gold);
    border-radius: 50%;
    animation: pulse-ring 2.5s ease-out infinite;
}
.hero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(40px, 6vw, 64px);
    font-weight: 800;
    color: var(--white);
    line-height: 1.1;
    position: relative; z-index: 2;
    animation: heroReveal 0.9s ease 0.3s both;
}
.hero-title span {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 50%, var(--gold) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 3.5s linear infinite;
}
.hero-sub {
    font-size: 16px;
    font-weight: 300;
    color: var(--silver);
    max-width: 480px;
    margin: 18px auto 0;
    line-height: 1.7;
    position: relative; z-index: 2;
    animation: heroReveal 0.9s ease 0.5s both;
}
.hero-divider {
    width: 1px; height: 55px;
    background: linear-gradient(to bottom, transparent, var(--gold), transparent);
    margin: 32px auto 0;
    position: relative; z-index: 2;
    animation: heroReveal 1s ease 0.7s both;
}

/* ── VERSE BANNER ── */
.verse-section {
    padding: 60px 0 0;
    position: relative;
}
.verse-card {
    max-width: 720px;
    margin: 0 auto;
    background: linear-gradient(135deg, rgba(201,168,76,0.07), rgba(201,168,76,0.03));
    border: 1px solid rgba(201,168,76,0.22);
    border-radius: 20px;
    padding: 36px 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
    animation: fadeUp 0.8s ease 0.2s both;
}
.verse-card::before {
    content: '\201C';
    position: absolute;
    top: -20px; left: 20px;
    font-family: 'Playfair Display', serif;
    font-size: 140px;
    color: rgba(201,168,76,0.08);
    line-height: 1;
    pointer-events: none;
}
.verse-icon {
    width: 48px; height: 48px;
    background: rgba(201,168,76,0.12);
    border: 1px solid rgba(201,168,76,0.25);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
}
.verse-icon svg {
    width: 22px; height: 22px;
    stroke: var(--gold); fill: none;
    stroke-width: 1.8; stroke-linecap: round;
}
.verse-text {
    font-size: 15.5px;
    font-style: italic;
    font-weight: 300;
    color: var(--silver-lt);
    line-height: 1.8;
    margin-bottom: 14px;
}
.verse-ref {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--gold);
}

/* ── MAIN SECTION ── */
.contact-section {
    padding: 70px 0 100px;
}
.contact-section::before {
    content: '';
    display: block;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.2), transparent);
    margin-bottom: 70px;
}

.kontak-container {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 28px;
}

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 10px;
    display: block;
}
.section-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 3.5vw, 36px);
    font-weight: 700;
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 10px;
}
.section-rule {
    width: 50px; height: 2px;
    background: linear-gradient(90deg, var(--gold-dim), var(--gold));
    border-radius: 2px;
    animation: lineDraw 0.8s ease 0.3s both;
}

/* ── CONTACT GRID ── */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 36px;
    align-items: stretch;
}
@media (max-width: 768px) {
    .contact-grid { grid-template-columns: 1fr; gap: 28px; }
}

/* ── INFO COLUMN ── */
.info-col {
    animation: slideLeft 0.8s cubic-bezier(0.34,1.56,0.64,1) 0.15s both;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 20px;
    padding: 32px;
    height: 100%;
}
.info-header { margin-bottom: 28px; }

.info-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 16px;
    padding: 18px 20px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 14px;
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1),
                box-shadow 0.35s ease,
                border-color 0.3s ease;
    position: relative;
    overflow: hidden;
}
.info-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
    border-radius: 3px 0 0 3px;
    transition: opacity 0.3s ease;
    opacity: 0;
}
.info-card.ic-blue::before  { background: #378add; }
.info-card.ic-green::before { background: var(--green); }
.info-card.ic-orange::before{ background: var(--orange); }
.info-card.ic-purple::before{ background: var(--purple); }

.info-card:hover {
    transform: translateX(6px);
    box-shadow: 0 12px 36px rgba(0,0,0,0.3), 0 0 0 1px rgba(201,168,76,0.2);
    border-color: rgba(201,168,76,0.3);
}
.info-card:hover::before { opacity: 1; }

.info-icon {
    width: 42px; height: 42px;
    border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.info-icon svg {
    width: 18px; height: 18px;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}
.ic-blue  .info-icon { background: rgba(55,138,221,0.15); }
.ic-blue  .info-icon svg { stroke: #378add; }
.ic-green .info-icon { background: rgba(45,212,160,0.12); }
.ic-green .info-icon svg { stroke: var(--green); }
.ic-orange .info-icon { background: rgba(245,154,69,0.12); }
.ic-orange .info-icon svg { stroke: var(--orange); }
.ic-purple .info-icon { background: rgba(167,139,250,0.12); }
.ic-purple .info-icon svg { stroke: var(--purple); }

.info-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 5px;
}
.ic-blue  .info-label { color: #378add; }
.ic-green .info-label { color: var(--green); }
.ic-orange .info-label { color: var(--orange); }
.ic-purple .info-label { color: var(--purple); }

.info-value {
    font-size: 14.5px;
    font-weight: 400;
    color: var(--silver-lt);
    line-height: 1.65;
}

/* ── FORM COLUMN ── */
.form-col {
    animation: slideRight 0.8s cubic-bezier(0.34,1.56,0.64,1) 0.25s both;
    height: 100%;
}
.form-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 20px;
    padding: 36px;
    position: relative;
    overflow: hidden;
    height: 100%;
}
.form-card::before {
    content: '';
    position: absolute;
    top: 0; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
}
.info-card:last-child {
    margin-bottom: 0;
}
.form-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 6px;
}
.form-subtitle {
    font-size: 13.5px;
    font-weight: 300;
    color: var(--text-muted);
    margin-bottom: 28px;
    line-height: 1.6;
}

.form-group { margin-bottom: 20px; }
.form-group label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: var(--silver);
    margin-bottom: 8px;
}
.form-group input,
.form-group textarea {
    width: 100%;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(201,168,76,0.18);
    border-radius: 12px;
    padding: 13px 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14.5px;
    font-weight: 300;
    color: var(--silver-lt);
    outline: none;
    transition: border-color 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    resize: none;
    -webkit-appearance: none;
}
.form-group input::placeholder,
.form-group textarea::placeholder {
    color: rgba(168,184,204,0.4);
}
.form-group input:focus,
.form-group textarea:focus {
    border-color: rgba(201,168,76,0.5);
    background: rgba(201,168,76,0.04);
    box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
}
.form-group textarea { rows: 4; min-height: 120px; }

.btn-wa {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 15px 24px;
    border-radius: 14px;
    border: none;
    cursor: pointer;
    background: linear-gradient(135deg, #25d366, #128c4e);
    color: white;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.3px;
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1),
                box-shadow 0.35s ease;
    position: relative;
    overflow: hidden;
}
.btn-wa::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.btn-wa:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 40px rgba(37,211,102,0.35);
}
.btn-wa:hover::before { opacity: 1; }
.btn-wa:active { transform: translateY(0) scale(0.98); }
.btn-wa svg {
    width: 20px; height: 20px;
    fill: white;
    flex-shrink: 0;
}

/* ── FOOTER STRIP ── */
.footer-strip {
    background: var(--navy-950);
    border-top: 1px solid rgba(201,168,76,0.12);
    padding: 28px;
    text-align: center;
}
.footer-strip p {
    font-size: 13px;
    color: var(--text-muted);
}

/* ── MAPS ── */
.map-section {
    margin-top: 40px;
    width: 100%;
    animation: fadeUp 0.8s ease 0.35s both;
}

.map-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 20px;
    padding: 16px;
    overflow: hidden;
    width: 100%;
}

.map-card iframe {
    width: 100%;
    height: 420px;
    border: 0;
    border-radius: 14px;
    display: block;
}

/* ── RESPONSIVE ── */
@media (max-width: 600px) {
    .form-card { padding: 26px 22px; }
    .verse-card { padding: 28px 24px; }
}
</style>

{{-- HERO --}}
<section class="hero">
    <div class="hero-bg-grid"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div>
        <div class="hero-badge">Hubungi Kami</div>
        <h1 class="hero-title">Mari <span>Terhubung</span><br>Bersama Kami</h1>
        <p class="hero-sub">Kami senang mendengar dari Anda. Jangan ragu untuk menghubungi kami kapan saja.</p>
        <div class="hero-divider"></div>
    </div>
</section>

{{-- VERSE --}}
<section class="verse-section">
    <div class="kontak-container">
        <div class="verse-card">
            <div class="verse-icon">
                <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <p class="verse-text">
                "Sebab itu sejak waktu kami mendengarnya, kami tidak berhenti-henti berdoa untuk kamu.
                Kami meminta, supaya kamu menerima segala hikmat dan pengertian yang benar,
                untuk mengetahui kehendak Tuhan."
            </p>
            <div class="verse-ref">Kolose 1:9 (TB)</div>
        </div>
    </div>
</section>

{{-- KONTAK --}}
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            {{-- INFO --}}
            <div class="info-col">
                <div class="info-header">
                    <span class="section-label">Informasi</span>
                    <h2 class="section-title">Detail Kontak</h2>
                    <div class="section-rule"></div>
                </div>

                @if($kontak)

                <div class="info-card ic-blue">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{!! nl2br(e($kontak->address)) !!}</div>
                    </div>
                </div>

                <div class="info-card ic-green">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.72a16 16 0 0 0 6.29 6.29l.89-.89a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Telepon</div>
                        <div class="info-value">{{ $kontak->phone ?: '-' }}</div>
                    </div>
                </div>

                <div class="info-card ic-orange">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $kontak->email ?: '-' }}</div>
                    </div>
                </div>

                <div class="info-card ic-purple">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Jam Sekretariat</div>
                        <div class="info-value">{!! nl2br(e($kontak->office_hours ?: '-')) !!}</div>
                    </div>
                </div>

                @else
                <div class="info-card">
                    <div class="info-value" style="color:var(--text-muted);">Data kontak belum tersedia.</div>
                </div>
                @endif
            </div>

            {{-- FORM --}}
            <div class="form-col">
                <div class="form-card">
                    <h3 class="form-title">Kirim Pesan</h3>
                    <p class="form-subtitle">Isi formulir di bawah dan pesan akan dikirim langsung via WhatsApp.</p>

                    <form onsubmit="kirimWA(); return false;">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" placeholder="nama@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan Anda</label>
                            <textarea id="pesan" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn-wa">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            Kirim via WhatsApp
                        </button>
                    </form>
                </div>
            </div>

        </div>
{{-- MAPS --}}
<div class="map-section">
    <div class="map-card">
        <iframe
            src="https://www.google.com/maps?q=GBI%20Tambunan-Laguboti&output=embed"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
    </div>
</section>


<script>
function kirimWA() {
    var nama  = document.getElementById("nama").value;
    var email = document.getElementById("email").value;
    var pesan = document.getElementById("pesan").value;

    var text  = "Shalom 🙏%0A%0A"
              + "Nama: "  + encodeURIComponent(nama)  + "%0A"
              + "Email: " + encodeURIComponent(email) + "%0A"
              + "Pesan: " + encodeURIComponent(pesan);

    window.open("https://wa.me/{{ $whatsapp }}?text=" + text, "_blank");

    setTimeout(function () {
        window.location.href = "{{ route('home') }}";
    }, 2000);
}
</script>

@endsection