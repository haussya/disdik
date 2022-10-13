<?php

namespace App\Models;

use CodeIgniter\Model;

class Domisili extends Model
{
    protected $table = 'domisili';
    protected $primaryKey = 'domisili_id';
    protected $allowedFields = ['domisili'];
}
