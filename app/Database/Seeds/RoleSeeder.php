<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_role' => 'Super Admin'],
            ['nama_role' => 'Admin'],
            ['nama_role' => 'Nasabah']
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
