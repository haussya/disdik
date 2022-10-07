<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaSMP extends Model
{

    protected $table = 'data_siswa_smp';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin_id', 'tanggal_lahir', 'tingkat_id', 'domisili_id', 'nama_ibu', 'status_id'];

    public function getSiswaSD()
    {
        return $this->db->table('data_siswa_smp')
            ->join('kelamin', 'kelamin.kelamin_id=data_siswa_smp.kelamin_id')
            ->join('tingkat', 'tingkat_smp.tingkat_id=data_siswa_smp.tingkat_id')
            ->join('domisili', 'domisili.domisili_id=data_siswa_smp.domisili_id')
            ->join('status', 'status.status_id=data_siswa_smp.status_id')
            ->get()->getResultArray();
    }
}
