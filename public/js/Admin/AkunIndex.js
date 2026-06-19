document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-hapus').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;

            Swal.fire({
                title: 'Hapus Akun?',
                html: `
                    <div style="margin-top:10px">
                        <p style="font-size:15px;color:#666">
                            Apakah Anda yakin ingin menghapus akun ini?
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