<?php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\KetModel;
use App\Models\ContactModel;


class List_surat extends BaseController
{
    protected $modelSurat;
    public function __construct()
    {
        $this->modelRequest = new RequestModel();
        $this->ketModel = new KetModel();
        $this->ContactModel = new ContactModel();
    }
    public function index()
    {
        // $surat = $this->modelRequest->getAll();
        $data = [
            'ls' => 'active',
            'list_request' => $this->modelRequest->getAll(),
            'title' => 'List Surat'

        ];
        return view('pages/surat/list_surat', $data);
        // dd($surat);  
    }
    public function terima($id_request)
    {
        $this->modelRequest->save([
            'id_request' => $id_request,
            'status' => 'Proses',

        ]);
        session()->setFlashdata('success', 'Data Berhasil Terverifikasi!');
        return redirect()->to(base_url('Print/doc'));
    }

    public function tolak($id_request)
    {
        $this->modelRequest->save([
            'id_request' => $id_request,
            'status' => 'Ditolak'

        ]);
        session()->setFlashdata('success', 'Data Berhasil Ditolak!');
        return redirect()->to(base_url('list_surat/all'));
    }


    public function keterangan($id_request)
    {
        $this->modelRequest->save([
            'id_request' => $id_request,
            'ket' => $this->request->getVar('ket')
        ]);
        return redirect()->to(base_url('pdf/' . $id_request));
    }

    /////////////////////////////////////////////////

    public function print_surat()
    {
        $data = [
            'title' => 'Print Surat',
            'validation' => \config\Services::validation(),
            'list_request' => $this->modelRequest->getPrint(),
            'contact' => $this->ContactModel->findAll()
        ];
        return view('pages/surat/cetak_surat', $data);
    }

    public function add_ttd()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan Harus Di Isi!'
                ]
            ],
            // 'profil' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Profil Belum Diisi!',
            //     ]
            // ],

        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('info', 'Lengkapi Data Dengan Benar!');
            return redirect()->to('Print/doc')->withInput()->with('validation', $validation);
        }

        $this->ContactModel->save([
            'name_contact' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        session()->setFlashdata('success', 'Tanda Tangan Berhasil Ditambah!');
        return redirect()->to(base_url('Print/doc'));
    }

    public function ttd($id_request)
    {
        if ($this->request->getVar('ttd') == '') {
            session()->set('invalid' . $id_request, 'Tanda Tangan Tidak Boleh Kosong!');
            session()->setFlashdata('error', 'Tanda Tangan Tidak Boleh Kosong!');
            return redirect()->to(base_url('Print/doc'));
        }
        $this->modelRequest->save([
            'id_request' => $id_request,
            'id_contact' => $this->request->getVar('ttd')

        ]);
        session()->setFlashdata('success', 'Berhasil!');
        return redirect()->to(base_url('Print/doc'));
    }
    public function text($id_request)
    {
        $this->modelRequest->save([
            'id_request' => $id_request,
            'txt1' => $this->request->getVar('text1'),
            'txt2' => $this->request->getVar('text2')

        ]);
        session()->setFlashdata('success', 'Berhasil!');
        return redirect()->to(base_url('Print/doc'));
    }
}
