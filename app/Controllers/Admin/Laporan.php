<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaktorModel;
use App\Models\SarprasModel;
use App\Models\SarprasSekolahModel;
use App\Models\SekolahModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $sarpras;
    protected $sarpras_sekolah;
    protected $sekolah;

    public function __construct()
    {
        $this->sekolah = new SekolahModel();
        $this->sarpras = new SarprasModel();
        $this->sarpras_sekolah = new SarprasSekolahModel();
    }

    public function index()
    {
        return view('admin/laporan_tambah', [
            'title' => 'Tambah Laporan',
            'sekolah' => $this->sekolah->findAll(),
            'validation' => \Config\Services::validation(),
        ]);
    }
    public function tambah()
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

}