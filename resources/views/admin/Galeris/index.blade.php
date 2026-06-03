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
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(20px)
      }
      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0
      }
      to {
        opacity: 1
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px)
      }
      to {
        opacity: 1;
        transform: translateX(0)
      }
    }

    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(30px)
      }
      to {
        opacity: 1;
        transform: translateX(0)
      }
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px)
      }
      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1)
      }
      50% {
        transform: scale(1.05)
      }
    }

    @keyframes glow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(29, 168, 224, .3)
      }
      50% {
        box-shadow: 0 0 30px rgba(29, 168, 224, .5)
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px)
      }
      50% {
        transform: translateY(-8px)
      }
    }

    @keyframes shimmer {
      0% {
        background-position: 0% 50%
      }
      100% {
        background-position: 100% 50%
      }
    }

    .content-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 28px 0;
    }

    .content-header h1 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--text);
      animation: slideInLeft .5s ease-out;
      letter-spacing: -0.5px;
    }

    .breadcrumb-bar {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      color: var(--muted);
      animation: fadeIn .5s ease-out .1s both;
    }

    .breadcrumb-bar a {
      color: var(--cyan);
      text-decoration: none;
      transition: all .2s;
      position: relative;
    }

    .breadcrumb-bar a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1.5px;
      background: var(--cyan);
      transition: width .3s;
    }

    .breadcrumb-bar a:hover::after {
      width: 100%;
    }

    .content {
      padding: 22px 28px 60px;
    }

    .page-hero {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      margin-bottom: 24px;
      background: linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
      padding: 40px 45px;
      box-shadow: 0 12px 40px rgba(29, 168, 224, .2), inset 0 1px 0 rgba(255, 255, 255, .2);
      animation: slideUp .6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .page-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255, 255, 255, .12) 0%, transparent 65%), radial-gradient(ellipse 35% 60% at 5% 90%, rgba(200, 155, 60, .18) 0%, transparent 55%);
      pointer-events: none;
      animation: float 6s ease-in-out infinite;
    }

    .page-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      pointer-events: none;
    }

    .hero-tag {
      display: inline-block;
      background: rgba(255, 255, 255, .15);
      border: 1px solid rgba(255, 255, 255, .4);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 20px;
      margin-bottom: 12px;
      animation: fadeIn .6s ease-out .2s both;
      backdrop-filter: blur(4px);
    }

    .page-hero h2 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 32px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 8px;
      animation: slideInLeft .6s ease-out .3s both;
      letter-spacing: -0.5px;
    }

    .page-hero p {
      color: rgba(255, 255, 255, .9);
      font-size: 14.5px;
      max-width: 580px;
      line-height: 1.7;
      animation: fadeIn .6s ease-out .4s both;
    }

    .hero-actions {
      margin-top: 20px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      animation: fadeUp .6s ease-out .5s both;
    }

    .btn-hero-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      background: #fff;
      color: var(--cyan);
      border: none;
      text-decoration: none;
      font-family: 'Nunito', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      padding: 11px 24px;
      border-radius: 9px;
      cursor: pointer;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      box-shadow: 0 4px 14px rgba(0, 0, 0, .12);
      position: relative;
      overflow: hidden;
    }

    .btn-hero-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(13, 133, 181, .1), transparent);
      opacity: 0;
      transition: opacity .3s;
    }

    .btn-hero-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, .18);
      color: var(--cyan-dk);
    }

    .btn-hero-primary:active {
      transform: translateY(-1px);
    }

    .btn-hero-outline {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(255, 255, 255, .1);
      color: #fff;
      border: 1.5px solid rgba(255, 255, 255, .4);
      font-family: 'Nunito', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      padding: 10px 24px;
      border-radius: 9px;
      cursor: pointer;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      backdrop-filter: blur(4px);
    }

    .btn-hero-outline:hover {
      background: rgba(255, 255, 255, .2);
      border-color: rgba(255, 255, 255, .6);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
    }

    .stats-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      margin-bottom: 28px;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
      animation: fadeUp .5s cubic-bezier(0.34, 1.56, 0.64, 1) both;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, currentColor, transparent);
      opacity: 0;
      transition: opacity .3s;
    }

    .stat-card:nth-child(1) { animation-delay: .08s }
    .stat-card:nth-child(2) { animation-delay: .12s }
    .stat-card:nth-child(3) { animation-delay: .16s }
    .stat-card:nth-child(4) { animation-delay: .20s }

    .stat-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, .12);
      border-color: var(--cyan-lt);
    }

    .stat-card:hover::before {
      opacity: 1;
    }

    .stat-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      transition: all .3s;
      animation: float 3s ease-in-out infinite;
      position: relative;
    }

    .stat-icon::before {
      content: '';
      position: absolute;
      inset: -2px;
      border-radius: 12px;
      opacity: 0;
      transition: opacity .3s;
    }

    .stat-card:hover .stat-icon {
      transform: scale(1.1) rotate(5deg);
    }

    .stat-card:hover .stat-icon::before {
      opacity: 1;
    }

    .ic { background: linear-gradient(135deg, var(--cyan-lt), #e0f2ff) }
    .ic::before { background: radial-gradient(circle, rgba(29, 168, 224, .2), transparent); }

    .ig { background: linear-gradient(135deg, var(--gold-lt), #fff8e1) }
    .ig::before { background: radial-gradient(circle, rgba(200, 155, 60, .2), transparent); }

    .is { background: linear-gradient(135deg, var(--success-lt), #e8fef1) }
    .is::before { background: radial-gradient(circle, rgba(46, 168, 106, .2), transparent); }

    .ip { background: linear-gradient(135deg, var(--purple-lt), #f5f0ff) }
    .ip::before { background: radial-gradient(circle, rgba(139, 92, 246, .2), transparent); }

    .stat-val {
      font-family: 'Rajdhani', sans-serif;
      font-size: 26px;
      font-weight: 700;
      line-height: 1;
      transition: all .3s;
    }

    .vc { color: var(--cyan) }
    .vg { color: var(--gold) }
    .vs { color: var(--success) }
    .vp { color: var(--purple) }

    .stat-lbl {
      font-size: 12px;
      color: var(--muted);
      margin-top: 4px;
      font-weight: 500;
    }

    .toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      margin-bottom: 24px;
      flex-wrap: wrap;
      animation: fadeUp .5s ease-out .25s both;
    }

    .toolbar-left {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    .search-wrap {
      display: flex;
      align-items: center;
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
      transition: all .3s;
    }

    .search-wrap:focus-within {
      border-color: var(--cyan);
      box-shadow: 0 4px 16px rgba(29, 168, 224, .15);
    }

    .search-wrap input {
      background: none;
      border: none;
      outline: none;
      color: var(--text);
      font-family: 'Nunito', sans-serif;
      font-size: 13px;
      padding: 11px 15px;
      width: 240px;
      transition: all .3s;
    }

    .search-wrap input::placeholder {
      color: #c0c8d9;
    }

    .search-wrap button {
      background: linear-gradient(135deg, var(--cyan), var(--cyan-dk));
      border: none;
      color: #fff;
      padding: 11px 14px;
      cursor: pointer;
      font-size: 14px;
      transition: all .3s;
      font-weight: 600;
    }

    .search-wrap button:hover {
      background: linear-gradient(135deg, var(--cyan-dk), #0a6fa3);
    }

    .add-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, var(--cyan), var(--cyan-dk));
      color: #fff;
      text-decoration: none;
      border: none;
      font-family: 'Nunito', sans-serif;
      font-size: 13px;
      font-weight: 700;
      padding: 11px 22px;
      border-radius: 9px;
      cursor: pointer;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      box-shadow: 0 4px 14px rgba(29, 168, 224, .3);
      white-space: nowrap;
      position: relative;
      overflow: hidden;
    }

    .add-btn::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent, rgba(255, 255, 255, .2), transparent);
      transform: translateX(-100%);
      transition: transform .5s;
    }

    .add-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(29, 168, 224, .4);
    }

    .add-btn:hover::before {
      transform: translateX(100%);
    }

    .add-btn:active {
      transform: translateY(0);
    }

    .masonry {
      columns: 3;
      column-gap: 18px;
    }

    .pcard {
      break-inside: avoid;
      display: block;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 18px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      cursor: pointer;
      position: relative;
      animation: fadeUp .5s ease-out both;
    }

    .pcard:nth-child(1) { animation-delay: .1s }
    .pcard:nth-child(2) { animation-delay: .15s }
    .pcard:nth-child(3) { animation-delay: .2s }
    .pcard:nth-child(4) { animation-delay: .25s }
    .pcard:nth-child(5) { animation-delay: .3s }
    .pcard:nth-child(6) { animation-delay: .35s }

    .pcard:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 40px rgba(0, 0, 0, .14), 0 0 1px rgba(29, 168, 224, .5);
      border-color: var(--cyan-lt);
    }

    .pcard:hover .pcard-actions {
      opacity: 1;
    }

    .pcard::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(29, 168, 224, .05), transparent);
      opacity: 0;
      transition: opacity .3s;
      pointer-events: none;
    }

    .pcard:hover::after {
      opacity: 1;
    }

    .pcard-img {
      width: 100%;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 260px;
      background: linear-gradient(135deg, #f5f7fa, #eef2f8);
    }

    .pcard-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform .4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .pcard:hover .pcard-img img {
      transform: scale(1.08) rotate(1deg);
    }

    .pcard-placeholder {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 64px;
      transition: all .4s cubic-bezier(0.34, 1.56, 0.64, 1);
      height: 100%;
      background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    }

    .pcard:hover .pcard-placeholder {
      transform: scale(1.12) rotate(-2deg);
    }

    .b-date {
      position: absolute;
      top: 12px;
      left: 12px;
      background: rgba(15, 22, 40, .75);
      backdrop-filter: blur(4px);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      padding: 5px 10px;
      border-radius: 7px;
      letter-spacing: .4px;
      animation: fadeIn .4s ease-out;
      border: 1px solid rgba(255, 255, 255, .2);
    }

    .pcard-actions {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(13, 21, 37, .88), rgba(13, 21, 37, .4), transparent);
      padding: 32px 14px 14px;
      display: flex;
      gap: 8px;
      justify-content: flex-end;
      opacity: 0;
      transition: opacity .3s;
    }

    .a-btn {
      border: none;
      border-radius: 7px;
      cursor: pointer;
      font-family: 'Nunito', sans-serif;
      font-size: 12px;
      font-weight: 700;
      padding: 7px 14px;
      transition: all .2s cubic-bezier(0.34, 1.56, 0.64, 1);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      position: relative;
      overflow: hidden;
    }

    .a-edit {
      background: rgba(255, 255, 255, .95);
      color: var(--text);
    }

    .a-edit::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(29, 168, 224, .1);
      transform: scaleX(0);
      transform-origin: right;
      transition: transform .3s;
    }

    .a-edit:hover {
      background: #fff;
      color: var(--cyan);
      box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
      transform: translateY(-2px);
    }

    .a-edit:hover::before {
      transform: scaleX(1);
    }

    .a-del {
      background: rgba(224, 85, 85, .9);
      color: #fff;
    }

    .a-del::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255, 255, 255, .1), transparent);
      opacity: 0;
      transition: opacity .3s;
    }

    .a-del:hover {
      background: var(--danger);
      box-shadow: 0 4px 12px rgba(224, 85, 85, .3);
      transform: translateY(-2px);
    }

    .a-del:hover::before {
      opacity: 1;
    }

    .pcard-body {
      padding: 14px 16px 16px;
      animation: slideUp .5s ease-out .3s both;
    }

    .pcard-title {
      font-family: 'Rajdhani', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
      line-height: 1.35;
      transition: color .3s;
    }

    .pcard:hover .pcard-title {
      color: var(--cyan);
    }

    .pcard-desc {
      font-size: 12.5px;
      color: var(--muted);
      line-height: 1.6;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      transition: color .3s;
    }

    .pcard:hover .pcard-desc {
      color: var(--text);
    }

    .empty-state {
      text-align: center;
      padding: 80px 30px;
      color: var(--muted);
      background: linear-gradient(135deg, var(--white), #f9fbfd);
      border: 2px dashed var(--border);
      border-radius: 16px;
      animation: fadeUp .5s ease-out;
    }

    .empty-state .ei {
      font-size: 64px;
      opacity: .25;
      margin-bottom: 16px;
      animation: float 4s ease-in-out infinite;
    }

    .empty-state p {
      font-size: 14px;
      line-height: 1.6;
    }

    @media(max-width:1100px) {
      .masonry {
        columns: 2;
      }
      .stats-row {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media(max-width:768px) {
      .masonry {
        columns: 1;
      }
      .stats-row {
        grid-template-columns: 1fr 1fr;
      }
      .content {
        padding: 14px 14px 60px;
      }
      .content-header {
        padding: 12px 14px 0;
      }
      .content-header h1 {
        font-size: 24px;
      }
      .page-hero {
        padding: 28px 24px;
      }
      .page-hero h2 {
        font-size: 24px;
      }
      .page-hero p {
        font-size: 13px;
      }
    }
  </style>
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
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // ===== CARD RIPPLE EFFECT =====
        const cards = document.querySelectorAll('.pcard, .stat-card');
        cards.forEach(card => {
          card.addEventListener('mousedown', function (e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255,255,255,.5)';
            ripple.style.pointerEvents = 'none';
            ripple.style.animation = 'ripple-effect .6s ease-out';
            ripple.style.transform = 'translate(-50%, -50%)';

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
          });
        });

        // ===== STAT NUMBERS COUNTER =====
        function animateCounter(element, target) {
          const start = 0;
          const duration = 1200;
          const startTime = performance.now();

          function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = Math.floor(progress * target);
            element.textContent = value;

            if (progress < 1) {
              requestAnimationFrame(update);
            }
          }

          requestAnimationFrame(update);
        }

        const statValues = document.querySelectorAll('.stat-val');
        let counterStarted = false;

        function handleCounterScroll() {
          if (counterStarted) return;

          const statsRow = document.querySelector('.stats-row');
          if (!statsRow) return;

          const rect = statsRow.getBoundingClientRect();
          if (rect.top < window.innerHeight * 0.8) {
            counterStarted = true;
            statValues.forEach(el => {
              const target = parseInt(el.textContent);
              animateCounter(el, target);
            });
            window.removeEventListener('scroll', handleCounterScroll);
          }
        }

        window.addEventListener('scroll', handleCounterScroll, { passive: true });
        handleCounterScroll();

        // ===== BUTTON HOVER EFFECT =====
        const buttons = document.querySelectorAll('.btn-hero-primary, .btn-hero-outline, .add-btn');
        buttons.forEach(btn => {
          btn.addEventListener('mousemove', function (e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) * 0.1;
            const rotateY = (centerX - x) * 0.1;

            this.style.transition = 'none';
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
          });

          btn.addEventListener('mouseleave', function () {
            this.style.transition = 'all .3s cubic-bezier(0.34, 1.56, 0.64, 1)';
            this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
          });
        });

        // ===== CARD IMAGE LAZY LOAD WITH ANIMATION =====
        const images = document.querySelectorAll('.pcard-img img');
        if ('IntersectionObserver' in window) {
          const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                const img = entry.target;
                img.style.opacity = '0';
                img.style.transition = 'opacity .5s ease-out';

                const src = img.src;
                const newImg = new Image();
                newImg.onload = function () {
                  img.src = src;
                  img.style.opacity = '1';
                };
                newImg.src = src;

                observer.unobserve(img);
              }
            });
          }, { rootMargin: '50px' });

          images.forEach(img => imageObserver.observe(img));
        }

        // ===== KEYBOARD NAVIGATION =====
        const cards_all = document.querySelectorAll('.pcard');
        let currentCardIndex = -1;

        document.addEventListener('keydown', function (e) {
          if (e.key === 'ArrowRight') {
            e.preventDefault();
            currentCardIndex = (currentCardIndex + 1) % cards_all.length;
            cards_all[currentCardIndex]?.focus();
            cards_all[currentCardIndex]?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            currentCardIndex = (currentCardIndex - 1 + cards_all.length) % cards_all.length;
            cards_all[currentCardIndex]?.focus();
            cards_all[currentCardIndex]?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          }
        });

        // ===== SEARCH BAR FOCUS ANIMATION =====
        const searchInput = document.querySelector('.search-wrap input');
        if (searchInput) {
          searchInput.addEventListener('focus', function () {
            this.parentElement.style.boxShadow = '0 8px 20px rgba(29, 168, 224, 0.2)';
          });
          searchInput.addEventListener('blur', function () {
            this.parentElement.style.boxShadow = '0 4px 16px rgba(29,168,224,.15)';
          });
        }

        // ===== SHARE BUTTON INTERACTION =====
        const shareBtn = document.querySelector('.btn-hero-outline');
        if (shareBtn) {
          shareBtn.addEventListener('click', function () {
            const text = 'Lihat koleksi foto galeri GBI Tambunan!';
            const url = window.location.href;

            if (navigator.share) {
              navigator.share({
                title: 'Galeri GBI Tambunan',
                text: text,
                url: url
              }).catch(err => console.log('Share error:', err));
            } else {
              alert('Salin link: ' + url);
            }
          });
        }
      });

      // ===== RIPPLE EFFECT ANIMATION =====
      const style = document.createElement('style');
      style.textContent = `
      @keyframes ripple-effect {
        0% {
          box-shadow: 0 0 0 0 rgba(255,255,255,.5);
          opacity: 1;
        }
        100% {
          box-shadow: 0 0 0 20px rgba(255,255,255,0);
          opacity: 0;
        }
      }
    `;
      document.head.appendChild(style);
    </script>
  @endpush
@endsection