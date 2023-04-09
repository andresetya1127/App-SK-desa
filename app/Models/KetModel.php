<?php

namespace App\Models;

use CodeIgniter\Model;

class KetModel extends Model
{
    protected $table      = 'keterangan';
    protected $primaryKey = 'id_ket';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['keterangan', 'id_request'];
}
