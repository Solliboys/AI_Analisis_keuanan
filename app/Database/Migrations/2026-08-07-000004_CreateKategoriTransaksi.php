<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis' => [
                'type' => 'ENUM',
                'constraint' => ['Pemasukan', 'Pengeluaran'],
            ],
            'dibuat_oleh_admin' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('dibuat_oleh_admin', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('kategori_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_transaksi');
    }
}
