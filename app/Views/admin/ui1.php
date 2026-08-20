<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kredit - UI Prototype</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 1rem;
            overflow-y: auto;
            color: #fff;
        }
        .sidebar a {
            color: #c2c7d0;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            margin: 2px 10px;
        }
        .sidebar a:hover {
            background-color: #494e53;
            color: #fff;
        }
        .sidebar .nav-item .nav-link i {
            margin-right: 10px;
        }
        .sidebar .submenu {
            padding-left: 15px;
        }
        .sidebar .submenu a {
            font-size: 0.9rem;
            padding: 8px 15px;
        }
        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            display: block;
        }
        .main-content {
            margin-left: 280px;
            padding: 20px;
        }
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .role-badge {
            font-size: 1.1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- SIDEBAR SUPER ADMIN -->
<div class="sidebar" id="sidebar-super-admin">
    <a href="#" class="sidebar-brand text-decoration-none">
        <i class="bi bi-bank"></i> Sistem Kredit
    </a>
    
    <div class="px-3 mb-2 text-uppercase text-muted" style="font-size: 0.75rem; font-weight: bold;">Super Admin</div>
    
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="#kreditSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-credit-card"></i> Kredit</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="kreditSuper">
                <a href="#"><i class="bi bi-file-earmark-plus"></i> Pengajuan Kredit</a>
                <a href="#"><i class="bi bi-check-circle"></i> Approval Kredit</a>
                <a href="#"><i class="bi bi-display"></i> Monitoring Kredit</a>
                <a href="#"><i class="bi bi-exclamation-triangle"></i> Kredit Bermasalah</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#laporanSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-bar-chart"></i> Laporan</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="laporanSuper">
                <a href="#"><i class="bi bi-file-text"></i> Laporan Kredit</a>
                <a href="#"><i class="bi bi-people"></i> Laporan Debitur</a>
                <a href="#"><i class="bi bi-file-check"></i> Laporan Approval</a>
                <a href="#"><i class="bi bi-download"></i> Export Data</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#userMgtSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-people-fill"></i> User Management</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="userMgtSuper">
                <a href="#"><i class="bi bi-list-ul"></i> Daftar User</a>
                <a href="#"><i class="bi bi-person-plus"></i> Tambah User</a>
                <a href="#"><i class="bi bi-shield-lock"></i> Role & Permission</a>
                <a href="#"><i class="bi bi-key"></i> Reset Password User</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#masterDataSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-database"></i> Master Data</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="masterDataSuper">
                <a href="#"><i class="bi bi-tags"></i> Jenis Kredit</a>
                <a href="#"><i class="bi bi-house"></i> Jenis Agunan</a>
                <a href="#"><i class="bi bi-briefcase"></i> Jenis Pekerjaan</a>
                <a href="#"><i class="bi bi-sliders"></i> Parameter 5C</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#featureSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-tools"></i> Feature Management</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="featureSuper">
                <a href="#"><i class="bi bi-gear"></i> Kelola Fitur</a>
                <a href="#"><i class="bi bi-menu-button-wide"></i> Menu Management</a>
                <a href="#"><i class="bi bi-lock"></i> Hak Akses</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-journal-text"></i> Audit Log</a>
        </li>
        <li class="nav-item">
            <a href="#pengaturanSuper" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-gear-fill"></i> Pengaturan Sistem</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="pengaturanSuper">
                <a href="#"><i class="bi bi-whatsapp"></i> WhatsApp OTP</a>
                <a href="#"><i class="bi bi-envelope"></i> Email SMTP</a>
                <a href="#"><i class="bi bi-hdd"></i> Backup Database</a>
                <a href="#"><i class="bi bi-pc-display"></i> Konfigurasi Aplikasi</a>
            </div>
        </li>
        
        <hr class="text-white mx-3">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Profil Saya</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
    </ul>
</div>

<!-- SIDEBAR ADMIN BIASA -->
<div class="sidebar" id="sidebar-admin" style="display: none;">
    <a href="#" class="sidebar-brand text-decoration-none">
        <i class="bi bi-bank"></i> Sistem Kredit
    </a>
    
    <div class="px-3 mb-2 text-uppercase text-muted" style="font-size: 0.75rem; font-weight: bold;">Admin Biasa</div>
    
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="#kreditAdmin" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-credit-card"></i> Kredit</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="kreditAdmin">
                <a href="#"><i class="bi bi-file-earmark-plus"></i> Pengajuan Kredit</a>
                <a href="#"><i class="bi bi-check-circle"></i> Approval Kredit</a>
                <a href="#"><i class="bi bi-display"></i> Monitoring Kredit</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#analisisAdmin" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clipboard-data"></i> Analisis Kredit</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="analisisAdmin">
                <a href="#"><i class="bi bi-clipboard-check"></i> Analisis 5C</a>
                <a href="#"><i class="bi bi-file-earmark-text"></i> Hasil SLIK</a>
                <a href="#"><i class="bi bi-person-x"></i> DTTOT & Blacklist</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#laporanAdmin" data-bs-toggle="collapse" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="bi bi-bar-chart"></i> Laporan</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse submenu" id="laporanAdmin">
                <a href="#"><i class="bi bi-file-text"></i> Laporan Kredit</a>
                <a href="#"><i class="bi bi-people"></i> Laporan Debitur</a>
                <a href="#"><i class="bi bi-file-check"></i> Laporan Approval</a>
            </div>
        </li>
        
        <hr class="text-white mx-3">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Profil Saya</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
    </ul>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="navbar-custom">
        <div class="role-badge text-primary" id="current-role-title">
            <i class="bi bi-shield-check"></i> View: Super Admin
        </div>
        <div>
            <select class="form-select" id="roleSwitcher" style="width: 200px;">
                <option value="super-admin">Super Admin</option>
                <option value="admin">Admin Biasa</option>
            </select>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="card-title mb-3">Selamat Datang di Sistem Kredit!</h4>
                <p class="card-text text-muted">
                    Ini adalah halaman interaktif (1 file) untuk melihat struktur menu berdasarkan Role. 
                    <br>
                    Silakan gunakan <b>dropdown di sudut kanan atas</b> untuk berpindah antara tampilan <b>Super Admin</b> dan <b>Admin Biasa</b>.
                </p>
                
                <hr>
                
                <h5 class="mt-4">Struktur File</h5>
                <p>Kedua tampilan sidebar ini berada di dalam file <code>app/Views/admin/ui1.php</code> yang sama persis seperti instruksi Anda.</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('roleSwitcher').addEventListener('change', function() {
        var val = this.value;
        var sidebarSuper = document.getElementById('sidebar-super-admin');
        var sidebarAdmin = document.getElementById('sidebar-admin');
        var roleTitle = document.getElementById('current-role-title');

        if(val === 'super-admin') {
            sidebarSuper.style.display = 'block';
            sidebarAdmin.style.display = 'none';
            roleTitle.innerHTML = '<i class="bi bi-shield-check"></i> View: Super Admin';
        } else {
            sidebarSuper.style.display = 'none';
            sidebarAdmin.style.display = 'block';
            roleTitle.innerHTML = '<i class="bi bi-person-badge"></i> View: Admin Biasa';
        }
    });
</script>
</body>
</html>