<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_id' => 1,
                'nama' => 'Bapak Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status_aktif' => 1,
            ],
            [
                'role_id' => 2,
                'nama' => 'Mas Admin Kece',
                'email' => 'admin@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status_aktif' => 1,
            ],
            [
                'role_id' => 3,
                'nama' => 'Budi Sang Nasabah',
                'email' => 'nasabah@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status_aktif' => 1,
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
