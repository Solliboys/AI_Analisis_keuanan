<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggaranNasabahModel extends Model
{
    protected $table = 'anggaran_nasabah';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'kategori_id',
        'nominal_limit_anggaran',
        'bulan',
        'tahun'
    ];
    protected $useTimestamps = true;


}
