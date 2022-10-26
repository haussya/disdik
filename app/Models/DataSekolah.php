<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSekolah extends Model
{
    protected $table = 'data_sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $allowedFields = ['nama_sekolah','jenjang','npsn','id_user'];

    function getByUser($id){
        return $this->where('id_user',$id)->first();
    }
    
}
