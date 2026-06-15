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
      <div class="hero-tag">{{ "\u{1F399}\u{FE0F}" }} Khotbah</div>
      <h2>Kelola Video Khotbah</h2>
      <p>Tambah, edit, dan kelola video khotbah jemaat GBI Tambunan.</p>
      <div class="hero-actions">
        <a href="{{ route('khotbah.create') }}" class="btn-hero-primary">{{ "\u{FF0B}" }} Tambah</a>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">{{ "\u{1F399}\u{FE0F}" }}</div>
        <div>
          <div class="stat-val vc">{{ $khotbah->count() }}</div>
          <div class="stat-lbl">Total Khotbah</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">{{ "\u{1F4C5}" }}</div>
        <div>
          <div class="stat-val vg">{{ $khotbah->whereNotNull('sermon_date')->count() }}</div>
          <div class="stat-lbl">Ada sermon_date</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">{{ "\u{1F3A5}" }}</div>
        <div>
          <div class="stat-val vs">
            {{ $khotbah->whereNotNull('video')->filter(fn($item) => !empty($item->video))->count() }}</div>
          <div class="stat-lbl">Ada Video URL</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ip">{{ "\u{1F5BC}\u{FE0F}" }}</div>
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
                <div class="duration-badge">{{ "\u{25B6}" }} Video</div>
              @endif
            </div>

            <div class="kcard-body">
              <div class="kcard-title">{{ $item->title }}</div>
              <div class="kcard-date">{{ "\u{1F4C5}" }}
                {{ $item->sermon_date ? \Carbon\Carbon::parse($item->sermon_date)->format('d M Y') : '-' }}</div>
              <div class="kcard-desc">{{ $item->description ?: '-' }}</div>

              <div class="kcard-actions">
                <a href="{{ route('khotbah.edit', $item->id) }}" class="act-btn btn-edit">{{ "\u{270F}\u{FE0F}" }} Edit</a>

                <form action="{{ route('khotbah.destroy', $item->id) }}" method="POST" style="display:inline;"
                  onsubmit="return confirm('Hapus khotbah ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="act-btn btn-del">{{ "\u{1F5D1}\u{FE0F}" }} Hapus</button>
                </form>

                @if($item->video)
                  <a href="{{ $item->video }}" target="_blank" class="act-btn btn-view">{{ "\u{25B6}" }} Tonton</a>
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
        <div class="e-ico"> {{ "\u{1F399}\u{FE0F}" }}</div>
        <p>Tidak ada khotbah ditemukan.</p>
      </div>
    @endif
  </div>
@endsection