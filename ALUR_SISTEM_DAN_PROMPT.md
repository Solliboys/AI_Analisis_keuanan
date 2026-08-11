# Dokumentasi Sistem AI Analisis Keuangan (Internal Bank)

## 1. Scope Aplikasi
Aplikasi ini adalah **Internal Tools untuk Bank**, bukan aplikasi pinjol (peer-to-peer lending) yang langsung diakses oleh nasabah.
Peran AI di sini **TIDAK** mengambil keputusan mutlak menyetujui atau menolak pinjaman. AI bertindak sebagai "Alat Bantu Skoring/Analisis" yang mengolah data menjadi insight berupa *Scoring* dan *Risk Warning*. Keputusan final berada secara penuh di tangan **Reviewer** (manusia).

## 2. Struktur User & Role
Sistem memiliki 2 role pengguna dengan pemisahan tugas yang jelas:
1. **Marketing/Pengusul:** Berperan di garda depan, bertugas memprospek calon nasabah, mengumpulkan dokumen, dan memasukkan (input) data calon nasabah ke dalam sistem.
2. **Reviewer (Analis Kredit / Kompartemen Kredit):** Bertugas membaca hasil *resume* dan skoring dari AI, mempertimbangkan *warning* fraud jika ada, dan mengambil keputusan akhir, yaitu menyetujui (Approved) atau menolak (Rejected) pengajuan kredit.

## 3. Alur Kerja Sistem (Flowchart)
1. **Login:** Marketing/Pengusul login ke dalam sistem aplikasi.
2. **Input Data Nasabah:** Marketing/Pengusul mengisi formulir (wizard) data calon nasabah, mencakup:
   - **Detail Pengajuan:** Jumlah plafon/pinjaman, tenor pinjaman, suku bunga.
   - **Data Keuangan:** Total pendapatan kotor & bersih per bulan, detail terkait usaha (jika nasabah wirausaha/memiliki side income).
   - **Pengeluaran Rutin:** Biaya hidup sehari-hari, beban sewa, utilitas (listrik/air), dan angsuran pinjaman di bank atau lembaga keuangan lainnya.
   - **Dokumen Pendukung:** Mengunggah file Slip Gaji / Mutasi Rekening 3 bulan terakhir.
3. **Data Terkirim ke AI:** Sistem mengambil data input tersebut (meliputi teks dan hasil ekstrak/OCR gambar dokumen) lalu mengirimkannya sebagai data payload ke "Otak AI" via *webhook n8n*.
4. **Proses AI (Estimasi Waktu 2 – 10 Menit):** 
   - *Proses disengaja komprehensif, tidak instan (guna memastikan ketelitian analitik), namun dibatasi max 10 menit agar SLA review terjaga.*
   - **Kalkulasi Metrik Utama (DSCR - Debt Service Coverage Ratio):** Membandingkan Nilai Sisa Pendapatan (Nett) dengan Nilai Kewajiban Cicilan (cicilan lama + cicilan pengajuan baru).
   - **Deteksi Indikasi Fraud / Manipulasi Dokumen:** Membandingkan konsistensi data entrian dengan teks yang terbaca di file dokumen (Slip Gaji/Mutasi). AI mencari indikasi rekayasa nominal, potongan bodong, maupun perbedaan kop dan rekapan masuk bank.
5. **Output dari AI (Kembali ke Sistem/Database):**
   - **Score DSCR:** Rasio numerik. Aturan baku: di bawah 1 = **tidak layak**, 1-2 ke atas = **layak**.
   - **Penanda Risiko (Fraud Warning):** Flagging merah apabila terdapat anomali atau terindikasi dokumen dimanipulasi dokumen.
   - **Ringkasan (Resume) Analisis:** Kalimat/paragraf deskriptif yang mudah dipahami Reviewer.
6. **Review & Keputusan Akhir:** 
   - Reviewer membuka sistem dan menerima notifikasi "Hasil Analisis AI Selesai".
   - Reviewer membaca resume, memantau *fraud warning*, memeriksa hitungan DSCR.
   - Reviewer mengeksekusi "Keputusan": (SETUJU / TOLAK / MINTA DATA TAMBAHAN).

---

## 4. Struktur Prompt Sistem AI (untuk Node di n8n)

Berikut adalah struktur *prompt / system instructions* yang akan disematkan di n8n untuk mendapatkan output yang akurat dan sesuai parameter yang dibutuhkan:

```text
Kamu adalah seorang Senior Credit Analyst dan Fraud Detection Expert di sebuah Bank.
Tugas kamu adalah membantu Reviewer Manusia dengan memberikan analisa kredit komprehensif berbasis parameter DSCR (Debt Service Coverage Ratio) dan mendeteksi anomali/manipulasi dokumen pada pengajuan kredit calon nasabah. Kamu BUKAN pengambil keputusan akhir.

Di bawah ini adalah data pengajuan nasabah:
<data>
{
  "pengajuan": {
    "plafon_diminta": 50000000,
    "tenor_bulan": 36,
    "estimasi_angsuran_baru": 1500000
  },
  "keuangan": {
    "pendapatan_kotor": 10000000,
    "pendapatan_bersih": 8500000,
    "detail_usaha": "Tidak ada, Karyawan Swasta"
  },
  "pengeluaran_rutin": {
    "biaya_hidup_dan_utilitas": 3000000,
    "sewa_tempat_tinggal": 1500000,
    "angsuran_kredit_berjalan": 1000000
  },
  "dokumen_terlampir": {
    "ocr_slip_gaji": "..."
  }
}
</data>

INTRUKSI TUGAS:
1. HITUNG DSCR (Debt Service Coverage Ratio)
Rumus DSCR = (Pendapatan Bersih - Biaya Hidup & Sewa) / (Angsuran Kredit Berjalan + Estimasi Angsuran Baru).
Hasilkan angka rasio dengan 2 angka di belakang koma.

2. KRITERIA KELAYAKAN BERDASARKAN DSCR
- Nilai < 1 = "Tidak Layak"
- Nilai >= 1 = "Layak"

3. DETEKSI FRAUD (MANIPULASI DOKUMEN)
Periksa dengan cermat apakah data di "keuangan" (input manual) konsisten dengan data "ocr_slip_gaji" (dari dokumen asli). Cari tahu adanya mark-up gaji, nama perusahaan fiktif, atau inkonsistensi potongan pajak/BPJS.

KEMBALIKAN HANYA FORMAT JSON DI BAWAH INI SEBAGAI OUTPUT:
{
  "dscr_score": 1.6,
  "status_kelayakan": "Layak",
  "indikasi_fraud": true/false,
  "fraud_warning_notes": "Jelaskan dengan detail mengapa ada atau tidak ada indikasi manipulasi dokumen antara data manual vs bukti slip gaji.",
  "resume_analisis": "Tuliskan 1-2 paragraf evaluasi mendalam tentang DSCR nasabah, profil risiko, dan penemuan anomali."
}
```
