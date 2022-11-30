<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Dashboard extends BaseController
{
  public function admin()
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
