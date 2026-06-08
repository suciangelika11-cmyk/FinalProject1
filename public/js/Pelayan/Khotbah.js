const searchInput = document.getElementById('searchKhotbah');

document.querySelectorAll('.khotbah-card').forEach(card => {
    card._title = card.dataset.title || '';
});

searchInput.addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('.khotbah-card').forEach(card => {
        card.style.display = (!q || card._title.includes(q)) ? '' : 'none';
    });
});