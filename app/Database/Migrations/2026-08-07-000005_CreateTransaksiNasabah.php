<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiNasabah extends Migration
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
            'nominal' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'tanggal_transaksi' => [
                'type' => 'DATE',
            ],
            'catatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kategori_id', 'kategori_transaksi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi_nasabah');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_nasabah');
    }
}
