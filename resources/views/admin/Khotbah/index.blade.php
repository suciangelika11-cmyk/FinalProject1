@extends('admin.layouts.main')

@push('styles')
<style>
  :root {
    --bg: #f4f6f9;
    --white: #ffffff;
    --border: #e4e8ef;
    --border2: #d0d7e3;
    --text: #1a2233;
    --muted: #7a8499;
    --cyan: #1da8e0;
    --cyan-dk: #0d85b5;
    --cyan-lt: #e8f6fd;
    --gold: #c89b3c;
    --gold-lt: #fdf6e3;
    --danger: #e05555;
    --danger-lt: #fdf0f0;
    --success: #2ea86a;
    --success-lt: #e8f7ef;
    --purple: #8b5cf6;
    --purple-lt: #f3f0ff;
    --orange: #f97316;
    --orange-lt: #fff4ed;
  }

  .content-header {
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:20px 28px 0;
  }

  .content-header h1 {
    font-family:'Rajdhani',sans-serif;
    font-size:22px;
    font-weight:700;
  }

  .breadcrumb {
    display:flex;
    align-items:center;
    gap:6px;
    font-size:12px;
    color:var(--muted);
  }

  .breadcrumb a {
    color:var(--cyan);
    text-decoration:none;
  }

  .content {
    padding:22px 28px 60px;
  }

  @keyframes fadeUp {
    from {
      opacity:0;
      transform:translateY(14px)
    }

    to {
      opacity:1;
      transform:translateY(0)
    }
  }

  .page-hero {
    position:relative;
    overflow:hidden;
    border-radius:16px;
    margin-bottom:24px;
    background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0);
    padding:34px 40px;
    box-shadow:0 6px 24px rgba(29,168,224,.25);
  }

  .page-hero::before {
    content:'';
    position:absolute;
    inset:0;
    background:
      radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%),
      radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%);
    pointer-events:none;
  }

  .hero-tag {
    display:inline-block;
    background:rgba(255,255,255,.2);
    border:1px solid rgba(255,255,255,.35);
    color:#fff;
    font-size:11px;
    font-weight:700;
    letter-spacing:1.2px;
    text-transform:uppercase;
    padding:4px 12px;
    border-radius:20px;
    margin-bottom:10px;
  }

  .page-hero h2 {
    font-family:'Rajdhani',sans-serif;
    font-size:26px;
    font-weight:700;
    color:#fff;
    margin-bottom:6px;
  }

  .page-hero p {
    color:rgba(255,255,255,.8);
    font-size:13.5px;
    max-width:520px;
    line-height:1.65;
  }

  .hero-actions {
    margin-top:18px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
  }

  .btn-hero-primary {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    background:#fff;
    color:var(--cyan);
    border:none;
    font-family:'Nunito',sans-serif;
    font-size:13px;
    font-weight:700;
    padding:9px 20px;
    border-radius:8px;
    cursor:pointer;
    transition:all .18s;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
  }

  .btn-hero-primary:hover {
    transform:translateY(-1px);
    box-shadow:0 6px 16px rgba(0,0,0,.15);
    color:var(--cyan);
  }

  .btn-hero-outline {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    background:rgba(255,255,255,.15);
    color:#fff;
    border:1px solid rgba(255,255,255,.4);
    font-family:'Nunito',sans-serif;
    font-size:13px;
    font-weight:700;
    padding:9px 20px;
    border-radius:8px;
    cursor:pointer;
    transition:all .18s;
  }

  .btn-hero-outline:hover {
    background:rgba(255,255,255,.25);
    color:#fff;
  }

  .stats-row {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    margin-bottom:22px;
  }

  .stat-card {
    background:var(--white);
    border:1px solid var(--border);
    border-radius:11px;
    padding:16px 18px;
    display:flex;
    align-items:center;
    gap:14px;
    box-shadow:0 1px 4px rgba(0,0,0,.04);
    animation:fadeUp .35s ease both;
  }

  .stat-card:nth-child(1) {
    animation-delay:.05s;
  }

  .stat-card:nth-child(2) {
    animation-delay:.10s;
  }

  .stat-card:nth-child(3) {
    animation-delay:.15s;
  }

  .stat-card:nth-child(4) {
    animation-delay:.20s;
  }

  .stat-icon {
    width:40px;
    height:40px;
    border-radius:9px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
  }

  .ic {
    background:var(--cyan-lt);
  }

  .ig {
    background:var(--gold-lt);
  }

  .is {
    background:var(--success-lt);
  }

  .ip {
    background:var(--purple-lt);
  }

  .stat-val {
    font-family:'Rajdhani',sans-serif;
    font-size:22px;
    font-weight:700;
    line-height:1;
  }

  .vc {
    color:var(--cyan);
  }

  .vg {
    color:var(--gold);
  }

  .vs {
    color:var(--success);
  }

  .vp {
    color:var(--purple);
  }

  .stat-lbl {
    font-size:11.5px;
    color:var(--muted);
    margin-top:3px;
  }

  .toolbar {
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin-bottom:20px;
    flex-wrap:wrap;
  }

  .toolbar-left {
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
  }

  .search-wrap {
    display:flex;
    align-items:center;
    background:var(--white);
    border:1px solid var(--border);
    border-radius:9px;
    overflow:hidden;
    box-shadow:0 1px 4px rgba(0,0,0,.04);
  }

  .search-wrap input {
    background:none;
    border:none;
    outline:none;
    color:var(--text);
    font-family:'Nunito',sans-serif;
    font-size:13px;
    padding:9px 14px;
    width:220px;
  }

  .search-wrap input::placeholder {
    color:#b0b8c9;
  }

  .search-wrap button {
    background:var(--cyan);
    border:none;
    color:#fff;
    padding:9px 14px;
    cursor:pointer;
    font-size:14px;
    transition:background .15s;
  }

  .search-wrap button:hover {
    background:var(--cyan-dk);
  }

  .add-btn {
    display:inline-flex;
    align-items:center;
    gap:7px;
    background:linear-gradient(135deg,var(--cyan),var(--cyan-dk));
    color:#fff;
    text-decoration:none;
    border:none;
    font-family:'Nunito',sans-serif;
    font-size:12.5px;
    font-weight:700;
    padding:9px 18px;
    border-radius:7px;
    cursor:pointer;
    transition:all .2s;
    box-shadow:0 3px 10px rgba(29,168,224,.25);
    white-space:nowrap;
  }

  .add-btn:hover {
    transform:translateY(-1px);
    box-shadow:0 6px 16px rgba(29,168,224,.35);
    color:#fff;
  }

  .khotbah-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
  }
