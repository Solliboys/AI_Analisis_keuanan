<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap 4 - Konfirmasi Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .summary-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h4 class="mb-3">Tahap Terakhir: Konfirmasi Data</h4>
                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 100%;"></div>
                    </div>

                    <div class="summary-box">
                        <h5>Data Nasabah & Usaha</h5>
                        <ul>
                            <li>Nama:
                                <?= esc($usaha['nama_nasabah'] ?? '-') ?>
                            </li>
                            <li>Pekerjaan:
                                <?= esc($usaha['bidang_pekerjaan'] ?? '-') ?>
                            </li>
                        </ul>

                        <h5>Kondisi Keuangan</h5>
                        <ul>
                            <li>Pendapatan: Rp
                                <?= number_format($keuangan['pendapatan_bersih'] ?? 0, 0, ',', '.') ?>
                            </li>
                            <li>Pengeluaran: Rp
                                <?= number_format($keuangan['pengeluaran_rutin'] ?? 0, 0, ',', '.') ?>
                            </li>
                            <li>Cicilan Berjalan: Rp
                                <?= number_format($keuangan['angsuran_kredit_berjalan'] ?? 0, 0, ',', '.') ?>
                            </li>
                        </ul>

                        <h5>Pinjaman Baru</h5>
                        <ul>
                            <li>Nominal: Rp
                                <?= number_format($pinjaman['nominal_pengajuan'] ?? 0, 0, ',', '.') ?>
                            </li>
                            <li>Estimasi Cicilan Baru: Rp
                                <?= number_format($pinjaman['estimasi_angsuran_baru'] ?? 0, 0, ',', '.') ?>
                            </li>
                        </ul>
                    </div>

                    <form action="/pengajuan/proses-tahap4" method="POST">
                        <div class="alert alert-info">
                            <strong>Perhatian:</strong> Dengan menekan tombol Submit, data ini akan dikirim ke mesin AI
                            melalui n8n untuk divalidasi.
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/pengajuan/tahap3-pinjaman" class="btn btn-outline-secondary">&laquo; Kembali Ubah
                                Data</a>
                            <button type="submit" class="btn btn-success fw-bold">Submit ke AI & Validate
                                &raquo;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>