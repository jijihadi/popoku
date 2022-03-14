<?php namespace App\Controllers;

use App\Models\Model_auth;
use CodeIgniter\Controller;

class Register extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //set rules validation form
        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[password]',
        ];

        if ($this->validate($rules)) {
            $model = new Model_auth();
            $data = [
                'nama' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => sha1(md5($this->request->getVar('password'))),
                'id_level' => 4,
            ];
            $model->save($data);
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Silahkan login menggunakan akun anda</div>');
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }

    }

}
