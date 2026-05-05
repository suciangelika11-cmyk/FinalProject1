@extends('layouts.app')

@section('content')

<style>
/* ===== Reset & Base ===== */
*, *::before, *::after { box-sizing: border-box; }

/* ===== Hero ===== */
.pel-hero {
    background: linear-gradient(160deg, #0d1e3a 0%, #0a1628 60%, #091322 100%);
    padding: 100px 0 80px;
    text-align: center;
    border-bottom: 1px solid rgba(99,179,237,0.12);
    position: relative;
    overflow: hidden;
}
.pel-hero::before {
    content: '';
    position: absolute;
    top: -100px; right: -80px;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(66,153,225,0.12) 0%, transparent 70%);
    pointer-events: none;
}
.pel-hero::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -60px;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(49,130,206,0.08) 0%, transparent 70%);
    pointer-events: none;
}
.pel-hero .container { position: relative; z-index: 1; }

.pel-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(66,153,225,0.15);
    border: 1px solid rgba(66,153,225,0.3);
    color: #90cdf4;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.1em;
    padding: 5px 16px;
    border-radius: 20px;
    margin-bottom: 24px;
    text-transform: uppercase;
}
.pel-hero-badge span {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #63b3ed;
    display: inline-block;
}

.pel-hero h1 {
    font-size: 52px;
    font-weight: 700;
    color: #f7fafc;
    line-height: 1.15;
    margin-bottom: 20px;
    letter-spacing: -0.01em;
}
.pel-hero h1 .accent { color: #63b3ed; }
.pel-hero p {
    color: #90a4b8;
    font-size: 16px;
    line-height: 1.8;
    max-width: 580px;
    margin: 0 auto;
}

/* ===== Stats Strip ===== */
.pel-stats {
    background: #0d1e3a;
    border-bottom: 1px solid rgba(99,179,237,0.08);
    padding: 36px 0;
}
.pel-stats-inner {
    display: flex;
    justify-content: center;
    gap: 64px;
    flex-wrap: wrap;
}
.pel-stat { text-align: center; }
.pel-stat-num {
    font-size: 32px;
    font-weight: 700;
    color: #63b3ed;
    line-height: 1;
    margin-bottom: 4px;
}
.pel-stat-label {
    font-size: 12px;
    color: #7a93ad;
    font-weight: 500;
    letter-spacing: 0.03em;
}

/* ===== Section ===== */
.pel-section {
    background: #0a1628;
    padding: 80px 0;
}
.pel-section.alt {
    background: #0d1e3a;
}

.pel-section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #63b3ed;
    margin-bottom: 8px;
}
.pel-section-title {
    font-size: 30px;
    font-weight: 700;
    color: #f0f6ff;
    margin-bottom: 8px;
}
.pel-section-sub {
    font-size: 15px;
    color: #7a93ad;
    margin-bottom: 48px;
}

/* ===== Leader Cards ===== */
.pel-leader-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
    max-width: 900px;
    margin: 0 auto;
}
.pel-leader-card {
    background: #111f36;
    border: 1px solid rgba(99,179,237,0.1);
    border-radius: 20px;
    padding: 36px 24px;
    text-align: center;
    transition: border-color 0.25s ease, background 0.25s ease, transform 0.25s ease;
    position: relative;
    overflow: hidden;
}
.pel-leader-card::before {
    content: '';
    position: absolute;
    top: 0; left: 50%;
    transform: translateX(-50%);
    width: 50%; height: 2px;
    background: linear-gradient(90deg, transparent, #63b3ed, transparent);
    opacity: 0;
    transition: opacity 0.25s;
}
.pel-leader-card:hover {
    border-color: rgba(99,179,237,0.3);
    background: #152236;
    transform: translateY(-4px);
}
.pel-leader-card:hover::before { opacity: 1; }

.pel-avatar {
    width: 96px;
    height: 96px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1a3a5c, #2b4f7a);
    border: 2px solid rgba(99,179,237,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 600;
    color: #90cdf4;
    margin: 0 auto 20px;
    position: relative;
    overflow: hidden;
}
.pel-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    inset: 0;
}
.pel-avatar-ring {
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    border: 1px solid rgba(99,179,237,0.18);
}

.pel-lc-name {
    font-size: 16px;
    font-weight: 600;
    color: #e2e8f0;
    margin-bottom: 8px;
}
.pel-lc-role {
    font-size: 12px;
    color: #63b3ed;
    background: rgba(99,179,237,0.1);
    display: inline-block;
    padding: 3px 12px;
    border-radius: 20px;
    font-weight: 500;
}

/* ===== Team Cards ===== */
.pel-team-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
    margin-bottom: 56px;
}
.pel-team-card {
    background: #111f36;
    border: 1px solid rgba(99,179,237,0.08);
    border-radius: 20px;
    padding: 32px 28px;
    transition: border-color 0.25s, transform 0.25s;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
.pel-team-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, #2b4f7a, #63b3ed, #90cdf4);
    opacity: 0;
    transition: opacity 0.3s;
}
.pel-team-card:hover {
    border-color: rgba(99,179,237,0.25);
    transform: translateY(-6px);
}
.pel-team-card:hover::after { opacity: 1; }

