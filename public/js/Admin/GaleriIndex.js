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

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-hapus').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;

            Swal.fire({
                title: 'Hapus Foto?',
                html: `
                    <div style="margin-top:10px">
                        <p style="font-size:15px;color:#666">
                            Apakah Anda yakin ingin menghapus foto ini?
                        </p>
                        <p style="font-size:14px;color:#999">
                            Tindakan ini membuat hapus permanen.
                        </p>
                    </div>
                `,
                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: `
                    <i class="ri-delete-bin-line"></i> OK
                `,

                cancelButtonText: `
                    <i class="ri-close-line"></i> Cancel
                `,

                reverseButtons: true,

                customClass: {
                    popup: 'church-modal',
                    title: 'church-title',
                    confirmButton: 'church-confirm',
                    cancelButton: 'church-cancel'
                }

            }).then((result) => {

                if (result.isConfirmed) {
                    document.getElementById(
                        'delete-form-' + id
                    ).submit();
                }

            });

        });

    });

});