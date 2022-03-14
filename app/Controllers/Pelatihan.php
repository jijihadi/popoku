<?php namespace App\Controllers;

use App\Models\Model_pelatihan;
use App\Models\Model_user;
use CodeIgniter\Controller;

class Pelatihan extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_pelatihan();
        $data['pelatihan'] = $model->get_pelatihan()->getResult('array');
        // print_r($model->get_pelatihan()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data pelatihan';
        echo view('admin/include/header', $data);
        echo view('admin/v_pelatihan/pelatihan_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_user();
        $data['user'] = $model->get_user()->getResult('array');
        // echo ($model->getLastQuery());
        $data['pelatihan'] = '';
        $data['title'] = 'Tambah Pelatihan';
        echo view('admin/include/header', $data);
        echo view('admin/v_pelatihan/pelatihan_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_pelatihan();
        $model2 = new Model_user();
        $data['user'] = $model2->get_user()->getResult('array');
        $data['pelatihan'] = $model->get_pelatihan($idd)->getResult('array');
        $data['title'] = 'Edit Pelatihan';
        echo view('admin/include/header', $data);
        echo view('admin/v_pelatihan/pelatihan_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi Variabel
        $model = new Model_pelatihan();
        $pemateri = $this->request->getPost('pemateri');
        if ($pemateri=='') {
            $pemateri = '';
        }

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'waktu_pelatihan' => $this->request->getPost('waktu'),
            'lokasi_pelatihan' => $this->request->getPost('lokasi'),
            'hp_panitia' => $this->request->getPost('hp'),
            'pemateri' => $pemateri,
        );
        // insert data
        $model->save_pelatihan($data);
                // echo ($model->getLastQuery());
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/pelatihan');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/pelatihan/add');
        }
    }

    public function update($idd)
    {
        // inisialisasi Variabel
        $model = new Model_pelatihan();
        // // inisialisasi Variabel
        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'waktu_pelatihan' => $this->request->getPost('waktu'),
            'lokasi_pelatihan' => $this->request->getPost('lokasi'),
            'hp_panitia' => $this->request->getPost('hp'),
            'pemateri' => $this->request->getPost('pemateri'),
            'dilaksanakan' => $this->request->getPost('dilaksanakan'),
        );
        // insert data
        $model->update_pelatihan($data, $idd);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/pelatihan');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/pelatihan/update'.$idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_pelatihan();
        $model->delete_pelatihan($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/pelatihan');
    }
}
