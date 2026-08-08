<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilNasabahModel extends Model
{
    protected $table = 'profil_nasabah';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'no_ktp',
        'no_telepon',
        'alamat_lengkap',
        'pekerjaan',
        'penghasilan_bulanan'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;


}
