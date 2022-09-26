<?php

namespace App\Controllers;

use App\Models\DataSiswaSD;
use App\Models\Domisili;

class InputSiswaSD extends BaseController
{

    protected $siswaSDModel;

    public function __construct()
	{
		$this->siswaSDModel = new DataSiswaSD();

	}
    public function index()
    {
        $data = [
            'datasiswaSD' => $this->siswaSDModel->findAll(),
        ];
        return view('halaman\HalamanTabelSiswa', $data);
    }
}
