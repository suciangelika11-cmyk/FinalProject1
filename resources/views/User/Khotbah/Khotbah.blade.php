@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
:root{
    --b950:#020810;
    --b900:#050f1f;
    --b800:#071830;
    --b700:#0d2448;
    --b600:#163562;
    --b500:#1e4a8e;
    --b400:#2d65bf;
    --b300:#5592e0;
    --b200:#93bef5;
    --white:#fff;
    --r-pill:999px;
    --r-card:22px;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:var(--b900);
    color:var(--white);
    font-family:'DM Sans',sans-serif;
}

/* HERO */
.kh-hero{
    position:relative;
    padding:120px 0 130px;
    overflow:hidden;
    text-align:center;
    background:
        radial-gradient(circle at top, rgba(45,101,191,.18), transparent 40%),
        linear-gradient(180deg,var(--b950),var(--b900));
}

.kh-ring{
    position:absolute;
    border-radius:50%;
    border:1px solid rgba(85,146,224,.08);
    left:50%;
    transform:translateX(-50%);
}

.kh-ring.one{
    width:650px;
    height:650px;
    top:-260px;
}

.kh-ring.two{
    width:430px;
    height:430px;
    top:-150px;
}

.kh-wrap{
    position:relative;
    z-index:2;
}

.kh-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:8px 18px;
    border-radius:999px;
    border:1px solid rgba(85,146,224,.2);
    background:rgba(45,101,191,.08);
    color:var(--b200);
    font-size:11px;
    font-weight:600;
    letter-spacing:.18em;
    text-transform:uppercase;
    margin-bottom:28px;
}

.kh-dot{
    width:5px;
    height:5px;
    border-radius:50%;
    background:var(--b300);
}

.kh-hero h1{
    font-family:'Playfair Display',serif;
    font-size:clamp(38px,6vw,66px);
    line-height:1.1;
    margin-bottom:18px;
    font-weight:700;
}

.kh-hero h1 em{
    font-style:italic;
    color:var(--b200);
}

.kh-hero p{
    max-width:520px;
    margin:auto;
    font-size:15px;
    line-height:1.8;
    color:rgba(255,255,255,.72);
}

/* WAVE */
.kh-wave{
    line-height:0;
    display:block;
}

.kh-wave svg{
    width:100%;
    height:70px;
    display:block;
}

/* SECTION */
.kh-section{
    background:var(--b800);
    padding:20px 0 100px;
}

.kh-container{
    max-width:1180px;
    margin:auto;
    padding:0 24px;
}

.kh-head{
    text-align:center;
    margin-bottom:50px;
}

.kh-label{
    display:block;
    color:var(--b300);
    font-size:11px;
    font-weight:700;
    letter-spacing:.25em;
    text-transform:uppercase;
    margin-bottom:14px;
}

.kh-title{
    font-family:'Playfair Display',serif;
    font-size:clamp(28px,4vw,42px);
    margin-bottom:18px;
}

.kh-line{
    width:55px;
    height:3px;
    border-radius:999px;
    margin:auto;
    background:linear-gradient(90deg,var(--b500),var(--b300));
}

/* SEARCH */
.kh-search-wrap{
    max-width:500px;
    margin:0 auto 55px;
    position:relative;
}

.kh-search-icon{
    position:absolute;
    left:18px;
    top:50%;
    transform:translateY(-50%);
    color:rgba(147,190,245,.6);
}

.kh-search{
    width:100%;
    padding:15px 20px 15px 48px;
    border-radius:999px;
    border:1px solid rgba(85,146,224,.15);
    background:rgba(255,255,255,.04);
    color:#fff;
    outline:none;
    transition:.3s;
}

.kh-search:focus{
    border-color:var(--b300);
    background:rgba(255,255,255,.06);
}

.kh-search::placeholder{
    color:rgba(255,255,255,.3);
}

/* GRID */
.kh-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(290px,1fr));
    gap:26px;
}

/* CARD */
.kh-card{
    background:rgba(13,36,72,.6);
    border:1px solid rgba(85,146,224,.12);
    border-radius:var(--r-card);
    overflow:hidden;
    transition:.35s ease;
    display:flex;
    flex-direction:column;
    backdrop-filter:blur(6px);
    position:relative;
}

