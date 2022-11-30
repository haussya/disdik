<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Dashboard extends BaseController
{
  public function index()
  {
    $siswaModel = new SiswaModel();;

    return view('admin/index', [
      'title'    => 'Dashboard',
      'hitungDO' => $siswaModel->hitungDO(),
      'lulus'    => $siswaModel->hitungLulus(),
      'ltm'      => $siswaModel->hitungLTM(),
      'aktif'    => $siswaModel->hitungAktif()
    ]);
  }
}
