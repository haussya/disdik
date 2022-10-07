<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahSMP extends Model
{

    protected $table = 'data_sekolah_smp';
    protected $primaryKey = 'npsn';
    protected $allowedFields = ['nama_sekolah'];

    public function getSekolahSMP()
    {
        return $this->db->table("data_sekolah_smp")->get()->getResultArray();
    }
}
