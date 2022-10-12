<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaSd extends Model
{

    protected $table = 'data_siswa_sd';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nisn', 'nama', 'kelamin_id', 'tanggal_lahir', 'tingkat_id', 'domisili_id', 'nama_ibu', 'status_id'];

    public function getSiswaSD()
    {
        return $this->db->table('data_siswa_sd')
            ->join('kelamin', 'kelamin.kelamin_id=data_siswa_sd.kelamin_id')
            ->join('tingkat_sd', 'tingkat_sd.tingkat_id=data_siswa_sd.tingkat_id')
            ->join('domisili', 'domisili.domisili_id=data_siswa_sd.domisili_id')
            ->join('status', 'status.status_id=data_siswa_sd.status_id')
            ->get()->getResultArray();
    }

    public function getKelamin()
    {
        return $this->db->table("kelamin")->get()->getResultArray();
    }

    public function getTingkat()
    {
        return $this->db->table("tingkat_sd")->get()->getResultArray();
    }

    public function getDomisili()
    {
        return $this->db->table("domisili")->get()->getResultArray();
    }

    public function getStatus()
    {
        return $this->db->table("status")->get()->getResultArray();
    }

    public function getOne($nisn)
    {
        return $this->where(['nisn' => $nisn])->first();
    }
}
