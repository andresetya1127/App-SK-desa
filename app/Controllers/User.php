<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $modelUser;
    public function __construct()
    {
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
            'user' => $this->userModel->findAll(),
            'validation' => \config\Services::validation()
        ];
        return view('penduduk/user', $data);
        // dd($user);
    }
    public function save($id_user)
    {
        if (!$this->validate([
            'password' . $id_user => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('info', 'Password Tidak Boleh Kosong!');
            return redirect()->to('user/all')->withInput()->with('validation', $validation);
        }
        $this->userModel->save([
            'id_user' => $id_user,
            'password' => MD5($this->request->getVar('password' . $id_user))
        ]);
        session()->setFlashdata('success', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('user/all'));
        // dd($this->request->getVar());
    }

    public function delete($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('success', 'User Berhasil Dihapus!');
        return redirect()->to(base_url('user/all'));
    }
}
