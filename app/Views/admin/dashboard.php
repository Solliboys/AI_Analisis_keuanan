<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Dashboard - Sistem Kredit
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="card-title mb-3">Selamat Datang di Sistem Kredit!</h4>
        <p class="card-text text-muted">
            Anda berhasil login sebagai <strong><?= session()->get('role') === 'superadmin' ? 'Super Admin' : 'Admin Biasa' ?></strong>.
            <br>
            Menu di sidebar sebelah kiri sudah disesuaikan secara otomatis berdasarkan role Anda.
        </p>
        
        <hr>
        
        <h5 class="mt-4">Statistik Singkat</h5>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengajuan</h5>
                        <h2 class="mb-0">125</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Disetujui</h5>
                        <h2 class="mb-0">80</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Menunggu</h5>
                        <h2 class="mb-0">35</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ditolak</h5>
                        <h2 class="mb-0">10</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