.kh-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:2px;
    background:linear-gradient(90deg,var(--b500),var(--b300));
    opacity:0;
    transition:.3s;
}

.kh-card:hover{
    transform:translateY(-8px);
    border-color:rgba(85,146,224,.28);
    box-shadow:0 25px 55px rgba(0,0,0,.35);
}

.kh-card:hover::before{
    opacity:1;
}

/* THUMB */
.kh-thumb{
    position:relative;
    height:210px;
    overflow:hidden;
    background:#000;
}

.kh-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .5s ease;
}

.kh-card:hover .kh-thumb img{
    transform:scale(1.06);
}

.kh-placeholder{
    width:100%;
    height:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:14px;
    background:var(--b900);
}

.kh-placeholder-icon{
    width:65px;
    height:65px;
    border-radius:50%;
    border:1px solid rgba(85,146,224,.2);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
    color:rgba(147,190,245,.5);
}

.kh-placeholder-text{
    color:rgba(147,190,245,.35);
    font-size:11px;
    letter-spacing:.18em;
    text-transform:uppercase;
}

.kh-video{
    position:absolute;
    top:14px;
    right:14px;
    background:rgba(2,8,16,.8);
    border:1px solid rgba(85,146,224,.2);
    padding:5px 12px;
    border-radius:999px;
    color:var(--b200);
    font-size:10px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:6px;
}

.kh-video-dot{
    width:5px;
    height:5px;
    border-radius:50%;
    background:var(--b300);
    animation:pulse 1.5s infinite;
}

@keyframes pulse{
    0%,100%{opacity:1;}
    50%{opacity:.3;}
}

/* BODY */
.kh-body{
    padding:24px 22px 20px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.kh-date{
    color:var(--b300);
    font-size:11px;
    letter-spacing:.12em;
    text-transform:uppercase;
    font-weight:700;
    margin-bottom:12px;
}

.kh-card-title{
    font-family:'Playfair Display',serif;
    font-size:18px;
    line-height:1.45;
    margin-bottom:12px;
    color:#fff;
}

.kh-desc{
    font-size:14px;
    line-height:1.8;
    color:rgba(255,255,255,.68);
    margin-bottom:22px;
    flex:1;
}

/* FOOTER */
.kh-foot{
    border-top:1px solid rgba(85,146,224,.1);
    padding-top:16px;
}

.kh-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:10px 18px;
    border-radius:999px;
    background:rgba(45,101,191,.12);
    border:1px solid rgba(85,146,224,.25);
    color:var(--b200);
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    transition:.3s;
}

.kh-btn:hover{
    background:rgba(45,101,191,.22);
    border-color:rgba(85,146,224,.45);
    color:#fff;
}

.kh-play{
    width:22px;
    height:22px;
    border-radius:50%;
    background:var(--b400);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:9px;
}

.kh-novid{
    color:rgba(255,255,255,.3);
    font-size:13px;
    display:inline-flex;
    align-items:center;
    gap:8px;
}

/* EMPTY */
.kh-empty{
    grid-column:1/-1;
    text-align:center;
    padding:80px 20px;
}

