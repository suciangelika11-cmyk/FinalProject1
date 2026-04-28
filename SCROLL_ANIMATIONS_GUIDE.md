# Panduan Scroll Animations & Navbar

Dokumentasi lengkap fitur scroll animations dan responsive navbar untuk GBI Tambunan website.

## 🎯 Fitur Utama

### 1. Responsive Navbar dengan Smooth Scroll Animation

#### Perilaku Navbar:
- **Saat di Top**: Navbar transparent (50% opacity) dengan blur effect
- **Saat Scroll Down**: Navbar tersembunyi dengan animasi slide up smooth
- **Saat Scroll Up**: Navbar muncul dengan animasi slide down smooth
- **Saat Ada Background**: Navbar menjadi lebih solid (98% opacity) dengan shadow effect

#### CSS Classes:
```css
.navbar               /* Base navbar styling */
.navbar.scrolled     /* Applied saat scroll > 50px */
.navbar.hidden       /* Applied saat scroll down */
.navbar.visible      /* Applied saat scroll up */
```

#### Teknologi:
- Menggunakan `requestAnimationFrame` untuk smooth 60fps animation
- Deteksi scroll velocity untuk natural feel
- Cubic-bezier easing: `cubic-bezier(0.175, 0.885, 0.32, 1.275)`

---

### 2. Scroll Reveal Animations

Elemen akan fade-in dengan berbagai animasi saat masuk ke viewport.

#### Tipe Animasi:

| Kelas | Efek | Durasi |
|-------|------|--------|
| `.scroll-reveal` | Fade in + slide up dari bawah | 0.8s |
| `.scroll-reveal-left` | Slide dari kiri + fade | 0.8s |
| `.scroll-reveal-right` | Slide dari kanan + fade | 0.8s |
| `.scroll-reveal-scale` | Scale up + fade | 0.8s |
| `.scroll-reveal-rotate` | Rotate + scale + fade | 0.8s |

#### Penggunaan:
```html
<!-- Simple fade in -->
<div class="scroll-reveal">Konten akan fade in</div>

<!-- Slide from left -->
<div class="scroll-reveal-left">Konten slide dari kiri</div>

<!-- Slide from right -->
<div class="scroll-reveal-right">Konten slide dari kanan</div>

<!-- Scale animation -->
<div class="scroll-reveal-scale">Konten scale up</div>

<!-- Rotate animation -->
<div class="scroll-reveal-rotate">Konten rotate + scale</div>
```

#### Stagger Delay (untuk multiple items):
```html
<div class="scroll-reveal">Item 1 (delay: 0s)</div>
<div class="scroll-reveal">Item 2 (delay: 0.15s)</div>
<div class="scroll-reveal">Item 3 (delay: 0.3s)</div>
<!-- ... dst -->
```

---

### 3. Global Scroll Animations

File: `public/js/scroll-animations.js`

#### Fitur:
- ✅ Smooth scroll behavior untuk semua links
- ✅ Fade-in on scroll utilities
- ✅ Parallax effect support
- ✅ Page load animations
- ✅ Scroll direction detection

#### Utility Classes:
```html
<!-- Fade in on scroll -->
<div class="fade-in-on-scroll">Konten fade in saat scroll</div>

<!-- Smooth transitions -->
<div class="smooth-transition">Smooth transition pada semua property</div>

<!-- Parallax effect -->
<div data-parallax="0.5">Parallax dengan kecepatan 0.5</div>
```

#### Utility Functions:

**1. Smooth Scroll to Element**
```javascript
// Menggunakan selector
smoothScrollTo('#section-id');

// Dengan offset (px)
smoothScrollTo('.target-element', 80);

// Menggunakan DOM element
const element = document.querySelector('.element');
smoothScrollTo(element, 100);
```

**2. Check Element Visibility**
```javascript
const element = document.querySelector('.element');
if (isElementInViewport(element)) {
    console.log('Element visible in viewport!');
}
```

**3. Scroll Direction Detection**
```javascript
window.addEventListener('scroll', () => {
    if (window.scrollDirection === 'down') {
        console.log('User scrolling down');
    } else {
        console.log('User scrolling up');
    }
});
```

---

## 📁 File Structure

```
ProjectAkhir-1/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php          (Navbar + scroll detection)
│       └── welcome.blade.php          (Scroll reveal animations)
├── public/
│   ├── css/
│   │   └── style.css                  (Global styles + animations)
│   └── js/
│       └── scroll-animations.js       (Global animation library)
└── SCROLL_ANIMATIONS_GUIDE.md         (This file)
```

---

## 🔧 Konfigurasi

### Navbar Scroll Behavior

Edit di `resources/views/layouts/app.blade.php`:

