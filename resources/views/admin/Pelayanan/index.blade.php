@extends('admin.layouts.main')

@push('styles')

  @include('admin.layouts.LOAPelayanan.PelayananIndex')

@endpush

@section('content')

  <div class="content-header">

    <h1>Pelayanan & Komunitas</h1>

    <div class="breadcrumb-bar">
      <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Pelayanan</span>
    </div>

  </div>

  <div class="content">

    @if(session('success'))
      <div
        style="margin:0 0 20px; padding:16px 20px; border-radius:14px; background:#e6f8f6; border:1px solid #9de8d8; color:#0e664f;">
        {{ session('success') }}
      </div>
    @endif

    <div class="page-hero">

      <div class="hero-tag"><i class="ri-service-line"></i> Pelayanan</div>

      <h2>Pelayanan & Komunitas</h2>

      <p>
        Bergabunglah dalam pelayanan dan temukan tempat Anda untuk melayani Tuhan. Kelola data pelayanan dari sini.
      </p>

      <div class="hero-actions">
        <a href="{{ route('pelayanan.create') }}" class="btn-hero-primary">
          {{ "\u{FF0B}" }} Tambah
        </a>
      </div>

    </div>

    <div class="stats-row">

      <div class="stat-card">
        <div class="stat-icon ic">{{"\u{1F464}"}}</div>

        <div>
          <div class="stat-val vc">
            {{ $pelayanan->where('category', 'kepemimpinan')->count() }}
          </div>

          <div class="stat-lbl">Pemimpin</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ig">{{ "\u{1F64C}" }}</div>

        <div>
          <div class="stat-val vg">
            {{ $pelayanan->where('category', 'tim')->count() }}
          </div>

          <div class="stat-lbl">Tim Pelayanan</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon is">{{"\u{1F5BC}"}}</div>

        <div>
          <div class="stat-val vs">
            {{ $pelayanan->where('category', 'aksi')->count() }}
          </div>

          <div class="stat-lbl">Pelayanan dalam Aksi</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ip">{{"\u{1F4E6}"}}</div>

        <div>
          <div class="stat-val vp">
            {{ $pelayanan->count() }}
          </div>

          <div class="stat-lbl">Total Data</div>
        </div>
      </div>

    </div>

    @php
      $warnaMap = ['c', 'g', 's', 'r', 'p', 'o', 'pk'];
      $kepemimpinan = $pelayanan->where('category', 'kepemimpinan')->values();
      $tim = $pelayanan->where('category', 'tim')->values();
      $aksi = $pelayanan->where('category', 'aksi')->values();
    @endphp

    <div class="section-head">

      <div class="section-title">{{"\u{1F464}"}} Kepemimpinan</div>

    </div>

    <div class="section-panel">

      <div class="section-label">
        <span></span> Gembala dan Ibu Gembala yang memimpin dengan kasih.
      </div>

      @if($kepemimpinan->count())

        <div class="leader-row">

          @foreach($kepemimpinan as $item)

            <div class="leader-card">

              <div class="leader-avatar">

                @if($item->photo)
                  <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}">
                @else
                  {{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}
                @endif

              </div>

              <div class="leader-name">
                {{ $item->leader ?: $item->title }}
              </div>

              <div class="leader-role">
                {{ $item->title }}
              </div>

              <div class="leader-card-actions">

                <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">
                  {{"\u{270F}"}} Edit
                </a>

                <form id="delete-form-{{ $item->id }}" action="{{ route('pelayanan.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="button" class="act-sm btn-d btn-hapus" data-id="{{ $item->id }}"
                    data-title="{{ $item->title }}">
                    🗑 Hapus
                  </button>
                </form>

              </div>

            </div>

          @endforeach

        </div>

      @else

        <div class="empty-box">
          Belum ada data kepemimpinan.
        </div>

      @endif

    </div>

    <div class="section-head">

      <div class="section-title">🙌 Tim Pelayanan</div>

    </div>

    <div class="section-panel">

      <div class="section-label">
        <span></span> Buat dan kelola tim pelayanan dengan lebih mudah.
      </div>

      @if($tim->count())

        <div class="tim-grid">

          @foreach($tim as $index => $item)

            @php
              $warna = $warnaMap[$index % count($warnaMap)];
            @endphp

            <div class="tim-card {{ $warna }}">

              <div class="tim-icon">
                {{ $item->icon ?: '🙌' }}
              </div>

              <div class="tim-name">
                {{ $item->title }}
              </div>

              <div class="tim-desc">
                {{ $item->description ?: 'Deskripsi belum ditambahkan.' }}
              </div>

              <hr class="tim-divider" />

              <div class="anggota-label">
                Anggota Tim
              </div>

              @if($item->anggotas->count())

                @foreach($item->anggotas as $anggota)

                  <div class="anggota-row">

                    {{ $anggota->nama }}

                    @if($anggota->bagian)
                      <strong>{{ $anggota->bagian }}</strong>
                    @endif

                  </div>

                @endforeach

              @else

                <div class="anggota-row">
                  {{ $item->leader ?: 'Koordinator belum ditentukan' }}
                </div>

              @endif

              <div class="tim-footer">

                <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">
                  ✏ Edit
                </a>

                <form id="delete-form-{{ $item->id }}" action="{{ route('pelayanan.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="button" class="act-sm btn-d btn-hapus" data-id="{{ $item->id }}"
                    data-title="{{ $item->title }}">
                    🗑 Hapus
                  </button>
                </form>

              </div>

            </div>

          @endforeach

        </div>

      @else

        <div class="empty-box">
          Belum ada tim pelayanan.
        </div>

      @endif

    </div>

    <div class="section-head">

      <div class="section-title">🖼 Pelayanan dalam Aksi</div>

    </div>

    <div class="section-panel">

      <div class="section-label">
        <span></span> Dokumentasi kegiatan pelayanan dalam bentuk foto.
      </div>

      @if($aksi->count())

        <div class="galeri-grid">

          @foreach($aksi as $item)

            <div class="galeri-card">

              <div class="galeri-img">

                @if($item->photo)
                  <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}">
                @else
                  {{ $item->icon ?: '🖼' }}
                @endif

              </div>

              <div class="galeri-body">

                <div class="galeri-title">
                  {{ $item->title }}
                </div>

                <div class="galeri-desc">
                  {{ $item->description ?: 'Deskripsi tidak tersedia.' }}
                </div>

                <div class="galeri-footer">

                  <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">
                    ✏ Edit
                  </a>

                  <form id="delete-form-{{ $item->id }}" action="{{ route('pelayanan.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="act-sm btn-d btn-hapus" data-id="{{ $item->id }}"
                      data-title="{{ $item->title }}">
                      🗑 Hapus
                    </button>
                  </form>

                </div>

              </div>

            </div>

          @endforeach

        </div>

      @else

        <div class="empty-box">
          Belum ada dokumentasi pelayanan dalam aksi.
        </div>

      @endif

    </div>

  </div>

  @push('scripts')

        <script src="{{ asset('js/Admin/PelayananIndex.js') }}"></script>

    @endpush

@endsection