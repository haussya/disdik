<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DataSiswaSd;
use App\Models\Keterangan;
use App\Models\DataSekolah;
use App\Models\DataSiswa;

class Siswa extends BaseController
{
    protected $datasiswa;
    protected $keterangan;

    public function __construct()
    {
        $this->datasiswa = new DataSiswa();
        $this->keterangan = new Keterangan();
    }

    public function index()
    {
        return view('user/datasiswasd', [
            'title'        => 'Data Siswa',
            'datasiswa' => $this->datasiswa->getSiswa()
        ]);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'domisili' => $this->datasiswa->getDomisili(),
            'status' => $this->datasiswa->getStatus(),
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
        $dataSimpan = [
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'kelamin' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'tingkat' => $this->request->getVar('tingkat'),
            'domisili_id' => $this->request->getVar('domisili'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'status_id' => $this->request->getVar('status'),
            'id_sekolah'=> $sekolah->getByUser(session('user_id'))['id_sekolah']
        ];
   
        $id = $this->datasiswa->insert($dataSimpan,true);
       
        if($this->request->getVar('isDO')){
            $dataDO = [
                'faktor' => $this->request->getVar('faktor'),
                'alasan_tidak_melanjutkan' =>$this->request->getVar('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan'=>$this->request->getVar('rencana_melanjutkan'),
                'id_siswa'=>$id 
            ];
            $this->keterangan->insert($dataDO);
        }
        
        session()->setFlashdata('pesan', 'Data Siswa Berhasil Ditambah.');
        return redirect()->to('user/datasiswa');
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
                'title' => "Edit Data Siswa",
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
        $datasiswasd = new DataSiswa();
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