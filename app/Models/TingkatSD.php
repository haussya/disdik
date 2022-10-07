<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatSD extends Model
{

    protected $table = 'tingkat';
    protected $primaryKey = 'tingkat_id';
    protected $allowedFields = ['tingkat'];

    public function getTingkatSD()
    {
        return $this->db->table("tingkat")->get()->getResultArray();
    }
}
