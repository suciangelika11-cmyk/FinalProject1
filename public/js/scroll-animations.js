/**
 * Global Scroll Animations & Smooth Scroll Behavior
 * Applies smooth animations to all pages
 */

(function() {
    'use strict';

    // ===== INITIALIZATION =====
    const init = () => {
        setupSmoothScroll();
        setupScrollFadeInAnimation();
        setupPageLoadAnimation();
    };

    // ===== SMOOTH SCROLL BEHAVIOR =====
    const setupSmoothScroll = () => {
        // Handle all anchor links with smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    };

    // ===== FADE IN ON SCROLL ANIMATION =====
    const setupScrollFadeInAnimation = () => {
        const observerOptions = {
            threshold: [0, 0.1],
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
            observer.observe(el);
        });
    };

    // ===== PAGE LOAD ANIMATION =====
    const setupPageLoadAnimation = () => {
        // Fade in body content smoothly on page load
        const style = document.createElement('style');
        style.textContent = `
            body {
                animation: pageLoadFade 0.8s ease-out;
            }

            @keyframes pageLoadFade {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
    };

    // ===== PARALLAX SCROLL EFFECT =====
    const setupParallaxEffect = () => {
        const parallaxElements = document.querySelectorAll('[data-parallax]');
        
        if (parallaxElements.length === 0) return;

        window.addEventListener('scroll', () => {
            parallaxElements.forEach(element => {
                const scrollPosition = window.scrollY;
                const elementTop = element.getBoundingClientRect().top + scrollPosition;
                const speed = element.getAttribute('data-parallax') || 0.5;
                
                element.style.transform = `translateY(${(scrollPosition - elementTop) * speed}px)`;
            });
        }, { passive: true });
    };

    // ===== SCROLL DIRECTION DETECTION =====
    const setupScrollDirectionDetection = () => {
        let lastScrollTop = 0;
        const scrollThreshold = 5;

        window.scrollDirection = 'up';

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;

            if (Math.abs(scrollTop - lastScrollTop) < scrollThreshold) {
                return;
            }

            if (scrollTop > lastScrollTop) {
                window.scrollDirection = 'down';
            } else {
                window.scrollDirection = 'up';
            }

            lastScrollTop = scrollTop;
        }, { passive: true });
    };

    // ===== ELEMENT VISIBILITY UTILITY =====
    window.isElementInViewport = (el) => {
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.bottom >= 0
        );
    };

    // ===== CUSTOM SCROLL TO FUNCTION =====
    window.smoothScrollTo = (selector, offset = 0) => {
        const element = typeof selector === 'string' 
            ? document.querySelector(selector) 
            : selector;
        
        if (!element) return;

        const top = element.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({
            top: top,
            behavior: 'smooth'
        });
    };

    // ===== INITIALIZE WHEN DOM IS READY =====
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Setup additional effects
    setupParallaxEffect();
    setupScrollDirectionDetection();

})();
