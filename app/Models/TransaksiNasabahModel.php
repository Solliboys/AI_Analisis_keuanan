<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiNasabahModel extends Model
{
    protected $table = 'transaksi_nasabah';
    protected $primaryKey = 'id';

    protected $allowedfield = [

    'user_id',
    'kategori_id',
    'nominal_transaksi',
    'tanggal_transaksi',
    'catatan'
    ];

    protected $useTimestamps = true;
    
}