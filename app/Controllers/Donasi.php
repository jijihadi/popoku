<?php namespace App\Controllers;

use App\Models\Model_donasi;
use App\Models\Model_user;
use App\Models\Model_kurir;
use App\Models\Model_kapasitas;

class Donasi extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_donasi();
        $data['donasi'] = $model->get_donasi()->getResult('array');
        // print_r($model->get_donasi()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data Donasi';
        echo view('admin/include/header', $data);
        echo view('admin/v_donasi/donasi_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_user();
        $data['user'] = $model->get_user()->getResult('array');
        $data['kurir'] = $model->get_user_kurir()->getResult('array');
        // echo ($model->getLastQuery());
        $data['donasi'] = '';
        $data['title'] = 'Tambah Donasi';
        echo view('admin/include/header', $data);
        echo view('admin/v_donasi/donasi_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_donasi();
        $model2 = new Model_user();
        $model3 = new Model_kurir();
        $data['user'] = $model2->get_user()->getResult('array');
        // $data['kurir'] = $model2->get_user_kurir()->getResult('array');
        $data['kurir'] = $model3->get_kurir_ready()->getResult('array');
        // echo ($model->getLastQuery());
        $data['donasi'] = $model->get_donasi($idd)->getResult('array');
        $data['title'] = 'Edit Donasi';
        echo view('admin/include/header', $data);
        echo view('admin/v_donasi/donasi_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi Variabel
        $model = new Model_donasi();

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'jumlah_donasi' => $this->request->getPost('jumlah_donasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'alamat_jemput' => $this->request->getPost('alamat_jemput'),
            'lati' => $this->request->getPost('lati'),
            'longi' => $this->request->getPost('longi'),
        );
        // insert data
        $model->save_donasi($data);
        // echo ($model->getLastQuery());
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/donasi');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/donasi/add');
        }
    }

    public function update($idd)
    {
        // inisialisasi Variabel
        $model = new Model_donasi();
        $model2 = new Model_kapasitas();
        $status = $this->request->getPost('status_donasi');
        $idk = $this->request->getPost('id_kurir');
        // // inisialisasi Variabel array

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'jumlah_donasi' => $this->request->getPost('jumlah_donasi'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'alamat_jemput' => $this->request->getPost('alamat_jemput'),
            'id_kurir' => $this->request->getPost('id_kurir'),
            'tanggal_diambil' => $this->request->getPost('tanggal_diambil'),
            'status_donasi' => $this->request->getPost('status_donasi'),
        );

        // insert data
        $model->update_donasi($data, $idd);

        if ($status==2) {
            $cek = $model2->get_kapasitas($idk)->getrow();

            $data = array(
                'kapasitas_sekarang' => (int)$cek->kapasitas_sekarang - (int)$this->request->getPost('jumlah_donasi'),
                'kapasitas_sisa' =>(int)$cek->kapasitas_sisa - (int)$this->request->getPost('jumlah_donasi'),
            );

            $model2->update_kapasitas($data, $idk);
        }
        
        // echo ($model2->getLastQuery());
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/donasi');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/donasi/update' . $idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_donasi();
        $model->delete_donasi($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/donasi');
    }

    // tambahan
}
