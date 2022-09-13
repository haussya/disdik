<?php

namespace App\Models;
use CodeIgniter\Model;

class DataSiswaSMP extends Model
{
    protected $table = 'data_siswa_smp';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin', 'tingkat', 'domisili'];

    public function hitungDataSiswaSMP()
    {
        return $this->db->table('data_siswa_smp')->countAll();
    }
}