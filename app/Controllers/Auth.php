<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function process()
    {
        $userModel = new UserModel();
        $data = $this->request->getVar();
        $dataUser = $userModel->where('username', $data['username'])->first();

        if (!$dataUser) {
            session()->setFlashdata('pesan', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
        if (sha1($data['password']) !== $dataUser['password']) {
            session()->setFlashdata('pesan', 'Password salah');
            return redirect()->to('/');
        } else {
            $sessLogin = [
                'username' => $dataUser['username'],
                'role' => $dataUser['role']
            ];
            session()->set($sessLogin);
        }
    }
}
