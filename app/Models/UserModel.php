<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'role'];

    public function getDataUser()
    {
        return $this->db->table('user')
            ->join('data_sekolah', 'data_sekolah.user_id=user.user_id')
            ->get()->getResultArray();
    }
}
