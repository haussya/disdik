<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataSekolah;
use App\Models\Keterangan;
use App\Models\DataSiswa;

class Admin extends BaseController
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
    
        $data =[
            'title'        => 'Dashboard',
            'hitungDO' => $this->datasiswa->hitungDO(),
            'lulus' => $this->datasiswa->hitungLulus(),
            'ltm' => $this->datasiswa->hitungLTM(),
            'aktif' => $this->datasiswa->hitungAktif()

        ];
        return view('admin/index',$data);
    }

}
