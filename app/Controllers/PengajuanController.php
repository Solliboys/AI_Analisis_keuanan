<?php

namespace App\Controllers;

class PengajuanController extends BaseController
{
    public function __construct()
    {
        session();
    }

    public function tahap1()
    {
        return view('pengajuan/tahap1');
    }

    public function prosesTahap1()
    {
        $dataKeuangan = $this->request->getPost();
        session()->set('pengajuan_keuangan', $dataKeuangan);
        return redirect()->to('/pengajuan/tahap2-usaha');
    }

    public function tahap2()
    {
        return view('pengajuan/tahap2');
    }

    public function prosesTahap2()
    {
        $dataUsaha = $this->request->getPost();
        session()->set('pengajuan_usaha', $dataUsaha);
        return redirect()->to('/pengajuan/tahap3-pinjaman');
    }

    public function tahap3()
    {
        return view('pengajuan/tahap3');
    }

    public function prosesTahap3()
    {
        $dataPinjaman = $this->request->getPost();
        session()->set('pengajuan_pinjaman', $dataPinjaman);
        return redirect()->to('/pengajuan/tahap4-review');
    }

    public function tahap4()
    {
        $data = [
            'keuangan' => session()->get('pengajuan_keuangan'),
            'usaha' => session()->get('pengajuan_usaha'),
            'pinjaman' => session()->get('pengajuan_pinjaman'),
        ];
        return view('pengajuan/tahap4', $data);
    }

    public function prosesTahap4()
    {
        // 1. Ambil data dari session
        $keuangan = session()->get('pengajuan_keuangan');
        $usaha = session()->get('pengajuan_usaha');
        $pinjaman = session()->get('pengajuan_pinjaman');

        // Gabungkan seluruh data untuk n8n
        $payload_json = json_encode([
            'pengajuan' => $pinjaman,
            'keuangan' => $keuangan,
            'usaha' => $usaha
        ]);

        // 2. Simpan Data Awal ke Database (Status: Pending)
        // Kita butuh pengusul_id penginput form, pasang otomatis 2 sesuai tabel seeder user
        $aiModel = new \App\Models\PengajuanAnalisisAiModel();

        $data_db = [
            'pengusul_id' => 2,
            'data_input_json' => $payload_json,
            'status' => 'Validasi Sistem',
        ];

        // Coba insert ke DB
        try {
            $aiModel->insert($data_db);
            $inserted_id = $aiModel->getInsertID(); // Ambil ID untuk dikirim ke n8n
        } catch (\Exception $e) {
            return "Gagal menyimpan ke database! Pastikan migrasi terbaru sudah di-run. Pesan: " . $e->getMessage();
        }

        // 3. Menembak Data ke n8n Webhook (CURL secara Asynchronous)
        $n8n_webhook_url = "https://jafarr.app.n8n.cloud/webhook-test/ai-analisis-kredit";

        $client = \Config\Services::curlrequest();

        try {

            /* 
            // =================================================================================
            // BLOK KODE ASYNCHRONOUS (DIBEKUKAN UNTUK NANTI KETIKA SUDAH ONLINE / DI HOSTING)
            // =================================================================================
            $client->post($n8n_webhook_url, [
                'json' => [
                    'id_pengajuan' => $inserted_id,
                    'body' => json_decode($payload_json, true)
                ],
                'http_errors' => false,
                'timeout' => 2 
            ]);

            session()->remove('pengajuan_keuangan'); session()->remove('pengajuan_usaha'); session()->remove('pengajuan_pinjaman');
            return "<h3>BERHASIL SUBMIT! (ID: {$inserted_id})</h3><p>Status: <b>Sedang diproses AI (Background)</b></p>";
            // =================================================================================
            */

            // =================================================================================
            // BLOK KODE SYNCHRONOUS (LOADING MUTER-MUTER) UNTUK KEBUTUHAN PENGETESAN LOKAL MASA KINI
            // =================================================================================
            // Perhatikan link.nya kita ganti dari webhook-test menjadi webhook saja!
            $n8n_webhook_url = "https://jafarr.app.n8n.cloud/webhook/ai-analisis-kredit";

            $response = $client->post($n8n_webhook_url, [
                'json' => [
                    'id_pengajuan' => $inserted_id,
                    'body' => json_decode($payload_json, true)
                ],
                'http_errors' => false,
                'verify' => false // Bypassing SSL lokal error (cacert.pem) 
            ]);

            $body = $response->getBody();
            $ai_response = json_decode($body, true);

            // Bedah dan baca apa hasil JSON balasan n8n / gemini 
            $ai_data = [];
            $raw_text = '';

            if (isset($ai_response['text'])) {
                $raw_text = $ai_response['text'];
            } elseif (isset($ai_response['output'])) {
                $raw_text = $ai_response['output'];
            } elseif (isset($ai_response['content']['parts'][0]['text'])) {
                // Ini wujud asli (raw) yang ditangkap dari screenshot jenengan!
                $raw_text = $ai_response['content']['parts'][0]['text'];
            }

            if (!empty($raw_text)) {
                $clean_text = preg_replace('/```(?:json)?|```/', '', $raw_text);
                $ai_data = json_decode(trim($clean_text), true) ?? [];
            } else {
                $ai_data = $ai_response ?? [];
            }

            // CABANG 1: Ditolak / Tidak Valid
            if (isset($ai_data['status_validasi']) && $ai_data['status_validasi'] == 'Tidak Valid') {
                $aiModel->update($inserted_id, [
                    'status' => 'Tidak Valid',
                    'catatan_validasi_sistem' => $ai_data['catatan_validasi_sistem'] ?? 'Sistem menolak form tanpa alasan.'
                ]);
                return "<h3>VALIDASI GAGAL OLEH AI!</h3><p>Alasan: <b>" . ($ai_data['catatan_validasi_sistem'] ?? '') . "</b></p><br><a href='/pengajuan/tahap1-keuangan'>Klik Disini untuk Revisi Data</a>";
            }

            // CABANG 2: Valid
            if (isset($ai_data['status_validasi']) && $ai_data['status_validasi'] == 'Valid') {
                $aiModel->update($inserted_id, [
                    'status' => 'Menunggu Review',
                    'hasil_score_dscr' => $ai_data['dscr_score'] ?? 0,
                    'indikasi_fraud' => (isset($ai_data['indikasi_fraud']) && $ai_data['indikasi_fraud'] == true) ? 1 : 0,
                    'hasil_resume_ai' => $ai_data['resume_analisis'] ?? 'Tidak ada resume.',
                ]);
            }

            // Bersihkan session
            session()->remove('pengajuan_keuangan');
            session()->remove('pengajuan_usaha');
            session()->remove('pengajuan_pinjaman');

            return "<h3>PENGUSULAN BERHASIL (ID: {$inserted_id})</h3>
                    <p>Status: Lolos Validasi Kriteria & <b>Akan di serahkan ke Reviewer Manusia</b></p>
                    <hr>
                    <p><b>Skor DSCR (Kalkulasi AI):</b> " . ($ai_data['dscr_score'] ?? '-') . "</p>
                    <p><b>Temuan Kejanggalan Data:</b> " . ((isset($ai_data['indikasi_fraud']) && $ai_data['indikasi_fraud']) ? 'YA Terdeteksi' : 'Tidak Ada (Bebas Fraud)') . "</p>
                    <p><b>Resume AI:</b> " . ($ai_data['resume_analisis'] ?? '-') . "</p>
                    <hr>
                    <p class='text-muted'><small><b>[DEBUG RAW N8N DATA]</b><br>
                    Data asli dari n8n: <pre>" . htmlspecialchars($body) . "</pre></small></p>";

        } catch (\Exception $e) {
            return "Waduh, Gagal menembak sistem n8n! Pesan Error Asli: " . $e->getMessage();
        }
    }

