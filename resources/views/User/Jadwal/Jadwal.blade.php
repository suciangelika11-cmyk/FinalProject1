@extends('layouts.app')

@section('content')

@include('layouts.LOJadwal')

    <!-- HERO -->
    <section class="jd-hero">
        <div class="wrap container">
            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Gereja Terbuka Untuk Semua
                <span class="eyebrow-dot"></span>
            </div>

            <h1>
                Jadwal Ibadah<br>
                <em>&amp; Kegiatan Jemaat</em>
            </h1>

            <p>
                Mari bertumbuh bersama dalam iman, doa, dan persekutuan
                yang penuh kasih di dalam Tuhan.
            </p>
        </div>
    </section>

    <!-- JADWAL MINGGUAN -->
    <section class="jd-weekly">
        <div class="global-container">

            <div class="section-head">
                <span class="section-label">Setiap Minggu</span>
                <h2 class="section-title">Jadwal Mingguan</h2>
                <div class="section-rule"></div>
            </div>

            @forelse($jadwalMingguan as $hari => $kegiatanList)

                <div class="jd-day">
                    <span class="jd-day-text">{{ $hari }}</span>
                </div>

                <div class="row g-4 mb-5">
                    @foreach($kegiatanList as $kegiatan)

                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="jd-card">

                                <div class="jd-card-icon">
                                    <i class="{{ $kegiatan->icon ?: 'bi bi-calendar-heart' }}"></i>
                                </div>

                                <h3 class="jd-card-title">
                                    {{ $kegiatan->title }}
                                </h3>

                                <div class="jd-card-meta">
                                    <i class="bi bi-clock"></i>
                                    <span>
                                        {{ $kegiatan->start_time }}
                                        @if($kegiatan->end_time)
                                            - {{ $kegiatan->end_time }}
                                        @endif
                                        WIB
                                    </span>
                                </div>

                                <div class="jd-card-meta">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>
                                        {{ $kegiatan->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                @if($kegiatan->description)
                                    <p class="jd-card-desc">
                                        {{ \Illuminate\Support\Str::limit($kegiatan->description, 140, '...') }}
                                    </p>
                                @endif

                                <a href="{{ route('user.jadwal.show', $kegiatan->id) }}" class="jd-btn-detail">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>
                        </div>

                    @endforeach
                </div>

            @empty

                <div class="jd-empty">
                    <i class="bi bi-calendar2-x"></i>
                    <p>Jadwal mingguan belum tersedia.</p>
                </div>

            @endforelse

        </div>
    </section>

    <!-- ACARA KHUSUS -->
    <section class="jd-special">
        <div class="global-container">

            <div class="section-head">
                <span class="section-label">Akan Datang</span>
                <h2 class="section-title">Acara Khusus</h2>
                <div class="section-rule"></div>
            </div>

            <div class="row g-4 justify-content-center">

                @forelse($acaraKhusus as $acara)

                    <div class="col-12 col-sm-6 col-lg-4">

                        <div class="jd-special-card">

                            <div class="jd-card-icon">
                                <i class="{{ $acara->icon ?: 'bi bi-stars' }}"></i>
                            </div>

                            <h3 class="jd-card-title">
                                {{ $acara->title }}
                            </h3>

                            <p class="jd-card-desc">
                                {{ $acara->description }}
                            </p>

                            <div class="jd-badge">
                                <i class="bi bi-calendar2-check"></i>
                                {{ $acara->jadwal_khusus ?: 'Acara Khusus' }}
                            </div>  

                        </div>

                    </div>

                @empty

                    <div class="jd-empty">
                        <i class="bi bi-calendar2-x"></i>
                        <p>Belum ada acara khusus.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>
@endsection