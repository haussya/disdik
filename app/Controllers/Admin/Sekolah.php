<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Sekolah extends BaseController
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
    return view('admin/sekolah_index', [
      'title'    => 'Data Sekolah',
      'sekolah'  => $this->sekolah->findAll()
    ]);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Sekolah',
      'validation' => \Config\Services::validation(),
    ];
    return view('admin/sekolah_tambah', $data);
  }

  public function sarpras($id)
  {
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

    return view('/admin/sekolah_sarpras', [
      'title' => 'Sarpras Sekolah',
      'sekolah' => $sekolah,
      'sarpras' => $data_sarpras
    ]);
  }

  public function sarpras_edit($id)
  {
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

  public function save()
  {
    $isValid = $this->validate([
      'npsn' => [
        'rules' => 'required|is_unique[sekolah.npsn]|min_length[8]|max_length[8]',
        'errors' => [
          'required' => 'NPSN wajib diisi',
          'is_unique' => 'NPSN telah digunakan',
          'min_length' => 'minimal 8 huruf',
          'max_length' => 'maksimal 8 huruf',
        ]
      ],
      'nama_sekolah' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama sekolah wajib diisi',
        ]
      ],
      'jenjang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenjang wajib diisi',
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Status wajib diisi',
        ]
      ],
    ]);

    if (!$isValid) {
      return redirect()->back()->withInput();
    }

    $user = [
      'username' => $this->request->getVar('npsn'),
      'password' => sha1($this->request->getVar('npsn')),
      'role' => 'user',
    ];

    $userID = $this->user->insert($user, true);
    $sekolah = [
      'nama_sekolah' => $this->request->getVar('nama_sekolah'),
      'npsn' => $this->request->getVar('npsn'),
      'jenjang' => $this->request->getVar('jenjang'),
      'status' => $this->request->getVar('status'),
      'id_user' => $userID,
    ];
    $this->sekolah->insert($sekolah);

    session()->setFlashdata('pesan', 'Sekolah berhasil ditambahkan');
    return redirect()->to('admin/sekolah');
  }

  public function edit($id)
  {
    $sekolah = $this->sekolah->find($id);

    if (!$sekolah) {
      session()->setFlashdata('error', 'Sekolah tidak ditemukan');
      return redirect()->to('admin/sekolah');
    }

    return view('admin/sekolah_edit', [
      'title' => 'Edit Sekolah',
      'sekolah' => $sekolah,
      'validation' => \Config\Services::validation()
    ]);
  }

  public function update($id)
  {
    $sekolah = $this->sekolah->find($id);

    if (!$sekolah) {
      session()->setFlashdata('error', 'Sekolah tidak ditemukan');
      return redirect()->to('/admin/sekolah');
    }

    $isValid = $this->validate([
      'npsn' => [
        'rules' => "required|is_unique[sekolah.npsn,id_sekolah,$id]",
        'errors' => [
          'required' => 'NPSN wajib diisi',
          'is_unique' => 'NPSN telah digunakan',
        ]
      ],
      'nama_sekolah' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama sekolah wajib diisi',
        ]
      ],
      'jenjang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenjang wajib diisi',
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Status wajib diisi',
        ]
      ],
    ]);

    if (!$isValid) {
      return redirect()->back()->withInput();
    }

    $sekolah['nama_sekolah'] = $this->request->getPost('nama_sekolah');
    $sekolah['npsn'] = $this->request->getPost('npsn');
    $sekolah['jenjang'] = $this->request->getPost('jenjang');
    $sekolah['status'] = $this->request->getPost('status');

    $this->sekolah->update($sekolah['id_sekolah'], $sekolah);

    session()->setFlashdata('pesan', 'Sekolah berhasil diubah');
    return redirect()->to('admin/sekolah');
  }

  public function delete($id)
  {
    $sekolah = $this->sekolah->find($id);

    if (!$sekolah) {
      session()->setFlashdata('error', 'Sekolah tidak ditemukan');
      return redirect()->to('admin/sekolah');
    }

    $this->sekolah->delete($sekolah['id_sekolah']);
    $this->user->where('id_user', $sekolah['id_user'])->delete();

    session()->setFlashdata('pesan', 'Sekolah berhasil dihapus');
    return redirect()->to('admin/sekolah');
  }

  
}
