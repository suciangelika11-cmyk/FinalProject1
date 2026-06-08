function gLightbox(src, title, desc) {
    if (!src) return;

    document.getElementById('gLbImg').src = src;
    document.getElementById('gLbTitle').textContent = title || '';
    document.getElementById('gLbDesc').textContent = desc || '';

    document.getElementById('gLightboxEl').classList.add('open');

    document.body.style.overflow = 'hidden';
}

function gClose() {
    document.getElementById('gLightboxEl').classList.remove('open');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        gClose();
    }
});