<?php namespace App\Controllers;

use App\Models\Model_artikel;
use CodeIgniter\Controller;

class Artikel extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_artikel();
        $data['artikel'] = $model->get_artikel()->getResult('array');
        // print_r($model->get_artikel()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data artikel';
        echo view('admin/include/header', $data);
        echo view('admin/v_artikel/artikel_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_artikel();
        // echo ($model->getLastQuery());
        $data['artikel'] = '';
        $data['title'] = 'Tambah Artikel';
        echo view('admin/include/header', $data);
        echo view('admin/v_artikel/artikel_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_artikel();
        $data['artikel'] = $model->get_artikel($idd)->getResult('array');
        // echo ($model->getLastQuery());
        $data['title'] = 'Edit Artikel';
        echo view('admin/include/header', $data);
        echo view('admin/v_artikel/artikel_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi Variabel
        $model = new Model_artikel();
        $pp = '';
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'headline_artikel_' . randomize() . ".png";
        $cek_name = $file->getName();

        if ($cek_name != '') {
            // upload
            if ($file->move("assets/file_upload/artikel/", $profile_image)) {
                $pp = $profile_image;
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Upload foto gagal</div>');
                return redirect()->to('/artikel/add');
            }
        }

        $data = array(
            'id_artikel' => $this->request->getPost('id_artikel'),
            'judul' => ucwords($this->request->getPost('judul')),
            'isi' => $this->request->getPost('isi'),
            'headline' => $pp,
        );
        // insert data
        $model->save_artikel($data);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Artikel berhasil disimpan</div>');
            return redirect()->to('/artikel');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/artikel/add');
        }
    }

    public function update($idd)
    {
        // // inisialisasi Variabel
        $model = new Model_artikel();
        $pp = $this->request->getPost('oldfoto');
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'headline_artikel_' . randomize() . ".png";
        $cek_name = $file->getName();
        
        // echo $file->getName();

        if ($cek_name!='') {
            // upload
            if ($file->move("assets/file_upload/artikel/", $profile_image)) {
                $pp = $profile_image;
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Upload foto gagal</div>');
                return redirect()->to('/artikel/add');
            }
        }

        $data = array(
            'id_artikel' => $this->request->getPost('id_artikel'),
            'judul' => ucwords($this->request->getPost('judul')),
            'isi' => $this->request->getPost('isi'),
            'headline' => $pp,
            'edited' => 1,
        );
        // insert data
        $model->update_artikel($data, $idd);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/artikel');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/artikel/update'.$idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_artikel();
        $model->delete_artikel($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/artikel');
    }
}
