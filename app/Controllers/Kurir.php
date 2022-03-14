<?php namespace App\Controllers;

use App\Models\Model_kurir;
use App\Models\Model_user;
use App\Models\Model_kapasitas;
use App\Models\Model_kategori;
use CodeIgniter\Controller;

class Kurir extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_kurir();
        $data['kurir'] = $model->get_kurir()->getResult('array');
        // print_r($model->get_kurir()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data kurir';
        echo view('admin/include/header', $data);
        echo view('admin/v_kurir/kurir_list', $data);
        echo view('admin/include/footer');
    }

    public function kapasitas($idd)
    {
        $model = new Model_kapasitas();
        $model2 = new Model_kurir();
        $model3 = new Model_kategori();
        
        $data['kapasitas'] = $model->get_kapasitas($idd)->getResult('array');
        $data['level_kap'] = $model3->get_kategori_kapasitas()->getResult('array');
        // echo ($model->getLastQuery());
        $nama = $model2->get_kurir($idd)->getRow()->nama;
        $data['title'] = 'Detail Kapasitas Kurir '.$nama;
        $data['nama'] = $nama;
        $data['idd'] = $idd;
        echo view('admin/include/header', $data);
        echo view('admin/v_kurir/kapasitas_detail', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_user();
        $data['user'] = $model->get_user_kurir()->getResult('array');
        // echo ($model->getLastQuery());
        $data['kurir'] = '';
        $data['title'] = 'Tambah Kurir';
        echo view('admin/include/header', $data);
        echo view('admin/v_kurir/kurir_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_kurir();
        $model2 = new Model_user();
        $data['user'] = $model2->get_user_kurir()->getResult('array');
        $data['kurir'] = $model->get_kurir($idd)->getResult('array');
        // echo ($model->getLastQuery());
        $data['title'] = 'Edit Kurir';
        echo view('admin/include/header', $data);
        echo view('admin/v_kurir/kurir_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi Variabel
        $model = new Model_kurir();
        $pp = '';
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'kurir_profil_' . randomize() . ".png";
        $cek_name = $file->getName();

        if ($cek_name != '') {
            // upload
            if ($file->move("assets/file_upload/foto/", $profile_image)) {
                $pp = $profile_image;
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Upload foto gagal</div>');
                return redirect()->to('/kurir/add');
            }
        }

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'lokasi_kurir' => $this->request->getPost('lokasi'),
            'plat_nomor_kurir' => strtoupper($this->request->getPost('plat_nomor')),
            'foto_kurir' => $pp,
        );
        // insert data
        $model->save_kurir($data);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/kurir');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/kurir/add');
        }
    }

    public function update($idd)
    {
        // // inisialisasi Variabel
        $model = new Model_kurir();
        $pp = $this->request->getPost('oldfoto');
        $file = $this->request->getFile("foto");
        $file_type = $file->getClientMimeType();
        $profile_image = 'kurir_profil_' . randomize() . ".png";
        $cek_name = $file->getName();
        
        echo $file->getName();

        if ($cek_name!='') {
            //upload
            if ($file->move("assets/file_upload/foto/", $profile_image)) {
                $pp = $profile_image;
            } else {
                session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Upload foto gagal</div>');
                return redirect()->to('/kurir/add');
            }
        }

        $data = array(
            'id_user' => $this->request->getPost('id_user'),
            'lokasi_kurir' => $this->request->getPost('lokasi'),
            'plat_nomor_kurir' => strtoupper($this->request->getPost('plat_nomor')),
            'foto_kurir' => $pp,
        );
        // insert data
        $model->update_kurir($data, $idd);
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/kurir');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/kurir/update'.$idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_kurir();
        $model->delete_kurir($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/kurir');
    }

    // kapasitas
    public function update_kapasitas($idd)
    {
        // // inisialisasi Variabel
        $model = new Model_kurir();
        $model2 = new Model_kapasitas();

        $data = array(
            'kapasitas_max' => $this->request->getPost('max'),
            'kapasitas_sisa' => $this->request->getPost('sisa'),
            'kapasitas_sekarang' => $this->request->getPost('now'),
            'id_level_kapasitas' => $this->request->getPost('id_level_kapasitas'),
            'id_kurir' => $idd,
        );

        // cek
        $kapasiti = $model2->get_kapasitas($idd);
        // print_r( $kapasiti->getResultArray(1));
        // insert data
        if (!empty( $kapasiti->getResultArray())) {
            $model2->update_kapasitas($data, $idd);
        }else{
            $model2->save_kapasitas($data);
        }
        // echo ($model->getLastQuery());

        //redirect
        // echo ($model->getLastQuery());

        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/kurir/kapasitas/'.$idd);
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/kurir/kapasitas/'.$idd);
        }
    }
}
