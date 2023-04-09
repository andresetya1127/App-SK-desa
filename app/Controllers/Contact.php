<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    protected $modelContact;
    public function __construct()
    {
        $this->modelContact = new ContactModel();
    }
    public function index()
    {


        $data = [
            'title' => 'Contact',
            'contact' => $this->modelContact->findAll()

        ];
        return view('pages/contact/contact', $data);

        // dd($id);
    }

    public function save_contact()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                ]
            ],
            'hp' => [
                'rules' => 'required|min_length[12]|max_length[12]',
                'errors' => [
                    'required' => 'No Hp Harus Di Isi!',
                    'min_length' => 'Min. 12 Digit angka!',
                    'max_length' => 'Man. 12 Digit angka!'
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
            return redirect()->to('contact')->withInput()->with('validation', $validation);
        }

        $this->modelContact->save([
            'name_contact' => $this->request->getVar('nama'),
            'hp' => $this->request->getVar('hp'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        session()->setFlashdata('success', 'Contact Berhasil Ditambah!');
        return redirect()->to(base_url('contact'));
    }

    public function contact_delete($id_contact)
    {
        $this->modelContact->delete($id_contact);
        session()->setFlashdata('success', 'Contact Berhasil Dihapus!');
        return redirect()->to(base_url('contact'));
    }

    public function edit_contact($id_contact)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Harus Di Isi!',
                    'alpha_space' => 'Nama Harus Beruapa Huruf Saja!'
                ]
            ],
            'hp' => [
                'rules' => 'required|min_length[12]|max_length[12]',
                'errors' => [
                    'required' => 'No Hp Harus Di Isi!',
                    'min_length' => 'Min. 12 Digit angka!',
                    'max_length' => 'Man. 12 Digit angka!'
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
            return redirect()->to('contact')->withInput()->with('validation', $validation);
        }

        $this->modelContact->save([
            'id_contact' => $id_contact,
            'name_contact' => $this->request->getVar('nama'),
            'hp' => $this->request->getVar('hp'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        session()->setFlashdata('success', 'Contact Berhasil Diubah!');
        return redirect()->to(base_url('contact'));
    }
}
