<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sekolah' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'npsn' => [
                'type'       => 'VARCHAR',
                'constraint' => '24',
            ],
            'jenjang' => [
                'type'       => 'ENUM',
                'constraint' => ['SD', 'SMP', 'SMA'],
            ],
            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['negeri', 'swasta'],
            ],
            'id_user'  => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addForeignKey('id_user', 'user', 'id_user');

        $this->forge->addKey('id_sekolah', true);
        $this->forge->createTable('sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('sekolah');
    }
}
