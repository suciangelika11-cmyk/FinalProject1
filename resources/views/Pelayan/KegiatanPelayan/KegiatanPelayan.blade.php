{{-- resources/views/kegiatan-pelayanan.blade.php --}}

@extends('Pelayan.layouts.pelayan')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --gold:#FFD36D;
    --gold-light:#FFE8A5;
    --navy:#030A15;
    --navy-card:rgba(12,24,44,.94);
    --white:#F8F8F8;
    --white-dim:rgba(248,248,248,.82);
    --line:rgba(255,211,109,.24);
}

body{
    background:var(--navy);
    color:var(--white);
    font-family:'DM Sans',sans-serif;
}

/* HERO */

.hero{
    position:relative;
    min-height:450px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    overflow:hidden;
    padding:40px 20px;
    background:
        radial-gradient(circle at top, rgba(201,168,76,.13), transparent 40%),
        linear-gradient(180deg,#081526 0%, #05101F 100%);
}

.hero::before{
    content:'';
    position:absolute;
    width:450px;
    height:450px;
    border-radius:50%;
    background:rgba(201,168,76,.05);
    filter:blur(50px);
}

.hero-content{
    position:relative;
    z-index:2;
    max-width:760px;
}

.hero-small{
    color:var(--gold);
    letter-spacing:4px;
    text-transform:uppercase;
    font-size:11px;
    margin-bottom:20px;
}

.hero h1{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(55px,7vw,95px);
    line-height:1;
    margin-bottom:20px;
}

.hero h1 span{
    color:var(--gold);
    font-style:italic;
}

.hero p{
    color:var(--white-dim);
    line-height:1.8;
    font-size:15px;
}

/* PAGE */

.page-wrap{
    width:90%;
    max-width:1180px;
    margin:auto;
    padding:70px 0 100px;
}

.section-title{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:40px;
}

.section-title span{
    color:var(--gold);
    text-transform:uppercase;
    letter-spacing:3px;
    font-size:11px;
    white-space:nowrap;
}

.section-line{
    flex:1;
    height:1px;
    background:var(--line);
}

/* CARD */

.card{
    display:grid;
    grid-template-columns:180px 1fr 340px;
    background:var(--navy-card);
    border:1px solid var(--line);
    border-radius:24px;
    overflow:hidden;
    margin-bottom:28px;
    transition:.3s;
    backdrop-filter:blur(10px);
}

.card:hover{
    transform:translateY(-4px);
    border-color:rgba(201,168,76,.4);
}

.card-date{
    background:rgba(255,255,255,.12);
    border-right:1px solid rgba(255,255,255,.18);
    padding:40px 25px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
}

.card-date-day{
    color:var(--gold);
    letter-spacing:3px;
    text-transform:uppercase;
    font-size:11px;
    margin-bottom:8px;
}

.card-date-num{
    font-family:'Cormorant Garamond',serif;
    font-size:72px;
    line-height:1;
    color:var(--white);
}

.card-date-month{
    color:rgba(248,248,248,.85);
    margin-top:10px;
    letter-spacing:2px;
    text-transform:uppercase;
    font-size:11px;
}

.card-info{
    padding:45px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.card-label{
    color:var(--gold);
    letter-spacing:3px;
    text-transform:uppercase;
    font-size:11px;
    margin-bottom:14px;
}

.card-preacher{
    font-family:'Cormorant Garamond',serif;
    font-size:40px;
    margin-bottom:18px;
    color:var(--white);
}

.card-divider{
    width:60px;
    height:2px;
    background:var(--gold);
    margin-bottom:18px;
}

.card-tema{
    color:var(--white-dim);
    font-style:italic;
    line-height:1.8;
    margin-bottom:20px;
    font-size:17px;
}

.card-verse{
    display:inline-flex;
    align-items:center;
    gap:10px;
    width:fit-content;
    padding:10px 18px;
    border-radius:999px;
    border:1px solid rgba(255,211,109,.35);
    color:var(--gold-light);
    font-size:12px;
    letter-spacing:1px;
    background:rgba(255,255,255,.04);
}

/* TEAM */

.card-team{
    border-left:1px solid rgba(255,255,255,.18);
    padding:30px;
    background:rgba(255,255,255,.08);
}

.card-team-title{
    color:var(--gold);
    letter-spacing:3px;
    text-transform:uppercase;
    font-size:12px;
    margin-bottom:20px;
}

.sub-team{
    border:1px solid rgba(255,255,255,.10);
    border-radius:18px;
    padding:18px;
    margin-bottom:18px;
    background:rgba(255,255,255,.06);
}

.sub-team:last-child{
    margin-bottom:0;
}

.sub-team-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:16px;
}

.sub-team-icon{
    width:38px;
    height:38px;
    border-radius:10px;
    background:rgba(201,168,76,.12);
    display:flex;
    align-items:center;
    justify-content:center;
}

.sub-team-icon i{
    color:var(--gold);
}

.sub-team-name{
    font-size:14px;
    font-weight:500;
}

.sub-team-desc{
    font-size:11px;
    color:rgba(248,248,248,.85);
    margin-top:3px;
}

.member-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:12px 0;
    border-top:1px solid rgba(255,255,255,.12);
}

.member-name{
    font-size:13px;
    color:var(--white);
}

