<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataSekolah;
use App\Models\Keterangan;
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
        return view('admin/datasiswa', [
            'title'        => 'Data Siswa',
            'datasiswa' => $this->datasiswa->getSiswa()
        ]);
    }
    public function edit($id_siswa)
    {
        $jumlahRecord = $this->datasiswa->where('id_siswa', $id_siswa)->countAllResults();

        if ($jumlahRecord == 1) {
            $dataEdit = [
                'dataEdit' => $this->datasiswa->getOne($id_siswa),
                'title' => "Edit Data Siswa",
                'validation' => \Config\Services::validation(),
                'kelamin' => $this->datasiswa->getKelamin(),
                'tingkat' => $this->datasiswa->getTingkat(),
                'domisili' => $this->datasiswa->getDomisili(),
                'status' => $this->datasiswa->getStatus(),
            ];
            return view('user/editdatasiswa', $dataEdit);
        } else {
            session()->setFlashdata('pesan', 'Data Siswa Tidak Ada di Database');
            return redirect()->to('admin/datasiswa');
        }
    }

    public function update($id_siswa)
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
                    'required' => 'tingkat waj  ib diisi'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $datasiswa= new DataSiswa();
        $sekolah = new DataSekolah();
        $datasiswa->update('id_siswa',[
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'kelamin' => $this->request->getVar('kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'tingkat' => $this->request->getVar('tingkat'),
            'domisili_id' => $this->request->getVar('domisili'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'status_id' => $this->request->getVar('status'),
            'id_sekolah'=> $sekolah->getByUser(session('user_id'))['id_sekolah']
        ]);

        $id = $this->datasiswa->insert($datasiswa, true);

        if ($this->request->getVar('isDO')) {
            $dataDO = [
                'faktor' => $this->request->getVar('faktor'),
                'alasan_tidak_melanjutkan' =>$this->request->getVar('alasan_tidak_melanjutkan'),
                'rencana_melanjutkan'=>$this->request->getVar('rencana_melanjutkan'),
                'id_siswa'=>$id
            ];
            $this->keterangan->insert($dataDO);
        }

        session()->setFlashdata('pesan', 'Data Siswa Berhasil Diupdate.');
        return redirect()->to('admin/datasiswa');
    }
}