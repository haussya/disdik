<?php

namespace App\Controllers;

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
}
