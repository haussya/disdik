<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaSD extends Model
{
    protected $table = 'data_siswa_sd';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nama', 'kelamin', 'tanggal_lahir', 'tingkat', 'domisili', 'nama_ibu', 'status' . 'keterangan'];

    public function hitungDataSiswaSD()
    {
        return $this->db->table('data_siswa_sd')
            ->join('domisili', 'domisili.domisili_id=data_siswa_sd.domisili_id')
            ->get()->getResultArray();
    }
}
