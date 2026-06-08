document.addEventListener('DOMContentLoaded', function () {
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
        card.addEventListener('mousemove', function (e) {
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

        card.addEventListener('mouseleave', function () {
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
        btn.addEventListener('mousedown', function (e) {
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

                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });

    // ===== LINK HOVER EFFECTS =====
    const links = document.querySelectorAll('.breadcrumb-bar a');
    links.forEach(link => {
        link.addEventListener('mouseenter', function () {
            this.style.color = 'var(--cyan-dk)';
        });
        link.addEventListener('mouseleave', function () {
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