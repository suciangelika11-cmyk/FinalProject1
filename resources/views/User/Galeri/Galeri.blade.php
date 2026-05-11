@extends('layouts.app')

@section('content')
<style>
/* HERO */
.g-hero {
    position: relative;
    padding: clamp(70px, 10vw, 110px) 16px clamp(60px, 8vw, 90px);
    text-align: center;
    overflow: hidden;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 50%, #0d1e3a 100%);
}

.g-hero-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(93,146,232,0.06) 1px, transparent 1px),
        linear-gradient(90deg, rgba(93,146,232,0.06) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 70% at 50% 50%, black 0%, transparent 100%);
    pointer-events: none;
}

.g-hero-orb {
    position: absolute; border-radius: 50%; pointer-events: none; filter: blur(65px);
}
.g-hero-orb-1 {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(45,101,200,0.4) 0%, transparent 70%);
    top: -150px; left: -100px;
}
.g-hero-orb-2 {
    width: 350px; height: 350px;
    background: radial-gradient(circle, rgba(93,146,232,0.2) 0%, transparent 70%);
    bottom: -60px; right: -50px;
}

.g-hero-inner { position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }

.g-hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 7vw, 62px);
    font-weight: 800;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 18px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.g-hero-title span {
    background: linear-gradient(135deg, #93bef8 0%, #c8e0fd 50%, #93bef8 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmerText 3.5s linear infinite;
}

.g-hero-sub {
    font-size: clamp(14px, 2vw, 16px);
    font-weight: 300;
    color: rgba(255,255,255,0.72);
    max-width: 460px;
    margin: 0 auto 0;
    line-height: 1.75;
    animation: fadeUp 0.8s ease 0.4s both;
}

.g-hero-line {
    width: 1px; height: 50px;
    background: linear-gradient(to bottom, transparent, #93bef8, transparent);
    margin: 36px auto 0;
    animation: fadeUp 0.8s ease 0.55s both;
}

/* SECTION */
.g-section {
    padding: clamp(48px, 8vw, 80px) 0 clamp(56px, 10vw, 100px);
    background: #0f2040;
    position: relative;
}

.g-section::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(93,146,232,0.22), transparent);
}

/* GRID */
.g-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 18px;
}

/* CARD */
.g-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.16);
    border-radius: 18px;
    overflow: hidden;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    transition: transform 0.4s cubic-bezier(.34,1.56,.64,1),
                box-shadow 0.4s ease,
                border-color 0.3s ease;
    backdrop-filter: blur(8px);
    animation: cardIn 0.6s cubic-bezier(.34,1.56,.64,1) both;
}

.g-card:nth-child(1){animation-delay:.05s}
.g-card:nth-child(2){animation-delay:.12s}
.g-card:nth-child(3){animation-delay:.19s}
.g-card:nth-child(4){animation-delay:.26s}
.g-card:nth-child(5){animation-delay:.33s}
.g-card:nth-child(6){animation-delay:.40s}

@keyframes cardIn {
    from { opacity: 0; transform: translateY(32px) scale(.96); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

.g-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 28px 56px rgba(10,22,40,0.5), 0 0 0 1px rgba(93,146,232,0.3);
    border-color: rgba(93,146,232,0.42);
}

.g-card-img {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #0a1e3c;
    flex-shrink: 0;
}

.g-card-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s cubic-bezier(.34,1.56,.64,1);
}

.g-card:hover .g-card-img img { transform: scale(1.08); }

.g-card-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to bottom, transparent 35%, rgba(10,22,40,0.88) 100%);
    opacity: 0;
    transition: opacity 0.3s;
    display: flex; align-items: flex-end; padding: 18px;
}

.g-card:hover .g-card-overlay { opacity: 1; }

.g-overlay-hint {
    display: flex; align-items: center; gap: 7px;
    color: #c8e0fd;
    font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;
}

