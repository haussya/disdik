<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Dashboard extends BaseController
{
  public function index()
  {
    $siswaModel = new SiswaModel();
    $siswa = $siswaModel->getSiswa();

    $aktif = array_filter($siswa, function ($siswa) {
      if ($siswa['id_status'] == 1) return true;
      return false;
    });
    $lulus = array_filter($siswa, function ($siswa) {
      if ($siswa['id_status'] == 2) return true;
      return false;
    });
    $ltm = array_filter($siswa, function ($siswa) {
      if ($siswa['id_status'] == 3) return true;
      return false;
    });
    $do = array_filter($siswa, function ($siswa) {
      if ($siswa['id_status'] == 4) return true;
      return false;
    });

    return view('admin/index', [
      'title'    => 'Dashboard',
      'aktif'    => count($aktif),
      'do'       => count($do),
      'lulus'    => count($lulus),
      'ltm'      => count($ltm),
    ]);
  }
}
