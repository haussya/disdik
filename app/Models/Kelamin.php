<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelamin extends Model
{
    protected $table = 'kelamin';
    protected $primaryKey = 'kelamin_id';
    protected $allowedFields = ['kelamin'];
}
