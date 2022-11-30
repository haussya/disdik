<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keterangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keterangan' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'alasan_tidak_melanjutkan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'rencana_melanjutkan' => [
                'type'       => 'ENUM',
                'constraint' => ['ya', 'tidak'],
            ],
            'id_faktor' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_siswa' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addForeignKey('id_faktor', 'faktor', 'id_faktor');
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id_siswa');

        $this->forge->addKey('id_keterangan', true);
        $this->forge->createTable('keterangan');
    }

    public function down()
    {
        $this->forge->dropTable('keterangan');
    }
}
