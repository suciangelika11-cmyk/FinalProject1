@extends('layouts.app')

@section('content')
<style>
/* HERO */
.pl-hero {
    position: relative;
    padding: clamp(70px, 10vw, 110px) 16px clamp(60px, 8vw, 90px);
    text-align: center;
    overflow: hidden;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 50%, #0d1e3a 100%);
}

.pl-hero::before {
    content: ''; position: absolute; top: -100px; right: -80px;
    width: 380px; height: 380px; border-radius: 50%;
    background: radial-gradient(circle, rgba(93,146,232,0.14) 0%, transparent 70%);
    pointer-events: none;
}
.pl-hero::after {
    content: ''; position: absolute; bottom: -80px; left: -60px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(45,101,200,0.1) 0%, transparent 70%);
    pointer-events: none;
}

.pl-hero .wrap { position: relative; z-index: 1; }

.pl-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 6vw, 52px); font-weight: 700;
    color: #fff; line-height: 1.15; margin-bottom: 18px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.pl-hero h1 .accent { color: #93bef8; }

.pl-hero p {
    color: rgba(255,255,255,0.68); font-size: clamp(14px, 2vw, 16px);
    line-height: 1.78; max-width: 520px; margin: 0 auto;
    animation: fadeUp 0.8s ease 0.4s both;
}

/* STATS BAR */
.pl-stats {
    background: rgba(10,22,40,0.7);
    border-bottom: 1px solid rgba(93,146,232,0.1);
    padding: clamp(20px, 4vw, 34px) 16px; backdrop-filter: blur(8px);
}

.pl-stats-inner {
    display: flex; justify-content: center;
    gap: clamp(20px, 5vw, 60px); flex-wrap: wrap;
    max-width: 1180px; margin: 0 auto;
}

.pl-stat { text-align: center; }
.pl-stat-num { font-size: clamp(22px, 4vw, 30px); font-weight: 700; color: #93bef8; line-height: 1; margin-bottom: 4px; }
.pl-stat-label { font-size: 12px; color: rgba(255,255,255,0.48); font-weight: 500; letter-spacing: .03em; }

/* SECTIONS */
.pl-sec { padding: clamp(48px, 8vw, 80px) 0; }
.pl-sec.alt { background: #0f2040; }

.pl-sec-label { font-size: 10.5px; font-weight: 600; letter-spacing: .13em; text-transform: uppercase; color: #5592e8; margin-bottom: 7px; }
.pl-sec-title { font-family: 'Playfair Display', serif; font-size: clamp(20px, 3vw, 27px); font-weight: 700; color: #fff; margin-bottom: 8px; }
.pl-sec-sub { font-size: 14.5px; color: rgba(255,255,255,0.48); margin-bottom: 36px; }

/* LEADER GRID */
.pl-leader-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 18px; max-width: 880px; margin: 0 auto;
}

.pl-leader-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.12);
    border-radius: 18px; padding: clamp(22px, 4vw, 34px) 20px; text-align: center;
    transition: border-color 0.25s, background 0.25s, transform 0.3s;
    position: relative; overflow: hidden; backdrop-filter: blur(6px);
}

.pl-leader-card::before {
    content: ''; position: absolute; top: 0; left: 50%; transform: translateX(-50%);
    width: 56%; height: 2px;
    background: linear-gradient(90deg, transparent, #2d65c8, transparent);
    opacity: 0; transition: opacity 0.25s;
}

.pl-leader-card:hover { border-color: rgba(93,146,232,0.3); background: rgba(255,255,255,0.09); transform: translateY(-5px); }
.pl-leader-card:hover::before { opacity: 1; }

.pl-avatar {
    width: 80px; height: 80px; border-radius: 50%;
    background: linear-gradient(135deg, #0d2448, #1a4a9e);
    border: 2px solid rgba(93,146,232,0.25);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 600; color: #93bef8;
    margin: 0 auto 16px; position: relative; overflow: hidden;
}

.pl-avatar img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }

.pl-lc-name { font-size: 14px; font-weight: 600; color: rgba(255,255,255,0.88); margin-bottom: 8px; }
.pl-lc-role { font-size: 11.5px; color: #93bef8; background: rgba(93,146,232,0.12); display: inline-block; padding: 3px 12px; border-radius: 20px; font-weight: 500; }

/* TEAM GRID */
.pl-team-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
}

.pl-team-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.1);
    border-radius: 18px; padding: clamp(20px, 3vw, 28px) clamp(16px, 3vw, 24px);
    transition: border-color 0.25s, transform 0.3s;
    position: relative; overflow: hidden;
    display: flex; flex-direction: column;
    backdrop-filter: blur(6px);
}

