<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Domisili extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_domisili' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_domisili' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
        ]);

        $this->forge->addKey('id_domisili', true);
        $this->forge->createTable('domisili');
    }

    public function down()
    {
        $this->forge->dropTable('domisili');
    }
}
