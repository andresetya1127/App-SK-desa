    <?php

    namespace App\Controllers;

    use App\Models\KKModel;
    use App\Models\UserModel;

    class Register extends BaseController
    {
        protected $modelkk;
        public function __construct()
        {
            $this->modelkk = new KKModel();
            $this->userModel = new UserModel();
        }
        public function index()
        {

            $data = [
                'title' => 'Registrasi',
                'validation' => \config\Services::validation()
            ];
            return view('auth/register', $data);

            // $kk = $this->modelkk->findAll();
            // dd($kk);
        }

        public function save()
        {
            // Validasi Data
            if (!$this->validate([

                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username Harus Di isi!',
                        'is_unique' => 'Username Sudah Ada! '
                    ]
                ],

                'hp' => [
                    'rules' => 'required|is_unique[user.hp]|min_length[11]',
                    'errors' => [
                        'required' => 'No. Hp Harus Di isi!',
                        'is_unique' => 'No. Hp Sudah Ada!',
                        'min_length' => 'No. Hp Minimal 11 Digit!'
                    ]
                ],
                'password' => [
                    'rules' => 'required|matches[konfirmasi]|min_length[8]',
                    'errors' => [
                        'required' => 'Password Harus Di isi!',
                        'matches' => 'Password Harus Sama!',
                        'min_length' => 'Password Minimal 8 Karakter!'
                    ]
                ],
                'konfirmasi' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Password Harus Di isi!',
                        'matches' => 'Password Harus Sama!',
                    ]
                ]
            ])) {
                $validation = \config\Services::validation();
                return redirect()->to('register')->withInput()->with('validation', $validation);
            }
            $pass = $this->request->getVar('password');
            $konfirmasi = $this->request->getVar('konfirmasi');
            if ($pass == $konfirmasi) {
                $this->userModel->save([
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'password' => MD5($this->request->getVar('password')),
                    'level' => $this->request->getVar('level'),
                    'jk' => $this->request->getVar('jk'),
                    'hp' => $this->request->getVar('hp'),

                ]);
                session()->setFlashdata('success', 'Berhasil Mendaftar!');
                return redirect()->to(base_url('/'));
            }
        }
    }
