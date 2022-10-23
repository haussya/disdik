<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBeasiswaSd extends Model
{

    protected $table = 'beasiswa_sd';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nisn', 'nama', 'kelamin_id', 'tanggal_lahir', 'tingkat_id', 'domisili_id', 'nama_ibu', 'keterangan'];

    public function getBeasiswaSD()
    {
        return $this->db->table('beasiswa_sd')
            ->join('kelamin', 'kelamin.kelamin_id=beasiswa_sd.kelamin_id')
            ->join('tingkat_sd', 'tingkat_sd.tingkat_id=beasiswa_sd.tingkat_id')
            ->join('domisili', 'domisili.domisili_id=beasiswa_sd.domisili_id')
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

    public function getOne($nisn)
    {
        return $this->where(['nisn' => $nisn])->first();
    }
}
