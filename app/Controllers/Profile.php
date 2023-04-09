<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $modelProfile;
    public function __construct()
    {
        // $this->modelkk = new KKModel();
        $this->modelProfile = new ProfileModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Profile Kantor Desa',
            'profil' => $this->modelProfile->findAll(),
            'validation' => \config\Services::validation()

        ];
        // session()->setFlashdata('pesan', 'Selamat Datang DiProfie Desa Lantan');
        return view('pages/profile/profile', $data);
        // dd($id);
    }

    public function upload()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar Belum Dipilih!',
                    'max_size' => 'Ukuran Gambar Max. 1MB!',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar!',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar!'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('error', $validation->getError('gambar'));
            return redirect()->to(base_url('profile'))->withInput();
        }
        // dd('berhasil');
        $img = $this->request->getFile('gambar');
        // // // memindahkan file gambar
        $img->move('img/profile');
        // // // mengambil nama file
        $namaGambar = $img->getName();


        $this->modelProfile->save([
            'gambar' => $namaGambar
        ]);
        session()->setFlashdata('success', 'Gambar Berhasill Di Upload!');
        return redirect()->to(base_url('profile'));
    }

    public function delete($id)
    {
        $profil = $this->modelProfile->find($id);
        unlink('img/profile/' . $profil['gambar']);
        $this->modelProfile->delete($id);
        session()->setFlashdata('success', 'Gambar Berhasil Dihapus!');
        return redirect()->to(base_url('profile'));
    }
}
