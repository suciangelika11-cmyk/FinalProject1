@extends('admin.layouts.main')

@push('styles')
<style>
  :root {
    --bg:#f4f6f9;
    --white:#ffffff;
    --border:#e4e8ef;
    --border2:#d0d7e3;
    --text:#1a2233;
    --muted:#7a8499;
    --cyan:#1da8e0;
    --cyan-dk:#0d85b5;
    --cyan-lt:#e8f6fd;
    --gold:#c89b3c;
    --gold-lt:#fdf6e3;
    --danger:#e05555;
    --danger-lt:#fdf0f0;
    --success:#2ea86a;
    --success-lt:#e8f7ef;
    --purple:#8b5cf6;
    --purple-lt:#f3f0ff;
  }

  /* ===== ANIMATIONS ===== */

  @keyframes fadeUp {
    from {
      opacity:0;
      transform:translateY(30px)
    }

    to {
      opacity:1;
      transform:translateY(0)
    }
  }

  @keyframes slideInLeft {
    from {
      opacity:0;
      transform:translateX(-40px)
    }

    to {
      opacity:1;
      transform:translateX(0)
    }
  }

  @keyframes slideInRight {
    from {
      opacity:0;
      transform:translateX(40px)
    }

    to {
      opacity:1;
      transform:translateX(0)
    }
  }

  @keyframes scaleIn {
    from {
      opacity:0;
      transform:scale(0.95)
    }

    to {
      opacity:1;
      transform:scale(1)
    }
  }

  @keyframes float {
    0%, 100% {
      transform:translateY(0px)
    }

    50% {
      transform:translateY(-10px)
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

  @keyframes borderGlow {
    0%, 100% {
      border-color:rgba(29,168,224,.3)
    }

    50% {
      border-color:rgba(29,168,224,.6)
    }
  }

  .content-header {
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:8px;
    padding:20px 28px 0;
    animation:slideInLeft .6s ease-out;
  }

  .content-header h1 {
    font-family:'Rajdhani',sans-serif;
    font-size:28px;
    font-weight:700;
    color:var(--text);
    letter-spacing:-0.5px;
  }

  .breadcrumb-bar {
    display:flex;
    align-items:center;
    gap:6px;
    font-size:12px;
    color:var(--muted);
    animation:fadeUp .5s ease-out .1s both;
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
    padding:28px 28px 80px;
  }

  .page-hero {
    position:relative;
    overflow:hidden;
    border-radius:18px;
    margin-bottom:32px;
    background:linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
    padding:42px 48px;
    box-shadow:0 12px 40px rgba(29,168,224,.2), inset 0 1px 0 rgba(255,255,255,.2);
    animation:slideInRight .7s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  .page-hero::before {
    content:'';
    position:absolute;
    inset:0;
    background:
      radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%),
      radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%);
    pointer-events:none;
    animation:float 6s ease-in-out infinite;
  }

  .page-hero::after {
    content:'';
    position:absolute;
    inset:0;
    background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events:none;
  }

  .hero-tag {
    display:inline-block;
    background:rgba(255,255,255,.15);
    border:1px solid rgba(255,255,255,.4);
    color:#fff;
    font-size:11px;
    font-weight:700;
    letter-spacing:1.2px;
    text-transform:uppercase;
    padding:6px 14px;
    border-radius:20px;
    margin-bottom:14px;
    animation:fadeUp .6s ease-out .2s both;
    backdrop-filter:blur(4px);
  }

  .page-hero h2 {
    font-family:'Rajdhani',sans-serif;
    font-size:36px;
    font-weight:700;
    color:#fff;
    margin-bottom:10px;
    animation:slideInLeft .6s ease-out .3s both;
    letter-spacing:-0.5px;
  }

  .page-hero p {
    color:rgba(255,255,255,.92);
    font-size:14.5px;
    max-width:580px;
    line-height:1.7;
    animation:fadeUp .6s ease-out .4s both;
  }

  .hero-actions {
    margin-top:20px;
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    animation:fadeUp .6s ease-out .5s both;
  }
</style>
@endpush

@section('content')

<div class="content-header">
  <h1>Tentang Kami</h1>
  <div class="breadcrumb-bar">
    <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Tentang Kami</span>
  </div>
</div>

<div class="content">
  <div class="page-hero">
    <div class="hero-tag">ℹ Halaman Publik</div>
    <h2>{{ $tentang->header_title ?? 'Data Tentang Gereja' }}</h2>
    <p>{{ $tentang->header_description ?? 'Kelola konten halaman Tentang Kami — sejarah, visi, misi, dan kepemimpinan gereja.' }}</p>
    <div class="hero-actions">
      @if($tentang)
        <a href="{{ route('tentang.edit', $tentang->id) }}" class="btn-hero-primary">✏ Edit Data</a>
        <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST" onsubmit="return confirm('Hapus data tentang?')" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-hero-outline" style="background:rgba(224,85,85,.18);">🗑 Hapus</button>
        </form>
      @else
        <a href="{{ route('tentang.create') }}" class="btn-hero-primary">＋ Tambah Data</a>
      @endif
    </div>
  </div>

  @if($tentang)
    <div class="section-head">
      <div class="section-title">📖 Sejarah Kami</div>
    </div>
    <div class="sejarah-card">
      <div class="sejarah-text">
        {!! nl2br(e($tentang->sejarah)) !!}
      </div>
    </div>

    <div class="section-head">
      <div class="section-title">✨ Visi & Misi</div>
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
      <div class="section-title">👤 Kepemimpinan</div>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  // ===== SCROLL REVEAL INTERSECTION OBSERVER =====
  const revealElements = document.querySelectorAll('.section-head, .sejarah-card, .vm-card, .leader-card');
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -80px 0px'
  };
  
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animation = `
          ${entry.target.classList.contains('section-head') ? 'slideInLeft' : 'fadeUp'} 
          .6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards
        `;
        entry.target.style.opacity = '0';
        entry.target.style.transform = entry.target.classList.contains('section-head') ? 'translateX(-40px)' : 'translateY(30px)';
        
        setTimeout(() => {
          entry.target.style.animation = `
            ${entry.target.classList.contains('section-head') ? 'slideInLeft' : 'fadeUp'} 
            .6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards
          `;
        }, 10);
        
        revealObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  revealElements.forEach(el => revealObserver.observe(el));

  // ===== CARD HOVER PARALLAX EFFECT =====
  const cards = document.querySelectorAll('.sejarah-card, .vm-card, .leader-card');
  
  cards.forEach(card => {
    card.addEventListener('mousemove', function(e) {
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = (y - centerY) * 0.05;
      const rotateY = (centerX - x) * 0.05;
      
      this.style.transition = 'none';
      this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transition = 'all .3s cubic-bezier(0.34, 1.56, 0.64, 1)';
      this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
    });
  });

  // ===== SECTION TITLE ANIMATION =====
  const sectionHeads = document.querySelectorAll('.section-head');
  sectionHeads.forEach((head, index) => {
    head.style.animation = `slideInLeft .6s cubic-bezier(0.34, 1.56, 0.64, 1) ${0.05 + (index * 0.15)}s both`;
  });

  // ===== BUTTON RIPPLE EFFECT =====
  const buttons = document.querySelectorAll('.btn-hero-primary, .btn-hero-outline, .edit-btn, .del-btn');
  
  buttons.forEach(btn => {
    btn.addEventListener('mousedown', function(e) {
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
      ripple.style.background = 'rgba(255,255,255,.6)';
      ripple.style.pointerEvents = 'none';
      ripple.style.animation = 'ripple-expand .6s ease-out';
      ripple.style.transform = 'translate(-50%, -50%)';
      
      this.style.position = 'relative';
      this.style.overflow = 'hidden';
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });

  // ===== FLOATING ANIMATION ON SCROLL =====
  let ticking = false;
  
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        const scrolled = window.scrollY;
        const heroBeforeEl = document.querySelector('.page-hero::before');
        
        // Parallax effect on hero
        const hero = document.querySelector('.page-hero');
        if (hero && scrolled < 500) {
          hero.style.transform = `translateY(${scrolled * 0.3}px)`;
        }
        
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });

  // ===== LINK HOVER EFFECTS =====
  const links = document.querySelectorAll('.breadcrumb-bar a');
  links.forEach(link => {
    link.addEventListener('mouseenter', function() {
      this.style.color = 'var(--cyan-dk)';
    });
    link.addEventListener('mouseleave', function() {
      this.style.color = 'var(--cyan)';
    });
  });

  // ===== SMOOTH SCROLL BEHAVIOR =====
  document.documentElement.style.scrollBehavior = 'smooth';
});

// ===== RIPPLE ANIMATION KEYFRAMES =====
const style = document.createElement('style');
style.textContent = `
  @keyframes ripple-expand {
    0% {
      box-shadow: 0 0 0 0 rgba(255,255,255,.6);
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