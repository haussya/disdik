<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DataSiswaSmp;

class Siswasmp extends BaseController
{
    protected $datasiswasmp;

    public function __construct()
    {
        $this->datasiswasmp = new DataSiswaSmp();
    }

    public function index()
    {
        return view('user/datasiswasmp', [
            'title'        => 'Data Siswa',
            'datasiswasmp' => $this->datasiswasmp->getSiswaSMP()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'kelamin' => $this->datasiswasmp->getKelamin(),
            'tingkat' => $this->datasiswasmp->getTingkat(),
            'domisili' => $this->datasiswasmp->getDomisili(),
            'status' => $this->datasiswasmp->getStatus(),
        ];
        return view('user/tambahdatasiswasmp', $data);
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
        $this->datasiswasmp->insert($dataSimpan);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('user/datasiswasmp');
    }

    public function hapus($id)
    {
        $this->datasiswasmp->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus.');
        return redirect()->to('user/datasiswasmp');
    }

    public function edit($nisn)
    {
        $jumlahRecord = $this->datasiswasmp->where('nisn', $nisn)->countAllResults();

        if ($jumlahRecord == 1) {

            $dataEdit = [
                'dataEdit' => $this->datasiswasmp->getOne($nisn),
                'title' => "Edit Anime",
                'validation' => \Config\Services::validation(),
                'kelamin' => $this->datasiswasmp->getKelamin(),
                'tingkat' => $this->datasiswasmp->getTingkat(),
                'domisili' => $this->datasiswasmp->getDomisili(),
                'status' => $this->datasiswasmp->getStatus(),
            ];
            return view('user/editdatasiswasmp', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Siswa Tidak Ada di Database');
            return redirect()->to('user/datasiswasmp');
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
        $datasiswasmp = new DataSiswaSmp();
        $datasiswasmp->update($nisn, [
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
        return redirect()->to('user/datasiswasmp');
    }
}