.kh-empty-icon{
    width:80px;
    height:80px;
    border-radius:50%;
    border:1px solid rgba(85,146,224,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto auto 24px;
    font-size:30px;
    color:rgba(147,190,245,.5);
}

.kh-empty h4{
    font-family:'Playfair Display',serif;
    font-size:24px;
    margin-bottom:10px;
}

.kh-empty p{
    color:rgba(255,255,255,.45);
}

/* PAGINATION */
.pagination .page-link{
    background:transparent;
    border:1px solid rgba(85,146,224,.18)!important;
    color:rgba(255,255,255,.65);
    margin:0 4px;
    border-radius:999px!important;
}

.pagination .page-item.active .page-link{
    background:rgba(45,101,191,.22)!important;
    color:#fff;
    border-color:rgba(85,146,224,.4)!important;
}

.pagination .page-link:hover{
    background:rgba(45,101,191,.15)!important;
    color:#fff;
}

/* RESPONSIVE */
@media(max-width:768px){

    .kh-hero{
        padding:100px 0 110px;
    }

    .kh-grid{
        grid-template-columns:1fr;
    }

    .kh-hero h1{
        font-size:44px;
    }
}
</style>

<!-- HERO -->
<section class="kh-hero">

    <div class="kh-ring one"></div>
    <div class="kh-ring two"></div>

    <div class="kh-wrap kh-container">

        <div class="kh-badge">
            <span class="kh-dot"></span>
            Firman Tuhan
            <span class="kh-dot"></span>
        </div>

        <h1>
            Khotbah &
            <br>
            <em>Pengajaran</em>
        </h1>

        <p>
            Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna,
            penuh kasih, dan bertumbuh dalam iman setiap hari.
        </p>

    </div>
</section>

<!-- WAVE -->
<div class="kh-wave">
    <svg viewBox="0 0 1200 70" preserveAspectRatio="none">
        <path d="M0,0 C300,70 900,70 1200,0 L1200,70 L0,70 Z" fill="#071830"></path>
    </svg>
</div>

<!-- CONTENT -->
<section class="kh-section">

    <div class="kh-container">

        <div class="kh-head">
            <span class="kh-label">Arsip Khotbah</span>
            <h2 class="kh-title">Firman Tuhan</h2>
            <div class="kh-line"></div>
        </div>

        <!-- SEARCH -->
        <div class="kh-search-wrap">
            <span class="kh-search-icon">
                <i class="bi bi-search"></i>
            </span>

            <input
                type="text"
                id="searchKhotbah"
                class="kh-search"
                placeholder="Cari judul khotbah..."
            >
        </div>

        <!-- GRID -->
        <div class="kh-grid" id="khotbahGrid">

            @forelse($khotbah as $item)

            <div class="kh-card" data-title="{{ strtolower($item->title) }}">

                <!-- THUMB -->
                <div class="kh-thumb">

                    @if($item->thumbnail)

                        <img
                            src="{{ asset('storage/'.$item->thumbnail) }}"
                            alt="{{ $item->title }}"
                            loading="lazy"
                        >

                    @else

                        <div class="kh-placeholder">

                            <div class="kh-placeholder-icon">
                                <i class="bi bi-play-circle"></i>
                            </div>

                            <div class="kh-placeholder-text">
                                Video Khotbah
                            </div>

                        </div>

                    @endif

                    @if($item->video)

                    <div class="kh-video">
                        <span class="kh-video-dot"></span>
                        Video
                    </div>

                    @endif

                </div>

                <!-- BODY -->
                <div class="kh-body">

                    <div class="kh-date">
                        <i class="bi bi-calendar3"></i>

                        {{ $item->sermon_date
                            ? \Carbon\Carbon::parse($item->sermon_date)->translatedFormat('d F Y')
                            : '-' }}
                    </div>

                    <div class="kh-card-title">
                        {{ $item->title }}
                    </div>

                    @if($item->description)

                    <div class="kh-desc">
                        {{ $item->description }}
                    </div>

                    @endif

                    <!-- FOOT -->
                    <div class="kh-foot">

                        @if($item->video)

                        <a
                            href="{{ $item->video }}"
                            target="_blank"
                            class="kh-btn"
                        >

                            <span class="kh-play">
                                <i class="bi bi-play-fill"></i>
                            </span>

                            Tonton Khotbah

                        </a>

                        @else

                        <div class="kh-novid">
                            <i class="bi bi-camera-video-off"></i>
                            Video Tidak Tersedia
                        </div>

                        @endif

                    </div>

                </div>

            </div>

            @empty

            <div class="kh-empty">

                <div class="kh-empty-icon">
                    <i class="bi bi-camera-video"></i>
                </div>

                <h4>Belum Ada Khotbah</h4>

                <p>
                    Khotbah akan segera ditampilkan di sini.
                </p>

            </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if(method_exists($khotbah,'links') && $khotbah->hasPages())

        <div class="d-flex justify-content-center mt-5">
            {{ $khotbah->links() }}
        </div>

        @endif

    </div>

</section>

<script>
const searchInput = document.getElementById('searchKhotbah');

searchInput.addEventListener('input', function(){

    const keyword = this.value.toLowerCase().trim();

    document.querySelectorAll('.kh-card').forEach(card => {

        const title = card.dataset.title;

        if(title.includes(keyword) || keyword === ''){
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }

    });

});
</script>

@endsection