<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTW — Forgot Password</title>
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
                    Forgot your<br>
                    password?
                </h1>
                <p>
                    Jangan khawatir, kami akan membantu Anda
                    mengatur ulang kata sandi melalui email.
                </p>
            </div>

            <!-- =========================
                 ILUSTRASI — LOCK
            ========================== -->

            <div class="illustration">
                <svg viewBox="0 0 340 190" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <!-- Shadow -->
                    <ellipse cx="170" cy="170" rx="110" ry="10" fill="#E7EDFB" />

                    <!-- Lock body -->
                    <rect x="120" y="80" width="100" height="78" rx="16" fill="#EAF0FF" stroke="#D6E1FA" stroke-width="1.5"/>

                    <!-- Lock shackle -->
                    <path d="M145 80 V60 C145 42 160 30 170 30 C180 30 195 42 195 60 V80"
                          stroke="#1E4FD6" stroke-width="6" stroke-linecap="round" fill="none"/>

                    <!-- Keyhole circle -->
                    <circle cx="170" cy="112" r="12" fill="#1E4FD6"/>

                    <!-- Keyhole line -->
                    <rect x="167" y="118" width="6" height="18" rx="3" fill="#1E4FD6"/>

                    <!-- Decoration -->
                    <rect x="60" y="40" width="14" height="14" rx="4" fill="#F5851F" opacity="0.8"/>
                    <circle cx="280" cy="60" r="6" fill="#4C7AF0" opacity="0.6"/>
                    <circle cx="90" cy="150" r="5" fill="#F5851F" opacity="0.5"/>
                    <rect x="260" y="140" width="10" height="10" rx="3" fill="#1E4FD6" opacity="0.3"/>

                </svg>
            </div>

            <!-- STEPS INDICATOR -->
            <div class="steps-indicator">
                <div class="step-dot active"></div>
                <div class="step-line"></div>
                <div class="step-dot"></div>
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
                <a href="<?= base_url('/') ?>" class="back-link">
                    <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
                        <path d="M15 18l-6-6 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Kembali ke login
                </a>

                <h2>
                    Reset Password
                </h2>

                <p class="sub">
                    Masukkan email terdaftar Anda. Kami akan mengirimkan kode OTP untuk verifikasi.
                </p>

                <!-- EMAIL -->
                <form id="forgotForm" action="<?= base_url('forgot-password/send-otp') ?>" method="post">

                    <div class="field">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email terdaftar"
                            required
                        >
                    </div>

                    <!-- SEND OTP BUTTON -->
                    <button class="btn-primary" type="submit" id="sendOtpBtn">
                        <span class="btn-text">Kirim Kode OTP</span>
                        <span class="btn-loading" style="display:none;">
                            <svg class="spinner" viewBox="0 0 24 24" width="20" height="20">
                                <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.3)" stroke-width="3" fill="none"/>
                                <path d="M12 2 A10 10 0 0 1 22 12" stroke="#fff" stroke-width="3" stroke-linecap="round" fill="none"/>
                            </svg>
                            Mengirim...
                        </span>
                    </button>

                </form>

                <!-- Info -->
                <div class="info-box">
                    <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                        <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.5)" stroke-width="1.4"/>
                        <path d="M12 8v4M12 16h.01" stroke="rgba(255,255,255,0.5)" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                    <span>Kode OTP akan dikirim ke email Anda dan berlaku selama 5 menit.</span>
                </div>

            </div>

        </div>

    </div>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
