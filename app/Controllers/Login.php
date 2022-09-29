<?php

namespace App\Controllers;

use App\Models\Domisili;


class Login extends BaseController
{
    public function index()
    {
        return view('halaman/login');
    }

    public function sidebar()
    {
        return view('layout/sidebar');
    }

    public function dash()
    {
        return view('halaman/HalamanAwal');
    }

    public function input()
    {
        $dataDomisili = new Domisili();
        $data['dataDomisili'] = $dataDomisili->getDomisili();

        return view('halaman/HalamanInput', $data);
    }

    public function tabelsiswa()
    {
        return view('halaman/HalamanTabelSiswa');
    }

    public function tabelguru()
    {
        return view('Halaman/HalamanTabelGuru');
    }

    public function tabelsarpras()
    {
        return view('Halaman/HalamanTabelSarpras');
    }

    public function testing()
    {
        return view('mazer/index');
    }
}
