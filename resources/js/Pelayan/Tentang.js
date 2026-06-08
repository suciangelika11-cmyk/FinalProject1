const obs = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
        if (e.isIntersecting) {
            setTimeout(() => e.target.classList.add('visible'), i * 90);
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => obs.observe(el));