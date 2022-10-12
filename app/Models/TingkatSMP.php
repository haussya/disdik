<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatSmp extends Model
{
    protected $table = 'tingkat_smp';
    protected $primaryKey = 'tingkat_id';
    protected $allowedFields = ['tingkat'];
}
