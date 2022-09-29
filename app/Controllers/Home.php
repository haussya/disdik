<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index() {
        return redirect()->to('/dashboard');
    }

    public function login()
    {
        return view('halaman/login');
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
            dd('kontol1');
            session()->setFlashdata('pesan', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
        if ($password !== $dataUser['password']) {
            dd('kontol2');
            session()->setFlashdata('pesan', 'Password salah');
            return redirect()->to('/');
        } else {
            $sessLogin = [
                'username' => $dataUser['username'],
                'role' => $dataUser['role']
            ];
            dd('kontol3');
            session()->set($sessLogin);
            return redirect()->to('/dashboard');
        }
    }
}
