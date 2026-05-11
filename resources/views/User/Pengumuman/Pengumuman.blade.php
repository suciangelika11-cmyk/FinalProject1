@extends('layouts.app')

@section('content')
<style>
/* HERO */
.pg-hero {
    position: relative;
    padding: 110px 0 90px;
    text-align: center;
    overflow: hidden;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 50%, #0d1e3a 100%);
    border-bottom: 1px solid rgba(93,146,232,0.1);
}

.pg-hero::before {
    content: '';
    position: absolute; top: -100px; left: 50%; transform: translateX(-50%);
    width: 600px; height: 600px; border-radius: 50%;
    background: radial-gradient(circle, rgba(45,101,200,0.14) 0%, transparent 70%);
    pointer-events: none;
}

.pg-hero .wrap { position: relative; z-index: 1; }

.pg-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 5.5vw, 52px); font-weight: 700;
    color: #fff; margin-bottom: 14px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.pg-hero p {
    font-size: 16px; font-weight: 300;
    color: rgba(255,255,255,0.68);
    max-width: 440px; margin: 0 auto; line-height: 1.75;
    animation: fadeUp 0.8s ease 0.4s both;
}

/* COUNT BADGE */
.pg-count {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.13);
    border-radius: 999px; padding: 7px 20px;
    font-size: 13.5px; color: rgba(255,255,255,0.75); font-weight: 500;
    margin-top: 24px;
    animation: fadeUp 0.8s ease 0.52s both;
}

.pg-count span { color: #93bef8; font-weight: 700; }

/* SECTION */
.pg-section { background: #0f2040; padding: 72px 0 96px; }

/* GRID */
.pg-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(310px, 1fr)); gap: 22px; }

/* CARD */
.pg-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.13);
    border-radius: 18px; overflow: hidden;
    display: flex; flex-direction: column;
    transition: transform 0.35s cubic-bezier(.34,1.56,.64,1), border-color 0.3s, box-shadow 0.35s;
    backdrop-filter: blur(8px);
    animation: cardIn 0.6s ease both;
}

.pg-card:nth-child(1){animation-delay:.05s}
.pg-card:nth-child(2){animation-delay:.12s}
.pg-card:nth-child(3){animation-delay:.19s}
.pg-card:nth-child(4){animation-delay:.26s}
.pg-card:nth-child(5){animation-delay:.33s}
.pg-card:nth-child(6){animation-delay:.40s}

.pg-card:hover {
    transform: translateY(-9px);
    border-color: rgba(93,146,232,0.34);
    box-shadow: 0 28px 52px rgba(10,22,40,0.45);
}

/* IMAGE */
.pg-card-img-wrap {
    position: relative;
    height: 215px; overflow: hidden;
    background: #0a1e3c; flex-shrink: 0;
}

.pg-card-img-wrap img {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform 0.5s ease;
}

.pg-card:hover .pg-card-img-wrap img { transform: scale(1.06); }

.pg-card-img-wrap .pg-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #0d2040, #112a50);
    color: rgba(93,146,232,0.3); font-size: 36px;
}

.pg-date-badge {
    position: absolute; top: 12px; left: 12px;
    background: rgba(10,22,40,0.82);
    border: 1px solid rgba(93,146,232,0.2);
    color: rgba(255,255,255,0.88);
    font-size: 11px; font-weight: 600; letter-spacing: .05em;
    padding: 4px 12px; border-radius: 8px;
    backdrop-filter: blur(6px);
}

/* BODY */
.pg-card-body { padding: 22px 22px 24px; display: flex; flex-direction: column; flex: 1; }

.pg-tag {
    display: inline-flex; align-items: center;
    background: rgba(93,146,232,0.14);
    border: 1px solid rgba(93,146,232,0.24);
    color: #93bef8; border-radius: 999px;
    padding: 4px 13px; font-size: 11.5px; font-weight: 500; letter-spacing: .04em;
    margin-bottom: 12px; width: fit-content;
}

.pg-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 16.5px; font-weight: 700; color: #fff;
    margin-bottom: 10px; line-height: 1.38;
    min-height: 3.8rem; display: -webkit-box;
    -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    transition: color 0.25s;
}

.pg-card:hover .pg-card-title { color: #c8e0fd; }

.pg-card-excerpt {
    font-size: 13.5px; color: rgba(255,255,255,0.58);
    line-height: 1.68; flex-grow: 1; margin-bottom: 20px;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
}

.pg-btn-read {
    display: inline-flex; align-items: center; gap: 7px;
    border: 1px solid rgba(93,146,232,0.28);
    color: #93bef8; border-radius: 999px;
    padding: 8px 18px; font-size: 12.5px; font-weight: 500;
    text-decoration: none; background: rgba(26,74,158,0.1);
    transition: all 0.25s; align-self: flex-start;
}

.pg-btn-read:hover { background: #1a4a9e; color: #fff; border-color: #1a4a9e; }

/* EMPTY */
.pg-empty { text-align: center; padding: 80px 20px; }
.pg-empty i { font-size: 44px; color: rgba(93,146,232,0.36); display: block; margin-bottom: 14px; }
.pg-empty p { color: rgba(255,255,255,0.42); font-size: 15px; }

@media (max-width: 768px) {
    .pg-hero { padding: 80px 0 64px; }
    .pg-section { padding: 52px 0 72px; }
    .pg-grid { grid-template-columns: 1fr; }
}
@media (min-width: 481px) and (max-width: 768px) {
    .pg-grid { grid-template-columns: 1fr 1fr; }
}
</style>

<section class="pg-hero">
    <div class="container wrap">
        <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
            <span class="eyebrow-dot"></span>Warta Jemaat<span class="eyebrow-dot"></span>
        </div>
        <h1>Pengumuman Gereja</h1>
        <p>Informasi terbaru dan pengumuman resmi dari gereja untuk seluruh jemaat.</p>
        <div class="pg-count"><span>{{ $pengumuman->count() }}</span> Pengumuman tersedia</div>
    </div>
</section>

<section class="pg-section">
    <div class="global-container">
        @if($pengumuman->count())
        <div class="pg-grid">
            @foreach($pengumuman as $item)
            <div class="pg-card">
                <div class="pg-card-img-wrap">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" loading="lazy">
                    @else
                        <div class="pg-placeholder"><i class="bi bi-megaphone"></i></div>
                    @endif
                    @if($item->publish_date)
                    <div class="pg-date-badge">
                        {{ \Carbon\Carbon::parse($item->publish_date)->format('d M Y') }}
                    </div>
                    @endif
                </div>

                <div class="pg-card-body">
                    <span class="pg-tag">Pengumuman</span>
                    <h5 class="pg-card-title">{{ $item->title }}</h5>
                    <p class="pg-card-excerpt">{{ \Illuminate\Support\Str::limit($item->content, 120) }}</p>
                    <a href="{{ route('user.pengumuman.show', $item->id) }}" class="pg-btn-read">
                        Selengkapnya <i class="bi bi-arrow-right" style="font-size:11px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="pg-empty">
            <i class="bi bi-megaphone"></i>
            <p>Belum ada pengumuman.</p>
        </div>
        @endif
    </div>
</section>
@endsection