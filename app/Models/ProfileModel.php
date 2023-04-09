<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'profile';
    protected $primaryKey = 'id_profile';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['gambar'];
}
