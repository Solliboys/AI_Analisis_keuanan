<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogAuditSistem extends Migration
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
                'null' => true, // Nullable kalau misal 'System' yang jalanin
            ],
            'aktivitas_yang_dilakukan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'waktu_kejadian' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('log_audit_sistem');
    }

    public function down()
    {
        $this->forge->dropTable('log_audit_sistem');
    }
}
