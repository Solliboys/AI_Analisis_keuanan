<?php

namespace App\Controllers;

use App\Models\PengajuanAnalisisAiModel;

class KreditController extends BaseController
{
    protected $kreditModel;

    public function __construct()
    {
        $this->kreditModel = new PengajuanAnalisisAiModel();
        // Disini nanti bisa tambah proteksi session khusus AO (Role 1)
    }

    // Menampilkan daftar permohonan kredit (Staff / AO Dashboard)
    public function index()
    {
        // Asumsi AO sedang login, kita ambil berdasarkan ID AO tersebut (Misal ID = 2)
        $pengusul_id = 2; // Nanti diganti: session()->get('user_id');

        $data = [
            'title' => 'Manajemen Data Kredit',
            'kredit_list' => $this->kreditModel->where('pengusul_id', $pengusul_id)->findAll(),
        ];

        return view('kredit/index', $data); // Buat view admin ini nanti
    }

    // Melihat Detail, Berkas & Status AI/Komite
    public function detail($id)
    {
        $kredit = $this->kreditModel->find($id);

        if (!$kredit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Detail Permohonan Kredit',
            'kredit' => $kredit,
        ];

        return view('kredit/detail', $data);
    }

    // Fitur Cek SLIK (Pemicu untuk staf)
    public function cekSlik($id)
    {
        // Logika untuk mengirim notifikasi atau request ke tim terkait / memanggil mock API SLIK
        // ...

        return redirect()->to('/kredit/detail/' . $id)->with('pesan', 'Permintaan Cek SLIK OJK telah diajukan ke sistem.');
    }
}
