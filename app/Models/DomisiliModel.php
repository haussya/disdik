<?php

namespace App\Models;

use CodeIgniter\Model;

class DomisiliModel extends Model
{
    protected $table = 'domisili';
    protected $primaryKey = 'id_domisili';
    protected $allowedFields = ['nama_domisili'];
}
