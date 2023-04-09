<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table      = 'jenis_surat';
    protected $primaryKey = 'id_surat';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['jenis_surat'];


    public function getSurat()
    {
        $builder = $this->db->table('jenis_surat');
        $builder->where('jenis_surat', 'Cerai');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function searching($keyword)
    {
        return $this->table('jenis_surat')->like('jenis_surat', $keyword);
    }
}
