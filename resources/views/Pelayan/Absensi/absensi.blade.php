@extends('Pelayan.layouts.pelayan')

@section('page_title', 'Absensi')

@section('content')

@include('Pelayan.layouts.LOPAbsensi')

    <!-- HERO -->

    <section class="hero-absensi">

        <div class="hero-content">

            <div class="hero-badge">
                📖 DAFTAR KEHADIRAN
            </div>

            <h1 class="hero-title">
                Absensi <span>Ibadah</span>
            </h1>

            <p class="hero-desc">
                Riwayat kehadiran ibadah dan pelayanan gereja yang telah dicatat dan dikelola oleh administrator.
            </p>

        </div>

        <div class="hero-wave">
            <svg viewBox="0 0 1440 160" preserveAspectRatio="none">
                <path fill="#ffffff" d="M0,96L120,80C240,64,480,32,720,32C960,32,1200,64,1320,80L1440,96L1440,160L0,160Z">
                </path>
            </svg>
        </div>

    </section>

    <!-- DATA ABSENSI -->

    <section class="absensi-section">

        <div class="container-absensi">

            <div class="section-divider">
                <span>Data Kehadiran</span>
            </div>

            @if($absensi->count())

                <div class="absensi-grid">

                    @foreach($absensi as $item)

                        <div class="absensi-card">

                            <div class="card-date">
                                {{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, d F Y') }}
                            </div>

                            <div class="card-session">
                                {{ $item->session }}
                            </div>

                            <div class="info-item">
                                <div class="info-icon">🎤</div>

                                <div class="info-content">
                                    <h5>Pengkhotbah</h5>
                                    <p>{{ $item->pengkhotbah }}</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">🙏</div>

                                <div class="info-content">
                                    <h5>Pelayan</h5>
                                    <p>{{ $item->pelayan }}</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">👥</div>

                                <div class="info-content">
                                    <h5>Jumlah Hadir</h5>
                                    <p>{{ $item->jumlah }} Jemaat</p>
                                </div>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">
                    <h3>Belum Ada Data Absensi</h3>
                    <p>Data akan muncul setelah ditambahkan oleh administrator.</p>
                </div>

            @endif

        </div>

    </section>

@endsection