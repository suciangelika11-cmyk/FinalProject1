document.addEventListener('DOMContentLoaded', function () {

    const kategori = document.getElementById('kategori');

    const hariGroup = document.getElementById('hari-group');
    const jamGroup = document.getElementById('jam-group');
    const jadwalKhusus = document.getElementById('jadwal-khusus-group');

    const hariField = document.querySelector('select[name="hari"]');
    const mulaiField = document.querySelector('input[name="jam_mulai"]');
    const selesaiField = document.querySelector('input[name="jam_selesai"]');

    function toggleForm() {

        if (kategori.value === 'acara_khusus') {

            hariGroup.style.display = 'none';
            jamGroup.style.display = 'none';
            jadwalKhusus.style.display = 'block';

            hariField.required = false;
            mulaiField.required = false;

        } else {

            hariGroup.style.display = 'block';
            jamGroup.style.display = 'flex';
            jadwalKhusus.style.display = 'none';

            hariField.required = true;
            mulaiField.required = true;
        }
    }

    toggleForm();

    kategori.addEventListener('change', toggleForm);

});