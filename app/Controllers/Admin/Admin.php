<?php

namespace App\Controllers;

use App\Models\Domisili;
use App\Models\DataSiswaSD;

class Admin extends BaseController
{
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
        return view('Halaman/HalamanTabelGuru');
    }

    public function tabelsarpras()
    {
        return view('Halaman/HalamanTabelSarpras');
    }
}
