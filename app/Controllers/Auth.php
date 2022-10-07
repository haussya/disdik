<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
  public function login()
  {
    return view('halaman/login', [
      'title' => 'Login',
      'validation' => \Config\Services::validation()
    ]);
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }

  public function process()
  {
    $userModel = new UserModel();

    $data = $this->request->getVar('username');
    $password = sha1($this->request->getVar('password'));
    $dataUser = $userModel->where('username', $data)->first();
    if (!$dataUser) {
      session()->setFlashdata('pesan', 'Username tidak ditemukan');
      return redirect()->to('/');
    }
    if ($password !== $dataUser['password']) {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/');
    } else {
      session()->set([
        'user_id' => $dataUser['user_id'],
        'username' => $dataUser['username'],
        'role' => $dataUser['role']
      ]);

      if ($dataUser['role'] == 'admin') {
        return redirect()->to('/admin');
      }

      return redirect()->to('/user');
    }
  }
}
