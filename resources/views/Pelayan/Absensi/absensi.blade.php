@extends('Pelayan.layouts.pelayan')

@section('page_title', 'Absensi Ibadah')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
:root{
    --gold:#d4a844;
    --gold-light:#f0d070;

    --navy:#0a1628;
    --navy2:#102040;
    --blue:#1a4a9e;
    --blue-light:#5592e8;

    --white:#ffffff;
    --text-soft:rgba(255,255,255,.72);

    --card:rgba(255,255,255,.06);
    --card-hover:rgba(255,255,255,.1);

    --border:rgba(93,146,232,.18);
    --border-hover:rgba(93,146,232,.38);

    --radius:28px;

    --font-title:'Libre Baskerville', serif;
    --font-body:'Outfit', sans-serif;
}

/* =====================================
BASE
===================================== */

body{
    background:
        radial-gradient(circle at top,
        rgba(85,146,232,.08),
        transparent 40%),
        linear-gradient(180deg,#081120 0%,#09182f 100%);

    color:var(--white);

    font-family:var(--font-body);

    overflow-x:hidden;
}

/* =====================================
HERO
===================================== */

.hero{
    position:relative;
    overflow:hidden;

    padding:150px 20px 130px;

    text-align:center;
}

.hero::before{
    content:'';

    position:absolute;
    inset:0;

    background:
        radial-gradient(circle at top right,
        rgba(85,146,232,.15),
        transparent 35%);
}

.hero::after{
    content:'';

    position:absolute;

    left:0;
    right:0;
    bottom:-1px;

    height:120px;

    background:#0c1c35;

    border-radius:100% 100% 0 0;
}

.hero-content{
    position:relative;
    z-index:2;

    max-width:760px;
    margin:auto;
}

.hero-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:9px 18px;

    border-radius:999px;

    background:rgba(85,146,232,.12);

    border:1px solid rgba(85,146,232,.22);

    color:#c8e0fd;

    font-size:11px;
    letter-spacing:.18em;
    text-transform:uppercase;

    margin-bottom:28px;
}

.hero h1{
    font-family:var(--font-title);

    font-size:clamp(42px,7vw,74px);

    line-height:1.15;

    margin-bottom:22px;
}

.hero h1 em{
    color:var(--gold);
    font-style:italic;
}

.hero-desc{
    max-width:650px;
    margin:auto;

    color:var(--text-soft);

    font-size:15px;
    line-height:1.9;
}

/* =====================================
CONTENT
===================================== */

.page-wrap{
    width:min(92%,1180px);

    margin:auto;

    padding:80px 0 100px;

    position:relative;
    z-index:10;
}

.section-eyebrow{
    display:flex;
    align-items:center;
    gap:18px;

    margin-bottom:48px;
}

.section-eyebrow::before,
.section-eyebrow::after{
    content:'';
    flex:1;
    height:1px;

    background:var(--border);
}

.section-eyebrow span{
    color:#c8e0fd;

    font-size:10px;
    letter-spacing:.22em;
    text-transform:uppercase;
}

/* =====================================
CARD
===================================== */

.absensi-card{
    display:grid;

    grid-template-columns:190px 1fr 260px;

    background:var(--card);

    border:1px solid var(--border);

    border-radius:30px;

    overflow:hidden;

    backdrop-filter:blur(16px);

    margin-bottom:28px;

    transition:.35s ease;
}

.absensi-card:hover{
    transform:translateY(-8px);

    border-color:var(--border-hover);

    background:var(--card-hover);

    box-shadow:
        0 28px 60px rgba(0,0,0,.38);
}

/* =====================================
DATE
===================================== */

.card-date{
    background:rgba(85,146,232,.05);

    border-right:1px solid var(--border);

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    text-align:center;

    padding:40px 20px;
}

.date-weekday{
    color:#c8e0fd;

    font-size:10px;
    letter-spacing:.18em;
    text-transform:uppercase;

    margin-bottom:12px;
}

