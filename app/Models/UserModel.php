<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'role'];

    public function getDataUser()
    {
        return $this->db->table('user')
            ->get()->getResultArray();
    }

}
