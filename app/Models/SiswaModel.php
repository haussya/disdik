<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nisn', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'tingkat', 'alamat', 'nama_ibu', 'id_domisili', 'id_status', 'id_sekolah'];

    public function getSiswa($id = null)
    {
        if ($id == null) {
            return $this
                ->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
                ->join('status', 'status.id_status=siswa.id_status')
                ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah')
                ->find();
        }

        return $this
            ->where('id_siswa', $id)
            ->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
            ->join('status', 'status.id_status=siswa.id_status')
            ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah')
            ->first();
    }

    public function getSiswaLTM($id_sekolah = null)
    {
        $builder = $this
            ->where('rencana_melanjutkan', 'tidak')
            ->orWhere('siswa.id_status', 3)
            ->orWhere('siswa.id_status', 4)
            ->join('keterangan', 'keterangan.id_siswa=siswa.id_siswa')
            ->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
            ->join('status', 'status.id_status=siswa.id_status')
            ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah')
            ->join('faktor', 'faktor.id_faktor=keterangan.id_faktor');

        if ($id_sekolah != null) $builder->where('siswa.id_sekolah', $id_sekolah);

        return $builder->find();
    }

    public function getSiswaBeasiswa($id_sekolah = null)
    {
        $builder = $this
            ->join('beasiswa', 'beasiswa.id_siswa=siswa.id_siswa', 'right')
            ->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
            ->join('status', 'status.id_status=siswa.id_status')
            ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah');

        if ($id_sekolah != null) $builder->where('siswa.id_sekolah', $id_sekolah);

        return $builder->find();
    }

    public function getSiswaExcel(){
        
            return $this
                ->join('domisili', 'domisili.id_domisili=siswa.id_domisili')
                ->join('status', 'status.id_status=siswa.id_status')
                ->join('sekolah', 'sekolah.id_sekolah=siswa.id_sekolah')
                ->join('keterangan', 'keterangan.id_siswa=siswa.id_siswa','left')
                ->join('faktor', 'faktor.id_faktor=keterangan.id_faktor','left')
                ->join('beasiswa', 'beasiswa.id_siswa=siswa.id_siswa','left')
                ->find();

    }
}
