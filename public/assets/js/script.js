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
   MULTIPLE PASSWORD TOGGLE (Reset Password Page)
========================================================= */

const togglePwButtons = document.querySelectorAll('.toggle-pw');

togglePwButtons.forEach(function (btn) {

    btn.addEventListener('click', function () {

        const input = btn.parentElement.querySelector('input');

        if (input) {

            if (input.type === 'password') {
                input.type = 'text';
                btn.style.opacity = '1';
            } else {
                input.type = 'password';
                btn.style.opacity = '0.5';
            }

        }

    });

});


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

/* Hanya jalankan di halaman login (tidak ada form forgot/otp/reset) */
const isForgotPage = document.getElementById('forgotForm');
const isOtpPage = document.getElementById('otpForm');
const isResetPage = document.getElementById('resetForm');

if (loginButton && !isForgotPage && !isOtpPage && !isResetPage) {

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
         * Validasi sukses, submit form ke backend
         */
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            loginForm.submit();
        } else {
            alert('Form login tidak ditemukan.');
        }

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
            ) &&
            !isForgotPage && !isOtpPage && !isResetPage
        ) {

            if (loginButton) {
                loginButton.click();
            }

        }

    }

});


/* =========================================================
   OTP INPUT HANDLING
========================================================= */

const otpInputs = document.querySelectorAll('.otp-input');
const otpHidden = document.getElementById('otpHidden');

if (otpInputs.length > 0) {

    otpInputs.forEach(function (input, index) {

        /* Hanya terima angka */
        input.addEventListener('input', function (e) {

            const value = e.target.value.replace(/[^0-9]/g, '');
            e.target.value = value;

            if (value) {
                input.classList.add('filled');

                /* Pindah ke input berikutnya */
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            } else {
                input.classList.remove('filled');
            }

            /* Update hidden input */
            updateOtpHidden();

        });


        /* Backspace: kembali ke input sebelumnya */
        input.addEventListener('keydown', function (e) {

            if (e.key === 'Backspace' && !input.value && index > 0) {
                otpInputs[index - 1].focus();
                otpInputs[index - 1].value = '';
                otpInputs[index - 1].classList.remove('filled');
                updateOtpHidden();
            }

        });


        /* Paste support */
        input.addEventListener('paste', function (e) {

            e.preventDefault();

            const pasteData = (e.clipboardData || window.clipboardData)
                .getData('text')
                .replace(/[^0-9]/g, '')
                .slice(0, 6);

            pasteData.split('').forEach(function (char, i) {
                if (otpInputs[i]) {
                    otpInputs[i].value = char;
                    otpInputs[i].classList.add('filled');
                }
            });

            /* Focus ke input terakhir yang terisi */
            const lastIndex = Math.min(pasteData.length, otpInputs.length) - 1;
            if (lastIndex >= 0) {
                otpInputs[lastIndex].focus();
            }

            updateOtpHidden();

        });

    });

}

function updateOtpHidden() {

    if (!otpHidden) return;

    let otp = '';

    otpInputs.forEach(function (input) {
        otp += input.value;
    });

    otpHidden.value = otp;

}


/* =========================================================
   OTP COUNTDOWN TIMER
========================================================= */

const countdownEl = document.getElementById('otpCountdown');
const resendBtn = document.getElementById('resendBtn');

if (countdownEl) {

    let timeLeft = 300; /* 5 menit */

    const countdownInterval = setInterval(function () {

        timeLeft--;

        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        countdownEl.textContent =
            String(minutes).padStart(2, '0') + ':' +
            String(seconds).padStart(2, '0');

        if (timeLeft <= 0) {

            clearInterval(countdownInterval);

            countdownEl.textContent = '00:00';

            if (resendBtn) {
                resendBtn.disabled = false;
            }

        }

    }, 1000);

}

/* Resend OTP */
if (resendBtn) {

    resendBtn.addEventListener('click', function () {

        /* TODO: Logic kirim ulang OTP */
        alert('Kode OTP baru telah dikirim.');

        resendBtn.disabled = true;

        /* Reset timer */
        if (countdownEl) {

            let timeLeft = 300;

            const newInterval = setInterval(function () {

                timeLeft--;

                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;

                countdownEl.textContent =
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0');

                if (timeLeft <= 0) {

                    clearInterval(newInterval);
                    countdownEl.textContent = '00:00';
                    resendBtn.disabled = false;

                }

            }, 1000);

        }

    });

}


/* =========================================================
   PASSWORD STRENGTH METER
========================================================= */

const newPasswordInput = document.getElementById('new_password');
const pwStrengthFill = document.getElementById('pwStrengthFill');
const pwStrengthLabel = document.getElementById('pwStrengthLabel');

if (newPasswordInput && pwStrengthFill && pwStrengthLabel) {

    newPasswordInput.addEventListener('input', function () {

        const val = newPasswordInput.value;
        let score = 0;

        if (val.length >= 8) score++;
        if (val.length >= 12) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        const levels = [
            { width: '0%',   color: 'transparent',  label: '' },
            { width: '20%',  color: '#ef4444',       label: 'Lemah' },
            { width: '40%',  color: '#f97316',       label: 'Cukup' },
            { width: '60%',  color: '#eab308',       label: 'Sedang' },
            { width: '80%',  color: '#22c55e',       label: 'Kuat' },
            { width: '100%', color: '#16a34a',       label: 'Sangat Kuat' }
        ];

        const level = levels[score] || levels[0];

        pwStrengthFill.style.width = level.width;
        pwStrengthFill.style.background = level.color;
        pwStrengthLabel.textContent = level.label;
        pwStrengthLabel.style.color = level.color;

        /* Check match juga */
        checkPasswordMatch();

    });

}


/* =========================================================
   PASSWORD MATCH CHECK
========================================================= */

const confirmPasswordInput = document.getElementById('confirm_password');
const pwMatchEl = document.getElementById('pwMatch');
const pwMatchText = document.getElementById('pwMatchText');

function checkPasswordMatch() {

    if (!confirmPasswordInput || !pwMatchEl || !pwMatchText || !newPasswordInput) return;

    const newPw = newPasswordInput.value;
    const confirmPw = confirmPasswordInput.value;

    if (confirmPw === '') {
        pwMatchEl.style.display = 'none';
        return;
    }

    pwMatchEl.style.display = 'flex';

    if (newPw === confirmPw) {
        pwMatchEl.className = 'pw-match match';
        pwMatchText.textContent = 'Password cocok';
    } else {
        pwMatchEl.className = 'pw-match mismatch';
        pwMatchText.textContent = 'Password tidak cocok';
    }

}

if (confirmPasswordInput) {

    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

}


/* =========================================================
   RESET FORM VALIDATION
========================================================= */

const resetForm = document.getElementById('resetForm');

if (resetForm) {

    resetForm.addEventListener('submit', function (e) {

        const newPw = newPasswordInput ? newPasswordInput.value : '';
        const confirmPw = confirmPasswordInput ? confirmPasswordInput.value : '';

        if (newPw.length < 8) {
            e.preventDefault();
            alert('Password minimal 8 karakter.');
            if (newPasswordInput) newPasswordInput.focus();
            return;
        }

        if (newPw !== confirmPw) {
            e.preventDefault();
            alert('Konfirmasi password tidak cocok.');
            if (confirmPasswordInput) confirmPasswordInput.focus();
            return;
        }

    });

}