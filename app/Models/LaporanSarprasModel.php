<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanSarprasModel extends Model
{
  protected $table = 'laporan_sarpras';
  protected $primaryKey = 'id_laporan';
  protected $allowedFields = ['id_sekolah', 'id_sarpras', 'tanggal_laporan', 'keterangan', 'foto'];

  public function getByID($id)
  {
    return $this
      ->join('sekolah', 'sekolah.id_sekolah=laporan_sarpras.id_sekolah')
      ->join('sarpras', 'sarpras.id_sarpras=laporan_sarpras.id_sarpras')
      ->where('id_laporan', $id)
      ->findAll();
  }

  public function getBySekolah($id_sekolah)
  {
    return $this
      ->join('sekolah', 'sekolah.id_sekolah=laporan_sarpras.id_sekolah')
      ->join('sarpras', 'sarpras.id_sarpras=laporan_sarpras.id_sarpras')
      ->where('laporan_sarpras.id_sekolah', $id_sekolah)
      ->findAll();
  }
}
