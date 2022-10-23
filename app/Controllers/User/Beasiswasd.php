<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DataBeasiswaSd;

class Beasiswasd extends BaseController
{
    protected $beasiswasd;

    public function __construct()
    {
        $this->beasiswasd = new DataBeasiswaSd();
    }

    public function index()
    {
        return view('user/beasiswasd', [
            'title'        => 'Data Beasiswa',
            'beasiswasd' => $this->beasiswasd->getBeasiswaSD()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Beasiswa',
            'validation' => \Config\Services::validation(),
            'kelamin' => $this->beasiswasd->getKelamin(),
            'tingkat' => $this->beasiswasd->getTingkat(),
            'domisili' => $this->beasiswasd->getDomisili(),
        ];
        return view('user/tambahbeasiswasd', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|exact_length[10]',
                'errors' => [
                    'required' => 'NISN Wajib Diisi',
                    'exact_length' => 'NISN Tidak Valid'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib Diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Wajib Diisi'
                ]

            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Kandung Wajib Diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Beasiswa Wajib Diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $dataSimpan = [
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'kelamin_id' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'tingkat_id' => $this->request->getVar('tingkat'),
            'domisili_id' => $this->request->getVar('domisili'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'keterangan' => $this->request->getVar('keterangan')
        ];
        $this->beasiswasd->insert($dataSimpan);
        session()->setFlashdata('pesan', 'Data Beasiswa Berhasil Ditambah.');
        return redirect()->to('user/beasiswasd');
    }

    public function hapus($id)
    {
        $this->beasiswasd->delete($id);
        session()->setFlashdata('pesan', 'Data Beasiswa Berhasil Dihapus.');
        return redirect()->to('user/beasiswasd');
    }

    public function edit($nisn)
    {
        $jumlahRecord = $this->beasiswasd->where('nisn', $nisn)->countAllResults();

        if ($jumlahRecord == 1) {

            $dataEdit = [
                'dataEdit' => $this->beasiswasd->getOne($nisn),
                'title' => "Edit Anime",
                'validation' => \Config\Services::validation(),
                'kelamin' => $this->beasiswasd->getKelamin(),
                'tingkat' => $this->beasiswasd->getTingkat(),
                'domisili' => $this->beasiswasd->getDomisili(),
            ];
            return view('user/editbeasiswasd', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Beasiswa Tidak Ada di Database');
            return redirect()->to('user/beasiswasd');
        }
    }

    public function update($nisn)
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|exact_length[10]',
                'errors' => [
                    'required' => 'NISN Wajib Diisi',
                    'exact_length' => 'NISN Tidak Valid'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib Diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Wajib Diisi'
                ]

            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Kandung Wajib Diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Beasiswa Wajib Diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $beasiswasd = new DataBeasiswaSd();
        $beasiswasd->update($nisn, [
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'kelamin_id' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'tingkat_id' => $this->request->getVar('tingkat'),
            'domisili_id' => $this->request->getVar('domisili'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('pesan', 'Data Beasiswa Berhasil Diupdate.');
        return redirect()->to('user/beasiswasd');
    }
}
