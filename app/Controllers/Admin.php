<?php

namespace App\Controllers;

use App\Models\Domisili;

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

    public function datasiswa($nisn)
    {
        return view('halaman/HalamanTabelSiswa');
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
