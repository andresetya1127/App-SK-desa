<?php

namespace App\Controllers;

use App\Models\KKModel;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $modelAuth;
    public function __construct()
    {
        $this->modelAuth = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Log in',
            'model' => $this->modelAuth->findAll(),
            'validation' => \config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function auth()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus Di isi!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/')->withInput()->with('validation', $validation);
        }
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $model->where(['username' => $username])->first();
        if ($dataUser) {
            if (md5($password) == $dataUser['password']) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'username' => $dataUser['username'],
                    'hp' => $dataUser['hp'],
                    'level' => $dataUser['level'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('dashboard/user'))->withInput();
            } else {
                session()->setFlashdata('pass', 'is-invalid');
                session()->setFlashdata('pass2', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('user', 'is-invalid');
            session()->setFlashdata('user2', 'Username Salah!');
            return redirect()->back()->withInput();
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
