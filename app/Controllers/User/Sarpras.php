<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\FaktorModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Sarpras extends BaseController
{
  protected $user, $sekolah, $sarpras, $sarpras_sekolah;

  public function __construct()
  {
    $this->user = new UserModel();
    $this->sekolah = new SekolahModel();
    $this->sarpras = new SarprasModel();
    $this->sarpras_sekolah = new SarprasSekolahModel();
  }

  public function index()
  {
    $id = session('id_sekolah');
    $sekolah = $this->sekolah->find($id);
    $sarpras = $this->sarpras->findAll();
    $sarpras_sekolah = $this->sarpras_sekolah->getBySekolah($id);

    $sekolah_sarpras = [];

    foreach ($sarpras as $row) {
      $sekolah_sarpras[$row['slug']] = 0;
    }

    foreach ($sarpras_sekolah as $row) {
      $sekolah_sarpras[$row['slug']] = $row['jumlah'];
    }

    $data_sarpras = [];
    foreach ($sarpras as $row) {
      $data_sarpras[] = [
        'nama_sarpras' => $row['nama_sarpras'],
        'slug' => $row['slug'],
        'jumlah' => intval($sekolah_sarpras[$row['slug']])
      ];
    }

    return view('/user/sarpras', [
      'title' => 'Sarpras Sekolah',
      'sekolah' => $sekolah,
      'sarpras' => $data_sarpras
    ]);
  }

  public function save()
  {
    $id = session('id_sekolah');
    $sarpras = $this->sarpras->findAll();

    $data = [];
    foreach ($sarpras as $row) {
      $sarpras_current = $this->sarpras->where('slug', $row['slug'])->first();
      $data[] = [
        'id_sekolah' => $id,
        'id_sarpras' => $sarpras_current['id_sarpras'],
        'jumlah' => $this->request->getPost($sarpras_current['slug'])
      ];
    }

    $this->sarpras_sekolah->where('id_sekolah', $id)->delete();
    $this->sarpras_sekolah->insertBatch($data);

    session()->setFlashdata('pesan', 'Sarpras sekolah berhasil diedit');

    return redirect()->back();
  }
}
