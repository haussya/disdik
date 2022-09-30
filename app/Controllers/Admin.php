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
    }

    public function datasiswa($nisn)
    {
    }

    public function beasiswa($nisn)
    {
    }

    public function doltm($nisn)
    {
    }

    public function tabelguru()
    {
    }

    public function tabelsarpras()
    {
    }
}
