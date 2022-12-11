<?php

namespace App\Models;

use CodeIgniter\Model;

class SarprasSekolahModel extends Model
{
  protected $table = 'sarpras_sekolah';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id_sekolah', 'id_sarpras', 'jumlah'];

  public function getBySekolah($id)
  {
    return $this
      ->select('sekolah.id_sekolah, slug, jumlah')
      ->where('sekolah.id_sekolah', $id)
      ->join('sekolah', 'sekolah.id_sekolah=sarpras_sekolah.id_sekolah')
      ->join('sarpras', 'sarpras.id_sarpras=sarpras_sekolah.id_sarpras')
      ->find();
  }

  public function getSarprasExcel(){

    return $this
      ->select('sekolah.id_sekolah, slug, jumlah')
      ->join('sekolah.id_sekolah')
      ->join('jumlah','sekolah.id_sekolah=sarpras_sekolah.id_sekolah')
      ->join('sekolah', 'sekolah.id_sekolah=sarpras_sekolah.id_sekolah')
      ->join('sarpras', 'sarpras.id_sarpras=sarpras_sekolah.id_sarpras')
      ->find();
  }



}
