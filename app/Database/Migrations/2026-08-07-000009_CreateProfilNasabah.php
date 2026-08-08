<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilNasabah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'unique' => true, // 1 User hanya boleh punya 1 Profil
            ],
            'no_ktp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'alamat_lengkap' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'penghasilan_bulanan' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        // CASCADEd = Jika user terhapus dari sistem, profilnya otomatis musnah tertiup angin
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('profil_nasabah');
    }

    public function down()
    {
        $this->forge->dropTable('profil_nasabah');
    }
}