.pel-tc-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: rgba(49,130,206,0.12);
    border: 1px solid rgba(99,179,237,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: #63b3ed;
    margin-bottom: 18px;
    transition: background 0.25s, border-color 0.25s;
}
.pel-team-card:hover .pel-tc-icon {
    background: rgba(49,130,206,0.2);
    border-color: rgba(99,179,237,0.3);
}

.pel-tc-title {
    font-size: 17px;
    font-weight: 600;
    color: #f0f6ff;
    margin-bottom: 10px;
}
.pel-tc-desc {
    font-size: 13px;
    color: #7a93ad;
    line-height: 1.75;
    margin-bottom: 18px;
    flex-grow: 1;
}

.pel-divider {
    height: 1px;
    background: rgba(99,179,237,0.1);
    margin: 16px 0;
}

.pel-member-list { list-style: none; padding: 0; margin: 0; }
.pel-member-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    padding: 7px 0;
    border-bottom: 1px solid rgba(99,179,237,0.05);
}
.pel-member-item:last-child { border-bottom: none; }
.pel-mi-name {
    font-size: 13px;
    color: #cbd5e0;
    font-weight: 500;
}
.pel-mi-role {
    font-size: 11px;
    color: #63b3ed;
    background: rgba(99,179,237,0.1);
    padding: 2px 10px;
    border-radius: 10px;
    white-space: nowrap;
    font-weight: 500;
}

/* ===== No Data ===== */
.pel-no-data {
    grid-column: 1 / -1;
    text-align: center;
    color: #7a93ad;
    font-size: 15px;
    padding: 48px 20px;
    background: rgba(99,179,237,0.04);
    border-radius: 16px;
    border: 1px dashed rgba(99,179,237,0.15);
}

/* ===== CTA ===== */
.pel-cta {
    background: #091322;
    border-top: 1px solid rgba(99,179,237,0.08);
    padding: 80px 0;
    text-align: center;
}
.pel-cta h2 {
    font-size: 28px;
    font-weight: 700;
    color: #f0f6ff;
    margin-bottom: 12px;
}
.pel-cta p {
    font-size: 15px;
    color: #7a93ad;
    max-width: 500px;
    margin: 0 auto 36px;
    line-height: 1.7;
}
.pel-join-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #2b6cb0, #3182ce);
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    padding: 14px 32px;
    border-radius: 12px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    box-shadow: 0 8px 30px rgba(49,130,206,0.35);
    transition: opacity 0.2s, transform 0.2s, box-shadow 0.2s;
}
.pel-join-btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(49,130,206,0.45);
    color: #fff;
    text-decoration: none;
}
.pel-join-btn i { font-size: 14px; }

/* ===== Responsive ===== */
@media (max-width: 1024px) {
    .pel-team-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}

@media (max-width: 768px) {
    .pel-hero h1 { font-size: 34px; }
    .pel-hero { padding: 70px 0 60px; }
    .pel-team-grid,
    .pel-leader-grid { grid-template-columns: 1fr; gap: 16px; }
    .pel-stats-inner { gap: 32px; }
    .pel-section { padding: 56px 0; }
    .pel-section-title { font-size: 24px; }
}
</style>

