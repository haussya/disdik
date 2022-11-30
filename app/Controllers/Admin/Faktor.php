<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaktorModel;

class Faktor extends BaseController
{
  protected $faktor;

  public function __construct()
  {
    $this->faktor = new FaktorModel();
  }

  public function create()
  {
    if (!$this->validate('faktor')) {
      session()->setFlashdata('error', 'Nama faktor wajib diisi');
      return redirect()->to('admin/siswa/do-ltm');
    }

    $this->faktor->insert([
      'nama_faktor' => $this->request->getPost('nama_faktor')
    ]);

    session()->setFlashdata('pesan', 'Faktor berhasil dibuat');
    return redirect()->to('admin/siswa/do-ltm');
  }

  public function delete($id)
  {
    $faktor = $this->faktor->find($id);

    if (!$faktor) {
      session()->setFlashdata('error', 'Faktor tidak ditemukan');
      return redirect()->to('admin/siswa/do-ltm');
    }

    $this->faktor->delete($faktor['id_faktor']);

    session()->setFlashdata('pesan', 'Faktor berhasil dihapus');
    return redirect()->to('admin/siswa/do-ltm');
  }
}
