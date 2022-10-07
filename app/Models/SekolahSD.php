<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahSD extends Model
{

    protected $table = 'data_sekolah_sd';
    protected $primaryKey = 'npsn';
    protected $allowedFields = ['nama_sekolah'];

    public function getSekolahSD()
    {
        return $this->db->table("data_sekolah_sd")->get()->getResultArray();
    }
}
