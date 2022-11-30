<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '24',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'tanggal_lahir'  => [
                'type'       => 'DATE',
            ],
            'tingkat' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'alamat'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_ibu'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_domisili'    => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_status'    => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_sekolah'    => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addForeignKey('id_domisili', 'domisili', 'id_domisili');
        $this->forge->addForeignKey('id_status', 'status', 'id_status');
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah');

        $this->forge->addKey('id_siswa', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
