const searchInput = document.getElementById('searchKhotbah');

searchInput.addEventListener('input', function () {

    const keyword = this.value.toLowerCase().trim();

    document.querySelectorAll('.kh-card').forEach(card => {

        const title = card.dataset.title;

        if (title.includes(keyword) || keyword === '') {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }

    });

});