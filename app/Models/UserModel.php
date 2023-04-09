<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'level', 'hp'];

    public function allUser()
    {

        $builder = $this->db->table('user');
        $builder->join('kk', 'kk.id_user = user.id_user');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function sum_user()
    {
        $builder = $this->db->table('user');
        return $builder->countAll();
    }
}
