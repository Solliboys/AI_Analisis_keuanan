<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahTabelBprMaster extends Migration
{
    public function up()
    {
        // 1. Tabel DTTOT / Blacklist
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama_terduga' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nomor_identitas' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dttot');

        // 2. Tabel Master Referensi (Setting /setreff)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'kategori' => ['type' => 'VARCHAR', 'constraint' => 100, 'comment' => 'Contoh: JENIS_KREDIT, JENIS_KOMITE'],
            'nilai' => ['type' => 'VARCHAR', 'constraint' => 255],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('referensi');

        // 3. Tabel Riwayat SLIK Nasabah
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pengajuan_id' => ['type' => 'INT', 'unsigned' => true],
            'nama_pemohon' => ['type' => 'VARCHAR', 'constraint' => 255],
            'file_hasil_slik' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status_kolektibilitas' => ['type' => 'INT', 'constraint' => 1, 'comment' => '1=Lancar, 5=Macet', 'default' => 1],
            'catatan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pengajuan_id', 'pengajuan_analisis_ai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('slik');

        // 4. Tabel Flow Komite (Catatan/Opini per struktur Komite)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pengajuan_id' => ['type' => 'INT', 'unsigned' => true],
            'komite_user_id' => ['type' => 'INT', 'unsigned' => true, 'comment' => 'ID User yang berwenang'],
            'jenis_komite' => ['type' => 'VARCHAR', 'constraint' => 100, 'comment' => 'KTA, KMKC, BPIH, Fintech, Sindikasi'],
            'rekomendasi' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'opini' => ['type' => 'TEXT', 'null' => true],
            'keputusan' => ['type' => 'ENUM', 'constraint' => ['Setuju', 'Tolak', 'Revisi', 'Mengetahui'], 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pengajuan_id', 'pengajuan_analisis_ai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('komite_user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('komite');

        // 5. Tabel Kinerja & Target Harian/Bulanan (Dashboard Eksekutif)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'periode_bulan' => ['type' => 'INT', 'constraint' => 2],
            'periode_tahun' => ['type' => 'INT', 'constraint' => 4],
            'kategori_data' => ['type' => 'ENUM', 'constraint' => ['Dana', 'Kredit', 'Rasio', 'Keuangan']],
            'target_nominal' => ['type' => 'DECIMAL', 'constraint' => '20,2', 'default' => 0],
            'realisasi_nominal' => ['type' => 'DECIMAL', 'constraint' => '20,2', 'default' => 0],
            'persentase_npl' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 0, 'comment' => 'Hanya untuk kategori Kredit'],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kinerja');
    }

    public function down()
    {
        $this->forge->dropTable('kinerja');
        $this->forge->dropTable('komite');
        $this->forge->dropTable('slik');
        $this->forge->dropTable('referensi');
        $this->forge->dropTable('dttot');
    }
}
