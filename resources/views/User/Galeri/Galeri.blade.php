@extends('layouts.app')

@section('content')
<style>
/* HERO */
.g-hero{
    position:relative;
    padding:clamp(70px,10vw,110px) 16px clamp(60px,8vw,90px);
    text-align:center;
    overflow:hidden;
    background:linear-gradient(160deg,#0f2444 0%,#102a52 50%,#0d1e3a 100%);
}

.g-hero-grid{
    position:absolute;
    inset:0;
    background-image:
        linear-gradient(rgba(93,146,232,.06) 1px,transparent 1px),
        linear-gradient(90deg,rgba(93,146,232,.06) 1px,transparent 1px);
    background-size:60px 60px;
    mask-image:radial-gradient(ellipse 80% 70% at 50% 50%,black 0%,transparent 100%);
    pointer-events:none;
}

.g-hero-orb{
    position:absolute;
    border-radius:50%;
    pointer-events:none;
    filter:blur(65px);
}

.g-hero-orb-1{
    width:500px;
    height:500px;
    background:radial-gradient(circle,rgba(45,101,200,.4) 0%,transparent 70%);
    top:-150px;
    left:-100px;
}

.g-hero-orb-2{
    width:350px;
    height:350px;
    background:radial-gradient(circle,rgba(93,146,232,.2) 0%,transparent 70%);
    bottom:-60px;
    right:-50px;
}

.g-hero-inner{
    position:relative;
    z-index:2;
    max-width:650px;
    margin:auto;
}

.eyebrow{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    color:#c8e0fd;
    font-size:12px;
    letter-spacing:2px;
    text-transform:uppercase;
    margin-bottom:20px;
}

.eyebrow-dot{
    width:6px;
    height:6px;
    border-radius:50%;
    background:#93bef8;
}

.g-hero-title{
    font-family:'Playfair Display',serif;
    font-size:clamp(34px,7vw,62px);
    font-weight:800;
    color:#fff;
    line-height:1.1;
    margin-bottom:18px;
    animation:fadeUp .8s ease .25s both;
}

.g-hero-title span{
    background:linear-gradient(135deg,#93bef8 0%,#c8e0fd 50%,#93bef8 100%);
    background-size:200% auto;
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    animation:shimmerText 3.5s linear infinite;
}

.g-hero-sub{
    font-size:clamp(14px,2vw,16px);
    color:rgba(255,255,255,.72);
    line-height:1.8;
    max-width:520px;
    margin:auto;
    animation:fadeUp .8s ease .45s both;
}

.g-hero-line{
    width:1px;
    height:50px;
    background:linear-gradient(to bottom,transparent,#93bef8,transparent);
    margin:34px auto 0;
    animation:fadeUp .8s ease .6s both;
}

/* SECTION */
.g-section{
    background:#0f2040;
    padding:70px 0 90px;
    position:relative;
}

.g-section::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:1px;
    background:linear-gradient(90deg,transparent,rgba(93,146,232,.22),transparent);
}

.global-container{
    max-width:1200px;
    margin:auto;
    padding:0 24px;
}

.section-head{
    text-align:center;
    margin-bottom:60px;
}

.section-label{
    display:block;
    color:#93bef8;
    font-size:11px;
    letter-spacing:3px;
    text-transform:uppercase;
    margin-bottom:12px;
    font-weight:700;
}

.section-title{
    font-family:'Playfair Display',serif;
    font-size:clamp(30px,5vw,42px);
    color:#fff;
    margin-bottom:16px;
}

.section-rule{
    width:70px;
    height:2px;
    background:linear-gradient(90deg,#5d92e8,#c8e0fd);
    margin:auto;
    border-radius:20px;
}

/* GRID */
.g-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    gap:20px;
}

/* CARD */
.g-card{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(93,146,232,.15);
    border-radius:18px;
    overflow:hidden;
    cursor:pointer;
    transition:.4s;
    backdrop-filter:blur(10px);
}

.g-card:hover{
    transform:translateY(-10px);
    border-color:rgba(93,146,232,.35);
    box-shadow:0 25px 60px rgba(0,0,0,.35);
}

.g-card-img{
    position:relative;
    height:210px;
    overflow:hidden;
    background:#08162e;
}

.g-card-img img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .6s ease;
}

.g-card:hover .g-card-img img{
    transform:scale(1.08);
}

.g-card-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to bottom,transparent 35%,rgba(10,22,40,.92));
    opacity:0;
    transition:.3s;
    display:flex;
    align-items:flex-end;
    padding:18px;
}

