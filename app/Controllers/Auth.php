<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Auth extends BaseController
{
  public function login()
  {
    return view('auth/login', [
      'title' => 'Login',
      'validation' => \Config\Services::validation()
    ]);
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }

  public function signin()
  {
    $userModel = new UserModel();

    $username = $this->request->getPost('username');
    $password = sha1($this->request->getPost('password'));
    $user = $userModel->where('username', $username)->first();

    if (!$user) {
      session()->setFlashdata('pesan', 'Username tidak ditemukan');
      return redirect()->to('/login');
    }

    if ($password !== $user['password']) {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/login');
    }

    $session = [
      'id_user' => $user['id_user'],
      'username' => $user['username'],
      'role' => $user['role']
    ];

    if ($user['role'] == 'user') {
      $sekolah = new SekolahModel();
      

      $session['id_sekolah'] = $sekolah->where('id_user', $user['id_user'])->first()['id_sekolah'];
    }

    session()->set($session);

    return redirect()->to('/');
  }
}
