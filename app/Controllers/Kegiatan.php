<?php namespace App\Controllers;

use App\Models\Model_kegiatan;
use CodeIgniter\Controller;

class Kegiatan extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_kegiatan();
        $data['kegiatan'] = $model->get_kegiatan()->getResult('array');
        // print_r($model->get_kegiatan()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data Kegiatan';
        echo view('admin/include/header', $data);
        echo view('admin/v_kegiatan/kegiatan_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        // echo ($model->getLastQuery());
        $data['kegiatan'] = '';
        $data['title'] = 'Tambah Kegiatan';
        echo view('admin/include/header', $data);
        echo view('admin/v_kegiatan/kegiatan_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_kegiatan();
        $data['kegiatan'] = $model->get_kegiatan($idd)->getResult('array');
        $data['title'] = 'Edit Kegiatan';
        echo view('admin/include/header', $data);
        echo view('admin/v_kegiatan/kegiatan_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi Variabel
        $model = new Model_kegiatan();
        $pp = '';
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'foto_kegiatan_' . randomize() . ".png";
        $cek_name = $file->getName();

        if ($cek_name != '') {
            // upload
            if ($file->move("assets/file_upload/kegiatan/", $profile_image)) {
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
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('waktu'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'foto_kegiatan' => $pp,
        );
        // insert data
        $model->save_kegiatan($data);
                // echo ($model->getLastQuery());
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/kegiatan');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/kegiatan/add');
        }
    }

    public function update($idd)
    {
        // inisialisasi Variabel
        $model = new Model_kegiatan();
        $pp = $this->request->getPost('oldfoto');
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'foto_kegiatan_' . randomize() . ".png";
        $cek_name = $file->getName();

        if ($cek_name != '') {
            // upload
            if ($file->move("assets/file_upload/kegiatan/", $profile_image)) {
                $pp = $profile_image;
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Upload foto gagal</div>');
                return redirect()->to('/artikel/add');
            }
        }
        // // inisialisasi Variabel
        $data = array(
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('waktu'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'foto_kegiatan' => $pp,
        );
        // insert data
        $model->update_kegiatan($data, $idd);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/kegiatan');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/kegiatan/update'.$idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_kegiatan();
        $model->delete_kegiatan($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/kegiatan');
    }
}
