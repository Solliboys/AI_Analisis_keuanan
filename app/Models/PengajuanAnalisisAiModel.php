<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanAnalisisAiModel extends Model
{

    protected $table = 'pengajuan_analisis_ai';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nasabah_id',
        'admin_id',
        'data_input_json',
        'status',
        'hasil_score_ai',
        'hasil_resume_ai'
    ];

    protected $useTimestamps = true;

}
