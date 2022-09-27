<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function process()
    {
        $userModel = new UserModel();
        $data = $this->request->getVar('username');
        $password = sha1($this->request->getVar('password'));
        $dataUser = $userModel->where('username', $data)->first();
        if (!$dataUser) {
            session()->setFlashdata('pesan', 'Username tidak ditemukan');
            return redirect()->to('/public');
        }
        if ($password !== $dataUser['password']) {
            session()->setFlashdata('pesan', 'Password salah');
            return redirect()->to('/public');
        } else {
            $sessLogin = [
                'username' => $dataUser['username'],
                'role' => $dataUser['role']
            ];
            session()->set($sessLogin);
            return redirect()->to('public/dashboard');
        }
    }
}
