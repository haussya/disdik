<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusSiswa extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    protected $allowedFields = ['status'];
}
