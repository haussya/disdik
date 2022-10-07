<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatSMP extends Model
{

    protected $table = 'tingkat_smp';
    protected $primaryKey = 'tingkat_id';
    protected $allowedFields = ['tingkat'];

    public function getTingkatSMP()
    {
        return $this->db->table("tingkat_smp")->get()->getResultArray();
    }
}
