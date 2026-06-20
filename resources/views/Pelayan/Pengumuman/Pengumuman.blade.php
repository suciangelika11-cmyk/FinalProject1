@extends('Pelayan.layouts.pelayan')

@section('content')

@include('Pelayan.layouts.LOPPengumuman')

    <!-- ── HERO ─────────────────────────────────────────────── -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-bullhorn" style="font-size:10px;"></i>
                Informasi Gereja
            </div>

            <h1>Pengumuman <em>Gereja</em></h1>

            <p class="hero-sub">
                Informasi terbaru dan pengumuman resmi dari gereja untuk seluruh jemaat.
            </p>

        </div>
    </section>

    <!-- ── CONTENT ───────────────────────────────────────────── -->
    <div class="page-wrap">

        <div class="section-header">
            <span class="section-label">Terkini</span>
            <h2 class="section-title">Berita &amp; Pengumuman</h2>
            <div class="section-rule"></div>
        </div>

        <div class="pengumuman-grid">

            @forelse($pengumuman as $item)

                <div class="pengumuman-card">

                    <div class="card-img">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" loading="lazy">
                        @else
                            <div class="card-img-placeholder">
                                <i class="fa-regular fa-newspaper"></i>
                                <span>Pengumuman</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">

                        <div class="card-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $item->tanggal_liris
                ? \Carbon\Carbon::parse($item->tanggal_liris)->translatedFormat('d F Y')
                : '—' }}
                        </div>

                        <h3 class="card-title">{{ $item->judul }}</h3>

                        <div class="card-excerpt">
                            {{ \Illuminate\Support\Str::limit($item->deksripsi, 120) }}
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('pelayan.pengumuman.show', $item->id) }}" class="btn-read">
                                <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i>
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>
                    <h4>Belum Ada Pengumuman</h4>
                    <p>Pengumuman akan segera ditampilkan di sini. Tetap update!</p>
                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if(method_exists($pengumuman, 'links') && $pengumuman->hasPages())
            <div class="pagination-wrap">
                {{ $pengumuman->links() }}
            </div>
        @endif

    </div>

@endsection