.date-num{
    font-family:var(--font-title);

    font-size:64px;

    line-height:1;

    margin-bottom:10px;
}

.date-month{
    color:var(--text-soft);

    font-size:11px;
    letter-spacing:.14em;
    text-transform:uppercase;
}

/* =====================================
INFO
===================================== */

.card-info{
    padding:42px;

    display:flex;
    flex-direction:column;
    justify-content:center;
}

.card-tag{
    color:#c8e0fd;

    font-size:10px;
    letter-spacing:.24em;
    text-transform:uppercase;

    margin-bottom:16px;
}

.card-preacher{
    font-family:var(--font-title);

    font-size:34px;

    line-height:1.35;

    margin-bottom:18px;
}

.card-divider{
    width:54px;
    height:2px;

    background:linear-gradient(
        90deg,
        var(--gold),
        transparent
    );

    margin-bottom:22px;
}

.card-session{
    display:inline-flex;
    align-items:center;
    gap:10px;

    width:fit-content;

    padding:11px 18px;

    border-radius:999px;

    background:rgba(85,146,232,.08);

    border:1px solid rgba(85,146,232,.2);

    color:#dbeafe;

    font-size:13px;
}

/* =====================================
STATS
===================================== */

.card-stats{
    border-left:1px solid var(--border);

    padding:28px;

    display:flex;
    align-items:center;
    justify-content:center;
}

.stats-box{
    width:100%;

    background:rgba(255,255,255,.04);

    border:1px solid rgba(255,255,255,.05);

    border-radius:24px;

    padding:28px 20px;

    text-align:center;
}

.stats-icon{
    width:58px;
    height:58px;

    margin:auto auto 18px;

    border-radius:18px;

    background:rgba(85,146,232,.12);

    color:#93bef8;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;
}

.stats-value{
    font-family:var(--font-title);

    font-size:40px;

    margin-bottom:10px;
}

.stats-label{
    color:var(--text-soft);

    font-size:13px;
}

/* =====================================
EMPTY
===================================== */

.empty-state{
    text-align:center;

    padding:100px 20px;
}

.empty-icon{
    width:82px;
    height:82px;

    margin:auto auto 24px;

    border-radius:50%;

    background:rgba(85,146,232,.08);

    border:1px solid var(--border);

    display:flex;
    align-items:center;
    justify-content:center;

    color:#93bef8;

    font-size:30px;
}

.empty-title{
    font-family:var(--font-title);

    font-size:28px;

    margin-bottom:12px;
}

.empty-text{
    color:var(--text-soft);

    font-size:14px;
    line-height:1.9;
}

/* =====================================
FOOTER
===================================== */

.page-footer{
    margin-top:90px;

    padding-top:45px;

    border-top:1px solid var(--border);

    text-align:center;
}

.footer-icon{
    width:60px;
    height:60px;

    margin:0 auto 18px;

    border-radius:50%;

    background:rgba(85,146,232,.08);

    border:1px solid var(--border);

    display:flex;
    align-items:center;
    justify-content:center;

    color:#93bef8;

    font-size:22px;
}

.footer-quote{
    font-family:var(--font-title);

    font-size:17px;

    color:var(--text-soft);

    font-style:italic;
}

/* =====================================
TABLET
===================================== */

@media(max-width:1100px){

    .absensi-card{
        grid-template-columns:1fr;
    }

    .card-date{
        border-right:none;
        border-bottom:1px solid var(--border);

        flex-direction:row;

        gap:20px;
    }

    .date-num{
        margin-bottom:0;
    }

    .card-stats{
        border-left:none;
        border-top:1px solid var(--border);
    }
}

/* =====================================
MOBILE
===================================== */