.g-card:hover .g-card-overlay{
    opacity:1;
}

.g-overlay-hint{
    display:flex;
    align-items:center;
    gap:8px;
    color:#c8e0fd;
    font-size:12px;
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:1px;
}

.g-card-placeholder{
    height:210px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:10px;
    background:linear-gradient(135deg,#0d2040,#112a50);
    color:rgba(93,146,232,.35);
}

.g-card-placeholder svg{
    width:42px;
    height:42px;
    stroke:currentColor;
    fill:none;
    stroke-width:1.5;
}

.g-card-body{
    padding:18px;
}

.g-card-title{
    font-family:'Playfair Display',serif;
    color:#fff;
    font-size:17px;
    font-weight:700;
    margin-bottom:10px;
    line-height:1.4;
}

.g-card-desc{
    color:rgba(255,255,255,.68);
    font-size:13px;
    line-height:1.7;
    margin-bottom:16px;
    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.g-card-date{
    display:flex;
    align-items:center;
    gap:8px;
    color:#93bef8;
    font-size:12px;
    font-weight:600;
}

.g-card-date svg{
    width:13px;
    height:13px;
    stroke:#5d92e8;
    fill:none;
    stroke-width:2;
}

/* PAGINATION */
.g-pagi{
    margin-top:50px;
    display:flex;
    justify-content:center;
}

.g-pagi .pagination{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.g-pagi .page-link{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(93,146,232,.18);
    color:#fff;
    transition:.3s;
}

.g-pagi .page-item.active .page-link,
.g-pagi .page-link:hover{
    background:linear-gradient(135deg,#1a4a9e,#2d65c8);
    border-color:transparent;
}

/* EMPTY */
.g-empty{
    text-align:center;
    padding:80px 20px;
}

.g-empty-icon{
    width:90px;
    height:90px;
    border-radius:24px;
    background:rgba(93,146,232,.08);
    border:1px solid rgba(93,146,232,.18);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto auto 24px;
}

.g-empty-icon svg{
    width:42px;
    height:42px;
    stroke:#93bef8;
    fill:none;
    stroke-width:1.5;
}

.g-empty h4{
    color:#fff;
    font-size:24px;
    margin-bottom:10px;
}

.g-empty p{
    color:rgba(255,255,255,.6);
}

/* LIGHTBOX */
.g-lightbox{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(5,10,20,.94);
    z-index:9999;
    align-items:center;
    justify-content:center;
    padding:20px;
    backdrop-filter:blur(10px);
}

.g-lightbox.open{
    display:flex;
}

.g-lb-inner{
    position:relative;
    max-width:950px;
    width:100%;
}

.g-lb-inner img{
    width:100%;
    max-height:75vh;
    object-fit:contain;
    border-radius:18px;
    background:#08162e;
}

.g-lb-close{
    position:absolute;
    top:-48px;
    right:0;
    width:40px;
    height:40px;
    border:none;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    color:#fff;
    cursor:pointer;
    transition:.3s;
}

.g-lb-close:hover{
    transform:rotate(90deg);
    background:rgba(255,255,255,.18);
}

.g-lb-caption{
    text-align:center;
    margin-top:20px;
}

.lb-title{
    color:#fff;
    font-size:20px;
    font-family:'Playfair Display',serif;
    margin-bottom:8px;
}

.lb-desc{
    color:rgba(255,255,255,.65);
    line-height:1.7;
    max-width:600px;
    margin:auto;
}

/* FOOTER */
.g-footer-strip{
    background:#08111f;
    border-top:1px solid rgba(93,146,232,.12);
    text-align:center;
    padding:30px 20px;
}

.g-footer-strip p{
    color:rgba(255,255,255,.45);
    margin:0;
    font-size:13px;
}

/* ANIMATION */
@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes shimmerText{
    to{
        background-position:200% center;
    }
}

/* MOBILE */
@media(max-width:480px){

    .g-grid{
        grid-template-columns:1fr 1fr;
        gap:12px;
    }

    .g-card-img,
    .g-card-placeholder{
        height:140px;
    }

    .g-card-body{
        padding:12px;
    }

    .g-card-title{
        font-size:14px;
    }

    .g-card-desc{
        font-size:12px;
    }
}
</style>

<section class="g-hero">
    <div class="g-hero-grid"></div>
    <div class="g-hero-orb g-hero-orb-1"></div>
    <div class="g-hero-orb g-hero-orb-2"></div>

    <div class="g-hero-inner">
        <div class="eyebrow">
            <span class="eyebrow-dot"></span>
            Galeri Gereja
            <span class="eyebrow-dot"></span>
        </div>

        <h1 class="g-hero-title">
            Momen <span>Bersejarah</span><br>
            dalam Iman Kita
        </h1>

        <p class="g-hero-sub">
            Abadikan setiap perjalanan rohani, perayaan, dan kebersamaan yang mempererat persekutuan kita.
        </p>

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

            <div class="g-card"
                 onclick="gLightbox(
                 '{{ $item->image ? asset('storage/'.$item->image) : '' }}',
                 '{{ addslashes($item->title ?? '') }}',
                 '{{ addslashes($item->description ?? '') }}'
                 )">

                @if($item->image)

                <div class="g-card-img">
                    <img src="{{ asset('storage/'.$item->image) }}"
                         alt="{{ $item->title ?? 'Galeri' }}"
                         loading="lazy">

                    <div class="g-card-overlay">
                        <div class="g-overlay-hint">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#c8e0fd" stroke-width="2">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                <line x1="11" y1="8" x2="11" y2="14"/>
                                <line x1="8" y1="11" x2="14" y2="11"/>
                            </svg>
                            Lihat Foto
                        </div>
                    </div>
                </div>

                @else

                <div class="g-card-placeholder">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    <span>Foto</span>
                </div>

                @endif

                <div class="g-card-body">

                    @if($item->title)
                    <div class="g-card-title">
                        {{ $item->title }}
                    </div>
                    @endif

                    @if($item->description)
                    <div class="g-card-desc">
                        {{ $item->description }}
                    </div>
                    @endif

                    @if($item->event_date)

                    <div class="g-card-date">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>

                        {{ $item->event_date->translatedFormat('d F Y') }}
                    </div>

                    @elseif($item->created_at)

                    <div class="g-card-date">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>

                        {{ $item->created_at->translatedFormat('d F Y') }}
                    </div>

                    @endif

                </div>
            </div>

            @endforeach

        </div>

        @if(method_exists($galeris,'links') && $galeris->hasPages())
        <div class="g-pagi">
            {{ $galeris->links() }}
        </div>
        @endif

        @else

        <div class="g-empty">
            <div class="g-empty-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>
            </div>

            <h4>Belum Ada Foto</h4>

            <p>
                Galeri foto gereja akan segera ditampilkan di sini.
            </p>
        </div>

        @endif
    </div>
</section>

<div class="g-footer-strip">
    <p>
        Setiap gambar adalah saksi bisu dari perjalanan iman kita bersama.
    </p>
</div>

<div class="g-lightbox" id="gLightboxEl" onclick="if(event.target===this)gClose()">
    <div class="g-lb-inner">

        <button class="g-lb-close" onclick="gClose()">
            ✕
        </button>

        <img id="gLbImg" src="" alt="">

        <div class="g-lb-caption">
            <div class="lb-title" id="gLbTitle"></div>
            <div class="lb-desc" id="gLbDesc"></div>
        </div>

    </div>
</div>

<script>
function gLightbox(src,title,desc){
    if(!src) return;

    document.getElementById('gLbImg').src = src;
    document.getElementById('gLbTitle').textContent = title || '';
    document.getElementById('gLbDesc').textContent = desc || '';

    document.getElementById('gLightboxEl').classList.add('open');

    document.body.style.overflow = 'hidden';
}

function gClose(){
    document.getElementById('gLightboxEl').classList.remove('open');
    document.body.style.overflow = '';
}

document.addEventListener('keydown',function(e){
    if(e.key === 'Escape'){
        gClose();
    }
});
</script>
@endsection