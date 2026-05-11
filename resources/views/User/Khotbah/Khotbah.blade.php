@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
:root{
    --b950:#020810;--b900:#050f1f;--b800:#071830;--b700:#0d2448;
    --b600:#163562;--b500:#1e4a8e;--b400:#2d65bf;--b300:#5592e0;
    --b200:#93bef5;--b100:#d0e6ff;
    --white:#fff;--dim:rgba(255,255,255,.55);
    --r-pill:999px;--r-card:18px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--b900);color:var(--white);-webkit-font-smoothing:antialiased;}

/* HERO */
.kh-hero{position:relative;padding:110px 0 120px;text-align:center;overflow:hidden;background:var(--b950);}
.kh-hero-ring{position:absolute;top:-160px;left:50%;transform:translateX(-50%);width:640px;height:640px;border-radius:50%;border:1px solid rgba(45,101,191,.07);pointer-events:none;}
.kh-hero-ring2{position:absolute;top:-80px;left:50%;transform:translateX(-50%);width:420px;height:420px;border-radius:50%;border:1px solid rgba(45,101,191,.05);pointer-events:none;}
.kh-hero-glow{position:absolute;top:0;left:50%;transform:translateX(-50%);width:560px;height:300px;background:radial-gradient(ellipse at top,rgba(30,74,142,.12) 0%,transparent 70%);pointer-events:none;}

.kh-eyebrow{
    display:inline-flex;align-items:center;gap:8px;
    background:rgba(45,101,191,.12);border:1px solid rgba(45,101,191,.28);
    border-radius:var(--r-pill);padding:6px 20px;
    font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;
    color:var(--b200);margin-bottom:28px;
}
.kh-dot{width:5px;height:5px;border-radius:50%;background:var(--b300);display:inline-block;}

.kh-hero h1{font-family:'Playfair Display',serif;font-size:clamp(34px,6vw,58px);font-weight:700;line-height:1.12;color:var(--white);margin-bottom:18px;}
.kh-hero h1 em{font-style:italic;color:var(--b200);}
.kh-hero p{font-size:15px;font-weight:300;color:rgba(255,255,255,.75);max-width:420px;margin:0 auto;line-height:1.75;}
.kh-hero .wrap{position:relative;z-index:1;}

/* WAVE */
.kh-wave{display:block;width:100%;overflow:hidden;line-height:0;}
.kh-wave svg{display:block;width:100%;height:60px;}

/* SECTION */
.kh-section{background:var(--b800);padding:0 0 90px;}
.kh-section-head{text-align:center;padding:60px 0 44px;}
.kh-label{font-size:10px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--b300);display:block;margin-bottom:12px;}
.kh-title{font-family:'Playfair Display',serif;font-size:clamp(26px,4vw,38px);font-weight:700;color:var(--white);margin-bottom:18px;}
.kh-rule{width:40px;height:2px;background:linear-gradient(90deg,var(--b500),var(--b300));border-radius:99px;margin:0 auto;}

.container{max-width:1180px;margin:0 auto;padding:0 28px;}

/* SEARCH */
.kh-search-wrap{max-width:480px;margin:0 auto 48px;position:relative;}
.kh-search-icon{position:absolute;left:18px;top:50%;transform:translateY(-50%);color:rgba(85,146,224,.6);pointer-events:none;display:flex;align-items:center;}
.kh-search{
    width:100%;padding:14px 22px 14px 46px;
    background:rgba(255,255,255,.05);border:1px solid rgba(45,101,191,.2);
    border-radius:var(--r-pill);font-family:'DM Sans',sans-serif;
    font-size:14px;color:var(--white);outline:none;
    transition:border-color .25s,background .25s;
}
.kh-search:focus{border-color:var(--b300);background:rgba(30,74,142,.08);}
.kh-search::placeholder{color:rgba(255,255,255,.25);font-weight:300;}

/* GRID */
.kh-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px;}