.g-card-placeholder {
    height: 200px;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 10px;
    background: linear-gradient(135deg, #0d2040, #112a50);
    color: rgba(93,146,232,0.32);
}

.g-card-placeholder svg { width: 40px; height: 40px; stroke: currentColor; fill: none; stroke-width: 1.5; stroke-linecap: round; }
.g-card-placeholder span { font-size: 11px; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; }

.g-card-body {
    padding: 16px 18px 18px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    border-top: 1px solid rgba(93,146,232,0.1);
}

.g-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 15px; font-weight: 700;
    color: #fff;
    line-height: 1.4; margin-bottom: 8px;
    transition: color 0.3s;
}

.g-card:hover .g-card-title { color: #c8e0fd; }

.g-card-desc {
    font-size: 13px; font-weight: 300;
    color: rgba(255,255,255,0.62);
    line-height: 1.7; flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 14px;
}

.g-card-date {
    display: flex; align-items: center; gap: 7px;
    font-size: 12px; font-weight: 500; color: #93bef8;
}

.g-card-date svg { width: 12px; height: 12px; stroke: #5592e8; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; flex-shrink: 0; }

/* PAGINATION */
.g-pagi { display: flex; justify-content: center; margin-top: 52px; }
.g-pagi .pagination { display: flex; gap: 5px; list-style: none; padding: 0; margin: 0; flex-wrap: wrap; justify-content: center; }
.g-pagi .page-item .page-link {
    display: flex; align-items: center; justify-content: center;
    width: 40px; height: 40px; border-radius: 10px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.18);
    color: rgba(255,255,255,0.6);
    font-size: 14px; font-weight: 500;
    text-decoration: none; transition: all 0.3s;
}
.g-pagi .page-item.active .page-link,
.g-pagi .page-item .page-link:hover {
    background: linear-gradient(135deg, #1a4a9e, #2d65c8);
    border-color: transparent; color: #fff; font-weight: 700;
}

/* EMPTY */
.g-empty { text-align: center; padding: 80px 20px; animation: fadeUp 0.7s ease both; }
.g-empty-icon {
    width: 80px; height: 80px;
    background: rgba(93,146,232,0.1);
    border: 1px solid rgba(93,146,232,0.2);
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 22px;
}
.g-empty-icon svg { width: 36px; height: 36px; stroke: #93bef8; fill: none; stroke-width: 1.5; stroke-linecap: round; }
.g-empty h4 { font-family: 'Playfair Display', serif; font-size: 21px; font-weight: 700; color: #fff; margin-bottom: 8px; }
.g-empty p { font-size: 14px; color: rgba(255,255,255,0.5); }

/* LIGHTBOX */
.g-lightbox {
    display: none; position: fixed; inset: 0;
    background: rgba(10,22,40,0.96);
    z-index: 9999; align-items: center; justify-content: center;
    padding: 16px; backdrop-filter: blur(16px);
    overflow-y: auto;
}
.g-lightbox.open { display: flex; animation: fadeIn 0.22s ease; }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }
.g-lb-inner { position: relative; max-width: 960px; width: 100%; animation: lbOpen 0.35s cubic-bezier(.34,1.56,.64,1); margin: auto; }
@keyframes lbOpen { from{opacity:0;transform:scale(.9) translateY(14px)} to{opacity:1;transform:scale(1) translateY(0)} }
.g-lb-inner img { width: 100%; border-radius: 14px; display: block; max-height: 70vh; object-fit: contain; background: #0a1e3c; box-shadow: 0 40px 80px rgba(0,0,0,0.7); }
.g-lb-close {
    position: absolute; top: -48px; right: 0;
    background: rgba(93,146,232,0.15);
    border: 1px solid rgba(93,146,232,0.3);
    color: #93bef8; width: 38px; height: 38px;
    border-radius: 50%; font-size: 14px; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s;
}
.g-lb-close:hover { background: rgba(93,146,232,0.28); transform: scale(1.08) rotate(90deg); }
.g-lb-caption { text-align: center; margin-top: 20px; padding: 0 8px; }
.g-lb-caption .lb-title { font-family: 'Playfair Display', serif; font-size: clamp(16px, 3vw, 19px); font-weight: 700; color: #fff; margin-bottom: 7px; }
.g-lb-caption .lb-desc { font-size: 13.5px; color: rgba(255,255,255,0.58); font-weight: 300; max-width: 520px; margin: 0 auto; line-height: 1.7; }

/* FOOTER STRIP */
.g-footer-strip {
    background: #0a1628;
    border-top: 1px solid rgba(93,146,232,0.1);
    padding: 32px 16px; text-align: center;
}
.g-footer-strip p { font-size: 13px; color: rgba(255,255,255,0.4); margin: 0; }

/* RESPONSIVE */
@media (max-width: 480px) {
    .g-grid {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    .g-card-img, .g-card-placeholder { height: 140px; }
    .g-card-body { padding: 12px 12px 14px; }
    .g-card:hover { transform: none; }
    .g-lb-close { top: -44px; }
}
</style>

<section class="g-hero">
    <div class="g-hero-grid"></div>
    <div class="g-hero-orb g-hero-orb-1"></div>
    <div class="g-hero-orb g-hero-orb-2"></div>
    <div class="g-hero-inner">
        <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
            <span class="eyebrow-dot"></span>Galeri Gereja<span class="eyebrow-dot"></span>
        </div>
        <h1 class="g-hero-title">Momen <span>Bersejarah</span><br>dalam Iman Kita</h1>
        <p class="g-hero-sub">Abadikan setiap perjalanan rohani, perayaan, dan kebersamaan yang mempererat persekutuan kita.</p>
        <div class="g-hero-line"></div>
    </div>
</section>

<section class="g-section">
    <div class="global-container">
        <div class="section-head">
            <span class="section-label">Koleksi Foto</span>
            <h2 class="section-title">Kenangan yang Terpatri</h2>
            <div class="section-rule"></div>
        </div>

        @if($galeris->isNotEmpty())
        <div class="g-grid">
            @foreach($galeris as $item)
            <div class="g-card" onclick="gLightbox('{{ $item->image ? asset('storage/'.$item->image) : '' }}','{{ addslashes($item->title ?? '') }}','{{ addslashes($item->description ?? '') }}')">
                @if($item->image)
                <div class="g-card-img">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title ?? 'Foto Galeri' }}" loading="lazy">
                    <div class="g-card-overlay">
                        <div class="g-overlay-hint">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#c8e0fd" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                            Lihat Foto
                        </div>
                    </div>
                </div>
                @else
                <div class="g-card-placeholder">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    <span>Foto</span>
                </div>
                @endif
                <div class="g-card-body">
                    @if($item->title)<div class="g-card-title">{{ $item->title }}</div>@endif
                    @if($item->description)<div class="g-card-desc">{{ $item->description }}</div>@endif
                    @if($item->event_date)
                    <div class="g-card-date">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $item->event_date->translatedFormat('d F Y') }}
                    </div>
                    @elseif($item->created_at)
                    <div class="g-card-date">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $item->created_at->translatedFormat('d F Y') }}
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if(method_exists($galeris,'links') && $galeris->hasPages())
        <div class="g-pagi">{{ $galeris->links() }}</div>
        @endif

        @else
        <div class="g-empty">
            <div class="g-empty-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
            <h4>Belum Ada Foto</h4>
            <p>Galeri foto gereja akan segera ditampilkan di sini.</p>
        </div>
        @endif
    </div>
</section>

<div class="g-footer-strip">
    <p>Setiap gambar adalah saksi bisu dari perjalanan iman kita bersama.</p>
</div>

<div class="g-lightbox" id="gLightboxEl" onclick="if(event.target===this)gClose()">
    <div class="g-lb-inner">
        <button class="g-lb-close" onclick="gClose()" aria-label="Tutup">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <img id="gLbImg" src="" alt="">
        <div class="g-lb-caption">
            <div class="lb-title" id="gLbTitle"></div>
            <div class="lb-desc" id="gLbDesc"></div>
        </div>
    </div>
</div>

<script>
function gLightbox(src, title, desc) {
    if (!src) return;
    document.getElementById('gLbImg').src = src;
    document.getElementById('gLbTitle').textContent = title || '';
    document.getElementById('gLbDesc').textContent = desc || '';
    document.getElementById('gLightboxEl').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function gClose() {
    document.getElementById('gLightboxEl').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') gClose(); });
</script>
@endsection