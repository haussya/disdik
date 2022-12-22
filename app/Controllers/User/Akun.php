<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class Akun extends BaseController
{
    protected $user;
    protected $sekolah;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->sekolah = new SekolahModel();
    }

    public function index()
    {
        $id = session('id_user');
        $user = $this->user->find($id);
        if (!$user) {
          session()->setFlashdata('error', 'User tidak ditemukan');
          return redirect()->to('user/akun');
        }
    
        return view('user/akun', [
          'title' => 'Edit User',
          'user' => $user,
          'validation' => \Config\Services::validation()
        ]);
    }

    public function save()
    {
    $id = session('id_user');
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
      return redirect()->to('user/akun');
    }
  
}
  