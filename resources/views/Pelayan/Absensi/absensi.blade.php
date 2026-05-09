@extends('Pelayan.layouts.pelayan')

@section('page_title', 'Absensi Ibadah')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
:root{
    --gold:#C9A84C;
    --gold-light:#E8C97A;
    --navy:#05101F;
    --navy-card:rgba(11,31,56,.88);
    --white:#F0EDE6;
    --white-dim:rgba(240,237,230,.65);
    --line:rgba(201,168,76,.18);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:var(--navy);
    color:var(--white);
    font-family:'DM Sans',sans-serif;
}

/* HERO */
.hero{
    position:relative;
    min-height:460px;
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
    max-width:780px;
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
    font-size:clamp(58px,7vw,100px);
    line-height:1;
    margin-bottom:18px;
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
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(36px,5vw,56px);
    margin:40px 0 30px;
    color:var(--white);
}

.section-desc{
    color:var(--white-dim);
    margin-bottom:40px;
    line-height:1.6;
    font-size:15px;
}

/* TABLE */
.table-wrap{
    overflow-x:auto;
    background:var(--navy-card);
    border:1px solid var(--line);
    border-radius:20px;
    backdrop-filter:blur(10px);
}

.table-wrap table{
    width:100%;
    color:var(--white);
    text-align:left;
}

.table-wrap th{
    padding:18px 24px;
    color:var(--gold);
    font-weight:600;
    border-bottom:1px solid var(--line);
    font-size:13px;
    letter-spacing:2px;
    text-transform:uppercase;
}

.table-wrap td{
    padding:16px 24px;
    border-bottom:1px solid rgba(255,255,255,.05);
    font-size:14px;
}

.table-wrap tr:hover{
    background:rgba(255,255,255,.02);
}

.table-wrap tr:last-child td{
    border-bottom:none;
}

@media(max-width:768px){
    .page-wrap{
        padding:40px 0 60px;
    }

    .section-title{
        font-size:28px;
    }

    .table-wrap th,
    .table-wrap td{
        padding:12px 14px;
        font-size:12px;
    }
}
</style>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-small">Gereja Beriman</div>
        <h1>Data <span>Absensi</span></h1>
        <p>Rekam kehadiran pelayan dalam setiap pelayanan ibadah gereja.</p>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="page-wrap">
    <h2 class="section-title">Absensi Ibadah</h2>
    <p class="section-desc">Halaman ini menampilkan data absensi pelayan dari berbagai ibadah yang telah dilaksanakan.</p>

    @if($absensi && $absensi->count() > 0)
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Sesi</th>
                        <th>Pengkhotbah</th>
                        <th>Jumlah Jemaat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensi as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                            <td>{{ $item->session }}</td>
                            <td>{{ $item->pengkhotbah }}</td>
                            <td style="color:var(--gold);font-weight:600;">{{ $item->jumlah }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;padding:40px!important;color:var(--white-dim);">Belum ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <div style="background:var(--navy-card);border:1px solid var(--line);border-radius:20px;padding:40px;text-align:center;color:var(--white-dim);">
            <p>Belum ada data absensi.</p>
        </div>
    @endif
</div>

@endsection