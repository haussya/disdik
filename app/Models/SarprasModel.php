<?php

namespace App\Models;

use CodeIgniter\Model;

class SarprasModel extends Model
{
  protected $table = 'sarpras';
  protected $primaryKey = 'id_sarpras';
  protected $allowedFields = ['nama_sarpras', 'slug'];
}
