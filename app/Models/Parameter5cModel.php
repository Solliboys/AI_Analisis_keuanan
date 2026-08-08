<?php

namespace App\Models;

use CodeIgniter\Model;

class Parameter5cModel extends Model
{
    protected $table = 'parameter_5c';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_parameter',
        'bobot_persentase',
        'keterangan'
    ];
    protected $useTimestamps = true;
}