</style>
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
      <a href="{{ route('khotbah.create') }}" class="btn-hero-primary">＋ Tambah Khotbah</a>
      <a href="{{ route('khotbah.create') }}" class="btn-hero-outline">🔗 Tambah Video</a>
    </div>
  </div>

  <div class="stats-row">
    <div class="stat-card"><div class="stat-icon ic">🎙</div><div><div class="stat-val vc">{{ $khotbah->count() }}</div><div class="stat-lbl">Total Khotbah</div></div></div>
    <div class="stat-card"><div class="stat-icon ig">📅</div><div><div class="stat-val vg">{{ $khotbah->whereNotNull('sermon_date')->count() }}</div><div class="stat-lbl">Ada sermon_date</div></div></div>
    <div class="stat-card"><div class="stat-icon is">🎥</div><div><div class="stat-val vs">{{ $khotbah->whereNotNull('video')->filter(fn($item) => !empty($item->video))->count() }}</div><div class="stat-lbl">Ada Video URL</div></div></div>
    <div class="stat-card"><div class="stat-icon ip">🖼</div><div><div class="stat-val vp">{{ $khotbah->whereNotNull('thumbnail')->filter(fn($item) => !empty($item->thumbnail))->count() }}</div><div class="stat-lbl">Ada Thumbnail</div></div></div>
  </div>

  <div class="toolbar">
    <div class="toolbar-left">
      <form method="GET" action="{{ route('khotbah.index') }}" class="search-wrap">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul khotbah...">
        <button type="submit">🔍</button>
      </form>
    </div>
    <a href="{{ route('khotbah.create') }}" class="add-btn">＋ Tambah Khotbah</a>
  </div>

  @if($khotbah->count())
    <div class="khotbah-grid">
      @foreach($khotbah as $item)
        <div class="kcard">
          <div class="kcard-thumb">
            @if($item->thumbnail)
              <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}">
            @endif
            <div class="play-ring"><div class="play-icon"></div></div>
            <div class="thumb-label">Video Khotbah</div>
            @if($item->video)
              <div class="duration-badge">▶ Video</div>
            @endif
          </div>

          <div class="kcard-body">
            <div class="kcard-title">{{ $item->title }}</div>
            <div class="kcard-date">📅 {{ $item->sermon_date ? \Carbon\Carbon::parse($item->sermon_date)->format('d M Y') : '-' }}</div>
            <div class="kcard-desc">{{ $item->description ?: '-' }}</div>

            <div class="kcard-actions">
              <a href="{{ route('khotbah.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

              <form action="{{ route('khotbah.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus khotbah ini?')">
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