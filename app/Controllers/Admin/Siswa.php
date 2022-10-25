<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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

}