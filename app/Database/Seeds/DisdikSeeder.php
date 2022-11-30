<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DisdikSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('domisili')->insertBatch([
            [
                'nama_domisili' => 'Kabupaten Balangan',
            ],
            [
                'nama_domisili' => 'Kabupaten Banjar',
            ],
            [
                'nama_domisili' => 'Kabupaten Barito Kuala',
            ],
        ]);

        $this->db->table('user')->insert([
            'username' => 'admin',
            'password' => sha1('admin'),
            'role'     => 'admin',
        ]);

        $this->db->table('status')->insertBatch([
            [
                'nama_status' => 'Aktif',
            ],
            [
                'nama_status' => 'Lulus',
            ],
            [
                'nama_status' => 'Lulus tidak melanjutkan',
            ],
            [
                'nama_status' => 'DO',
            ],
        ]);
    }
}
