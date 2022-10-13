<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahSd extends Model
{
    protected $table = 'data_sekolah_sd';
    protected $primaryKey = 'npsn';
    protected $allowedFields = ['nama_sekolah'];
}