{{-- ===== Hero ===== --}}
<section class="pel-hero">
    <div class="container">
        <div class="pel-hero-badge"><span></span> Gereja Berima</div>
        <h1>Pelayanan &amp; <span class="accent">Komunitas</span></h1>
        <p>Bergabunglah dengan berbagai tim pelayanan dan temukan tempat Anda untuk melayani Tuhan bersama kami.</p>
    </div>
</section>

{{-- ===== Stats Strip ===== --}}
<div class="pel-stats">
    <div class="pel-stats-inner">
        <div class="pel-stat">
            <div class="pel-stat-num">{{ $timPelayanan->count() }}</div>
            <div class="pel-stat-label">Tim Pelayanan</div>
        </div>
        <div class="pel-stat">
            <div class="pel-stat-num">{{ $kepemimpinan->count() }}</div>
            <div class="pel-stat-label">Pemimpin</div>
        </div>
        <div class="pel-stat">
            <div class="pel-stat-num">{{ $timPelayanan->sum(fn($t) => $t->anggotas->count()) }}+</div>
            <div class="pel-stat-label">Anggota Aktif</div>
        </div>
        <div class="pel-stat">
            <div class="pel-stat-num">1</div>
            <div class="pel-stat-label">Jemaat</div>
        </div>
    </div>
</div>

{{-- ===== Kepemimpinan ===== --}}
<section class="pel-section alt">
    <div class="container">
        <div class="pel-section-label">Kepemimpinan</div>
        <div class="pel-section-title">Gembala &amp; Pemimpin</div>
        <div class="pel-section-sub">Dipimpin dengan kasih, hikmat, dan dedikasi penuh.</div>

        <div class="pel-leader-grid">
            @forelse($kepemimpinan as $item)
                <div class="pel-leader-card">
                    <div class="pel-avatar">
                        <div class="pel-avatar-ring"></div>
                        @if($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->leader ?: $item->title }}">
                        @else
                            {{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}
                        @endif
                    </div>
                    <div class="pel-lc-name">{{ $item->leader ?: $item->title }}</div>
                    <div class="pel-lc-role">{{ $item->title }}</div>
                </div>
            @empty
                <div class="pel-no-data">Belum ada data kepemimpinan.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== Tim Pelayanan ===== --}}
<section class="pel-section">
    <div class="container">
        <div class="pel-section-label">Tim Pelayanan</div>
        <div class="pel-section-title">Tim Kami</div>
        <div class="pel-section-sub">Berbagai tim yang melayani dengan dedikasi dan kasih.</div>

        <div class="pel-team-grid">
            @forelse($timPelayanan as $tim)
                <div class="pel-team-card">
                    <div class="pel-tc-icon">
                        @if($tim->icon && str_contains($tim->icon, 'fa-'))
                            <i class="fa {{ $tim->icon }}"></i>
                        @else
                            {{ $tim->icon ?: '♪' }}
                        @endif
                    </div>
                    <div class="pel-tc-title">{{ $tim->title }}</div>
                    <div class="pel-tc-desc">{{ $tim->description ?: 'Melayani dengan penuh dedikasi dan kasih.' }}</div>
                    <div class="pel-divider"></div>

                    <ul class="pel-member-list">
                        @if($tim->anggotas->count())
                            @foreach($tim->anggotas as $anggota)
                                <li class="pel-member-item">
                                    <span class="pel-mi-name">{{ $anggota->nama }}</span>
                                    <span class="pel-mi-role">{{ $anggota->bagian ?: '-' }}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="pel-member-item">
                                <span class="pel-mi-name">{{ $tim->leader ?: 'Koordinator belum ditentukan' }}</span>
                                <span class="pel-mi-role">Koordinator</span>
                            </li>
                        @endif
                    </ul>
                </div>
            @empty
                <div class="pel-no-data">Belum ada data tim pelayanan.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="pel-cta">
    <div class="container">
        <h2>Siap untuk Bergabung?</h2>
        <p>Temukan tempat Anda dalam pelayanan dan jadilah bagian dari komunitas yang mengasihi Tuhan.</p>
        <a href="{{ route('jemaat.create') }}" class="pel-join-btn">
            <i class="fa fa-user-plus"></i>
            Bergabung dengan Pelayanan
        </a>
    </div>
</section>

@endsection