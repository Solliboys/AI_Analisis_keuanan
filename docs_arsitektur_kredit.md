# Spesifikasi Kebutuhan Sistem (SRS) - AI Credit Analysis
*Disusun berdasarkan request internal perusahaan.*

## 1. UI & Role: Marketing / Pengusul
**Navbar & Dashboard:**
- Ringkasan jumlah pengajuan per status (draft, diproses, disetujui, ditolak, revisi).
- Performa bulan ini.
- Notifikasi (Update saat AI/Reviewer selesai memproses).
- Profil/akun (Edit profil, ganti password, logout).

**Menu Pengajuan Baru & Riwayat:**
- **Form Input Data Calon Nasabah** (lihat Struktur Data di bawah).
- **Riwayat Pengajuan:** Menampilkan status terkini. DSCR & Fraud Flag (read-only hasil AI).
- Fitur **"Revisi"** untuk melengkapi ulang data yang diminta Reviewer.

## 2. UI & Role: Reviewer
**Navbar & Dashboard:**
- Ringkasan antrian, approval rate, revisi rate.
- Alert count untuk pengajuan dengan fraud flag (Prioritas Tinggi).
- Notifikasi & Profil.

**Antrian & Keputusan:**
- **Antrian:** Daftar pengajuan berstatus 'Menunggu Review' (sudah lolos AI).
- **Detail Pengajuan (Modal/View):**
  - Menampilkan Skor DSCR (Hijau = Layak >= 1, Merah = Tidak Layak < 1).
  - Fraud Indicator (Badge warning warna mencolok, terpisah dari DSCR).
  - Ringkasan profil lengkap yang diinput Marketing.
  - Action Buttons: `[Disetujui]`, `[Ditolak]`, `[Revisi (dengan kolom alasan)]`.
- **Riwayat:** Arsip keputusan yang telah difinalisasi.
- **Laporan (Analytics):** Rata-rata waktu proses AI, distribusi DSCR, persentase fraud, rasio approve/reject.

---

## 3. Struktur Data Form (Wizard Input)
Sistem harus menggunakan form bertahap/detail dengan input berikut:

**A. Data Pribadi Nasabah**
- Nama lengkap (sesuai KTP)
- NIK
- Tempat, tanggal lahir
- Alamat (KTP & domisili)
- No. HP / telepon aktif
- Email
- Status pernikahan
- Jumlah tanggungan (anak/keluarga)

**B. Data Pengajuan**
- Jumlah pinjaman (Plafon)
- Tenor / jangka waktu
- Bunga (rate yang berlaku)
- Tujuan penggunaan dana

**C. Data Pendapatan**
- Pendapatan kotor (gross income/bulan)
- Pendapatan bersih (net income/bulan)
- Sumber pendapatan (karyawan/wiraswasta/lainnya)
- *Jika karyawan:* Nama instansi, jabatan, lama bekerja, status.
- *Jika pengusaha:* Jenis usaha, omzet, laba.
- Pendapatan tambahan (opsional).

**D. Data Pengeluaran Rutin**
- Biaya listrik/air/utilitas
- Biaya sewa (opsional)
- Cicilan pinjaman lain berjalan (nominal & tenor sisa)
- Kartu kredit / pinjol
- Pengeluaran rutinan (pendidikan dll)

**E. Dokumen Pendukung (Upload Path)**
- Slip gaji 3 bulan terakhir
- KTP & KK
- NPWP
- Rekening koran / Mutasi
- SLIK / Dokumen agunan (jika ada)
- Foto Selfie KTP
