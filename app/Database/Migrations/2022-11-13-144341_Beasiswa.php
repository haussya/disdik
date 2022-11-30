<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_beasiswa' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_beasiswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'besaran' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
        ]);

        $this->forge->addKey('id_beasiswa', true);
        $this->forge->createTable('beasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('beasiswa');
    }
}
