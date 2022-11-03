<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSekolah extends Model
{
    protected $table = 'data_sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $allowedFields = ['nama_sekolah','jenjang','npsn','user_id'];

    function getByUser($id){
        return $this->where('user_id',$id)->first();
    }
    
    public function getDataSekolah()
    {
        return $this->db->table('data_sekolah')
            ->get()->getResultArray();
    }
}
