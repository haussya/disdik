<?php

namespace App\Controllers\Admin;

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
        return view('admin/datasiswasd', [
            'title'        => 'Data Siswa',
            'datasiswasd' => $this->datasiswasd->getSiswaSD()
        ]);
    }

    public function tambahdatasiswasd()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'kelamin' => $this->datasiswasd->getKelamin(),
            'tingkat' => $this->datasiswasd->getTingkat(),
            'domisili' => $this->datasiswasd->getDomisili(),
            'status' => $this->datasiswasd->getStatus(),
        ];
        return view('admin/tambahdatasiswasd', $data);
    }

    public function simpandatasiswasd()
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
        return redirect()->to('admin/datasiswasd');
    }

    public function hapusdatasiswasd($id)
    {
        $this->datasiswasd->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus.');
        return redirect()->to('admin/datasiswasd');
    }

    public function editdatasiswasd($nisn)
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
            return view('admin/editdatasiswasd', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Siswa Tidak Ada di Database');
            return redirect()->to('admin/datasiswasd');
        }
    }

    public function updatedatasiswasd($nisn)
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
        return redirect()->to('admin/datasiswasd');
    }
}
