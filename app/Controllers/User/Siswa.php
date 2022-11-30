<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BeasiswaModel;
use App\Models\Keterangan;
use App\Models\DataSekolah;
use App\Models\DataSiswa;

class Siswa extends BaseController
{
    protected $siswa;
    protected $keterangan;
    protected $beasiswa;

    public function __construct()
    {
        $this->siswa = new DataSiswa();
        $this->keterangan = new Keterangan();
        $this->beasiswa = new BeasiswaModel();
    }

    public function index()
    {
        return view('user/siswa', [
            'title'        => 'Data Siswa',
            'siswa' => $this->siswa->getSiswa()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'domisili' => $this->siswa->getDomisili(),
            'status' => $this->siswa->getStatus(),
        ];
        return view('user/siswa_tambah', $data);
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
            'tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tingkat wajib diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $sekolah = new DataSekolah();
        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tingkat' => $this->request->getPost('tingkat'),
            'domisili_id' => $this->request->getPost('domisili'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'status_id' => $this->request->getPost('status'),
            'id_sekolah' => $sekolah->getByUser(session('user_id'))['id_sekolah']
        ];

        $id = $this->siswa->insert($data, true);

        if ($this->request->getPost('isDO')) {
            $dataDO = [
                'faktor' => $this->request->getPost('faktor'),
                'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
                'id_siswa' => $id,
            ];
            $this->keterangan->insert($dataDO);
        }

        if ($this->request->getPost('isBeasiswa')) {
            $dataBeasiswa = [
                'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
                'besaran' => $this->request->getPost('besaran'),
                'id_siswa' => $id,
            ];
            $this->beasiswa->insert($dataBeasiswa);
        }

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('user/siswa');
    }

    public function hapus($id)
    {
        $this->siswa->delete($id);

        $this->keterangan->where('id_siswa', $id)->delete();
        $this->beasiswa->where('id_siswa', $id)->delete();

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Dihapus.');
        return redirect()->to('user/siswa');
    }

    public function edit($id)
    {
        $siswa = $this->siswa->first();

        if ($siswa) {
            session()->setFlashdata('pesan', 'Data Siswa Tidak Ada di Database');
            return redirect()->to('user/siswa');
        }

        $data = [
            'title' => "Edit Data Siswa",
            'siswa' => $this->siswa->getOne($id),
            'kelamin' => $this->siswa->getKelamin(),
            'tingkat' => $this->siswa->getTingkat(),
            'domisili' => $this->siswa->getDomisili(),
            'status' => $this->siswa->getStatus(),
            'validation' => \Config\Services::validation(),
        ];

        return view('user/editdatasiswasd', $data);
    }

    public function update($id)
    {
        // TODO ulah validasi
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

        $this->siswa->update($id, [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tingkat' => $this->request->getPost('tingkat'),
            'domisili_id' => $this->request->getPost('domisili'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'status_id' => $this->request->getPost('status'),
        ]);

        if ($this->request->getPost('isDO')) {
            $dataDO = [
                'faktor' => $this->request->getPost('faktor'),
                'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
            ];
            $this->keterangan->where('id_siswa', $id)->update($dataDO);
        }

        if ($this->request->getPost('isBeasiswa')) {
            $dataBeasiswa = [
                'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
                'besaran' => $this->request->getPost('besaran'),
            ];
            $this->beasiswa->where('id_siswa', $id)->update($dataBeasiswa);
        }

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Diupdate.');
        return redirect()->to('user/siswa');
    }
}
