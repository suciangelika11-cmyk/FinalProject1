@extends('Pelayan.layouts.pelayan')

@section('content')

    @include('Pelayan.layouts.LOPTentang')

    @if($data)

        {{-- ── HERO ── --}}
        <section class="hero">
            <div class="hero-grid-overlay"></div>
            <div class="hero-content">
                <div class="hero-eyebrow">
                    <i class="fa-solid fa-church" style="font-size:10px;"></i>
                    Gereja Beriman Indonesia
                </div>
                <h1>{{ $data->header_title ?? 'Tentang' }} <em>Gereja</em></h1>
                <p class="hero-sub">{{ $data->header_description ?? 'Mengenal lebih dalam rumah Tuhan kita' }}</p>
            </div>
        </section>

        <div class="page-wrap">

            {{-- ── SEJARAH ── --}}
            <div class="section-header reveal">
                <span class="section-label">Latar Belakang</span>
                <h2 class="section-title">Sejarah Gereja</h2>
                <div class="section-rule"></div>
            </div>

            <div class="sejarah-card reveal">
                <div class="sejarah-inner">
                    <div class="sejarah-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <p class="sejarah-text">{{ $data->sejarah }}</p>
                </div>
            </div>

            <hr class="section-divider">

            {{-- ── VISI & MISI ── --}}
            <div class="section-header reveal">
                <span class="section-label">Arah &amp; Tujuan</span>
                <h2 class="section-title">Visi &amp; Misi</h2>
                <div class="section-rule"></div>
            </div>

            <div class="vm-grid">
                <div class="vm-card reveal">
                    <div class="vm-icon"><i class="fa-solid fa-eye"></i></div>
                    <h3 class="vm-title">Visi</h3>
                    <p class="vm-text">{{ $data->visi }}</p>
                </div>
                <div class="vm-card reveal" style="transition-delay: 0.1s;">
                    <div class="vm-icon"><i class="fa-solid fa-bullseye"></i></div>
                    <h3 class="vm-title">Misi</h3>
                    <p class="vm-text">{{ $data->misi }}</p>
                </div>
            </div>

            <hr class="section-divider">

            {{-- ── GEMBALA ── --}}
            <div class="section-header reveal">
                <span class="section-label">Kepemimpinan</span>
                <h2 class="section-title">Gembala Sidang</h2>
                <div class="section-rule"></div>
            </div>

            <div class="gembala-wrap">
                <div class="gembala-card reveal">

                    @if($data->gembala_foto)
                        <img src="{{ asset('storage/' . $data->gembala_foto) }}" class="gembala-photo"
                            alt="{{ $data->gembala_nama }}">
                    @else
                        <div class="gembala-avatar">
                            <i class="fa-solid fa-person"></i>
                        </div>
                    @endif

                    <h3 class="gembala-name">{{ $data->gembala_nama }}</h3>

                    @if($data->gembala_jabatan)
                        <div class="gembala-badge">
                            <i class="fa-solid fa-cross" style="font-size:9px;"></i>
                            {{ $data->gembala_jabatan }}
                        </div>
                    @endif

                    @if($data->gembala_deskripsi)
                        <p class="gembala-desc">{{ $data->gembala_deskripsi }}</p>
                    @endif

                </div>
            </div>

        </div>

    @else

        {{-- ── EMPTY STATE ── --}}
        <section class="empty-hero">
            <div class="empty-hero-content">
                <div class="empty-eyebrow">
                    <i class="fa-solid fa-church" style="font-size:10px;"></i>
                    Gereja Beriman Indonesia
                </div>
                <h1 class="empty-h1">
                    Tentang <em>Gereja</em>
                </h1>
                <p class="empty-sub">Mengenal lebih dalam rumah Tuhan kita</p>
            </div>
        </section>

        <div class="page-wrap">
            <div class="empty-card">
                <div class="empty-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <h3 class="empty-title">Data Belum Tersedia</h3>
                <p class="empty-text">Informasi tentang gereja belum diisi. Silakan hubungi administrator.</p>
            </div>
        </div>

    @endif

    <script src="{{ asset('js/Pelayan/Tentang.js') }}"></script>

@endsection