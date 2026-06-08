@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAJadwal.JadwalIndex') 

@endpush

@section('content')
  <div class="container py-4">

    <div class="content-header px-0 mb-4">
      <h1>Jadwal Ibadah</h1>
      <div class="breadcrumb-bar">
        <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Pelayanan</span>
      </div>
    </div>

    <div class="page-hero">

      <div class="hero-tag"><i class="ri-calendar-2-line"></i> Jadwal Ibadah</div>

      <h2>Jadwal Ibadah</h2>
      <p>
        Mari bertumbuh bersama dalam iman, doa, dan persekutuan.
        Kelola jadwal pelayanan mingguan dan acara khusus gereja dari sini.
      </p>
      <div class="hero-actions">
        <a href="{{ route('jadwal.create') }}" class="btn-hero-primary">＋ Tambah Jadwal</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">📅</div>
        <div>
          <div class="stat-val vc">{{ $jadwal->where('category', 'mingguan')->count() }}</div>
          <div class="stat-lbl">Jadwal Mingguan</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ig">✨</div>
        <div>
          <div class="stat-val vg">{{ $jadwal->where('category', 'acara_khusus')->count() }}</div>
          <div class="stat-lbl">Acara Khusus</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon is">⛪</div>
        <div>
          <div class="stat-val vs">{{ $jadwal->where('category', 'mingguan')->pluck('day')->unique()->count() }}</div>
          <div class="stat-lbl">Hari Aktif</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ip">📍</div>
        <div>
          <div class="stat-val vp">{{ $jadwal->whereNotNull('location')->pluck('location')->unique()->count() }}</div>
          <div class="stat-lbl">Lokasi</div>
        </div>
      </div>
    </div>

    <div class="section-head">
      <div class="section-title">📅 Jadwal Mingguan</div>
    </div>

    @php
      $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

      $hariClass = [
        'Senin' => 'senin',
        'Selasa' => 'selasa',
        'Rabu' => 'rabu',
        'Kamis' => 'kamis',
        'Jumat' => 'jumat',
        'Sabtu' => 'sabtu',
        'Minggu' => 'minggu',
      ];

      $hariIcon = [
        'Senin' => '☀',
        'Selasa' => '🌟',
        'Rabu' => '🕊',
        'Kamis' => '🔔',
        'Jumat' => '🌙',
        'Sabtu' => '🔥',
        'Minggu' => '✝',
      ];

      $warnaCycle = ['c', 'g', 's', 'r', 'p', 'o'];
      $adaMingguan = false;
    @endphp

    @foreach($hariList as $hari)
      @php
        $perHari = $jadwal->where('category', 'mingguan')->where('day', $hari)->values();
      @endphp

      @if($perHari->count())
        @php $adaMingguan = true; @endphp

        <div class="day-label {{ $hariClass[$hari] }}">{{ $hariIcon[$hari] }} {{ $hari }}</div>

        <div class="jadwal-grid">
          @foreach($perHari as $index => $item)
            @php
              $warna = $warnaCycle[$index % count($warnaCycle)];
            @endphp

            <div class="jcard {{ $warna }}">
              <div class="jcard-icon">{{ $item->icon ?: '📅' }}</div>
              <div class="jcard-title">{{ $item->title }}</div>

              <div class="jcard-meta">
                <span>🕐 {{ $item->start_time }}{{ $item->end_time ? ' - ' . $item->end_time : '' }}</span>
                <span>📍 {{ $item->location ?: '-' }}</span>
              </div>

              <div class="jcard-desc">{{ $item->description ?: '-' }}</div>

              <div class="jcard-footer">
<<<<<<< HEAD

=======
>>>>>>> 38b830f0a497548184eb2a006690466017e5db1d
                <div class="jcard-actions">
                  <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

                  <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline;"
                    onsubmit="return confirm('Hapus jadwal ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="act-btn btn-del">🗑 Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    @endforeach

    @if(!$adaMingguan)
      <div
        style="text-align:center; padding:32px; color:var(--muted); font-size:13px; background:var(--white); border:1px dashed var(--border); border-radius:12px; margin-bottom:24px;">
        Belum ada jadwal mingguan. Klik <strong>Tambah Jadwal</strong> untuk menambahkan.
      </div>
    @endif

    <div class="section-head" style="margin-top:8px;">
      <div class="section-title">✨ Acara Khusus</div>
    </div>

    @php
      $acaraKhusus = $jadwal->where('category', 'acara_khusus')->values();
    @endphp

    @if($acaraKhusus->count())
      <div class="jadwal-grid">
        @foreach($acaraKhusus as $index => $item)
          @php
            $warna = $warnaCycle[$index % count($warnaCycle)];
          @endphp

          <div class="jcard {{ $warna }}">
            <div class="jcard-icon">{{ $item->icon ?: '✨' }}</div>
            <div class="jcard-title">{{ $item->title }}</div>
            <div class="jcard-desc">{{ $item->description ?: '-' }}</div>

            <div class="jcard-footer">
              <span class="bulan-badge b-{{ $warna }}">{{ $item->day ?: 'Acara Khusus' }}</span>

              <div class="jcard-actions">
                <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

                <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline;"
                  onsubmit="return confirm('Hapus acara ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="act-btn btn-del">🗑 Hapus</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div
        style="text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">
        Belum ada acara khusus. Klik <strong>Tambah Acara</strong> untuk menambahkan.
      </div>
    @endif

  </div>
@endsection