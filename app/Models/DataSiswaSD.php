<?php

namespace App\Models;
use CodeIgniter\Model;

class DataSiswaSD extends Model
{
    protected $table = 'data_siswa_sd';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin', 'tingkat', 'domisili'];

    public function hitungDataSiswaSD()
    {
        return $this->db->table('data_siswa_sd')->countAll();
    }
}