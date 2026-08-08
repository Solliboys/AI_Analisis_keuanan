<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengajuanAnalisisAi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nasabah_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'admin_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'data_input_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Sedang Diproses AI', 'Selesai', 'Gagal'],
                'default' => 'Pending',
            ],
            'hasil_score_ai' => [
                'type' => 'INT',
                'null' => true,
            ],
            'hasil_resume_ai' => [
                'type' => 'TEXT',
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
        $this->forge->addForeignKey('nasabah_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('admin_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('pengajuan_analisis_ai');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_analisis_ai');
    }
}
