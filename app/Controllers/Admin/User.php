<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\UserModel;

class User extends BaseController
{
  protected $user, $sekolah;

  public function __construct()
  {
    $this->user = new UserModel();
    $this->sekolah = new SekolahModel();
  }

  public function index()
  {
    return view('admin/user_index', [
      'title'    => 'Data User',
      'user'     => $this->user->findAll(),
    ]);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah User Sekolah',
      'validation' => \Config\Services::validation(),
    ];
    return view('admin/user_tambah', $data);
  }

  public function save()
  {
    $isValid = $this->validate([
      'username' => [
        'rules' => 'required|is_unique[user.username]',
        'errors' => [
          'required' => 'Username wajib diisi',
          'is_unique' => 'Username telah digunakan',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password wajib diisi'
        ]
      ],
      'role' => [
        'rules' => 'required',
        'errros' => [
          'required' => 'Role wajib diisi'
        ]
      ]
    ]);

    if (!$isValid) {
      return redirect()->back()->withInput();
    }

    $user = [
      'username' => $this->request->getPost('username'),
      'password' => sha1($this->request->getPost('password')),
      'role' => $this->request->getPost('role'),
    ];

    $this->user->insert($user);

    session()->setFlashdata('pesan', 'User berhasil ditambahkan');
    return redirect()->to('admin/user');
  }

  public function edit($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      session()->setFlashdata('error', 'User tidak ditemukan');
      return redirect()->to('admin/user');
    }

    return view('admin/user_edit', [
      'title' => 'Edit User',
      'user' => $user,
      'validation' => \Config\Services::validation()
    ]);
  }

  public function update($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      session()->setFlashdata('error', 'User tidak ditemukan');
      return redirect()->back()->withInput();
    }

    $isValid = $this->validate([
      'username' => [
        'rules' => "is_unique[user.username,id_user,$id]",
        'errors' => [
          'required' => 'Username wajib diisi',
          'is_unique' => 'Username telah digunakan',
        ]
      ],
      'password' => [
        'rules' => 'min_length[6]',
        'errors' => [
          'min_length' => 'Password minimal 6 karakter'
        ]
      ],
      'role' => [
        'rules' => 'required',
        'errros' => [
          'required' => 'Role wajib diisi'
        ]
      ]
    ]);

    if (!$isValid) {
      return redirect()->back()->withInput();
    }

    $user['username'] = $this->request->getPost('username');
    $user['role'] = $this->request->getPost('role');

    if ($this->request->getPost('password')) {
      $user['password'] = sha1($this->request->getPost('password'));
    }

    $this->user->update($id, $user);

    session()->setFlashdata('pesan', 'User berhasil diubah');
    return redirect()->to('admin/user');
  }

  public function delete($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      session()->setFlashdata('error', 'User tidak ditemukan');
      return redirect()->to('admin/user');
    }

    $this->user->delete($user['id_user']);

    if ($user['role'] == 'user') {
      $this->sekolah->where('id_user', $user['id_user'])->delete();
    }

    session()->setFlashdata('pesan', 'User berhasil dihapus');
    return redirect()->to('admin/user');
  }
}
