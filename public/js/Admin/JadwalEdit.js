document.addEventListener('DOMContentLoaded', function () {

    const kategori = document.getElementById('kategori');
    const hariGroup = document.getElementById('hari-group');
    const jamGroup = document.getElementById('jam-group');
    const jadwalKhusus = document.getElementById('jadwal-khusus-group');

    function toggleForm() {

        if (kategori.value === 'acara_khusus') {

            hariGroup.style.display = 'none';
            jamGroup.style.display = 'none';
            jadwalKhusus.style.display = 'block';

        } else {

            hariGroup.style.display = 'block';
            jamGroup.style.display = 'flex';
            jadwalKhusus.style.display = 'none';
        }
    }

    toggleForm();

    kategori.addEventListener('change', toggleForm);

});