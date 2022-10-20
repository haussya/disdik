<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DataSiswaSd;

class Siswasd extends BaseController
{
    protected $datasiswasd;

    public function __construct()
    {
        $this->datasiswasd = new DataSiswaSd();
    }

    public function index()
    {
        return view('user/datasiswasd', [
            'title'        => 'Data Siswa',
            'datasiswasd' => $this->datasiswasd->getSiswaSD()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'kelamin' => $this->datasiswasd->getKelamin(),
            'tingkat' => $this->datasiswasd->getTingkat(),
            'domisili' => $this->datasiswasd->getDomisili(),
            'status' => $this->datasiswasd->getStatus(),
        ];
        return view('user/tambahdatasiswasd', $data);
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
            'status_id' => $this->request->getVar('status')
        ];
        $this->datasiswasd->insert($dataSimpan);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('user/datasiswasd');
    }

    public function hapus($id)
    {
        $this->datasiswasd->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus.');
        return redirect()->to('user/datasiswasd');
    }

    public function edit($nisn)
    {
        $jumlahRecord = $this->datasiswasd->where('nisn', $nisn)->countAllResults();

        if ($jumlahRecord == 1) {

            $dataEdit = [
                'dataEdit' => $this->datasiswasd->getOne($nisn),
                'title' => "Edit Anime",
                'validation' => \Config\Services::validation(),
                'kelamin' => $this->datasiswasd->getKelamin(),
                'tingkat' => $this->datasiswasd->getTingkat(),
                'domisili' => $this->datasiswasd->getDomisili(),
                'status' => $this->datasiswasd->getStatus(),
            ];
            return view('user/editdatasiswasd', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Siswa Tidak Ada di Database');
            return redirect()->to('user/datasiswasd');
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
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $datasiswasd = new DataSiswaSd();
        $datasiswasd->update($nisn, [
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'kelamin_id' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'tingkat_id' => $this->request->getVar('tingkat'),
            'domisili_id' => $this->request->getVar('domisili'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'status_id' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Diupdate.');
        return redirect()->to('user/datasiswasd');
    }
}
