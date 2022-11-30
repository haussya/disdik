<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faktor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faktor' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_faktor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addKey('id_faktor', true);
        $this->forge->createTable('faktor');
    }

    public function down()
    {
        $this->forge->dropTable('faktor');
    }
}
