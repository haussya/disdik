<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaktorModel;
use App\Models\SarprasModel;

class Sarpras extends BaseController
{
  protected $sarpras;

  public function __construct()
  {
    $this->sarpras = new SarprasModel();
  }

  public function index()
  {
    return view('admin/sarpras', [
      'title'    => 'Data Sarpras',
      'sarpras'  => $this->sarpras->findAll()
    ]);
  }

  public function create()
  {
    if (!$this->validate('sarpras')) {
      session()->setFlashdata('error', 'Slug telah digunakan');
      return redirect()->to('admin/sarpras');
    }

    $this->sarpras->insert([
      'nama_sarpras' => $this->request->getPost('nama_sarpras'),
      'slug' => $this->request->getPost('slug')
    ]);

    session()->setFlashdata('pesan', 'Sarpras berhasil dibuat');
    return redirect()->to('admin/sarpras');
  }

  public function delete($id)
  {
    $sarpras = $this->sarpras->find($id);

    if (!$sarpras) {
      session()->setFlashdata('error', 'Sarpras tidak ditemukan');
      return redirect()->to('admin/sarpras');
    }

    $this->sarpras->delete($sarpras['id_sarpras']);

    session()->setFlashdata('pesan', 'Sarpras berhasil dihapus');
    return redirect()->to('admin/sarpras');
  }
}
