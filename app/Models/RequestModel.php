<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table      = 'request';
    protected $primaryKey = 'id_request';
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'id_user', 'id_surat', 'status', 'token', 'tgl_masuk', 'jam_masuk', 'id_contact', 'ket', 'tujuan', 'txt1', 'txt2'];


    public function getAll()
    {
        $builder = $this->db->table('request');
        $builder->join('kk', 'kk.id = request.id');
        $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
        $builder->where('status', 'Verifikasi');
        $query = $builder->get();
        return $query->getResultArray();
        // return $this->where(['slug' => $slug])->first();
    }
    public function getUser()
    {

        $builder = $this->db->table('request');
        $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
        $builder->where('id_user', session()->get('id_user'));
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function done()
    {

        $builder = $this->db->table('request');
        $builder->join('kk', 'kk.id = request.id');
        $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
        $builder->where('status', 'Selesai');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function getPrint($id_request = false)
    {
        if ($id_request == false) {
            $builder = $this->db->table('request');
            $builder->join('kk', 'kk.id = request.id');
            $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
            $builder->join('contact', 'contact.id_contact = request.id_contact');
            $builder->where('status', 'Proses');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $builder = $this->db->table('request');
        $builder->join('kk', 'kk.id = request.id');
        $builder->join('jenis_surat', 'jenis_surat.id_surat = request.id_surat');
        $builder->join('contact', 'contact.id_contact = request.id_contact');
        $builder->where('id_request', $id_request);
        $query = $builder->get();
        return $query->getResultArray();
        // return $this->where(['id_request' => $id_request])->first();
    }



    public function getVerifikasi($id_surat)
    {
        $builder = $this->db->table('request');
        $builder->where('status', 'Verifikasi');
        $builder->where('id_user', session()->get('id_user'));
        $builder->where('id_surat', $id_surat);
        return $builder->countAllResults();
    }

    public function getProses($id_surat = false)
    {
        if ($id_surat == false) {
            $builder = $this->db->table('request');
            return $builder->countAll();
        }
        $builder = $this->db->table('request');
        $builder->where('status', 'Proses');
        $builder->where('id_user', session()->get('id_user'));
        $builder->where('id_surat', $id_surat);
        return $builder->countAllResults();
    }
    public function list_notif()
    {
        $builder = $this->db->table('request');
        $builder->where('status', 'Verifikasi');
        return $builder->countAllResults();
    }
    public function print_notif()
    {
        $builder = $this->db->table('request');
        $builder->where('status', 'Proses');
        return $builder->countAllResults();
    }
}
