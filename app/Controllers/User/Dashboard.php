<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $title = 'Dashboard';

        return view('user/index', compact('title'));
    }
}