/* CARD */
.kh-card{
    background:rgba(13,36,72,.5);border:1px solid rgba(45,101,191,.1);
    border-radius:var(--r-card);overflow:hidden;
    display:flex;flex-direction:column;
    transition:transform .3s ease,border-color .3s ease;
    position:relative; backdrop-filter:blur(4px);
}
.kh-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--b500),var(--b300));opacity:0;transition:opacity .3s;z-index:2;}
.kh-card:hover{transform:translateY(-7px);border-color:rgba(85,146,224,.28);}
.kh-card:hover::before{opacity:1;}

.kh-thumb{height:190px;overflow:hidden;position:relative;background:var(--b900);flex-shrink:0;}
.kh-thumb img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .5s ease;}
.kh-card:hover .kh-thumb img{transform:scale(1.05);}

.kh-thumb-ph{width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;background:var(--b900);}
.kh-thumb-ph-icon{width:54px;height:54px;border-radius:50%;border:1.5px solid rgba(45,101,191,.22);display:flex;align-items:center;justify-content:center;color:rgba(147,190,245,.5);font-size:22px;}
.kh-thumb-ph-label{font-size:10px;letter-spacing:.18em;text-transform:uppercase;font-weight:500;color:rgba(147,190,245,.35);}

.kh-vid-badge{
    position:absolute;top:12px;right:12px;
    background:rgba(7,24,48,.8);color:var(--b200);
    font-size:10px;font-weight:600;letter-spacing:.06em;
    padding:4px 12px;border-radius:var(--r-pill);
    display:flex;align-items:center;gap:5px;
    border:1px solid rgba(45,101,191,.2);z-index:1;
}
.kh-vdot{width:5px;height:5px;border-radius:50%;background:var(--b300);animation:vPulse 1.6s infinite;}
@keyframes vPulse{0%,100%{opacity:1}50%{opacity:.3}}

