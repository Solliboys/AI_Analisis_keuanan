<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap 2 - Data Nasabah/Usaha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h4 class="mb-3">Tahap 2: Profil & Usaha</h4>
                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 50%;"></div>
                    </div>
                    <form action="/pengajuan/proses-tahap2" method="POST">
                        <div class="mb-3">
                            <label>Nama Lengkap Nasabah</label>
                            <input type="text" name="nama_nasabah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Bidang Pekerjaan / Usaha</label>
                            <input type="text" name="bidang_pekerjaan" class="form-control" required
                                placeholder="Contoh: Karyawan Swasta / Pedagang">
                        </div>
                        <div class="mb-3">
                            <label>Lama Bekerja / Usaha (Tahun)</label>
                            <input type="number" name="lama_usaha_tahun" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/pengajuan/tahap1-keuangan" class="btn btn-outline-secondary">&laquo; Kembali</a>
                            <button type="submit" class="btn btn-primary">Lanjut Tahap 3 &raquo;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>