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
        <a href="{{ route('galeri.create') }}" class="btn-hero-primary">＋ Upload Foto</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">🖼</div>
        <div>
          <div class="stat-val vc">{{ $galeri->count() }}</div>
          <div class="stat-lbl">Total Foto</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ig">📅</div>
        <div>
          <div class="stat-val vg">{{ $galeri->whereNotNull('event_date')->count() }}</div>
          <div class="stat-lbl">With Date</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon is">📝</div>
        <div>
          <div class="stat-val vs">{{ $galeri->filter(fn($item) => !empty($item->description))->count() }}</div>
          <div class="stat-lbl">Ada Deskripsi</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon ip">🆕</div>
        <div>
          <div class="stat-val vp">{{ $galeri->take(5)->count() }}</div>
          <div class="stat-lbl">Data Terbaru</div>
        </div>
      </div>
    </div>

    @if($galeri->count())
      <div class="masonry">
        @foreach($galeri as $item)
          <div class="pcard">
            <div class="pcard-img">
              @if($item->event_date)
                <div class="b-date">{{ \Carbon\Carbon::parse($item->event_date)->format('d M Y') }}</div>
              @endif

              @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
              @else
                <div class="pcard-placeholder" style="background:linear-gradient(135deg,#f3f4f6,#e5e7eb)">🖼</div>
              @endif

              <div class="pcard-actions" onclick="event.stopPropagation()">
                <a href="{{ route('galeri.edit', $item->id) }}" class="a-btn a-edit">✏ Edit</a>

                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" style="display:inline;"
                  onsubmit="return confirm('Hapus foto ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="a-btn a-del">🗑 Hapus</button>
                </form>
              </div>
            </div>

            <div class="pcard-body">
              <div class="pcard-title">{{ $item->title }}</div>
              <div class="pcard-desc">{{ $item->description ?: '-' }}</div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-state">
        <div class="ei">🖼</div>
        <p>Tidak ada foto ditemukan. Coba upload foto baru.</p>
      </div>
    @endif

  </div>

  @push('scripts')
<script src="{{ asset('js/Admin/GaleriIndex.js') }}"></script>
  @endpush
@endsection