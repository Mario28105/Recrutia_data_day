document.addEventListener('DOMContentLoaded', function () {

    var navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 10);
        });
    }

    var togglePasswordBtn = document.getElementById('togglePassword');
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function () {
            var input = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');
            if (input && icon) {
                var visible = input.type === 'text';
                input.type = visible ? 'password' : 'text';
                icon.classList.toggle('fa-eye', visible);
                icon.classList.toggle('fa-eye-slash', !visible);
            }
        });
    }

});