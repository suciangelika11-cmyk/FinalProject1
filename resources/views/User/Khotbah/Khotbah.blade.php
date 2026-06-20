@extends('layouts.app')

@section('content')

    @include('layouts.LOKhotbah')

    <!-- HERO -->
    <section class="pg-hero">

        <div class="container wrap">

            <div class="kh-badge">
                <span class="kh-dot"></span>
                Firman Tuhan
                <span class="kh-dot"></span>
            </div>

            <h1>Khotbah <em>Gereja</em></h1>

            <p>
                Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna,
                penuh kasih, dan bertumbuh dalam iman setiap hari.
            </p>

            <div class="pg-count">
                <span>{{ $khotbah->count() }}</span>
                Khotbah tersedia
            </div>

        </div>

    </section>

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

                <input type="text" id="searchKhotbah" class="kh-search" placeholder="Cari judul khotbah...">
            </div>

            <!-- GRID -->
            <div class="kh-grid" id="khotbahGrid">

                @forelse($khotbah as $item)

                        <div class="kh-card" data-title="{{ strtolower($item->title) }}">

                            <!-- THUMB -->
                            <div class="kh-thumb">

                                @if($item->thumbnail)

                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy">

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

                                    {{ $item->tanggal_khotbah
                    ? \Carbon\Carbon::parse($item->tanggal_khotbah)->translatedFormat('d F Y')
                    : '-' }}
                                </div>

                                <div class="kh-card-title">
                                    {{ $item->judul }}
                                </div>

                                @if($item->deksripsi)

                                    <div class="kh-desc">
                                        {{ $item->deksripsi }}
                                    </div>

                                @endif

                                <!-- FOOT -->
                                <div class="kh-foot">

                                    @if($item->video)

                                        <a href="{{ $item->video }}" target="_blank" class="kh-btn">

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
            @if(method_exists($khotbah, 'links') && $khotbah->hasPages())

                <div class="d-flex justify-content-center mt-5">
                    {{ $khotbah->links() }}
                </div>

            @endif

        </div>

    </section>

    <script src="{{ asset('js/User/Khotbah.js') }}"></script>

@endsection