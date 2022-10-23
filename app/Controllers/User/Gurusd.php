<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DataGuruSd;

class Gurusd extends BaseController
{
    protected $gurusd;

    public function __construct()
    {
        $this->gurusd = new DataGuruSd();
    }

    public function index()
    {
        return view('user/gurusd', [
            'title'        => 'Data Guru',
            'gurusd' => $this->gurusd->getgurusd()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Guru',
            'validation' => \Config\Services::validation(),
            'kelamin' => $this->gurusd->getKelamin(),
            'domisili' => $this->gurusd->getDomisili(),
        ];
        return view('user/tambahgurusd', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required|exact_length[18]',
                'errors' => [
                    'required' => 'NIP Wajib Diisi',
                    'exact_length' => 'NIP Tidak Valid'
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
            'pangkat_gol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pangkat/Gol Wajib Diisi'
                ]
            ],
            'eselon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Eselon Wajib Diisi'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Wajib Diisi'
                ]
            ],
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Wajib Diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $dataSimpan = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'kelamin_id' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'pangkat_gol' => $this->request->getVar('pangkat_gol'),
            'eselon' => $this->request->getVar('eselon'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'nik' => $this->request->getVar('nik'),
            'domisili_id' => $this->request->getVar('domisili')
        ];
        $this->gurusd->insert($dataSimpan);
        session()->setFlashdata('pesan', 'Data Guru Berhasil Ditambah.');
        return redirect()->to('user/gurusd');
    }

    public function hapus($id)
    {
        $this->gurusd->delete($id);
        session()->setFlashdata('pesan', 'Data Guru Berhasil Dihapus.');
        return redirect()->to('user/gurusd');
    }

    public function edit($nip)
    {
        $jumlahRecord = $this->gurusd->where('nip', $nip)->countAllResults();

        if ($jumlahRecord == 1) {

            $dataEdit = [
                'dataEdit' => $this->gurusd->getOne($nip),
                'title' => "Edit Guru",
                'validation' => \Config\Services::validation(),
                'kelamin' => $this->gurusd->getKelamin(),
                'domisili' => $this->gurusd->getDomisili(),
            ];
            return view('user/editgurusd', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Guru Tidak Ada di Database');
            return redirect()->to('user/gurusd');
        }
    }

    public function update($nip)
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required|exact_length[18]',
                'errors' => [
                    'required' => 'NIP Wajib Diisi',
                    'exact_length' => 'NIP Tidak Valid'
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
            'pangkat_gol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pangkat/Gol Wajib Diisi'
                ]
            ],
            'eselon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Eselon Wajib Diisi'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan Wajib Diisi'
                ]
            ],
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Wajib Diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $gurusd = new DataGuruSd();
        $gurusd->update($nip, [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'kelamin_id' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'pangkat_gol' => $this->request->getVar('pangkat_gol'),
            'eselon' => $this->request->getVar('eselon'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'nik' => $this->request->getVar('nik'),
            'domisili_id' => $this->request->getVar('domisili')
        ]);

        session()->setFlashdata('pesan', 'Data Guru Berhasil Diupdate.');
        return redirect()->to('user/gurusd');
    }
}
