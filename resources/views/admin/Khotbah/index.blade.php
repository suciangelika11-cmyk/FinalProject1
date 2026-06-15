@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAKhotbah.KhotbahIndex')

@endpush

@section('content')
  <div class="content-header">
    <h1>Khotbah</h1>
    <div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Home</a> / <span>Khotbah</span></div>
  </div>

  <div class="content">
    <div class="page-hero">
      <div class="hero-tag">🎙 Khotbah</div>
      <h2>Kelola Video Khotbah</h2>
      <p>Tambah, edit, dan kelola video khotbah jemaat GBI Tambunan.</p>
      <div class="hero-actions">
        <a href="{{ route('khotbah.create') }}" class="btn-hero-primary">＋ Tambah</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">🎙</div>
        <div>
          <div class="stat-val vc">{{ $khotbah->count() }}</div>
          <div class="stat-lbl">Total Khotbah</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">📅</div>
        <div>
          <div class="stat-val vg">{{ $khotbah->whereNotNull('sermon_date')->count() }}</div>
          <div class="stat-lbl">Ada sermon_date</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">🎥</div>
        <div>
          <div class="stat-val vs">
            {{ $khotbah->whereNotNull('video')->filter(fn($item) => !empty($item->video))->count() }}</div>
          <div class="stat-lbl">Ada Video URL</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ip">🖼</div>
        <div>
          <div class="stat-val vp">
            {{ $khotbah->whereNotNull('thumbnail')->filter(fn($item) => !empty($item->thumbnail))->count() }}</div>
          <div class="stat-lbl">Ada Thumbnail</div>
        </div>
      </div>
    </div>

    @if($khotbah->count())
      <div class="khotbah-grid">
        @foreach($khotbah as $item)
          <div class="kcard">
            <div class="kcard-thumb">
              @if($item->thumbnail)
                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}">
              @endif
              <div class="play-ring">
                <div class="play-icon"></div>
              </div>
              <div class="thumb-label">Video Khotbah</div>
              @if($item->video)
                <div class="duration-badge">▶ Video</div>
              @endif
            </div>

            <div class="kcard-body">
              <div class="kcard-title">{{ $item->title }}</div>
              <div class="kcard-date">📅
                {{ $item->sermon_date ? \Carbon\Carbon::parse($item->sermon_date)->format('d M Y') : '-' }}</div>
              <div class="kcard-desc">{{ $item->description ?: '-' }}</div>

              <div class="kcard-actions">
                <a href="{{ route('khotbah.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

                <form action="{{ route('khotbah.destroy', $item->id) }}" method="POST" style="display:inline;"
                  onsubmit="return confirm('Hapus khotbah ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="act-btn btn-del">🗑 Hapus</button>
                </form>

                @if($item->video)
                  <a href="{{ $item->video }}" target="_blank" class="act-btn btn-view">▶ Tonton</a>
                @else
                  <button class="act-btn btn-view" disabled style="opacity:.5;cursor:default;">Belum ada URL</button>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-state">
        <div class="e-ico">🎙</div>
        <p>Tidak ada khotbah ditemukan.</p>
      </div>
    @endif
  </div>
@endsection