<?php

namespace App\Models;

use CodeIgniter\Model;

class FaktorModel extends Model
{
    protected $table = 'faktor';
    protected $primaryKey = 'id_faktor';
    protected $allowedFields = ['nama_faktor'];
}