.kh-card-body{padding:22px 20px 18px;display:flex;flex-direction:column;flex:1;}
.kh-date{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--b300);margin-bottom:10px;}
.kh-card-title{font-family:'Playfair Display',serif;font-size:16px;font-weight:600;color:var(--white);line-height:1.4;margin-bottom:9px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.kh-card-desc{font-size:13px;color:rgba(255,255,255,.65);line-height:1.7;flex:1;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:18px;}

.kh-card-foot{border-top:1px solid rgba(45,101,191,.1);padding-top:14px;}
.kh-btn-watch{
    display:inline-flex;align-items:center;gap:9px;
    background:rgba(30,74,142,.15);border:1px solid rgba(45,101,191,.25);
    color:var(--b200);border-radius:var(--r-pill);
    padding:9px 18px;font-size:12px;font-weight:500;
    text-decoration:none;transition:background .25s,border-color .25s;
}
.kh-btn-watch:hover{background:rgba(30,74,142,.3);border-color:rgba(85,146,224,.45);color:var(--b200);}
.kh-play-btn{width:20px;height:20px;border-radius:50%;background:var(--b400);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.kh-play-btn i{font-size:8px;color:var(--white);margin-left:1px;}
.kh-no-vid{display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,.22);font-size:12px;}

/* EMPTY */
.kh-empty{grid-column:1/-1;text-align:center;padding:80px 20px;}
.kh-empty-icon{width:70px;height:70px;border-radius:50%;border:1.5px solid rgba(45,101,191,.22);display:flex;align-items:center;justify-content:center;font-size:26px;color:rgba(147,190,245,.5);margin:0 auto 22px;}
.kh-empty h4{font-family:'Playfair Display',serif;font-size:21px;font-weight:600;color:var(--white);margin-bottom:8px;}
.kh-empty p{font-size:14px;color:rgba(255,255,255,.4);}

/* PAGINATION */
.pagination .page-link{border-radius:var(--r-pill)!important;margin:0 3px;background:transparent;border:1px solid rgba(45,101,191,.2)!important;color:rgba(255,255,255,.6);font-size:13px;font-weight:500;transition:all .2s;}
.pagination .page-item.active .page-link{background:rgba(30,74,142,.25)!important;border-color:rgba(45,101,191,.4)!important;color:var(--b200);}
.pagination .page-link:hover{background:rgba(30,74,142,.15)!important;border-color:rgba(45,101,191,.4)!important;color:var(--b200);}

@media(max-width:576px){.kh-grid{grid-template-columns:1fr;}}
</style>

<section class="kh-hero">
    <div class="kh-hero-ring"></div>
    <div class="kh-hero-ring2"></div>
    <div class="kh-hero-glow"></div>
    <div class="wrap container">
        <div class="kh-eyebrow"><span class="kh-dot"></span>Firman Tuhan<span class="kh-dot"></span></div>
        <h1>Khotbah &amp;<br><em>Pengajaran</em></h1>
        <p>Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna dan penuh anugerah</p>
    </div>
</section>

<div class="kh-wave">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,0 C300,60 900,60 1200,0 L1200,60 L0,60 Z" fill="#071830"/>
    </svg>
</div>

<section class="kh-section">
    <div class="container">
        <div class="kh-section-head">
            <span class="kh-label">Arsip Khotbah</span>
            <h2 class="kh-title">Firman Tuhan</h2>
            <div class="kh-rule"></div>
        </div>

        <div class="kh-search-wrap">
            <span class="kh-search-icon"><i class="bi bi-search" style="font-size:14px;"></i></span>
            <input type="text" class="kh-search" id="searchKhotbah" placeholder="Cari judul khotbah…">
        </div>

        <div class="kh-grid" id="khotbahGrid">
            @forelse($khotbah as $item)
            <div class="kh-card" data-title="{{ strtolower($item->title) }}">
                <div class="kh-thumb">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy">
                    @else
                        <div class="kh-thumb-ph">
                            <div class="kh-thumb-ph-icon"><i class="bi bi-play-circle"></i></div>
                            <span class="kh-thumb-ph-label">Video Khotbah</span>
                        </div>
                    @endif
                    @if($item->video)<div class="kh-vid-badge"><span class="kh-vdot"></span>Video</div>@endif
                </div>
                <div class="kh-card-body">
                    <div class="kh-date"><i class="bi bi-calendar3" style="font-size:10px;"></i>{{ $item->sermon_date ? \Carbon\Carbon::parse($item->sermon_date)->translatedFormat('d F Y') : '—' }}</div>
                    <div class="kh-card-title">{{ $item->title }}</div>
                    @if($item->description)<div class="kh-card-desc">{{ $item->description }}</div>@endif
                    <div class="kh-card-foot">
                        @if($item->video)
                        <a href="{{ $item->video }}" target="_blank" rel="noopener" class="kh-btn-watch">
                            <span class="kh-play-btn"><i class="bi bi-play-fill"></i></span>
                            Tonton Khotbah
                        </a>
                        @else
                        <span class="kh-no-vid"><i class="bi bi-camera-video-off" style="font-size:12px;"></i>Video Tidak Tersedia</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="kh-empty">
                <div class="kh-empty-icon"><i class="bi bi-camera-video"></i></div>
                <h4>Belum Ada Khotbah</h4>
                <p>Khotbah akan segera ditampilkan di sini. Tetap semangat!</p>
            </div>
            @endforelse
        </div>

        @if(method_exists($khotbah,'links') && $khotbah->hasPages())
        <div class="d-flex justify-content-center mt-5">{{ $khotbah->links() }}</div>
        @endif
    </div>
</section>

<script>
const si = document.getElementById('searchKhotbah');
si.addEventListener('input', function(){
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('.kh-card').forEach(c=>{
        c.style.display = (!q || c.dataset.title.includes(q)) ? '' : 'none';
    });
});
</script>
@endsection