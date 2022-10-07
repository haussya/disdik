<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaSD extends Model
{

    protected $table = 'data_siswa_sd';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin_id', 'tanggal_lahir', 'tingkat_id', 'domisili_id', 'nama_ibu', 'status_id'];

    public function getSiswaSD()
    {
        return $this->db->table('data_siswa_sd')
            ->join('kelamin', 'kelamin.kelamin_id=data_siswa_sd.kelamin_id')
            ->join('tingkat', 'tingkat.tingkat_id=data_siswa_sd.tingkat_id')
            ->join('domisili', 'domisili.domisili_id=data_siswa_sd.domisili_id')
            ->join('status', 'status.status_id=data_siswa_sd.status_id')
            ->get()->getResultArray();
    }
}
