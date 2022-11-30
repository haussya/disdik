<?php

namespace App\Models;

use CodeIgniter\Model;

class BeasiswaModel extends Model
{
    protected $table = 'beasiswa';
    protected $primaryKey = 'id_beasiswa';
    protected $allowedFields = ['id_siswa', 'nama_beasiswa', 'besaran'];

    public function getBySiswa($id)
    {
        return $this->where('id_siswa', $id)->first();
    }
}