    // =======================================================================
    // ENDPOINT UNTUK MENERIMA BALASAN DARI N8N (CALLBACK WEBHOOK)
    // =======================================================================
    public function callbackN8n()
    {
        // Fungsi rahasia ini dijalankan otomatis oleh n8n setelah analisanya selesai
        $request_body = $this->request->getRawInput();
        $ai_response = json_decode(file_get_contents('php://input'), true);

        if (!$ai_response || !isset($ai_response['id_pengajuan'])) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid Payload']);
        }

        $id_pengajuan = $ai_response['id_pengajuan'];

        // Jika Advanced node AI memberikan output teks
        $ai_data = [];
        if (isset($ai_response['text'])) {
            $clean_text = preg_replace('/```(?:json)?|```/', '', $ai_response['text']);
            $ai_data = json_decode(trim($clean_text), true) ?? [];
        } else {
            $ai_data = $ai_response;
        }

        $aiModel = new \App\Models\PengajuanAnalisisAiModel();

        // Update database tergantung hasil AI
        if (isset($ai_data['status_validasi']) && $ai_data['status_validasi'] == 'Tidak Valid') {
            $aiModel->update($id_pengajuan, [
                'status' => 'Tidak Valid',
                'catatan_validasi_sistem' => $ai_data['catatan_validasi_sistem'] ?? 'Data ditolak AI.'
            ]);
        } else {
            $aiModel->update($id_pengajuan, [
                'status' => 'Menunggu Review', // Lolos validasi AI, siap masuk antrean Reviewer Manusia
                'hasil_score_dscr' => $ai_data['dscr_score'] ?? 0,
                'indikasi_fraud' => (isset($ai_data['indikasi_fraud']) && $ai_data['indikasi_fraud'] == true) ? 1 : 0,
                'hasil_resume_ai' => $ai_data['resume_analisis'] ?? '',
                'catatan_validasi_sistem' => null
            ]);
        }

        return $this->response->setStatusCode(200)->setJSON(['status' => 'success', 'message' => 'Data updated by Background AI Worker']);
    }
}