.member-badge{
    padding:6px 14px;
    border-radius:999px;
    background:rgba(255,211,109,.24);
    color:var(--gold);
    font-size:11px;
    font-weight:600;
}

.member-badge.purple{
    background:rgba(168,85,247,.12);
    color:#c084fc;
}

.member-badge.green{
    background:rgba(34,197,94,.12);
    color:#4ade80;
}

/* FOOTER */

.page-footer{
    margin-top:70px;
    text-align:center;
    border-top:1px solid var(--line);
    padding-top:40px;
}

.page-footer-icon{
    width:50px;
    height:50px;
    margin:auto;
    border-radius:50%;
    border:1px solid var(--line);
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:20px;
}

.page-footer-icon i{
    color:var(--gold);
}

.page-footer p{
    font-family:'Cormorant Garamond',serif;
    font-size:22px;
    color:var(--white-dim);
    font-style:italic;
}

/* RESPONSIVE */

@media(max-width:1000px){

    .card{
        grid-template-columns:1fr;
    }

    .card-date{
        border-right:none;
        border-bottom:1px solid var(--line);
    }

    .card-team{
        border-left:none;
        border-top:1px solid var(--line);
    }
}

@media(max-width:700px){

    .card-info{
        padding:30px 24px;
    }

    .card-preacher{
        font-size:32px;
    }

    .card-date-num{
        font-size:55px;
    }

    .card-team{
        padding:24px;
    }
}

</style>

{{-- HERO --}}
<section class="hero">

    <div class="hero-content">

        <div class="hero-small">
            Gereja Beriman
        </div>

        <h1>
            Kegiatan <span>Pelayanan</span>
        </h1>

        <p>
            Daftar kegiatan pelayanan gereja yang telah dijadwalkan
            bersama seluruh tim pelayanan dan jemaat.
        </p>

    </div>

</section>

{{-- CONTENT --}}
<div class="page-wrap">

    <div class="section-title">
        <span>Kegiatan Mendatang</span>
        <div class="section-line"></div>
    </div>

    {{-- LOOP DATA --}}
    @foreach($kegiatans as $item)

    <article class="card">

        {{-- DATE --}}
        <div class="card-date">

            <div>

                <div class="card-date-day">
                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l') }}
                </div>

                <div class="card-date-num">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                </div>

                <div class="card-date-month">
                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y') }}
                </div>

            </div>

        </div>

        {{-- INFO --}}
        <div class="card-info">

            <div class="card-label">
                Pengkhotbah
            </div>

            <h2 class="card-preacher">
                {{ $item->pengkhotbah }}
            </h2>

            <div class="card-divider"></div>

            <div class="card-tema">
                "{{ $item->tema }}"
            </div>

            <div class="card-verse">
                <i class="fa-solid fa-book-open"></i>
                {{ $item->ayat }}
            </div>

        </div>

        {{-- TEAM --}}
        <div class="card-team">

            <div class="card-team-title">
                Tim yang Melayani
            </div>

            {{-- WORSHIP --}}
            <div class="sub-team">

                <div class="sub-team-header">

                    <div class="sub-team-icon">
                        <i class="fa-solid fa-microphone-lines"></i>
                    </div>

                    <div>
                        <div class="sub-team-name">
                            Worship Team
                        </div>

                        <div class="sub-team-desc">
                            Tim Pujian & Penyembahan
                        </div>
                    </div>

                </div>

                @foreach(explode(',', $item->worship_team) as $team)

                <div class="member-row">

                    <span class="member-name">
                        {{ trim($team) }}
                    </span>

                    <span class="member-badge">
                        Worship
                    </span>

                </div>

                @endforeach

            </div>

            {{-- MULTIMEDIA --}}
            <div class="sub-team">

                <div class="sub-team-header">

                    <div class="sub-team-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>

                    <div>
                        <div class="sub-team-name">
                            Multimedia
                        </div>

                        <div class="sub-team-desc">
                            Media & Operator
                        </div>
                    </div>

                </div>

                @foreach(explode(',', $item->multimedia_team) as $team)

                <div class="member-row">

                    <span class="member-name">
                        {{ trim($team) }}
                    </span>

                    <span class="member-badge purple">
                        Multimedia
                    </span>

                </div>

                @endforeach

            </div>

            {{-- LITURGI --}}
            <div class="sub-team">

                <div class="sub-team-header">

                    <div class="sub-team-icon">
                        <i class="fa-solid fa-scroll"></i>
                    </div>

                    <div>
                        <div class="sub-team-name">
                            Liturgi
                        </div>

                        <div class="sub-team-desc">
                            Penyambutan & Liturgi
                        </div>
                    </div>

                </div>

                @foreach(explode(',', $item->liturgi_team) as $team)

                <div class="member-row">

                    <span class="member-name">
                        {{ trim($team) }}
                    </span>

                    <span class="member-badge green">
                        Liturgi
                    </span>

                </div>

                @endforeach

            </div>

        </div>

    </article>

    @endforeach

    {{-- FOOTER --}}
    <div class="page-footer">

        <div class="page-footer-icon">
            <i class="fa-solid fa-cross"></i>
        </div>

        <p>
            Mari melayani Tuhan dengan setia dan penuh sukacita.
        </p>

    </div>

</div>

@endsection