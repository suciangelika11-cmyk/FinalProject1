document.addEventListener('DOMContentLoaded', function () {

    const category = document.getElementById('category');

    const hariGroup = document.getElementById('hari-group');
    const jamGroup = document.getElementById('jam-group');
    const jadwalKhusus = document.getElementById('jadwal-khusus-group');

    const dayField = document.querySelector('select[name="day"]');
    const startField = document.querySelector('input[name="start_time"]');
    const endField = document.querySelector('input[name="end_time"]');

    function toggleForm() {

        if (category.value === 'acara_khusus') {

            hariGroup.style.display = 'none';
            jamGroup.style.display = 'none';
            jadwalKhusus.style.display = 'block';

            dayField.required = false;
            startField.required = false;

        } else {

            hariGroup.style.display = 'block';
            jamGroup.style.display = 'flex';
            jadwalKhusus.style.display = 'none';

            dayField.required = true;
            startField.required = true;
        }
    }

    toggleForm();

    category.addEventListener('change', toggleForm);

});