@extends('Pelayan.layouts.pelayan')

@section('content')

    @include('Pelayan.layouts.LOPJadwalIbadah')

    <!-- ============ HERO SECTION ============ -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fa-solid fa-church"></i>
                Gereja Terbuka Untuk Semua
            </div>
            <h1>Jadwal Ibadah<br><em>&amp; Kegiatan Jemaat</em></h1>
            <p class="hero-sub">Mari bertumbuh bersama dalam iman, doa, dan persekutuan yang penuh kasih</p>
        </div>
    </section>

    <!-- ============ JADWAL MINGGUAN ============ -->
    <section class="weekly">
        <div class="jadwal-container">
            <div class="section-header">
                <span class="section-label">Setiap Minggu</span>
                <h2 class="section-title">Jadwal Mingguan</h2>
                <div class="section-rule"></div>
            </div>

            @forelse ($jadwalMingguan as $hari => $kegiatanList)
                <div class="day-divider">
                    <span class="day-name">{{ $hari }}</span>
                </div>

                <div class="schedule-grid">
                    @foreach ($kegiatanList as $kegiatan)
                        <div class="schedule-card">
                            <div class="card-icon">
                                <i class="{{ $kegiatan->icon ?: 'fa-solid fa-calendar-heart' }}"></i>
                            </div>

                            <h3 class="card-title">{{ $kegiatan->title }}</h3>

                            <div class="card-meta">
                                <i class="fa-regular fa-clock"></i>
                                <span>
                                    {{ $kegiatan->start_time }}
                                    {{ $kegiatan->end_time ? '– ' . $kegiatan->end_time : '' }} WIB
                                </span>
                            </div>

                            <div class="card-meta">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $kegiatan->location ?: 'Lokasi menyusul' }}</span>
                            </div>

                            @if ($kegiatan->description)
                                <p class="card-desc">{{ $kegiatan->description }}</p>
                            @else
                                <div style="flex: 1;"></div>
                            @endif

                            <a href="#" class="btn-detail">
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa-regular fa-calendar-xmark"></i>
                    </div>
                    <p>Jadwal mingguan belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- ============ ACARA KHUSUS ============ -->
    <section class="special">
        <div class="jadwal-container">
            <div class="section-header">
                <span class="section-label">Akan Datang</span>
                <h2 class="section-title">Acara Khusus</h2>
                <div class="section-rule"></div>
            </div>

            <div class="schedule-grid">
                @forelse ($acaraKhusus as $acara)
                    <div class="special-card">
                        <div class="card-icon">
                            <i class="{{ $acara->icon ?: 'fa-solid fa-star' }}"></i>
                        </div>
                        <h3 class="card-title">{{ $acara->title }}</h3>
                        <p class="card-desc">{{ $acara->description }}</p>
                        <div class="badge-day">
                            <i class="fa-regular fa-calendar-check"></i>
                            {{ $acara->day ?: 'Acara Khusus' }}
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fa-regular fa-calendar-xmark"></i>
                        </div>
                        <p>Belum ada acara khusus.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection 