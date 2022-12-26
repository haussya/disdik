<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LaporanSarprasModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Sarpras extends BaseController
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
        $id = session('id_sekolah');
        $sekolah = $this->sekolah->find($id);
        $sarpras = $this->sarpras->findAll();
        $sarpras_sekolah = $this->sarpras_sekolah->getBySekolah($id);
        $laporan = $this->laporan->getBySekolah($id);

        $sekolah_sarpras = [];

        foreach ($sarpras as $row) {
            $sekolah_sarpras[$row['slug']] = 0;
        }

        foreach ($sarpras_sekolah as $row) {
            $sekolah_sarpras[$row['slug']] = $row['jumlah'];
        }

        $data_sarpras = [];
        foreach ($sarpras as $row) {
            $data_sarpras[] = [
                'id_sarpras' => $row['id_sarpras'],
                'nama_sarpras' => $row['nama_sarpras'],
                'slug' => $row['slug'],
                'jumlah' => intval($sekolah_sarpras[$row['slug']]),
            ];
        }

        return view('/user/sarpras_index', [
            'title' => 'Sarpras Sekolah',
            'sekolah' => $sekolah,
            'sarpras' => $data_sarpras,
            'laporan' => $laporan,
        ]);
    }

    public function laporan_sarpras($id_sarpras)
    {
        $id_sekolah = session('id_sekolah');
        $sekolah = $this->sekolah->find($id_sekolah);
        $sarpras = $this->sarpras->find($id_sarpras);

        return view('/user/sarpras_laporan', [
            'title' => 'Laporan Sarpras',
            'validation' => \Config\Services::validation(),
            'sekolah' => $sekolah,
            'sarpras' => $sarpras,

        ]);
    }

    public function edit_sarpras($id_sarpras)
    {
        if (!$this->validate('laporan_sarpras')) {
            return redirect()->back()->withInput();
        }

        $id_sekolah = session('id_sekolah');
        $fileUp = $this->request->getFile('foto');
        $namaFile = $fileUp->getName();
        $fileUp->move('images', $namaFile);

        $this->laporan->insert([
            'id_sekolah' => $id_sekolah,
            'id_sarpras' => $id_sarpras,
            'tanggal_laporan' => $this->request->getPost('tanggal_laporan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal_laporan' => $this->request->getPost('tanggal_laporan'),
            'foto' => $namaFile,
        ]);

        $this->sarpras_sekolah->insert([
            'id_sekolah' => $id_sekolah,
            'id_sarpras' => $id_sarpras,
            'jumlah' => $this->request->getPost('jumlah'),
        ]);
        session()->setFlashdata('pesan', 'Sekolah Sarpras berhasil diubah');
        return redirect()->to('/user/sarpras');
    }
}
