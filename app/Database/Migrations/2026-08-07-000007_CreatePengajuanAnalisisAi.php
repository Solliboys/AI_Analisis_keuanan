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
            'pengusul_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'comment' => 'User (Marketing/Pengusul) yang menginputkan data'
            ],
            'reviewer_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
                'comment' => 'User (Manajer/Reviewer) yang meng-ACC'
            ],
            'data_input_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'file_dokumen_json' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Menyimpan path/link dokumen yang di-upload pengusul'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Draft', 'Validasi Sistem', 'Tidak Valid', 'Menunggu Review', 'Revisi', 'Disetujui', 'Ditolak'],
                'default' => 'Draft',
            ],
            'catatan_validasi_sistem' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Pesan error/validasi dari AI jika dokumen tidak lengkap/sinkron',
            ],
            'hasil_score_dscr' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
                'comment' => 'Skor rasio kelayakan',
            ],
            'indikasi_fraud' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'comment' => 'Apakah AI mendeteksi inkonsistensi rasio/dokumen',
            ],
            'hasil_resume_ai' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'catatan_reviewer' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Alasan revisi dari reviewer, atau alasan penolakan'
            ],
            'file_resume_pdf' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'Path/Lokasi file surat keputusan PDF jika diarsipkan permanen'
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
        $this->forge->addForeignKey('pengusul_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('reviewer_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('pengajuan_analisis_ai');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_analisis_ai');
    }
}
