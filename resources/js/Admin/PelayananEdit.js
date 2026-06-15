const pilihKategori = document.getElementById('pilih-kategori');
const formKepemimpinan = document.getElementById('form-kepemimpinan');
const formTim = document.getElementById('form-tim');
const formAksi = document.getElementById('form-aksi');

pilihKategori.addEventListener('change', function () {
    formKepemimpinan.style.display = 'none';
    formTim.style.display = 'none';
    formAksi.style.display = 'none';

    if (this.value === 'kepemimpinan') {
        formKepemimpinan.style.display = 'block';
    }

    if (this.value === 'tim') {
        formTim.style.display = 'block';
    }

    if (this.value === 'aksi') {
        formAksi.style.display = 'block';
    }
});

document.addEventListener('click', function (e) {

    if (e.target && e.target.id === 'tambah-anggota') {

        const wrapper = document.getElementById('anggota-wrapper');
        const jumlahAnggota = document.querySelectorAll('input[name="anggota_nama[]"]').length;

        console.log('Jumlah anggota:', jumlahAnggota);
        
        if (jumlahAnggota >= 10) {
            alert('Maksimal 10 anggota.');
            return;
        }

        const item = document.createElement('div');

        item.className = 'form-row-2 anggota-item';
        item.style.marginBottom = '10px';

        item.innerHTML = `
            <input type="text"
                name="anggota_nama[]"
                placeholder="Nama anggota"
                maxlength="100">

            <input type="text"
                name="anggota_bagian[]"
                placeholder="Bagian / jabatan"
                maxlength="100">
        `;

        wrapper.appendChild(item);
    }
});