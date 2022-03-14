<?php namespace App\Controllers;

use App\Models\Model_kategori;
use CodeIgniter\Controller;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new Model_kategori();
        $data['user'] = $model->get_kategori_user()->getResult('array');
        $data['kategori'] = $model->get_kategori_produk()->getResult('array');
        $data['kapasitas'] = $model->get_kategori_kapasitas()->getResult('array');
        $data['title'] = 'Data Semua Kategori';
        echo view('admin/include/header', $data);
        echo view('admin/v_kategori/kategori_list', $data);
        echo view('admin/include/footer');
    }

    public function add($tipe)
    {
        $data['tipe'] = $tipe;
        $data['kategori'] = '';
        $data['title'] = 'Tambah Kategori ' . ucwords($tipe);
        echo view('admin/include/header', $data);
        echo view('admin/v_kategori/kategori_form', $data);
        echo view('admin/include/footer');
    }

    public function save($tipe)
    {
        // load model
        $model = new Model_kategori();

        // inisialisasi data
        if ($tipe == 'user') {
            $data = array(
                'level' => $this->request->getPost('nama'),
            );
            $save = $model->save_kategori_user($data);
        } elseif ($tipe == 'produk') {
            $data = array(
                'nama_kategori' => $this->request->getPost('nama'),
            );
            $save = $model->save_kategori_produk($data);
        } elseif ($tipe == 'kapasitas') {
            $data = array(
                'nama_level_kapasitas' => $this->request->getPost('nama'),
            );
            $save = $model->save_kategori_kapasitas($data);
        }
        // eksekusi save
        if (!$model->error()) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Kategori '.$tipe.' berhasil disimpan</div>');
            return redirect()->to('/kategori');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Berhasil Disimpan</div>');
            return redirect()->to('/kategori/add/'.$tipe);
        }
    }

    // edit data
    public function edit($tipe, $idd)
    {
        $model = new Model_kategori();
        if ($tipe == 'user') {
            $data['kategori'] = $model->get_kategori_user($idd)->getResult('array');
        } elseif ($tipe == 'produk') {
            $data['kategori'] = $model->get_kategori_produk($idd)->getResult('array');
        } elseif ($tipe == 'kapasitas') {
            $data['kategori'] = $model->get_kategori_kapasitas($idd)->getResult('array');
        }
        $data['tipe'] = $tipe;
        $data['title'] = 'Edit Kategori ' . ucwords($tipe);
        echo view('admin/include/header', $data);
        echo view('admin/v_kategori/kategori_form', $data);
        echo view('admin/include/footer');
    }

    public function update($tipe, $idd)
    {
        // load model
        $model = new Model_kategori();

        // inisialisasi data
        if ($tipe == 'user') {
            $data = array(
                'level' => $this->request->getPost('nama'),
            );
            $update = $model->update_kategori_user($data, $idd);
        } elseif ($tipe == 'produk') {
            $data = array(
                'nama_kategori' => $this->request->getPost('nama'),
            );
            $update = $model->update_kategori_produk($data, $idd);
        } elseif ($tipe == 'kapasitas') {
            $data = array(
                'nama_level_kapasitas' => $this->request->getPost('nama'),
            );
            $update = $model->update_kategori_kapasitas($data, $idd);
        }
        // eksekusi update
        if (!$model->error()) {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Kategori '.$tipe.' berhasil diubah</div>');
            return redirect()->to('/kategori');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Berhasil Diubah</div>');
            return redirect()->to('/kategori/edit/'.$tipe.'/'.$idd);
        }
    }

    // hapus data
    public function delete($tipe, $idd)
    {
        // load model
        $model = new Model_kategori();

        // inisialisasi data
        if ($tipe == 'user') {
            $update = $model->delete_kategori_user($idd);
        } elseif ($tipe == 'produk') {
            $update = $model->delete_kategori_produk($idd);
        } elseif ($tipe == 'kapasitas') {
            $update = $model->delete_kategori_kapasitas($idd);
        }
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Kategori '.$tipe.' berhasil dihapus</div>');
        return redirect()->to('/kategori');
    }
}
