<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswa extends Model
{

    protected $table = 'data_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nisn', 'nama', 'kelamin', 'tanggal_lahir', 'tingkat', 'domisili_id', 'nama_ibu', 'status_id','alamat','id_sekolah'];

    public function getSiswa()
    {
        return $this->db->table('data_siswa')
            ->join('domisili', 'domisili.domisili_id=data_siswa.domisili_id')
            ->join('status', 'status.status_id=data_siswa.status_id')
            ->join('data_sekolah', 'data_sekolah.id_sekolah=data_siswa.id_sekolah')
            ->get()->getResultArray();
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

    public function hitungDO(){

        return $this->select('status_id')->where('status_id','0')->countAllResults();
    }
    
    public function hitungLulus(){

        return $this->select('status_id')->where('status_id','1')->countAllResults();
    }
    
    public function hitungLTM(){

        return $this->select('status_id')->where('status_id','2')->countAllResults();
    }
    public function hitungAktif(){

        return $this->select('status_id')->where('status_id','3')->countAllResults();
    }
}
