@extends('layouts.app')

@section('content')

    @include('layouts.LOGaleri')

    <section class="g-hero">
        <div class="g-hero-grid"></div>
        <div class="g-hero-orb g-hero-orb-1"></div>
        <div class="g-hero-orb g-hero-orb-2"></div>

        <div class="g-hero-inner">
            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Galeri Gereja
                <span class="eyebrow-dot"></span>
            </div>

            <h1 class="g-hero-title">
                Momen <span>Bersejarah</span><br>
                dalam Iman Kita
            </h1>

            <p class="g-hero-sub">
                Abadikan setiap perjalanan rohani, perayaan, dan kebersamaan yang mempererat persekutuan kita.
            </p>

            <div class="g-hero-line"></div>
        </div>
    </section>

    <section class="g-section">
        <div class="global-container">

            <div class="section-head">
                <span class="section-label">Koleksi Foto</span>
                <h2 class="section-title">Kenangan yang Terpatri</h2>
                <div class="section-rule"></div>
            </div>

            @if($galeris->isNotEmpty())

                <div class="g-grid">

                    @foreach($galeris as $item)

                        <div class="g-card"
                            onclick="gLightbox(
                                '{{ $item->image ? asset('storage/' . $item->image) : '' }}',
                                '{{ addslashes($item->title ?? '') }}',
                                '{{ addslashes($item->description ?? '') }}'
                            )">

                            @if($item->image)

                                <div class="g-card-img">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title ?? 'Galeri' }}"
                                        loading="lazy">

                                    <div class="g-card-overlay">
                                        <div class="g-overlay-hint">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#c8e0fd"
                                                stroke-width="2">
                                                <circle cx="11" cy="11" r="8" />
                                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                                <line x1="11" y1="8" x2="11" y2="14" />
                                                <line x1="8" y1="11" x2="14" y2="11" />
                                            </svg>
                                            Lihat Foto
                                        </div>
                                    </div>
                                </div>

                            @else

                                <div class="g-card-placeholder">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="3" />
                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                        <polyline points="21 15 16 10 5 21" />
                                    </svg>
                                    <span>Foto</span>
                                </div>

                            @endif

                            <div class="g-card-body">

                                @if($item->title)
                                    <div class="g-card-title">
                                        {{ $item->title }}
                                    </div>
                                @endif

                                @if($item->description)
                                    <div class="g-card-desc">
                                        {{ $item->description }}
                                    </div>
                                @endif

                                @if($item->event_date)

                                    <div class="g-card-date">
                                        <svg viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" />
                                            <line x1="16" y1="2" x2="16" y2="6" />
                                            <line x1="8" y1="2" x2="8" y2="6" />
                                            <line x1="3" y1="10" x2="21" y2="10" />
                                        </svg>

                                        {{ $item->event_date->translatedFormat('d F Y') }}
                                    </div>

                                @elseif($item->created_at)

                                    <div class="g-card-date">
                                        <svg viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" />
                                            <line x1="16" y1="2" x2="16" y2="6" />
                                            <line x1="8" y1="2" x2="8" y2="6" />
                                            <line x1="3" y1="10" x2="21" y2="10" />
                                        </svg>

                                        {{ $item->created_at->translatedFormat('d F Y') }}
                                    </div>

                                @endif

                            </div>
                        </div>

                    @endforeach

                </div>

                @if(method_exists($galeris, 'links') && $galeris->hasPages())
                    <div class="g-pagi">
                        {{ $galeris->links() }}
                    </div>
                @endif

            @else

                <div class="g-empty">
                    <div class="g-empty-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </div>

                    <h4>Belum Ada Foto</h4>

                    <p>
                        Galeri foto gereja akan segera ditampilkan di sini.
                    </p>
                </div>

            @endif
        </div>
    </section>

    <div class="g-footer-strip">

    </div>

    <div class="g-lightbox" id="gLightboxEl" onclick="if(event.target===this)gClose()">
        <div class="g-lb-inner">

            <button class="g-lb-close" onclick="gClose()">
                {{ "\u{2715}" }}
            </button>

            <img id="gLbImg" src="" alt="">

            <div class="g-lb-caption">
                <div class="lb-title" id="gLbTitle"></div>
                <div class="lb-desc" id="gLbDesc"></div>

                <button class="g-back-btn" onclick="gClose()">
                    {{ "\u{2190}" }} Kembali ke Galeri
                </button>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/User/Galeri.js') }}"></script>

@endsection