<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaSMP extends Model
{
    protected $table = 'data_siswa_smp';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin', 'tanggal_lahir', 'tingkat', 'domisili', 'nama_ibu', 'status' . 'keterangan'];

    public function hitungDataSiswaSMP()
    {
        return $this->db->table('data_siswa_smp')
            ->join('domisili', 'domisili.domisili_id=data_siswa_smp.domisili_id')
            ->get()->getResultArray();
    }
}
