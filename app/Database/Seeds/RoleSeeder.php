<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_role' => 'Reviewer'],
            ['nama_role' => 'Pengusul']
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
