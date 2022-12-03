<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SarprasSekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_sekolah' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_sarpras' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
        ]);
        
        $this->forge->addForeignKey('id_sarpras', 'sarpras', 'id_sarpras', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('sarpras_sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('sarpras_sekolah');
    }
}
