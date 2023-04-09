<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Format_surat extends BaseController
{
    protected $modelSurat;
    public function __construct()
    {
        // $this->modelkk = new KKModel();
        $this->modelSurat = new SuratModel();
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
            'jenis_surat' => $search->paginate(8),
            'pager' => $this->modelSurat->pager,
            // 'list_request' => $this->modelRequest->getUser(),
            // 'tot' => $this->modelRequest->tot_surat(),
            'title' => 'Format Surat',
            'page' => $page,
            'validation' => \config\Services::validation()

        ];
        // session()->setFlashdata('pesan', 'Selamat Datang DiProfie Desa Lantan');
        return view('pages/surat/format_surat', $data);
        // dd($id);
    }

    public function tambah_surat()
    {
        if (!$this->validate([

            'jenis_surat' => [
                'rules' => 'required|is_unique[jenis_surat.jenis_surat]',
                'errors' => [
                    'required' => 'Judul Surat Harus Di isi!',
                    'is_unique' => 'Username Sudah Ada! '
                ]
            ]
        ])) {
            session()->setFlashdata('info', 'Silahkan Masukkan Judul Surat!');

            // $validation = \config\Services::validation();
            return redirect()->to('format')->withInput();
        }


        $this->modelSurat->save([
            'jenis_surat' => $this->request->getVar('jenis_surat')

        ]);
        session()->setFlashdata('success', 'Surat Berhasil Ditambah!');
        return redirect()->to(base_url('format'));
    }

    public function delete($id)
    {
        $this->modelSurat->delete($id);
        session()->setFlashdata('success', 'Surat Berhasil DIhapus!');
        return redirect()->to(base_url('format'));
    }
}
