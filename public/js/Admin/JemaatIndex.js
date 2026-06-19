function openModal(id) {
    document.getElementById('modal-' + id).style.display = 'flex';
}

function closeModal(id) {
    document.getElementById('modal-' + id).style.display = 'none';
}

window.onclick = function (event) {

    document.querySelectorAll('.detail-modal')
        .forEach(modal => {

            if (event.target === modal) {
                modal.style.display = 'none';
            }

        });
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-konfirmasi').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;
            const nama = this.dataset.nama;

            Swal.fire({
                title: '✝ Konfirmasi Jemaat?',
                html: `
                    <div style="font-size:15px;line-height:1.8">
                        Keluarga
                        <br>
                        <strong>${nama}</strong>
                        <br><br>
                        Akan ditandai sebagai jemaat yang telah dikonfirmasi.
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,

                confirmButtonText: '✅ Konfirmasi',
                cancelButtonText: 'Batal',

                customClass: {
                    popup: 'church-modal',
                    title: 'church-title',
                    confirmButton: 'church-confirm',
                    cancelButton: 'church-cancel'
                }

            }).then((result) => {

                if (result.isConfirmed) {

                    document
                        .getElementById('confirm-form-' + id)
                        .submit();

                }

            });

        });

    });

    document.querySelectorAll('.btn-hapus').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;

            Swal.fire({
                title: 'Hapus Jemaat?',
                html: `
                    <div style="margin-top:10px">
                        <p style="font-size:15px;color:#666">
                            Apakah Anda yakin ingin menghapus jemaat ini?
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