<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataSekolah;
use App\Models\UserModel;

class DataUser extends BaseController
{
    protected $dataUser;
    protected $dataSekolah;

    public function __construct()
    {
        $this->dataUser = new UserModel();
        $this->dataSekolah = new DataSekolah();
    }

    public function index()
    {
        return view('admin/dataUser', [
            'title'        => 'Data User',
            'datauser' => $this->dataUser->getDataUser(),
            'datasekolah' => $this->dataSekolah->getDataSekolah()
        ]);
    }


    public function tambah()
    {
        $data = [
            'title' => 'Tambah User Sekolah',
            'validation' => \Config\Services::validation(),
            // 'sekolah' => $this->dataUser->getKelamin(),
            // 'tingkat' => $this->datasiswasd->getTingkat(),
        ];
        return view('admin/tambahuser', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'username' => [
                'errors' => [
                    'required' => 'username Wajib Diisi',
                    'exact_length' => 'username Tidak Valid'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password Wajib Diisi'
                ]
            ],
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sekolah Lahir Wajib Diisi'
                ]

            ],
            'npsn' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NPSN Wajib Diisi'
                ]

            ],
            'jenjang' => [

                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang Kandung Wajib Diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $dataSimpan = [
            'username' => $this->request->getVar('username'),
            'password' => sha1($this->request->getVar('password')),
            'role' => $this->request->getVar('role'),

        ];
        $id = $this->dataUser->insert($dataSimpan, true);
        $dataSekolahSimpan = [
            'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            'npsn' => $this->request->getVar('npsn'),
            'jenjang' => $this->request->getVar('jenjang'),
            'user_id'=>$id
        ];

        $this->dataSekolah->insert($dataSekolahSimpan);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('admin/datauser');
    }

    public function hapus($user_id)
    {
        $this->dataSekolah->where('user_id', $user_id)->delete();
        $this->dataUser->delete($user_id);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus.');
        return redirect()->to('admin/datauser');
    }

    public function edit($user_id)
    {
        $jumlahRecord = $this->dataUser->where('user_id', $user_id)->countAllResults();
        if ($jumlahRecord == 1) {
            $dataEdit = [
                'title'        => 'Edit Data User',
             'dataEdit' => $this->dataUser->getOne($user_id)   
            ];
            return view('admin/editdatauser', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data User Tidak Ada di Database');
            return redirect()->to('admin/datauser');
        }
    }

    public function update($user_id)
    {
        // if (!$this->validate([
        //     'username' => [
        //         'errors' => [
        //             'required' => 'username Wajib Diisi',
        //             'exact_length' => 'username Tidak Valid'
        //         ]
        //     ],
        //     'password' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'password Wajib Diisi'
        //         ]
        //     ],
        //     'nama_sekolah' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Nama Sekolah Lahir Wajib Diisi'
        //         ]

        //     ],
        //     'jenjang' => [

        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Jenjang Kandung Wajib Diisi'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->back()->withInput();
        //     return redirect()->back()->withInput();
        // }

        $dataSimpan = [
            'username' => $this->request->getVar('username'),
            'password' => sha1($this->request->getVar('password')),
            

        ];
        // $id = $this->dataUser->update($dataSimpan);
        $dataSekolahSimpan = [
            // 'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            // 'npsn' => $this->request->getVar('npsn'),
            // 'jenjang' => $this->request->getVar('jenjang'),
            // 'user_id'=>$id
        ];

        $this->dataUser->update($user_id,$dataSimpan);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('admin/datauser');
    }
}