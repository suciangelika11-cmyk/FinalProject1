@extends('layouts.app')

@section('content')

    @include('layouts.LOPengumuman')

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
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" loading="lazy">
                                @else
                                    <div class="pg-placeholder"><i class="bi bi-megaphone"></i></div>
                                @endif
                                @if($item->tanggal_liris)
                                    <div class="pg-date-badge">
                                        {{ \Carbon\Carbon::parse($item->tanggal_liris)->format('d M Y') }}
                                    </div>
                                @endif
                            </div>

                            <div class="pg-card-body">
                                <span class="pg-tag">Pengumuman</span>
                                <h5 class="pg-card-title">{{ $item->judul }}</h5>
                                <p class="pg-card-excerpt">{{ \Illuminate\Support\Str::limit($item->deksripsi, 120) }}</p>
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