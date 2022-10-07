<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $title = 'Dashboard';

        return view('admin/dashboard', compact('title'));
    }
}
