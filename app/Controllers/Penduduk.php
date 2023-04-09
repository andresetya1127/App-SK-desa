<?php

namespace App\Controllers;

use App\Models\KKModel;
use App\Models\UserModel;

class Penduduk extends BaseController
{
    protected $modelkk;
    public function __construct()
    {
        $this->modelkk = new KKModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        // $user = $this->userModel->allUser();
        $data = [
            'jk' => $this->jk,
            'agama' => $this->agama,
            'status' => $this->status,
            'pendidikan' => $this->pndidik,
            'title' => 'Daftar Penduduk',
            'user' => $this->modelkk->findAll(),
            'user_all' => $this->userModel->allUser(),
            'validation' => \config\Services::validation()
        ];
        return view('penduduk/penduduk', $data);
        // dd($user);
    }


    public function save_user($id)
    {
        if (!$this->validate([
            'username' . $id => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong!',
                    'is_unique' => 'Username sudah Ada!'
                ]
            ],
            'hp' . $id => [
                'rules' => 'required|min_length[11]|max_length[12]',
                'errors' => [
                    'required' => 'Nomor Hp Tidak Boleh Kosong!',
                    'min_length' => 'Nomor Hp Harus 11-12 digit!'
                ]
            ],
            'password' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('info', 'Silahkan Lengkapi Data Dengan Benar!');
            return redirect()->to('penduduk/all')->withInput()->with('validation', $validation);
        }
        $this->userModel->save([
            'username' => $this->request->getVar('username' . $id),
            'level' =>  '2',
            'hp' => $this->request->getVar('hp' . $id),
            'password' => MD5($this->request->getVar('password' . $id))
        ]);
        $id_user = $this->userModel->insertID();
        $this->modelkk->save([
            'id' =>  $id,
            'id_user' => $id_user
        ]);
        session()->setFlashdata('success', 'User Berhasil Ditambah!');
        return redirect()->to(base_url('penduduk/all'));
    }

    public function delete($id)
    {
        $this->modelkk->delete($id);
        session()->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->back();
    }


    public function add_kk()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                    'alpha' => 'Harus Beruapa Huruf Saja!'
                ]
            ],
            'kk' => [
                'rules' => 'required|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                    'max_length' => 'No. KK Maximal 16 digit! ',
                    'min_length' => 'No. KK Minimal 16 digit! '
                ]
            ],
            'nik' => [
                'rules' => 'required|is_unique[kk.nik]|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                    'is_unique' => 'NIK Sudah Terdaftar! ',
                    'max_length' => 'No. NIK Maximal 16 digit! ',
                    'min_length' => 'No. NIK Minimal 16 digit! '
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Belum Diisi!',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pendidikan Belum Diisi!',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Jenis Kelamin!',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Belum Terisi!',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Agama!',
                ]
            ],
            'status_kawin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Status Perkawinan!',
                ]
            ],
            'nm_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Nama Ayah!',
                ]
            ],
            'nm_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Nama Ibu!',
                ]
            ],
            'tmp_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Tempat Lahir!',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Alamat!',
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('info', 'Mohon Lengkapi Data Dengan Benar!');
            return redirect()->to('penduduk/all')->withInput()->with('validation', $validation);
        }
        $this->modelkk->save([
            'nama' => $this->request->getVar('nama'),
            'kk' => $this->request->getVar('kk'),
            'nik' => $this->request->getVar('nik'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jk' => $this->request->getVar('jk'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'agama' => $this->request->getVar('agama'),
            'status_kawin' => $this->request->getVar('status_kawin'),
            'nm_ayah' => $this->request->getVar('nm_ayah'),
            'nm_ibu' => $this->request->getVar('nm_ibu'),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        // session()->destroy();
        session()->setFlashdata('success', 'Data Penduduk Berhasil Ditambah!');
        return redirect()->to(base_url('penduduk/all'));
    }


    public function edit_kk($id)
    {

        if (!$this->validate([
            'nama' . $id => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                    'alpha_space' => 'Nama Harus Beruapa Huruf Saja!'
                ]
            ],
            'kk' . $id => [
                'rules' => 'required|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'No KK Harus Di Isi!',
                    'max_length' => 'No. KK Maximal 16 digit! ',
                    'min_length' => 'No. KK Minimal 16 digit! '
                ]
            ],
            'nik' . $id => [
                'rules' => 'required|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'No NIK Harus Di Isi!',
                    'max_length' => 'No. NIK Maximal 16 digit! ',
                    'min_length' => 'No. NIK Minimal 16 digit! '
                ]
            ],
            'pekerjaan' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Belum Diisi!',
                ]
            ],
            'pendidikan' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pendidikan Belum Diisi!',
                ]
            ],
            'jk' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Jenis Kelamin!',
                ]
            ],
            'tgl_lahir' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Belum Terisi!',
                ]
            ],
            'agama' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Agama!',
                ]
            ],
            'status_kawin' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Status Perkawinan!',
                ]
            ],
            'nm_ayah' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Nama Ayah!',
                ]
            ],
            'nm_ibu' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Nama Ibu!',
                ]
            ],
            'tmp_lahir' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Tempat Lahir!',
                ]
            ],
            'alamat' . $id => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Alamat!',
                ]
            ],
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('info', 'Silahkan isi data Dengan Benar!');
            return redirect()->to(base_url('penduduk/all'))->withInput()->with('validation', $validation);
        }

        $this->modelkk->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama' . $id),
            'kk' => $this->request->getVar('kk' . $id),
            'nik' => $this->request->getVar('nik' . $id),
            'pekerjaan' => $this->request->getVar('pekerjaan' . $id),
            'pendidikan' => $this->request->getVar('pendidikan' . $id),
            'jk' => $this->request->getVar('jk' . $id),
            'tgl_lahir' => $this->request->getVar('tgl_lahir' . $id),
            'agama' => $this->request->getVar('agama' . $id),
            'status_kawin' => $this->request->getVar('status_kawin' . $id),
            'nm_ayah' => $this->request->getVar('nm_ayah' . $id),
            'nm_ibu' => $this->request->getVar('nm_ibu' . $id),
            'tmp_lahir' => $this->request->getVar('tmp_lahir' . $id),
            'alamat' => $this->request->getVar('alamat' . $id)
        ]);
        // session()->destroy();
        session()->setFlashdata('success', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('penduduk/all'));
    }
}
