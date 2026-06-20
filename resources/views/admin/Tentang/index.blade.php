@extends('admin.layouts.main')

@push('styles')

  @include('admin.layouts.LOATentang.TentangIndex')

@endpush

@section('content')

  <div class="content-header">
    <h1>Tentang Kami</h1>
    <div class="breadcrumb-bar">
      <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Tentang</span>
    </div>
  </div>

  <div class="content">
    <div class="page-hero">
      <div class="hero-tag">ℹ Halaman Publik</div>
      <h2>{{ $tentang->header_title ?? 'Data Tentang Gereja' }}</h2>
      <p>
        {{ $tentang->header_description ?? 'Kelola konten halaman Tentang Kami — sejarah, visi, misi, dan kepemimpinan gereja.' }}
      </p>
      <div class="hero-actions">
        @if($tentang)
          <a href="{{ route('tentang.edit', $tentang->id) }}" class="btn-hero-primary">{{ "\u{270F}" }} Edit</a>

          <form id="delete-form-{{ $tentang->id }}" action="{{ route('tentang.destroy', $tentang->id) }}" method="POST"
            style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" class="btn-hero-outline btn-hapus" data-id="{{ $tentang->id }}"
              data-title="{{ $tentang->header_title ?? 'Tentang Kami' }}" style="background:rgba(224,85,85,.18);">
              {{ "\u{1F5D1}\u{FE0F}" }} Hapus
            </button>
          </form>
          
        @else
          <a href="{{ route('tentang.create') }}" class="btn-hero-primary">{{ "\u{2795}" }} Tambah</a>
        @endif
      </div>
    </div>

    @if($tentang)
      <div class="section-head">
        <div class="section-title">{{ "\u{1F4D6}" }} Sejarah Kami</div>
      </div>
      <div class="sejarah-card">
        <div class="sejarah-text">
          {!! nl2br(e($tentang->sejarah)) !!}
        </div>
      </div>

      <div class="section-head">
        <div class="section-title">{{ "\u{2728}" }} Visi & Misi</div>
      </div>
      <div class="vm-grid">
        <div class="vm-card">
          <div class="vm-title">Visi</div>
          <div class="vm-quote">{{ $tentang->visi }}</div>
        </div>
        <div class="vm-card">
          <div class="vm-title">Misi</div>
          <div class="vm-quote">{{ $tentang->misi }}</div>
        </div>
      </div>

      <div class="section-head">
        <div class="section-title">{{ "\u{1F464}" }} Kepemimpinan</div>
      </div>
      <div class="leader-grid">
        <div class="leader-card">
          <div class="leader-avatar">
            @if($tentang->gembala_foto)
              <img src="{{ asset('storage/' . $tentang->gembala_foto) }}" alt="{{ $tentang->gembala_nama }}">
            @else
              {{ strtoupper(substr($tentang->gembala_nama ?? 'G', 0, 2)) }}
            @endif
          </div>
          <div class="leader-name">{{ $tentang->gembala_nama }}</div>
          <div class="leader-role">{{ $tentang->gembala_jabatan ?: 'Pimpinan Gereja' }}</div>
          <div class="leader-desc">{{ $tentang->gembala_deskripsi ?: 'Belum ada deskripsi.' }}</div>
        </div>
      </div>
    @else
      <div class="empty-box">
        Belum ada data Tentang. Klik <strong>Tambah Data</strong> untuk mulai mengisi.
      </div>
    @endif

  </div>

  @push('scripts')

    <script src="{{ asset('js/Admin/TentangIndex.js') }}"></script>

  @endpush
@endsection