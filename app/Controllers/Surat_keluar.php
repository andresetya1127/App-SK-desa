<?php

namespace App\Controllers;

use App\Models\KeluarModel;
use App\Models\RequestModel;
use App\Models\KetModel;


class Surat_keluar extends BaseController
{
    protected $modelSurat;
    public function __construct()
    {
        $this->modelKeluar = new KeluarModel();
        $this->modelRequest = new RequestModel();
        $this->ketModel = new KetModel();
    }
    public function index()
    {

        // $surat = $this->modelKeluar->getAll();
        $data = [
            'list_request' => $this->modelKeluar->done(),
            'title' => 'Surat Keluar',

        ];
        return view('pages/surat/surat_keluar', $data);
        // dd($surat);  
    }

    public function selesai($id_request)
    {
        $this->modelRequest->save([
            'id_request' => $id_request,
            'status' => 'Selesai'

        ]);
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('Y-m-d');
        $jam = date('h:i:s');
        $this->modelKeluar->save([
            'id_request' => $id_request,
            'tgl_keluar' =>  $tanggal,
            'jam_keluar' =>  $jam,
        ]);

        session()->setFlashdata('success', 'Data Selesai!');
        return redirect()->to(base_url('Print/doc'));
    }
}
