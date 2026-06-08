document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.password-toggle').forEach(button => {

        button.addEventListener('click', function () {

            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';

                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';

                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }

        });

    });

});