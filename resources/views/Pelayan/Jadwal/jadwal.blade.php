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
                    @php
                        $judul = strtolower($kegiatan->judul);

                        if (str_contains($judul, 'ibadah')) {
                            $icon = 'fa-solid fa-church';
                        } elseif (str_contains($judul, 'doa')) {
                            $icon = 'fa-solid fa-hands-praying';
                        } elseif (str_contains($judul, 'pemuda') || str_contains($judul, 'next gen')) {
                            $icon = 'fa-solid fa-users';
                        } elseif (str_contains($judul, 'sekolah minggu')) {
                            $icon = 'fa-solid fa-book-bible';
                        } elseif (str_contains($judul, 'menara')) {
                            $icon = 'fa-solid fa-cross';
                        } elseif (str_contains($judul, 'retreat')) {
                            $icon = 'fa-solid fa-mountain';
                        } elseif (str_contains($judul, 'natal')) {
                            $icon = 'fa-solid fa-gift';
                        } elseif (str_contains($judul, 'paskah')) {
                            $icon = 'fa-solid fa-cross';
                        } elseif (str_contains($judul, 'baptis')) {
                            $icon = 'fa-solid fa-droplet';
                        } elseif (str_contains($judul, 'nikah')) {
                            $icon = 'fa-solid fa-heart';
                        } else {
                            $icon = 'fa-solid fa-calendar-heart';
                        }
                    @endphp
                        <div class="schedule-card">
                            <div class="card-icon">
                                <i class="{{ $icon }}"></i>
                            </div>

                            <h3 class="card-title">{{ $kegiatan->judul }}</h3>

                            <div class="card-meta">
                                <i class="fa-regular fa-clock"></i>
                                <span>
                                    {{ $kegiatan->jam_mulai }}
                                    {{ $kegiatan->jam_selesai ? '– ' . $kegiatan->jam_selesai : '' }} WIB
                                </span>
                            </div>

                            <div class="card-meta">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $kegiatan->lokasi ?: 'Lokasi menyusul' }}</span>
                            </div>

                            @if ($kegiatan->deksripsi)
                                <p class="card-desc">{{ $kegiatan->deksripsi }}</p>
                            @else
                                <div style="flex: 1;"></div>
                            @endif
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
                        <h3 class="card-title">{{ $acara->judul }}</h3>
                        <p class="card-desc">{{ $acara->deksripsi }}</p>
                        <div class="badge-day">
                            <i class="fa-regular fa-calendar-check"></i>
                            {{ $acara->hari ?: 'Acara Khusus' }}
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