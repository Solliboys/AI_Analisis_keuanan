<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Parameter5cSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_parameter' => 'Character', 'bobot_persentase' => 25, 'keterangan' => 'Riwayat Kredit / BI Checking'],
            ['nama_parameter' => 'Capacity', 'bobot_persentase' => 25, 'keterangan' => 'Kapasitas bayar (Rasio pendapatan bulanan)'],
            ['nama_parameter' => 'Capital', 'bobot_persentase' => 20, 'keterangan' => 'Modal atau Uang Muka yang dimiliki'],
            ['nama_parameter' => 'Collateral', 'bobot_persentase' => 15, 'keterangan' => 'Jaminan aset yang diagunkan'],
            ['nama_parameter' => 'Condition', 'bobot_persentase' => 15, 'keterangan' => 'Kondisi Ekonomi Industri Nasabah']
        ];

        $this->db->table('parameter_5c')->insertBatch($data);
    }
}
