@extends('Pelayan.layouts.pelayan')

@section('content')

<style>
body {
    background: #f4f9ff;
}

.hero {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    padding: 90px 0;
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 40px,
        rgba(255,255,255,0.03) 40px,
        rgba(255,255,255,0.03) 41px
    );
    pointer-events: none;
}

.hero h1 {
    font-weight: 800;
    font-size: 38px;
    position: relative;
}

.hero p {
    opacity: 0.9;
    font-size: 17px;
    position: relative;
}

.section-title {
    font-weight: 700;
    font-size: 28px;
    color: #1e293b;
}

.divider {
    height: 4px;
    width: 80px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    margin: 15px auto 20px;
    border-radius: 20px;
}

.section-container {
    padding: 80px 0;
}

.pengumuman-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 28px;
}

.pengumuman-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all 0.35s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.pengumuman-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.pengumuman-card .accent-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    opacity: 0;
    transition: opacity 0.3s;
}

.pengumuman-card:hover .accent-bar {
    opacity: 1;
}

.pengumuman-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
    position: relative;
    overflow: hidden;
}

.pengumuman-image-placeholder {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: rgba(255,255,255,0.7);
}

.pengumuman-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.pengumuman-date {
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: #005bea;
    margin-bottom: 10px;
}

.pengumuman-title {
    font-size: 16.5px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.45;
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.pengumuman-content {
    font-size: 13.5px;
    color: #6b7280;
    line-height: 1.7;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 18px;
}

.pengumuman-footer {
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
}

.btn-baca {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    color: white;
    border-radius: 50px;
    padding: 9px 22px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(0,91,234,0.25);
}

.btn-baca:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,91,234,0.35);
}

.empty-wrap {
    text-align: center;
    padding: 60px 20px;
    grid-column: 1 / -1;
}

.empty-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    background: linear-gradient(135deg, #005bea20, #00c6fb20);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: #005bea;
    margin: 0 auto 20px;
}

/* ── RESPONSIVE ── */
@media (max-width: 576px) {
    .pengumuman-grid {
        grid-template-columns: 1fr;
    }

    .hero h1 {
        font-size: 28px;
    }

    .hero p {
        font-size: 15px;
    }
}
</style>

<section class="hero">
    <div class="container">
        <h1>Pengumuman Gereja</h1>
        <p>Informasi terbaru dan pengumuman resmi dari gereja</p>
    </div>
</section>

<section class="section-container">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Berita Terkini</h2>
            <div class="divider"></div>
        </div>

        <div class="pengumuman-grid">
            @forelse($pengumuman as $item)
                <div class="pengumuman-card">
                    <div class="accent-bar"></div>

                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             class="pengumuman-image" 
                             alt="{{ $item->title }}"
                             loading="lazy">
                    @else
                        <div class="pengumuman-image-placeholder">
                            <i class="bi bi-newspaper"></i>
                        </div>
                    @endif

                    <div class="pengumuman-body">
                        <div class="pengumuman-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $item->publish_date ? \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d F Y') : '—' }}
                        </div>

                        <h3 class="pengumuman-title">{{ $item->title }}</h3>

                        <div class="pengumuman-content">
                            {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                        </div>

                        <div class="pengumuman-footer">
                            <a href="{{ route('pelayan.pengumuman.show', $item->id) }}" class="btn-baca">
                                <i class="bi bi-arrow-right"></i>
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-wrap">
                    <div class="empty-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Belum Ada Pengumuman</h4>
                    <p class="text-muted">Pengumuman akan segera ditampilkan di sini. Tetap update!</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection