<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSoftDeletes extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ];

        // Menyuntikkan kolom deleted_at ke dua tabel inti
        $this->forge->addColumn('users', $fields);
        $this->forge->addColumn('profil_nasabah', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'deleted_at');
        $this->forge->dropColumn('profil_nasabah', 'deleted_at');
    }
}
