<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeasiswaModel;
use App\Models\DomisiliModel;
use App\Models\FaktorModel;
use App\Models\KeteranganModel;
use App\Models\SekolahModel;
use App\Models\SiswaModel;
use App\Models\StatusModel;

class Siswa extends BaseController
{
  protected $siswa, $sekolah, $keterangan, $status, $beasiswa, $faktor, $domisili;

  public function __construct()
  {
    $this->siswa = new SiswaModel();
    $this->sekolah = new SekolahModel();
    $this->keterangan = new KeteranganModel();
    $this->status = new StatusModel();
    $this->beasiswa = new BeasiswaModel();
    $this->faktor = new FaktorModel();
    $this->domisili = new DomisiliModel();
  }

  public function index()
  {
    return view('admin/siswa_index', [
      'title' => 'Data Siswa',
      'siswa' => $this->siswa->getSiswa()
    ]);
  }

  public function ltm()
  {
    return view('admin/siswa_doltm', [
      'title' => 'Data Siswa LTM',
      'siswa' => $this->siswa->getSiswaLTM(),
      'faktor' => $this->faktor->findAll(),
    ]);
  }

  public function beasiswa()
  {
    return view('admin/siswa_beasiswa', [
      'title' => 'Data Siswa LTM',
      'siswa' => $this->siswa->getSiswaBeasiswa(),
    ]);
  }

  public function create()
  {
    return view('admin/siswa_tambah', [
      'title' => 'Tambah Siswa',
      'sekolah' => $this->sekolah->findAll(),
      'status' => $this->status->findAll(),
      'faktor' => $this->faktor->findAll(),
      'domisili' => $this->domisili->findAll(),
      'validation' => \Config\Services::validation(),
    ]);
  }

  public function edit($id)
  {
    $siswa = $this->siswa->getSiswa($id);

    if (!$siswa) {
      session()->setFlashdata('error', 'Siswa tidak ditemukan');
      return redirect()->to('admin/siswa');
    }

    return view('admin/siswa_edit', [
      'title' => 'Tambah Siswa',
      'siswa' => $siswa,
      'keterangan' => $this->keterangan->getBySiswa($id),
      'beasiswa' => $this->beasiswa->getBySiswa($id),
      'sekolah' => $this->sekolah->findAll(),
      'status' => $this->status->findAll(),
      'faktor' => $this->faktor->findAll(),
      'domisili' => $this->domisili->findAll(),
      'validation' => \Config\Services::validation(),
    ]);
  }

  public function save()
  {
    if (!$this->validate('siswa')) {
      return redirect()->back()->withInput();
    }

    $siswa = [
      'nama' => $this->request->getPost('nama'),
      'nisn' => $this->request->getPost('nisn'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
      'tingkat' => $this->request->getPost('tingkat'),
      'alamat' => $this->request->getPost('alamat'),
      'nama_ibu' => $this->request->getPost('nama_ibu'),
      'id_domisili' => $this->request->getPost('domisili'),
      'id_status' => $this->request->getPost('status'),
      'id_sekolah' => $this->request->getPost('sekolah')
    ];

    if ($siswa['id_status'] != 1 && $siswa['id_status'] != 2) {
      if (!$this->validate('siswa_status')) {
        return redirect()->back()->withInput();
      }

      $keterangan = [
        'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
        'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
        'id_faktor' => $this->request->getPost('faktor'),
      ];
    }

    if ($this->request->getPost('beasiswa') == 'ya') {
      if (!$this->validate('siswa_beasiswa')) {
        return redirect()->back()->withInput();
      }

      $beasiswa = [
        'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
        'besaran' => $this->request->getPost('besaran'),
      ];
    }

    $id = $this->siswa->insert($siswa, true);

    if ($siswa['id_status'] != 1 && $siswa['id_status'] != 2) {
      $keterangan['id_siswa'] = $id;
      $this->keterangan->insert($keterangan);
    }

    if ($this->request->getPost('beasiswa') == 'ya') {
      $beasiswa['id_siswa'] = $id;
      $this->beasiswa->insert($beasiswa);
    }

    session()->setFlashdata('pesan', 'Siswa berhasil ditambahkan');
    return redirect()->to('admin/siswa');
  }

  public function update($id)
  {
    $siswa = $this->siswa->find($id);

    if (!$siswa) {
      session()->setFlashdata('error', 'Siswa tidak ditemukan');
      return redirect()->to('admin/siswa');
    }

    if (!$this->validate('siswa')) {
      return redirect()->back()->withInput();
    }

    $siswa['nama'] = $this->request->getPost('nama');
    $siswa['nisn'] = $this->request->getPost('nisn');
    $siswa['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
    $siswa['tanggal_lahir'] = $this->request->getPost('tanggal_lahir');
    $siswa['tingkat'] = $this->request->getPost('tingkat');
    $siswa['alamat'] = $this->request->getPost('alamat');
    $siswa['nama_ibu'] = $this->request->getPost('nama_ibu');
    $siswa['id_domisili'] = $this->request->getPost('domisili');
    $siswa['id_status'] = $this->request->getPost('status');
    $siswa['id_sekolah'] = $this->request->getPost('sekolah');

    $this->siswa->update($id, $siswa);
    $this->keterangan->where('id_siswa', $id)->delete();
    $this->beasiswa->where('id_siswa', $id)->delete();

    if ($siswa['id_status'] != 1) {
      if (!$this->validate('siswa_status')) {
        return redirect()->back()->withInput();
      }

      $keterangan = [
        'id_siswa' => $id,
        'alasan_tidak_melanjutkan' => $this->request->getPost('alasan_tidak_melanjutkan'),
        'rencana_melanjutkan' => $this->request->getPost('rencana_melanjutkan'),
        'id_faktor' => $this->request->getPost('faktor'),
      ];

      $this->keterangan->insert($keterangan);
    }

    if ($this->request->getPost('beasiswa') == 'ya') {
      if (!$this->validate('siswa_beasiswa')) {
        return redirect()->back()->withInput();
      }

      $beasiswa = [
        'id_siswa' => $id,
        'nama_beasiswa' => $this->request->getPost('nama_beasiswa'),
        'besaran' => $this->request->getPost('besaran'),
      ];

      $this->beasiswa->insert($beasiswa);
    }

    session()->setFlashdata('pesan', 'Siswa berhasil diubah');
    return redirect()->to('admin/siswa');
  }

  public function delete($id)
  {
    $siswa = $this->siswa->find($id);

    if (!$siswa) {
      session()->setFlashdata('error', 'Siswa tidak ditemukan');
      return redirect()->to('admin/siswa');
    }

    $this->keterangan->where('id_siswa', $id)->delete();
    $this->beasiswa->where('id_siswa', $id)->delete();
    $this->siswa->delete($id);

    session()->setFlashdata('pesan', 'Suswa berhasil dihapus');
    return redirect()->to('admin/siswa');
  }
}
