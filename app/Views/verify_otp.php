<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTW — Verifikasi OTP</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <div class="card">

        <!-- =========================
             LEFT PANEL
        ========================== -->

        <div class="left">

            <!-- BRAND -->
            <div class="brand">
                <div class="brand-mark">
                    <img
                        src="<?= base_url('assets/img/logo.png') ?>"
                        alt="Peppo Logo"
                        class="logo-img"
                    >
                </div>
                <div>
                    <div class="brand-name">OTW</div>
                    <div class="brand-tag">CREDIT ANALYSIS SYSTEM</div>
                </div>
            </div>

            <div class="headline">
                <h1>
                    Verify<br>
                    your email
                </h1>
                <p>
                    Kami telah mengirimkan kode verifikasi 6 digit
                    ke alamat email Anda.
                </p>
            </div>

            <!-- =========================
                 ILUSTRASI — EMAIL / OTP
            ========================== -->

            <div class="illustration">
                <svg viewBox="0 0 340 190" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <!-- Shadow -->
                    <ellipse cx="170" cy="170" rx="110" ry="10" fill="#E7EDFB" />

                    <!-- Envelope body -->
                    <rect x="90" y="60" width="160" height="100" rx="14" fill="#EAF0FF" stroke="#D6E1FA" stroke-width="1.5"/>

                    <!-- Envelope flap -->
                    <path d="M90 74 L170 120 L250 74" stroke="#1E4FD6" stroke-width="2" fill="none" stroke-linejoin="round"/>

                    <!-- Shield / check badge -->
                    <circle cx="240" cy="60" r="22" fill="#1E4FD6"/>
                    <path d="M231 60 L237 66 L250 52" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>

                    <!-- OTP digits suggestion -->
                    <rect x="115" y="112" width="22" height="28" rx="5" fill="#fff" stroke="#D6E1FA" stroke-width="1"/>
                    <rect x="143" y="112" width="22" height="28" rx="5" fill="#fff" stroke="#D6E1FA" stroke-width="1"/>
                    <rect x="171" y="112" width="22" height="28" rx="5" fill="#fff" stroke="#D6E1FA" stroke-width="1"/>
                    <rect x="199" y="112" width="22" height="28" rx="5" fill="#fff" stroke="#D6E1FA" stroke-width="1"/>

                    <!-- Decoration -->
                    <rect x="50" y="50" width="14" height="14" rx="4" fill="#F5851F" opacity="0.8"/>
                    <circle cx="290" cy="90" r="6" fill="#4C7AF0" opacity="0.6"/>
                    <circle cx="70" cy="150" r="5" fill="#F5851F" opacity="0.5"/>

                </svg>
            </div>

            <!-- STEPS INDICATOR -->
            <div class="steps-indicator">
                <div class="step-dot completed"></div>
                <div class="step-line completed"></div>
                <div class="step-dot active"></div>
                <div class="step-line"></div>
                <div class="step-dot"></div>
            </div>

        </div>


        <!-- =========================
             RIGHT PANEL
        ========================== -->

        <div class="right">

            <div class="right-inner">

                <!-- Back link -->
                <a href="<?= base_url('forgot-password') ?>" class="back-link">
                    <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
                        <path d="M15 18l-6-6 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Kembali
                </a>

                <h2>
                    Masukkan Kode OTP
                </h2>

                <p class="sub">
                    Kode verifikasi telah dikirim ke
                    <strong><?= esc(session('forgot_email') ?? 'email Anda') ?></strong>
                </p>

                <!-- OTP INPUT -->
                <form id="otpForm" action="<?= base_url('forgot-password/verify-otp') ?>" method="post">

                    <div class="otp-container">
                        <input type="text" class="otp-input" maxlength="1" data-index="0" autofocus inputmode="numeric" pattern="[0-9]">
                        <input type="text" class="otp-input" maxlength="1" data-index="1" inputmode="numeric" pattern="[0-9]">
                        <input type="text" class="otp-input" maxlength="1" data-index="2" inputmode="numeric" pattern="[0-9]">
                        <input type="text" class="otp-input" maxlength="1" data-index="3" inputmode="numeric" pattern="[0-9]">
                        <input type="text" class="otp-input" maxlength="1" data-index="4" inputmode="numeric" pattern="[0-9]">
                        <input type="text" class="otp-input" maxlength="1" data-index="5" inputmode="numeric" pattern="[0-9]">
                    </div>

                    <!-- Hidden input for full OTP -->
                    <input type="hidden" name="otp" id="otpHidden">

                    <!-- Timer -->
                    <div class="otp-timer">
                        <svg viewBox="0 0 24 24" fill="none" width="14" height="14">
                            <circle cx="12" cy="12" r="9" stroke="rgba(255,255,255,0.5)" stroke-width="1.4"/>
                            <path d="M12 7v5l3 3" stroke="rgba(255,255,255,0.5)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Kode berlaku <strong id="otpCountdown">05:00</strong></span>
                    </div>

                    <!-- VERIFY BUTTON -->
                    <button class="btn-primary" type="submit" id="verifyOtpBtn">
                        Verifikasi Kode
                    </button>

                </form>

                <!-- Resend -->
                <div class="resend-section">
                    Tidak menerima kode?
                    <button type="button" class="resend-btn" id="resendBtn" disabled>
                        Kirim Ulang
                    </button>
                </div>

            </div>

        </div>

    </div>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
