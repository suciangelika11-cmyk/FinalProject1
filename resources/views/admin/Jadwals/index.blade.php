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
        <a href="{{ route('jadwal.create') }}" class="btn-hero-primary">{{ "\u{FF0B}" }} Tambah</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">{{ "\u{1F4C5}" }}</div>
        <div>
          <div class="stat-val vc">{{ $jadwal->where('kategori', 'mingguan')->count() }}</div>
          <div class="stat-lbl">Jadwal Mingguan</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ig">{{ "\u{2728}" }}</div>
        <div>
          <div class="stat-val vg">{{ $jadwal->where('kategori', 'acara_khusus')->count() }}</div>
          <div class="stat-lbl">Acara Khusus</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon is">{{ "\u{26EA}" }}</div>
        <div>
          <div class="stat-val vs">{{ $jadwal->where('kategori', 'mingguan')->pluck('hari')->unique()->count() }}</div>
          <div class="stat-lbl">Hari Aktif</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ip">{{ "\u{1F4CD}" }}</div>
        <div>
          <div class="stat-val vp">{{ $jadwal->whereNotNull('lokasi')->pluck('lokasi')->unique()->count() }}</div>
          <div class="stat-lbl">Lokasi</div>
        </div>
      </div>
    </div>

    <div class="section-head">
      <div class="section-title">{{ "\u{1F4C5}" }} Jadwal Mingguan</div>
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
        'Senin' => "\u{2600}\u{FE0F}",
        'Selasa' => "\u{1F31F}",
        'Rabu' => "\u{1F54A}\u{FE0F}",
        'Kamis' => "\u{1F514}",
        'Jumat' => "\u{1F319}",
        'Sabtu' => "\u{1F525}",
        'Minggu' => "\u{271D}\u{FE0F}",
      ];

      $warnaCycle = ['c', 'g', 's', 'r', 'p', 'o'];
      $adaMingguan = false;
    @endphp

    @foreach($hariList as $hari)
      @php
        $perHari = $jadwal->where('kategori', 'mingguan')->where('hari', $hari)->values();
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
              <div class="jcard-icon">{{ $item->icon ?: "\u{1F4C5}"  }}</div>
              <div class="jcard-title">{{ $item->judul }}</div>

              <div class="jcard-meta">
                <span>{{ "\u{1F550}" }} {{ $item->jam_mulai }}{{ $item->jam_selesai ? ' - ' . $item->jam_selesai : '' }}</span>
                <span>{{ "\u{1F4CD}" }} {{ $item->lokasi ?: '-' }}</span>
              </div>

              <div class="jcard-desc">{{ $item->deksripsi ?: '-' }}</div>

              <div class="jcard-footer">
                <div class="jcard-actions">
                  <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">{{ "\u{270F}\u{FE0F}" }} Edit</a>

                  <form id="delete-form-{{ $item->id }}" action="{{ route('jadwal.destroy', $item->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="act-btn btn-del btn-hapus" data-id="{{ $item->id }}"
                      data-title="{{ $item->judul }}" data-type="Jadwal Ibadah">
                      {{ "\u{1F5D1}\u{FE0F}" }}
                    </button>

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
        Belum ada jadwal mingguan. Klik <strong>Tambah</strong> untuk menambahkan.
      </div>
    @endif

    <div class="section-head" style="margin-top:8px;">
      <div class="section-title">{{ "\u{2728}" }} Acara Khusus</div>
    </div>

    @php
      $acaraKhusus = $jadwal->where('kategori', 'acara_khusus')->values();
    @endphp

    @if($acaraKhusus->count())
      <div class="jadwal-grid">
        @foreach($acaraKhusus as $index => $item)
          @php
            $warna = $warnaCycle[$index % count($warnaCycle)];
          @endphp

          <div class="jcard {{ $warna }}">
            <div class="jcard-icon">{{ $item->icon ?: "\u{2728}" }}</div>
            <div class="jcard-title">{{ $item->judul }}</div>

            <div style="margin:10px 0;">
              <span class="bulan-badge b-{{ $warna }}">
                {{ "\u{1F4C5}" }} {{ $item->jadwal_khusus }}
              </span>
            </div>

            <div class="jcard-desc">
              {{ $item->deksripsi ?: '-' }}
            </div>

            <div class="jcard-footer">

              <div class="jcard-actions">
                <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">{{ "\u{270F}\u{FE0F}" }} Edit</a>

                <form id="delete-form-{{ $item->id }}" action="{{ route('jadwal.destroy', $item->id) }}" method="POST"
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="act-btn btn-del btn-hapus" data-id="{{ $item->id }}"
                    data-title="{{ $item->judul }}" data-type="Acara Khusus">
                    {{ "\u{1F5D1}\u{FE0F}" }} Hapus
                  </button>
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

  @push('scripts')

    <script src="{{ asset('js/Admin/JadwalIndex.js') }}"></script>

  @endpush
@endsection