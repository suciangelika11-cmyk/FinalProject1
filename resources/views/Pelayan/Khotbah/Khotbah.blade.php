@extends('Pelayan.layouts.pelayan')

@section('content')

@include('Pelayan.Layouts.LOPKhotbah')

    <!-- ── HERO ─────────────────────────────────────────────── -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-book-bible" style="font-size:10px;"></i>
                Firman Tuhan
            </div>

            <h1><em>Khotbah</em></h1>

            <p class="hero-sub">
                Mendengarkan Firman Tuhan untuk kehidupan yang lebih bermakna
                dan bertumbuh dalam iman.
            </p>

        </div>
    </section>

    <!-- ── CONTENT ───────────────────────────────────────────── -->
    <div class="page-wrap">

        <div class="section-header">
            <span class="section-label">Arsip Khotbah</span>
            <h2 class="section-title">Koleksi Firman Tuhan</h2>
            <div class="section-rule"></div>
        </div>

        <!-- SEARCH -->
        <div class="search-bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="search-input" id="searchKhotbah" placeholder="Cari judul khotbah...">
        </div>

        <!-- GRID -->
        <div class="khotbah-grid" id="khotbahGrid">

            @forelse($khotbah as $item)

                <div class="khotbah-card" data-title="{{ strtolower($item->title) }}">

                    <!-- THUMB -->
                    <div class="card-thumb">

                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy">
                        @else
                            <div class="thumb-placeholder">
                                <i class="fa-solid fa-play-circle"></i>
                                <span>Video Khotbah</span>
                            </div>
                        @endif

                        @if($item->video)
                            <div class="video-pill">
                                <i class="fa-solid fa-video" style="font-size:9px;"></i>
                                Video
                            </div>
                        @endif

                    </div>

                    <!-- BODY -->
                    <div class="card-body">

                        <div class="khotbah-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $item->tanggal_khotbah
                ? \Carbon\Carbon::parse($item->tanggal_khotbah)->translatedFormat('d F Y')
                : '—' }}
                        </div>

                        <div class="khotbah-title">{{ $item->judul }}</div>

                        @if($item->deksripsi)
                            <div class="khotbah-desc">{{ $item->deksripsi }}</div>
                        @endif

                        <div class="card-footer">

                            @if($item->video)
                                <a href="{{ $item->video }}" target="_blank" rel="noopener" class="btn-watch">
                                    <i class="fa-solid fa-play" style="font-size:10px;"></i>
                                    Tonton Khotbah
                                </a>
                            @else
                                <span class="btn-no-video">
                                    <i class="fa-solid fa-video-slash"></i>
                                    Video tidak tersedia
                                </span>
                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h4>Belum Ada Khotbah</h4>
                    <p>Khotbah akan segera ditampilkan di sini.</p>
                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if(method_exists($khotbah, 'links') && $khotbah->hasPages())
            <div class="pagination-wrap">
                {{ $khotbah->links() }}
            </div>
        @endif

    </div>

    <script src="{{ asset('js/Pelayan/Khotbah.js') }}"></script>

@endsection