.pl-team-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, #0d2448, #2d65c8, #93bef8);
    opacity: 0; transition: opacity 0.3s;
}

.pl-team-card:hover { border-color: rgba(93,146,232,0.24); transform: translateY(-6px); }
.pl-team-card:hover::after { opacity: 1; }

.pl-tc-icon {
    width: 48px; height: 48px; border-radius: 12px;
    background: rgba(26,74,158,0.16);
    border: 1px solid rgba(93,146,232,0.18);
    display: flex; align-items: center; justify-content: center;
    font-size: 19px; color: #93bef8; margin-bottom: 15px;
    transition: background 0.25s, border-color 0.25s;
    flex-shrink: 0;
}

.pl-team-card:hover .pl-tc-icon { background: rgba(26,74,158,0.28); border-color: rgba(93,146,232,0.32); }

.pl-tc-title { font-family: 'Playfair Display', serif; font-size: 15px; font-weight: 600; color: #fff; margin-bottom: 8px; }
.pl-tc-desc { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.72; margin-bottom: 14px; flex-grow: 1; }

.pl-divider { height: 1px; background: rgba(93,146,232,0.1); margin: 12px 0; }

.pl-member-list { list-style: none; padding: 0; margin: 0; }
.pl-member-item {
    display: flex; justify-content: space-between; align-items: center;
    gap: 8px; padding: 5px 0; border-bottom: 1px solid rgba(93,146,232,0.06);
    flex-wrap: wrap;
}
.pl-member-item:last-child { border-bottom: none; }
.pl-mi-name { font-size: 12.5px; color: rgba(255,255,255,0.72); font-weight: 500; }
.pl-mi-role { font-size: 11px; color: #93bef8; background: rgba(93,146,232,0.1); padding: 2px 9px; border-radius: 10px; white-space: nowrap; font-weight: 500; }

.pl-no-data { grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.32); font-size: 14.5px; padding: 44px 20px; background: rgba(93,146,232,0.04); border-radius: 14px; border: 1px dashed rgba(93,146,232,0.14); }

/* CTA */
.pl-cta {
    background: #0a1628;
    border-top: 1px solid rgba(93,146,232,0.1);
    padding: clamp(52px, 8vw, 80px) 16px; text-align: center;
}

.pl-cta h2 { font-family: 'Playfair Display', serif; font-size: clamp(20px, 3vw, 27px); font-weight: 700; color: #fff; margin-bottom: 11px; }
.pl-cta p { font-size: 15px; color: rgba(255,255,255,0.52); max-width: 460px; margin: 0 auto 34px; line-height: 1.7; }

.pl-join-btn {
    display: inline-flex; align-items: center; gap: 9px;
    background: linear-gradient(135deg, #153565, #1a4a9e, #2d65c8);
    color: #fff; font-size: 14.5px; font-weight: 600;
    padding: 13px 28px; border-radius: 11px;
    text-decoration: none; border: none; cursor: pointer;
    box-shadow: 0 8px 28px rgba(26,74,158,0.4);
    transition: opacity 0.2s, transform 0.2s, box-shadow 0.2s;
}

.pl-join-btn:hover { opacity: 0.9; transform: translateY(-2px); box-shadow: 0 12px 38px rgba(26,74,158,0.5); color: #fff; text-decoration: none; }

/* RESPONSIVE */
@media (max-width: 1024px) {
    .pl-team-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 640px) {
    .pl-team-grid { grid-template-columns: 1fr; }
    .pl-leader-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .pl-leader-card:hover { transform: none; }
    .pl-team-card:hover { transform: none; }
    .pl-stat { min-width: 80px; }
}
@media (max-width: 380px) {
    .pl-leader-grid { grid-template-columns: 1fr; }
}
</style>

<section class="pl-hero">
    <div class="container wrap">
        <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
            <span class="eyebrow-dot"></span>Gereja Beriman<span class="eyebrow-dot"></span>
        </div>
        <h1>Pelayanan &amp; <span class="accent">Komunitas</span></h1>
        <p>Bergabunglah dengan berbagai tim pelayanan dan temukan tempat Anda untuk melayani Tuhan bersama kami.</p>
    </div>
</section>

<div class="pl-stats">
    <div class="pl-stats-inner">
        <div class="pl-stat">
            <div class="pl-stat-num">{{ $timPelayanan->count() }}</div>
            <div class="pl-stat-label">Tim Pelayanan</div>
        </div>
        <div class="pl-stat">
            <div class="pl-stat-num">{{ $kepemimpinan->count() }}</div>
            <div class="pl-stat-label">Pemimpin</div>
        </div>
        <div class="pl-stat">
            <div class="pl-stat-num">{{ $timPelayanan->sum(fn($t) => $t->anggotas->count()) }}+</div>
            <div class="pl-stat-label">Anggota Aktif</div>
        </div>
        <div class="pl-stat">
            <div class="pl-stat-num">1</div>
            <div class="pl-stat-label">Jemaat</div>
        </div>
    </div>
</div>

<section class="pl-sec alt">
    <div class="global-container">
        <div class="pl-sec-label">Kepemimpinan</div>
        <div class="pl-sec-title">Gembala &amp; Pemimpin</div>
        <div class="pl-sec-sub">Dipimpin dengan kasih, hikmat, dan dedikasi penuh.</div>
        <div class="pl-leader-grid">
            @forelse($kepemimpinan as $item)
            <div class="pl-leader-card">
                <div class="pl-avatar">
                    @if($item->photo)
                        <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->leader ?: $item->title }}">
                    @else
                        {{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}
                    @endif
                </div>
                <div class="pl-lc-name">{{ $item->leader ?: $item->title }}</div>
                <div class="pl-lc-role">{{ $item->title }}</div>
            </div>
            @empty
            <div class="pl-no-data">Belum ada data kepemimpinan.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="pl-sec" style="background:#0d1e3a;">
    <div class="global-container">
        <div class="pl-sec-label">Tim Pelayanan</div>
        <div class="pl-sec-title">Tim Kami</div>
        <div class="pl-sec-sub">Berbagai tim yang melayani dengan dedikasi dan kasih.</div>
        <div class="pl-team-grid">
            @forelse($timPelayanan as $tim)
            <div class="pl-team-card">
                <div class="pl-tc-icon">
                    @if($tim->icon && str_contains($tim->icon,'bi-'))
                        <i class="bi {{ $tim->icon }}"></i>
                    @else
                        {{ $tim->icon ?: '♪' }}
                    @endif
                </div>
                <div class="pl-tc-title">{{ $tim->title }}</div>
                <div class="pl-tc-desc">{{ $tim->description ?: 'Melayani dengan penuh dedikasi dan kasih.' }}</div>
                <div class="pl-divider"></div>
                <ul class="pl-member-list">
                    @if($tim->anggotas->count())
                        @foreach($tim->anggotas as $anggota)
                        <li class="pl-member-item">
                            <span class="pl-mi-name">{{ $anggota->nama }}</span>
                            <span class="pl-mi-role">{{ $anggota->bagian ?: '-' }}</span>
                        </li>
                        @endforeach
                    @else
                    <li class="pl-member-item">
                        <span class="pl-mi-name">{{ $tim->leader ?: 'Koordinator belum ditentukan' }}</span>
                        <span class="pl-mi-role">Koordinator</span>
                    </li>
                    @endif
                </ul>
            </div>
            @empty
            <div class="pl-no-data">Belum ada data tim pelayanan.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="pl-cta">
    <div class="global-container">
        <h2>Siap untuk Bergabung?</h2>
        <p>Temukan tempat Anda dalam pelayanan dan jadilah bagian dari komunitas yang mengasihi Tuhan.</p>
        <a href="{{ route('jemaat.create') }}" class="pl-join-btn">
            <i class="bi bi-person-plus"></i>
            Bergabung dengan Pelayanan
        </a>
    </div>
</section>
@endsection