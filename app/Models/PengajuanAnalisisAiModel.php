<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanAnalisisAiModel extends Model
{

    protected $table = 'pengajuan_analisis_ai';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pengusul_id',
        'reviewer_id',
        'data_input_json',
        'file_dokumen_json',
        'status',
        'catatan_validasi_sistem',
        'hasil_score_dscr',
        'indikasi_fraud',
        'hasil_resume_ai',
        'catatan_reviewer',
        'file_resume_pdf'
    ];

    protected $useTimestamps = true;

}
