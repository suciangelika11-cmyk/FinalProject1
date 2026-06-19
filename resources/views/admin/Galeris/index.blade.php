@extends('admin.layouts.main')

@push('styles')

  @include('admin.layouts.LOAGaleri.GaleriIndex')

@endpush

@section('content')

  <div class="content-header">
    <h1>Galeri</h1>
    <div class="breadcrumb-bar"><a href="{{ route('admin.dashboard') }}">Home</a> / <span>Galeri</span></div>
  </div>

  <div class="content">

    <div class="page-hero">
      <div class="hero-tag"><i class="ri-image-line"></i> Dokumentasi</div>
      <h2>Galeri & Dokumentasi Kegiatan</h2>
      <p>Abadikan setiap momen pelayanan, ibadah, dan kebersamaan jemaat GBI Tambunan.</p>
      <div class="hero-actions">
        <a href="{{ route('galeri.create') }}" class="btn-hero-primary">{{ "\u{FF0B}" }} Tambah</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">{{ "\u{1F5BC}\u{FE0F}" }}</div>
        <div>
          <div class="stat-val vc">{{ $galeri->count() }}</div>
          <div class="stat-lbl">Total Foto</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ig">{{ "\u{1F4C5}" }}</div>
        <div>
          <div class="stat-val vg">{{ $galeri->whereNotNull('event_date')->count() }}</div>
          <div class="stat-lbl">With Date</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon is">{{ "\u{1F4DD}" }}</div>
        <div>
          <div class="stat-val vs">{{ $galeri->filter(fn($item) => !empty($item->description))->count() }}</div>
          <div class="stat-lbl">Ada Deskripsi</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ip">{{ "\u{1F195}" }}</div>
        <div>
          <div class="stat-val vp">{{ $galeri->take(5)->count() }}</div>
          <div class="stat-lbl">Data Terbaru</div>
        </div>
      </div>
    </div>

    @if($galeri->count())
      <div class="gallery-list">

        @foreach($galeri as $item)
          <div class="gallery-row">
            <div class="gallery-info">
              <img src="{{ asset('storage/' . $item->image) }}" class="gallery-thumb">

              <div>

                <div class="gallery-title">
                  {{ $item->title }}
                </div>

                <div class="gallery-desc">
                  {{ Str::limit($item->description, 80) }}
                </div>

              </div>

            </div>

            <div class="gallery-date">
              {{ $item->event_date
            ? \Carbon\Carbon::parse($item->event_date)->format('Y-m-d')
            : '-' }}
            </div>

            <div class="gallery-action">

              <a href="{{ route('galeri.edit', $item->id) }}" class="btn-edit">
                Edit
              </a>

              <form id="delete-form-{{ $item->id }}" action="{{ route('galeri.destroy', $item->id) }}" method="POST"
                style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn-delete btn-hapus" data-id="{{ $item->id }}" data-title="{{ $item->title }}">
                  Hapus
                </button>
              </form>

            </div>

          </div>

        @endforeach

      </div>
    @else
      <div class="empty-state">
        <div class="ei">{{ "\u{1F5BC}\u{FE0F}" }}</div>
        <p>Tidak ada foto ditemukan. Coba upload foto baru.</p>
      </div>
    @endif

  </div>

  @push('scripts')

    <script src="{{ asset('js/Admin/GaleriIndex.js') }}"></script>

  @endpush
@endsection