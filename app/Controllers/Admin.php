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
        $data['title'] =  'Datasiswa';

        return view('admin/HalamanTabelSiswa', $data);
    }

    public function beasiswa()
    {
    }

    public function doltm($nisn)
    {
    }

    public function tabelguru()
    {
        $dataSiswaSD = new DataSiswaSD();
        $data['dataSiswaSD'] = $dataSiswaSD->hitungDataSiswaSD();
        $data['title'] = 'Dataguru';
        return view('admin/HalamanTabelGuru', $data);
      
    }

    public function tabelsarpras()
    {
        return view('Halaman/HalamanTabelSarpras');
    }
}
