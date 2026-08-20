<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTW — Sign in</title>

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
                    <div class="brand-name">
                        OTW
                    </div>

                    <div class="brand-tag">
                        CREDIT ANALYSIS SYSTEM
                    </div>
                </div>

            </div>


        
            <div class="headline">

                <h1>
                    Hello,<br>
                    welcome!
                </h1>

                <p>
                    Silakan masuk untuk melanjutkan ke akun Anda
                    dan kelola proses pengajuan kredit.
                </p>

            </div>


            <!-- =========================
                 ILUSTRASI
            ========================== -->

            <div class="illustration">

                <svg
                    viewBox="0 0 340 190"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >

                    <!-- Shadow -->
                    <ellipse
                        cx="170"
                        cy="168"
                        rx="140"
                        ry="10"
                        fill="#E7EDFB"
                    />

                    <!-- Dashboard -->
                    <rect
                        x="46"
                        y="52"
                        width="200"
                        height="106"
                        rx="14"
                        fill="#EAF0FF"
                        stroke="#D6E1FA"
                        stroke-width="1.5"
                    />

                    <!-- Dashboard text -->
                    <rect
                        x="62"
                        y="70"
                        width="90"
                        height="10"
                        rx="5"
                        fill="#B9C9F5"
                    />

                    <rect
                        x="62"
                        y="88"
                        width="130"
                        height="7"
                        rx="3.5"
                        fill="#D6E1FA"
                    />

                    <rect
                        x="62"
                        y="100"
                        width="110"
                        height="7"
                        rx="3.5"
                        fill="#D6E1FA"
                    />


                    <!-- Checklist -->
                    <rect
                        x="182"
                        y="112"
                        width="46"
                        height="34"
                        rx="8"
                        fill="#1E4FD6"
                    />

                    <path
                        d="M191 129 L200 137 L219 118"
                        stroke="#fff"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />


                    <!-- Grafik -->
                    <rect
                        x="62"
                        y="118"
                        width="52"
                        height="26"
                        rx="6"
                        fill="#fff"
                        stroke="#D6E1FA"
                        stroke-width="1.5"
                    />

                    <path
                        d="M70 138 L78 126 L86 132 L96 116"
                        stroke="#F5851F"
                        stroke-width="2.4"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        fill="none"
                    />


                    <!-- Circle checklist -->
                    <circle
                        cx="252"
                        cy="46"
                        r="26"
                        fill="#0B2E7A"
                    />

                    <path
                        d="M242 46 L249 53 L263 37"
                        stroke="#fff"
                        stroke-width="4"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />


                    <!-- Decoration -->
                    <rect
                        x="24"
                        y="30"
                        width="14"
                        height="14"
                        rx="4"
                        fill="#F5851F"
                        opacity="0.8"
                    />

                    <circle
                        cx="300"
                        cy="90"
                        r="6"
                        fill="#4C7AF0"
                        opacity="0.6"
                    />

                    <circle
                        cx="270"
                        cy="150"
                        r="5"
                        fill="#F5851F"
                        opacity="0.5"
                    />

                </svg>

            </div>


            <!-- =========================
                 FEATURES
            ========================== -->

            <div class="features">

                <!-- Feature 1 -->
                <div class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                        >

                            <path
                                d="M4 19V5a1 1 0 011-1h10l5 5v10a1 1 0 01-1 1H5a1 1 0 01-1-1z"
                                stroke="#1E4FD6"
                                stroke-width="1.6"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M8 12h8M8 16h5"
                                stroke="#1E4FD6"
                                stroke-width="1.6"
                                stroke-linecap="round"
                            />

                        </svg>

                    </div>

                    <div class="feature-text">
                        <b>Input pengajuan</b>
                        <span>Mudah &amp; cepat</span>
                    </div>

                </div>


                <!-- Feature 2 -->
                <div class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                        >

                            <path
                                d="M4 18l5-6 4 4 7-9"
                                stroke="#1E4FD6"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>

                    <div class="feature-text">
                        <b>Skoring otomatis</b>
                        <span>Akurat &amp; real-time</span>
                    </div>

                </div>


                <!-- Feature 3 -->
                <div class="feature">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                        >

                            <path
                                d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"
                                stroke="#1E4FD6"
                                stroke-width="1.6"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>

                    <div class="feature-text">
                        <b>Deteksi fraud</b>
                        <span>Aman &amp; terpercaya</span>
                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             RIGHT PANEL
        ========================== -->

        <div class="right">

            <div class="right-inner">

                <h2>
                    Welcome back!
                </h2>

                <p class="sub">
                    We missed you! Please enter your details.
                </p>


                <!-- FLASH MESSAGE -->
                <?php if(session()->getFlashdata('error')): ?>
                    <div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('success')): ?>
                    <div style="background-color: #d1e7dd; color: #0f5132; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form id="loginForm" action="<?= base_url('process-login') ?>" method="post">

                <!-- EMAIL -->

                <div class="field">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <!-- PASSWORD -->

                <div class="field">

                    <label for="password">
                        Password
                    </label>

                    <div class="pw-wrap">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter password"
                            required
                        >

                        <!-- Eye -->
                        <svg
                            id="togglePassword"
                            viewBox="0 0 24 24"
                            fill="none"
                        >

                            <path
                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"
                                stroke="#111827"
                                stroke-width="1.4"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="3"
                                stroke="#111827"
                                stroke-width="1.4"
                            />

                        </svg>

                    </div>

                </div>


                <!-- REMEMBER ME & FORGOT PASSWORD -->

                <div class="row row-between">

                    <div class="row-left">
                        <input
                            type="checkbox"
                            id="remember"
                        >

                        <span>
                            Remember me
                        </span>
                    </div>

                    <a href="<?= base_url('forgot-password') ?>" class="forgot-link">
                        Forgot password?
                    </a>

                </div>


                <!-- LOGIN -->

                <button
                    class="btn-primary"
                    type="submit"
                >
                    Sign in
                </button>

                </form>

            </div>

        </div>

    </div>
 <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>