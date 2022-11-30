<?php

namespace App\Models;

use CodeIgniter\Model;

class KeteranganModel extends Model
{
    protected $table = 'keterangan';
    protected $primaryKey = 'id_keterangan';
    protected $allowedFields = ['alasan_tidak_melanjutkan', 'rencana_melanjutkan', 'id_faktor', 'id_siswa'];

    public function getBySiswa($id)
    {
        return $this->where('id_siswa', $id)->join('faktor', 'faktor.id_faktor=keterangan.id_faktor')->first();
    }
}
