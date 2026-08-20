<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTW — Reset Password</title>
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
                    Set new<br>
                    password
                </h1>
                <p>
                    Buat kata sandi baru yang kuat untuk
                    melindungi akun Anda.
                </p>
            </div>

            <!-- =========================
                 ILUSTRASI — KEY / SHIELD
            ========================== -->

            <div class="illustration">
                <svg viewBox="0 0 340 190" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <!-- Shadow -->
                    <ellipse cx="170" cy="170" rx="110" ry="10" fill="#E7EDFB" />

                    <!-- Shield -->
                    <path d="M170 25 L230 50 V105 C230 140 205 160 170 172 C135 160 110 140 110 105 V50 Z"
                          fill="#EAF0FF" stroke="#D6E1FA" stroke-width="1.5"/>

                    <!-- Check inside shield -->
                    <path d="M148 100 L162 114 L192 80"
                          stroke="#1E4FD6" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>

                    <!-- Key icon -->
                    <circle cx="80" cy="70" r="16" fill="#1E4FD6"/>
                    <rect x="88" y="66" width="30" height="8" rx="4" fill="#1E4FD6"/>
                    <rect x="108" y="74" width="8" height="10" rx="2" fill="#0B2E7A"/>
                    <rect x="116" y="74" width="8" height="8" rx="2" fill="#0B2E7A"/>

                    <!-- Decoration -->
                    <rect x="270" y="40" width="14" height="14" rx="4" fill="#F5851F" opacity="0.8"/>
                    <circle cx="60" cy="150" r="6" fill="#4C7AF0" opacity="0.6"/>
                    <circle cx="280" cy="140" r="5" fill="#F5851F" opacity="0.5"/>

                </svg>
            </div>

            <!-- STEPS INDICATOR -->
            <div class="steps-indicator">
                <div class="step-dot completed"></div>
                <div class="step-line completed"></div>
                <div class="step-dot completed"></div>
                <div class="step-line completed"></div>
                <div class="step-dot active"></div>
            </div>

        </div>


        <!-- =========================
             RIGHT PANEL
        ========================== -->

        <div class="right">

            <div class="right-inner">

                <h2>
                    Buat Password Baru
                </h2>

                <p class="sub">
                    Pastikan kata sandi baru Anda minimal 8 karakter dan mengandung kombinasi huruf &amp; angka.
                </p>

                <form id="resetForm" action="<?= base_url('forgot-password/reset') ?>" method="post">

                    <!-- NEW PASSWORD -->
                    <div class="field">
                        <label for="new_password">Password Baru</label>
                        <div class="pw-wrap">
                            <input
                                type="password"
                                id="new_password"
                                name="new_password"
                                placeholder="Masukkan password baru"
                                required
                                minlength="8"
                            >
                            <svg class="toggle-pw" viewBox="0 0 24 24" fill="none">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke="#111827" stroke-width="1.4"/>
                                <circle cx="12" cy="12" r="3" stroke="#111827" stroke-width="1.4"/>
                            </svg>
                        </div>
                    </div>

                    <!-- PASSWORD STRENGTH -->
                    <div class="pw-strength">
                        <div class="pw-strength-bar">
                            <div class="pw-strength-fill" id="pwStrengthFill"></div>
                        </div>
                        <span class="pw-strength-label" id="pwStrengthLabel"></span>
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="field">
                        <label for="confirm_password">Konfirmasi Password</label>
                        <div class="pw-wrap">
                            <input
                                type="password"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="Ulangi password baru"
                                required
                                minlength="8"
                            >
                            <svg class="toggle-pw" viewBox="0 0 24 24" fill="none">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke="#111827" stroke-width="1.4"/>
                                <circle cx="12" cy="12" r="3" stroke="#111827" stroke-width="1.4"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Password match indicator -->
                    <div class="pw-match" id="pwMatch" style="display:none;">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.4"/>
                            <path d="M8 12l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span id="pwMatchText"></span>
                    </div>

                    <!-- RESET BUTTON -->
                    <button class="btn-primary" type="submit" id="resetBtn">
                        Reset Password
                    </button>

                </form>

            </div>

        </div>

    </div>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
