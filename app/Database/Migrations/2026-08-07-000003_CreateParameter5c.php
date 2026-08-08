<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParameter5c extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_parameter' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'bobot_persentase' => [
                'type' => 'INT',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('parameter_5c');
    }

    public function down()
    {
        $this->forge->dropTable('parameter_5c');
    }
}
