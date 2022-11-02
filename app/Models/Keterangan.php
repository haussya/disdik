<?php

namespace App\Models;

use CodeIgniter\Model;

class Keterangan extends Model
{

    protected $table = 'keterangan';
    protected $primaryKey = 'id_keterangan';
    protected $allowedFields = ['faktor', 'alasan_tidak_melanjutkan', 'rencana_melanjutkan', 'id_siswa'];

 
    

}
