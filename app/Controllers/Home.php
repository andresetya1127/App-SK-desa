<?php

namespace App\Controllers;

use App\Models\KeluarModel;
use App\Models\KKModel;
use App\Models\RequestModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $modelkk;
    public function __construct()
    {
        $this->model = new RequestModel();
        $this->modelUser = new UserModel();
        $this->modelKeluar = new KeluarModel();
        $this->modelKK = new KKModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'total' => $this->model->getProses(),
            'sum_user' => $this->modelUser->sum_user(),
            'sum_keluar' => $this->modelKeluar->sum_keluar(),
            'sum_kk' => $this->modelKK->sum_kk()
        ];
        return view('admin/dashboard', $data);
    }
}
