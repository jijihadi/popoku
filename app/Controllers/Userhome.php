<?php namespace App\Controllers;

use App\Models\Model_artikel;
use App\Models\Model_donasi;
use App\Models\Model_kegiatan;
use App\Models\Model_pelatihan;
use App\Models\Model_produk;

class Userhome extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new Model_produk();
        $model2 = new Model_donasi();

        $data['produk'] = $model->get_produk_random()->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Welcome to Popokku';
        echo view('user/include/header', $data);
        echo view('user/home', $data);
        echo view('user/include/footer');
    }

    // donasi
    public function donasi()
    {

        $model = new Model_donasi();

        $idd = session()->get('user_id');
        $data['donasi'] = $model->get_donasi_byuser($idd)->getResult('array');
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model->getlastquery();

        if (session()->get('nama') == "") {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Silahkan login terlebih dulu</div>');

            return redirect()->to('/login');
        } elseif (session()->get('nama') != "") {
            $data['title'] = 'Donasi anda';
            echo view('user/include/header', $data);
            echo view('user/v_donasi/donasi', $data);
            echo view('user/include/footer');
        }
    }

    public function donasi_baru()
    {
        if (session()->get('nama') == "") {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Silahkan login terlebih dulu</div>');
            return redirect()->to('/login');
        } elseif (session()->get('nama') != "") {
            $data['title'] = 'Donasi Baru';
            echo view('user/include/header', $data);
            echo view('user/v_donasi/donasi_baru', $data);
            echo view('user/include/footer');
        }
    }

    public function simpan_donasi()
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
            return redirect()->to('/userhome/donasi');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/userhome/donasi_baru');
        }
    }

    // produk
    public function produk()
    {
        $model = new Model_produk();

        $data['produk'] = $model->get_produk()->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Produk Daur Ulang';
        echo view('user/include/header', $data);
        echo view('user/v_transaksi/produk', $data);
        echo view('user/include/footer');
    }

    public function detail_produk($idd)
    {
        $session = session();
        $model = new Model_produk();

        $data['produk'] = $model->get_produk($idd)->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Detail Produk';
        echo view('user/include/header', $data);
        echo view('user/v_transaksi/detail_produk', $data);
        echo view('user/include/footer');
    }

    // artikel
    public function artikel()
    {
        $model = new Model_artikel();

        $data['artikel'] = $model->get_artikel()->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Artikel';
        echo view('user/include/header', $data);
        echo view('user/v_blog/artikel', $data);
        echo view('user/include/footer');
    }

    public function artikel_detail($idd)
    {
        $model = new Model_artikel();

        $data['artikel'] = $model->get_artikel($idd)->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Detail Artikel';
        echo view('user/include/header', $data);
        echo view('user/v_blog/artikel_detail', $data);
        echo view('user/include/footer');
    }

    // pelatihan
    public function pelatihan()
    {
        $model = new Model_pelatihan();

        $data['pelatihan'] = $model->get_pelatihan_aktif()->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Pelatihan';
        echo view('user/include/header', $data);
        echo view('user/v_pelatihan/pelatihan', $data);
        echo view('user/include/footer');
    }

    public function pelatihan_baru()
    {
        if (session()->get('nama')=="") {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Silahkan login terlebih dulu</div>');
            return redirect()->to('/login');
        }elseif (session()->get('nama')!="") {
            $data['title'] = 'Tambah Pelatihan Baru';
            echo view('user/include/header', $data);
            echo view('user/v_pelatihan/pelatihan_baru', $data);
            echo view('user/include/footer');
        }
    }

    public function simpan_pelatihan()
    {
        // inisialisasi Variabel
        $model = new Model_pelatihan();

        $pemateri = $this->request->getPost('pemateri');
        if ($pemateri == '') {
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
        //redirect
        if ($model->error('message') != '') {
            session()->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Data berhasil disimpan</div>');
            return redirect()->to('/userhome/pelatihan');
        } else {
            session()->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Terjadi kesalahan dalam menyimpan data</div>');
            // print_r($model->error());
            return redirect()->to('/userhome/pelatihan_baru');
        }
    }

    // kegiatan
    public function Kegiatan()
    {
        $model = new Model_kegiatan();

        $data['kegiatan'] = $model->get_kegiatan()->getResult('array');
        // $data['produk'] = count($model->get_user_kurir()->getResult('array'));
        // print_r( $model2->get_donasi_notyet()->getResult('array'));
        // echo $model2->getlastquery();

        $data['title'] = 'Kegiatan';
        echo view('user/include/header', $data);
        echo view('user/v_kegiatan/kegiatan', $data);
        echo view('user/include/footer');
    }
}
