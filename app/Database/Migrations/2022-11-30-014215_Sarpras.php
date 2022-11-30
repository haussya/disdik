<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sarpras extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sarpras' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sarpras' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addKey('id_sarpras', true);
        $this->forge->createTable('sarpras');
    }

    public function down()
    {
        $this->forge->dropTable('sarpras');
    }
}
