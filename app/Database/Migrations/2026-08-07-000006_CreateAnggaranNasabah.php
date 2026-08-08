<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnggaranNasabah extends Migration
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
            ],
            'kategori_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nominal_limit_anggaran' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'bulan' => [
                'type' => 'TINYINT',
                'constraint' => 2,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kategori_id', 'kategori_transaksi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anggaran_nasabah');
    }

    public function down()
    {
        $this->forge->dropTable('anggaran_nasabah');
    }
}
