<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGuruSd extends Model
{

    protected $table = 'guru_sd';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nama', 'kelamin_id', 'tanggal_lahir', 'pangkat_gol', 'eselon', 'pendidikan', 'nik', 'domisili_id'];

    public function getGuruSD()
    {
        return $this->db->table('guru_sd')
            ->join('kelamin', 'kelamin.kelamin_id=guru_sd.kelamin_id')
            ->join('domisili', 'domisili.domisili_id=guru_sd.domisili_id')
            ->get()->getResultArray();
    }

    public function getKelamin()
    {
        return $this->db->table("kelamin")->get()->getResultArray();
    }

    public function getDomisili()
    {
        return $this->db->table("domisili")->get()->getResultArray();
    }

    public function getOne($nip)
    {
        return $this->where(['nip' => $nip])->first();
    }
}
