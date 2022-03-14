<?php namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_user;

class User extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_user();
        $data['customer'] = $model->getUser();
        $data['title'] = 'Data user';
        echo view('admin/include/header', $data);
        echo view('admin/v_user/user_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_kategori();
        $data['level'] = $model->get_kategori_user()->getResult('array');
        $data['user'] = '';
        $data['title'] = 'Tambah User';
        echo view('admin/include/header', $data);
        echo view('admin/v_user/user_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_kategori();
        $model2 = new Model_user();
        $data['level'] = $model->get_kategori_user()->getResult('array');
        $data['user'] = $model2->getUser($idd)->getResult('array');
        $data['title'] = 'Edit User';
        echo view('admin/include/header', $data);
        echo view('admin/v_user/user_form', $data);
        echo view('admin/include/footer');
    }

    public function edit_akun($idd)
    {
        $model = new Model_kategori();
        $model2 = new Model_user();
        $data['level'] = $model->get_kategori_user()->getResult('array');
        $data['user'] = $model2->getUser($idd)->getResult('array');
        $data['title'] = 'Edit Akun Anda';
        echo view('admin/include/header', $data);
        echo view('admin/edit_akun', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        $model = new Model_user();
        if ($this->request->getPost('password') == '') {
            $pass = $this->request->getPost('oldpassword');
        } else {
            $pass = sha1(md5($this->request->getPost('password')));
        }

        $data = array(
            'id_level' => $this->request->getPost('id_level'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $pass,
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->save_user($data);
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            return redirect()->to('/user/add');
        }
    }

    public function update($idd)
    {
        $model = new Model_user();
        if ($this->request->getPost('password') == '') {
            $pass = $this->request->getPost('oldpassword');
        } else {
            $pass = sha1(md5($this->request->getPost('password')));
        }

        if ($this->request->getPost('id_level') == '') {
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $pass,
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
            );
        } else {
            $data = array(
                'id_level' => $this->request->getPost('id_level'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $pass,
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
            );
        }

        $model->update_user($data, $idd);
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data ' . $this->request->getPost('nama') . ' berhasil diubah</div>');
            return redirect()->to('/user');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam merubah data</div>');
            return redirect()->to('/user/add');
        }
    }

    public function delete($idd)
    {
        $model = new Model_user();
        $model->delete_user($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/user');
    }
}
