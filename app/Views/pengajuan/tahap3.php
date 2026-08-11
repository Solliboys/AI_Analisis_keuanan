<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap 3 - Pengajuan Pinjaman</title>
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
                    <h4 class="mb-3">Tahap 3: Pengajuan Kredit & Dokumen</h4>
                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 75%;"></div>
                    </div>
                    <form action="/pengajuan/proses-tahap3" method="POST">
                        <div class="mb-3">
                            <label>Nominal Pengajuan Baru (Rp)</label>
                            <input type="number" name="nominal_pengajuan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tenor Kredit (Bulan)</label>
                            <input type="number" name="tenor_bulan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Estimasi Cicilan Baru (Per Bulan)</label>
                            <input type="number" name="estimasi_angsuran_baru" class="form-control" required
                                placeholder="Simulasi manual dari nominal / tenor">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>Upload Dokumen/Bukti Sementara (Link)</label>
                            <input type="text" name="file_dokumen_link" class="form-control"
                                placeholder="https://contoh.com/ktp-saya.jpg">
                            <small class="text-muted">Untuk tes, gunakan link gambar bebas, atau kosongkan.</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/pengajuan/tahap2-usaha" class="btn btn-outline-secondary">&laquo; Kembali</a>
                            <button type="submit" class="btn btn-primary">Tahap Akhir (Review) &raquo;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>