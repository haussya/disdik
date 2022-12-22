<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanSarpras extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_sekolah' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_sarpras' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'tanggal_laporan' => [
                'type' => 'DATE',
            ],
            'status_sarpras' => [
                'type' => 'ENUM',
                'constraint' => ['Belum Diperbaiki', 'Sudah Diperbaiki'],
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addForeignKey('id_sarpras', 'sarpras', 'id_sarpras', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');

        $this->forge->addKey('id_laporan', true);
        $this->forge->createTable('laporan_sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('laporan_sekolah');
    }
}
