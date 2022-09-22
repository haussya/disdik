<?php

namespace App\Controllers;

use App\Models\DataSiswaSD;
use App\Models\Domisili;

class inputsiswa extends BaseController
{
    public function index()
    {
        $dataSiswaSD = new DataSiswaSD();
        $data['dataSiswaSD'] = $dataSiswaSD->getSiswaSD();

        return view('halaman\HalamanTabelSiswa', $data);
    }
}
