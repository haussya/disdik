<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahSmp extends Model
{
    protected $table = 'data_sekolah_smp';
    protected $primaryKey = 'npsn';
    protected $allowedFields = ['nama_sekolah'];

}