@media(max-width:768px){

    .hero{
        padding:120px 18px 105px;
    }

    .hero::after{
        height:85px;
    }

    .hero h1{
        font-size:46px;
    }

    .hero-desc{
        font-size:14px;
    }

    .page-wrap{
        width:100%;

        padding:50px 16px 70px;
    }

    .section-eyebrow{
        margin-bottom:36px;
    }

    .absensi-card{
        border-radius:24px;
    }

    .card-date{
        flex-direction:column;

        gap:5px;

        padding:24px 18px;
    }

    .date-num{
        font-size:48px;
    }

    .card-info{
        padding:26px 20px;
    }

    .card-preacher{
        font-size:26px;
    }

    .card-session{
        width:100%;
        justify-content:center;
    }

    .card-stats{
        padding:18px;
    }

    .stats-value{
        font-size:34px;
    }

    .empty-state{
        padding:70px 20px;
    }
}

/* =====================================
SMALL MOBILE
===================================== */

@media(max-width:480px){

    .hero{
        padding:100px 16px 90px;
    }

    .hero h1{
        font-size:38px;
    }

    .hero-eyebrow{
        font-size:9px;

        padding:7px 14px;
    }

    .hero-desc{
        font-size:13px;
    }

    .page-wrap{
        padding:45px 14px 60px;
    }

    .card-info{
        padding:22px 16px;
    }

    .card-preacher{
        font-size:22px;
    }

    .stats-box{
        padding:24px 18px;
    }

    .stats-value{
        font-size:28px;
    }

    .footer-quote{
        font-size:14px;
        line-height:1.8;
    }
}
</style>

<!-- HERO -->
<section class="hero">

    <div class="hero-content">

        <div class="hero-eyebrow">
            <i class="fa-solid fa-circle-dot" style="font-size:7px;"></i>
            Gereja Bethel Indonesia
        </div>

        <h1>
            Data <em>Absensi</em>
        </h1>

        <p class="hero-desc">
            Rekap kehadiran jemaat dan pelayan dalam setiap ibadah gereja dengan tampilan modern, elegan, dan responsif.
        </p>

    </div>

</section>

<!-- CONTENT -->
<div class="page-wrap">

    <div class="section-eyebrow">
        <span>Rekap Kehadiran Ibadah</span>
    </div>

    @if($absensi && $absensi->count() > 0)

        @foreach($absensi as $item)

        <article class="absensi-card">

            <!-- DATE -->
            <div class="card-date">

                <div class="date-weekday">
                    {{ \Carbon\Carbon::parse($item->date)->translatedFormat('l') }}
                </div>

                <div class="date-num">
                    {{ \Carbon\Carbon::parse($item->date)->format('d') }}
                </div>

                <div class="date-month">
                    {{ \Carbon\Carbon::parse($item->date)->translatedFormat('F Y') }}
                </div>

            </div>

            <!-- INFO -->
            <div class="card-info">

                <div class="card-tag">
                    Pengkhotbah
                </div>

                <h2 class="card-preacher">
                    {{ $item->pengkhotbah }}
                </h2>

                <div class="card-divider"></div>

                <div class="card-session">
                    <i class="fa-regular fa-clock"></i>
                    {{ $item->session }}
                </div>

            </div>

            <!-- STATS -->
            <div class="card-stats">

                <div class="stats-box">

                    <div class="stats-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div class="stats-value">
                        {{ number_format($item->jumlah) }}
                    </div>

                    <div class="stats-label">
                        Jemaat Hadir
                    </div>

                </div>

            </div>

        </article>

        @endforeach

    @else

    <div class="empty-state">

        <div class="empty-icon">
            <i class="fa-solid fa-folder-open"></i>
        </div>

        <h3 class="empty-title">
            Belum Ada Data
        </h3>

        <p class="empty-text">
            Data absensi ibadah belum tersedia saat ini.
        </p>

    </div>

    @endif

    <!-- FOOTER -->
    <div class="page-footer">

        <div class="footer-icon">
            <i class="fa-solid fa-church"></i>
        </div>

        <p class="footer-quote">
            “Kesetiaan dalam pelayanan dimulai dari kehadiran.”
        </p>

    </div>

</div>

@endsection