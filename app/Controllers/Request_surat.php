<?php

namespace App\Controllers;

use App\Models\KKModel;
use App\Models\RequestModel;
use App\Models\SuratModel;


class Request_surat extends BaseController
{
    protected $modelSurat;
    public function __construct()
    {
        $this->modelSurat = new SuratModel();
        $this->modelRequest = new RequestModel();
        $this->modelKK = new KKModel();
    }
    public function index()
    {
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $search = $this->modelSurat->searching($keyword);
        } else {
            $search = $this->modelSurat;
        }
        $data = [
            'jenis_surat' => $search->paginate(6),
            'pager' => $this->modelSurat->pager,
            'list_request' => $this->modelRequest->getUser(),
            // 'tot' => $this->modelRequest->tot_surat(),
            'title' => 'Request Surat',
            'page' => $page,
            'validation' => \config\Services::validation()
        ];
        return view('pages/surat/request_surat', $data);
        // dd($surat);
    }


    public function cek_kk()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'No. NIK Harus Di isi!',
                    'numeric' => 'No. KK Berupa Angka!'
                ]
            ],
            'kk' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'No. KK Harus Diisi!',
                    'numeric' => 'No. KK Berupa Angka!'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('surat')->withInput()->with('validation', $validation);
        }
        $model = new KKModel();
        $nik = $this->request->getVar('nik');
        $kk = $this->request->getVar('kk');
        $dataKK = $model->where(['nik' => $nik])->first();
        if ($dataKK) {
            if ($kk == $dataKK['kk']) {
                session()->set([
                    'id_kk' => $dataKK['id'],
                    'request' => true
                ]);
                session()->setFlashdata('success', 'Data Ditemukan!');

                return redirect()->to(base_url('surat'))->withInput();
            } else {
                session()->setFlashdata('info', 'KK Tidak Ditemukan!');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('info', 'NIK Tidak Ditemukan!');
            return redirect()->back()->withInput();
        }
    }
    public function request()
    {
        $id_surat = $this->request->getVar('surat');
        $verify = $this->modelRequest->getVerifikasi($id_surat);
        $proses = $this->modelRequest->getProses($id_surat);
        if ($verify >= 1) {
            session()->setFlashdata('error', 'Masih ada data yang Belum Terverifikasi!');
            return redirect()->to(base_url('surat'));
        }
        if ($proses >= 1) {
            session()->setFlashdata('error', 'Masih ada data yang Sedang Diproses!');
            return redirect()->to(base_url('surat'));
        }

        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('Y-m-d');
        $jam = date('h:i:s');
        $this->modelRequest->save([
            'id' => $this->request->getVar('card'),
            'id_user' => session()->get('id_user'),
            'id_surat' => $this->request->getVar('surat'),
            'id_contact' => '1',
            'ket' => $this->request->getVar('ket'),
            'tujuan' => $this->request->getVar('tujuan'),
            'token' => 'LNT' . session()->get('id_user') . date('hms'),
            'tgl_masuk' =>  $tanggal,
            'jam_masuk' =>  $jam,
            'status' => 'Verifikasi'

        ]);

        session()->setFlashdata('success', 'Silahkan Tunggu Data TerVerifikasi!');
        return redirect()->to(base_url('surat'));
    }
}
