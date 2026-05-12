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
    --success-lt:#e8f7ef;
    --purple: #8b5cf6;
    --purple-lt: #f3f0ff;
  }

  /* ===== ANIMATIONS ===== */

  @keyframes fadeUp {
    from {
      opacity:0;
      transform:translateY(20px)
    }

    to {
      opacity:1;
      transform:translateY(0)
    }
  }

  @keyframes fadeIn {
    from {
      opacity:0
    }

    to {
      opacity:1
    }
  }

  @keyframes slideInLeft {
    from {
      opacity:0;
      transform:translateX(-30px)
    }

    to {
      opacity:1;
      transform:translateX(0)
    }
  }

  @keyframes slideInRight {
    from {
      opacity:0;
      transform:translateX(30px)
    }

    to {
      opacity:1;
      transform:translateX(0)
    }
  }

  @keyframes slideUp {
    from {
      opacity:0;
      transform:translateY(30px)
    }

    to {
      opacity:1;
      transform:translateY(0)
    }
  }

  @keyframes pulse {
    0%, 100% {
      transform:scale(1)
    }

    50% {
      transform:scale(1.05)
    }
  }

  @keyframes glow {
    0%, 100% {
      box-shadow:0 0 20px rgba(29,168,224,.3)
    }

    50% {
      box-shadow:0 0 30px rgba(29,168,224,.5)
    }
  }

  @keyframes float {
    0%, 100% {
      transform:translateY(0px)
    }

    50% {
      transform:translateY(-8px)
    }
  }

  @keyframes shimmer {
    0% {
      background-position:0% 50%
    }

    100% {
      background-position:100% 50%
    }
  }

  .content-header {
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:20px 28px 0;
  }

  .content-header h1 {
    font-family:'Rajdhani',sans-serif;
    font-size:28px;
    font-weight:700;
    color:var(--text);
    animation:slideInLeft .5s ease-out;
    letter-spacing:-0.5px;
  }

  .breadcrumb-bar {
    display:flex;
    align-items:center;
    gap:6px;
    font-size:12px;
    color:var(--muted);
    animation:fadeIn .5s ease-out .1s both;
  }

  .breadcrumb-bar a {
    color:var(--cyan);
    text-decoration:none;
    transition:all .2s;
    position:relative;
  }

  .breadcrumb-bar a::after {
    content:'';
    position:absolute;
    bottom:-2px;
    left:0;
    width:0;
    height:1.5px;
    background:var(--cyan);
    transition:width .3s;
  }

  .breadcrumb-bar a:hover::after {
    width:100%;
  }

  .content {
    padding:22px 28px 60px;
  }

  .page-hero {
    position:relative;
    overflow:hidden;
    border-radius:16px;
    margin-bottom:24px;
    background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0);
    padding:40px 45px;
    box-shadow:0 12px 40px rgba(29,168,224,.2), inset 0 1px 0 rgba(255,255,255,.2);
    animation:slideUp .6s cubic-bezier(0.34, 1.56, 0.64, 1);
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
    <div class="hero-tag">🖼 Dokumentasi</div>
    <h2>Galeri & Dokumentasi Kegiatan</h2>
    <p>Abadikan setiap momen pelayanan, ibadah, dan kebersamaan jemaat GBI Tambunan.</p>
    <div class="hero-actions">
      <a href="{{ route('galeri.create') }}" class="btn-hero-primary">＋ Upload Foto</a>
      <button class="btn-hero-outline" type="button">📤 Bagikan Galeri</button>
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
        <div class="stat-lbl">Dengan Tanggal</div>
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

  <div class="toolbar">
    <div class="toolbar-left">
      <form method="GET" action="{{ route('galeri.index') }}" class="search-wrap">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Galeri...">
        <button type="submit">🔍</button>
      </form>
    </div>
    <a href="{{ route('galeri.create') }}" class="add-btn">＋ Upload Foto</a>
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

              <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus foto ini?')">
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
document.addEventListener('DOMContentLoaded', function() {
  // ===== CARD RIPPLE EFFECT =====
  const cards = document.querySelectorAll('.pcard, .stat-card');
  cards.forEach(card => {
    card.addEventListener('mousedown', function(e) {
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
    btn.addEventListener('mousemove', function(e) {
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
    
    btn.addEventListener('mouseleave', function() {
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
          newImg.onload = function() {
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
  
  document.addEventListener('keydown', function(e) {
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
    searchInput.addEventListener('focus', function() {
      this.parentElement.style.boxShadow = '0 8px 20px rgba(29, 168, 224, 0.2)';
    });
    searchInput.addEventListener('blur', function() {
      this.parentElement.style.boxShadow = '0 4px 16px rgba(29,168,224,.15)';
    });
  }

  // ===== SHARE BUTTON INTERACTION =====
  const shareBtn = document.querySelector('.btn-hero-outline');
  if (shareBtn) {
    shareBtn.addEventListener('click', function() {
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

  // ===== PARALLAX EFFECT ON SCROLL =====
  const hero = document.querySelector('.page-hero');
  if (hero) {
    window.addEventListener('scroll', function() {
      const scrollY = window.scrollY;
      const heroBefore = hero.querySelector('::before');
      if (heroBefore) {
        hero.style.transform = `translateY(${scrollY * 0.3}px)`;
      }
    }, { passive: true });
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