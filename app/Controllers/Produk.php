<?php namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_produk;

class Produk extends BaseController
{
    // tampil
    public function index()
    {

        $model = new Model_produk();
        $data['produk'] = $model->get_produk()->getResult('array');
        $data['title'] = 'Data produk';
        echo view('admin/include/header', $data);
        echo view('admin/v_produk/produk_list', $data);
        echo view('admin/include/footer');
    }

    public function add()
    {
        $model = new Model_kategori();
        $data['kategori'] = $model->get_kategori_produk()->getResult('array');
        $data['produk'] = '';
        $data['title'] = 'Tambah Produk';
        echo view('admin/include/header', $data);
        echo view('admin/v_produk/produk_form', $data);
        echo view('admin/include/footer');
    }

    public function edit($idd)
    {
        $model = new Model_kategori();
        $model2 = new Model_produk();
        $data['kategori'] = $model->get_kategori_produk()->getResult('array');
        $data['produk'] = $model2->get_produk($idd)->getResult('array');

        $data['title'] = 'Edit Produk';
        echo view('admin/include/header', $data);
        echo view('admin/v_produk/produk_form', $data);
        echo view('admin/include/footer');
    }

    // proses
    public function save()
    {
        // inisialisasi model
        $model = new Model_produk();
        // inisialisasi variabel
        $data = array(
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_produk' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi_produk' => $this->request->getPost('deskripsi'),
            'stok_produk' => $this->request->getPost('stok'),
        );

        $gambars = $this->request->getFile('gambar');
        
        
        if ($gambars != "") {
            $fileName = $gambars->getRandomName();
            $gambars->move(FCPATH.'assets\file_upload\produk', $fileName);
            $data['gambar'] = $fileName;
        }elseif($gambars == "") {
            $data['gambar'] = "";
        }

        // eksekusi
        $model->save_produk($data);
        // echo ($model->getLastQuery());
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Produk berhasil disimpan</div>');
            return redirect()->to('/produk');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            return redirect()->to('/produk/add');
        }
    }

    public function update($idd)
    {
        // inisialisasi model
        $model = new Model_produk();
        // inisialisasi variabel
        $data = array(
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_produk' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi_produk' => $this->request->getPost('deskripsi'),
            'stok_produk' => $this->request->getPost('stok'),
        );

        $gambars = $this->request->getFile('gambar');
        
        
        if ($gambars != "") {
            $fileName = $gambars->getRandomName();
            $gambars->move(FCPATH.'assets\file_upload\produk', $fileName);
            $data['gambar'] = $fileName;
        }

        // eksekusi
        $model->update_produk($data, $idd);
        // echo ($model->getLastQuery());
        // print_r($model->error('message'));
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data Produk berhasil diubah</div>');
            return redirect()->to('/produk');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam merubah data</div>');
            return redirect()->to('/produk/update/' . $idd);
        }
    }

    public function delete($idd)
    {
        $model = new Model_produk();
        $model->delete_produk($idd);
        session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil dihapus</div>');
        return redirect()->to('/produk');
    }
}