```javascript
// Ubah threshold untuk hide/show navbar
const hideThreshold = 100;  // Hide setelah scroll 100px

// Ubah velocity threshold untuk detection
const sensitivityFactor = 0.2;  // Lebih besar = lebih sensitif
```

### Animation Timing

Edit di `resources/views/welcome.blade.php`:

```css
/* Ubah durasi animasi */
.scroll-reveal.active {
    animation: revealUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    /* Ganti 0.8s dengan durasi yang diinginkan */
}

/* Ubah stagger delay */
.scroll-reveal:nth-child(2) { 
    animation-delay: 0.15s;  /* Ubah nilai ini */
}
```

---

## 🎨 Customization Examples

### 1. Mengubah Navbar Transparency

```css
/* File: resources/views/layouts/app.blade.php */

.navbar {
    background: rgba(255, 255, 255, 0.7) !important;  /* Ubah 0.7 untuk transparency */
}

.navbar.scrolled {
    background: rgba(255, 255, 255, 0.95) !important;  /* Ubah 0.95 */
}
```

### 2. Menambah Custom Animation

```html
<!-- HTML -->
<div class="my-custom-animation">Content</div>

<!-- CSS -->
<style>
    .my-custom-animation {
        opacity: 0;
        transform: translateY(20px);
    }

    .my-custom-animation.active {
        animation: customReveal 1s ease-out forwards;
    }

    @keyframes customReveal {
        0% {
            opacity: 0;
            transform: translateY(20px) rotateX(-10deg);
        }
        100% {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }
    }
</style>

<!-- JavaScript (di welcome.blade.php) -->
<script>
    // Tambah observer untuk custom animation
    const customObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.my-custom-animation').forEach(el => {
        customObserver.observe(el);
    });
</script>
```

### 3. Parallax Effect

```html
<!-- Tambah data-parallax attribute dengan speed value -->
<div data-parallax="0.3">Slow parallax</div>
<div data-parallax="0.5">Medium parallax</div>
<div data-parallax="0.8">Fast parallax</div>

<!-- Semakin tinggi nilai = semakin cepat bergerak -->
```

---

## ⚡ Performance Tips

1. **Limit Observer Threshold**: Gunakan threshold minimal untuk trigger animasi lebih cepat
2. **Avoid Heavy Animations**: Terlalu banyak animasi simultaneously akan membuat lag
3. **Use `will-change`**: Untuk elemen dengan animasi kompleks
   ```css
   .animating-element {
       will-change: transform, opacity;
   }
   ```
4. **Passive Event Listeners**: Sudah diimplementasikan untuk scroll events

---

## 🐛 Troubleshooting

### Navbar tidak hide saat scroll down
**Solusi**: Pastikan script sudah loaded dengan benar
```javascript
// Check di browser console
console.log(document.getElementById('mainNavbar'));
```

### Animasi tidak trigger
**Kemungkinan**:
1. Elemen belum masuk viewport
2. Intersection Observer tidak observe elemen
3. Browser tidak support animation

**Solusi**:
```javascript
// Debug di console
const elements = document.querySelectorAll('.scroll-reveal');
console.log('Found elements:', elements.length);
```

### Scroll performance buruk
**Solusi**:
1. Kurangi jumlah elemen dengan animasi
2. Gunakan `transform` dan `opacity` saja (GPU accelerated)
3. Hindari animasi pada `position`, `width`, `height`

---

## 📚 Browser Support

| Browser | Support | Notes |
|---------|---------|-------|
| Chrome | ✅ | Full support |
| Firefox | ✅ | Full support |
| Safari | ✅ | Full support |
| Edge | ✅ | Full support |
| IE 11 | ⚠️ | No smooth scroll |

---

## 🚀 Implementasi di Halaman Lain

### 1. Copy paste animations ke halaman baru

```blade
@extends('layouts.app')

@section('content')

<style>
    /* Copy paste dari welcome.blade.php */
    .scroll-reveal { ... }
    .scroll-reveal.active { ... }
</style>

<!-- Gunakan class di elemen -->
<div class="scroll-reveal">Content</div>

<script>
    // Copy paste observer setup dari welcome.blade.php
    document.addEventListener('DOMContentLoaded', function() { ... });
</script>

@endsection
```

### 2. Atau gunakan utility classes

```blade
<!-- Menggunakan global CSS classes -->
<div class="fade-in-on-scroll">Content</div>
<div class="smooth-transition">Content</div>

<!-- Script sudah auto-loaded dari app.blade.php -->
```

---

## 📞 Support

Jika ada pertanyaan atau bug, silakan:
1. Check troubleshooting section
2. Inspect elemen di browser DevTools
3. Check console untuk errors

---

**Last Updated**: April 23, 2026  
**Version**: 2.0  
**Project**: GBI Tambunan Website
