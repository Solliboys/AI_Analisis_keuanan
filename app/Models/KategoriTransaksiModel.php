<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriTransaksiModel extends Model
{

    protected $table = 'kategori_transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_kategori',
        'jenis',
        'dibuat_oleh_admin'
    ];
    protected $useTimestamps = true;
}