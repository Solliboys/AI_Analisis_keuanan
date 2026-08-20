/* =========================================================
   PASSWORD SHOW / HIDE
========================================================= */

const passwordInput = document.querySelector(
    '.pw-wrap input[type="password"]'
);

const passwordIcon = document.querySelector('.pw-wrap svg');

if (passwordInput && passwordIcon) {

    passwordIcon.addEventListener('click', function () {

        if (passwordInput.type === 'password') {

            passwordInput.type = 'text';

            passwordIcon.style.opacity = '1';

        } else {

            passwordInput.type = 'password';

            passwordIcon.style.opacity = '0.5';

        }

    });

}


/* =========================================================
   REMEMBER ME
========================================================= */

const rememberCheckbox = document.getElementById('remember');

const emailInput = document.querySelector(
    '.field input[type="email"]'
);


/* Ambil email yang pernah disimpan */

const savedEmail = localStorage.getItem('rememberedEmail');

if (savedEmail && emailInput && rememberCheckbox) {

    emailInput.value = savedEmail;

    rememberCheckbox.checked = true;

}


/* =========================================================
   LOGIN BUTTON
========================================================= */

const loginButton = document.querySelector('.btn-primary');

if (loginButton) {

    loginButton.addEventListener('click', function (event) {

        event.preventDefault();

        const email = emailInput
            ? emailInput.value.trim()
            : '';

        const password = passwordInput
            ? passwordInput.value.trim()
            : '';


        /* Validasi email */

        if (email === '') {

            alert('Silakan masukkan email.');

            if (emailInput) {
                emailInput.focus();
            }

            return;
        }


        /* Validasi format email */

        const emailPattern =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {

            alert('Format email tidak valid.');

            if (emailInput) {
                emailInput.focus();
            }

            return;
        }


        /* Validasi password */

        if (password === '') {

            alert('Silakan masukkan password.');

            if (passwordInput) {
                passwordInput.focus();
            }

            return;
        }


        /* Remember Me */

        if (rememberCheckbox && rememberCheckbox.checked) {

            localStorage.setItem(
                'rememberedEmail',
                email
            );

        } else {

            localStorage.removeItem(
                'rememberedEmail'
            );

        }


        /*
         * Untuk sementara hanya simulasi login.
         * Nanti bagian ini bisa diganti dengan
         * request ke backend CI4.
         */

        alert('Login berhasil.');

    });

}


/* =========================================================
   GOOGLE LOGIN
========================================================= */

const googleButton = document.querySelector('.btn-google');

if (googleButton) {

    googleButton.addEventListener('click', function () {

        alert('Fitur login dengan Google belum terhubung.');

    });

}


/* =========================================================
   SIGN UP & SIGN IN
========================================================= */

const signupButton = document.getElementById('signupButton');

if (signupButton) {

    signupButton.addEventListener('click', function () {

        window.location.href = '/register';

    });

}

const signinButton = document.getElementById('signinButton');

if (signinButton) {

    signinButton.addEventListener('click', function () {

        window.location.href = '/';

    });

}


/* =========================================================
   ENTER KEY LOGIN
========================================================= */

document.addEventListener('keydown', function (event) {

    if (event.key === 'Enter') {

        const activeElement = document.activeElement;

        if (
            activeElement &&
            (
                activeElement.tagName === 'INPUT'
            )
        ) {

            if (loginButton) {
                loginButton.click();
            }

        }

    }

});