<?php

namespace App\Models;

use CodeIgniter\Model;

class KKModel extends Model
{
    protected $table      = 'kk';
    protected $primaryKey = 'id';
    // protected $returnType = "object";
    protected $useTimestamps = true;
    // protected $createdField   = 'created_at';
    protected $allowedFields = ['kk', 'nik', 'nama', 'alamat', 'jk', 'tmp_lahir', 'tgl_lahir', 'agama', 'pekerjaan', 'status_kawin', 'nm_ayah', 'nm_ibu', 'pendidikan', 'id_user'];

    public function sum_kk()
    {
        $builder = $this->db->table('kk');
        return $builder->countAll();
    }
}
