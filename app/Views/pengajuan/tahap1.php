<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap 1 - Data Keuangan</title>
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
                    <h4 class="mb-3">Tahap 1: Data Keuangan</h4>
                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 25%;"></div>
                    </div>
                    <form action="/pengajuan/proses-tahap1" method="POST">
                        <div class="mb-3">
                            <label>Pendapatan Bersih (Per Bulan)</label>
                            <input type="number" name="pendapatan_bersih" class="form-control" required
                                placeholder="Contoh: 15000000">
                        </div>
                        <div class="mb-3">
                            <label>Pengeluaran Rutin (Per Bulan)</label>
                            <input type="number" name="pengeluaran_rutin" class="form-control" required
                                placeholder="Contoh: 5000000">
                        </div>
                        <div class="mb-3">
                            <label>Angsuran Kredit Berjalan (Per Bulan)</label>
                            <input type="number" name="angsuran_kredit_berjalan" class="form-control" value="0"
                                required>
                            <small class="text-muted">Isi 0 jika tidak punya cicilan lain.</small>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Lanjut Tahap 2 &raquo;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>