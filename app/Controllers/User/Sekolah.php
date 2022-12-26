<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LaporanSarprasModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Sekolah extends BaseController
{
    protected $user, $sekolah, $sarpras, $sarpras_sekolah, $laporan;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->sekolah = new SekolahModel();
        $this->sarpras = new SarprasModel();
        $this->sarpras_sekolah = new SarprasSekolahModel();
        $this->laporan = new LaporanSarprasModel();
    }

 
    public function index()
    {
        $id_sekolah = session('id_sekolah');
        $sekolah = $this->sekolah->find($id_sekolah);
       

        if (!$sekolah) {
            session()->setFlashdata('error', 'Sekolah tidak ditemukan');
            return redirect()->to('admin/sekolah');
        }

        return view('user/sekolah_edit', [
            'title' => 'Edit Sekolah',
            'sekolah' => $sekolah,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function save()
    {   
        $id_sekolah = session('id_sekolah');
        $sekolah = $this->sekolah->find($id_sekolah);

        if (!$sekolah) {
            session()->setFlashdata('error', 'Sekolah tidak ditemukan');
            return redirect()->to('/user/sekolah');
        }

        $isValid = $this->validate([
            'npsn' => [
                'rules' => "required|is_unique[sekolah.npsn,id_sekolah,$id_sekolah]",
                'errors' => [
                    'required' => 'NPSN wajib diisi',
                    'is_unique' => 'NPSN telah digunakan',
                ],
            ],
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama sekolah wajib diisi',
                ],
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang wajib diisi',
                ],
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib diisi',
                ],
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
        return redirect()->to('user/sekolah');
    }
}
