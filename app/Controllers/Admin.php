<?php

namespace App\Controllers;

use App\Models\Domisili;
use App\Models\DataSiswaSD;

class Admin extends BaseController
{
    protected $Domisili;

    public function __construct()
    {
        $this->Domisili = new Domisili();
    }

    public function index()
    {
        return view('admin/dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public function datasiswa()
    {
        $dataSiswaSD = new DataSiswaSD();
        $data['dataSiswaSD'] = $dataSiswaSD->hitungDataSiswaSD();

        return view('halaman/HalamanTabelSiswa', $data);
    }

    public function beasiswa($nisn)
    {
    }

    public function doltm($nisn)
    {
    }

    public function tabelguru()
    {
        return view('Halaman/HalamanTabelGuru');
    }

    public function tabelsarpras()
    {
        return view('Halaman/HalamanTabelSarpras');
    }
}
