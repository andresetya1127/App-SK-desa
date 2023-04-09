<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table      = 'surat_keluar';
    protected $primaryKey = 'id_keluar';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['id_request', 'jam_keluar', 'tgl_keluar'];

    public function done()
    {

        $builder = $this->db->table('request');
        $builder->join('kk', 'kk.id = request.id');
        $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
        $builder->join('surat_keluar', 'surat_keluar.id_request = request.id_request');
        $builder->where('status', 'Selesai');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function sum_keluar()
    {
        $builder = $this->db->table('surat_keluar');
        return $builder->countAll();
    }
}
