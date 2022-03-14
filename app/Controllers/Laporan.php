<?php namespace App\Controllers;

use App\Models\Model_donasi;
use App\Models\Model_user;
use App\Models\Model_kurir;
use App\Models\Model_kapasitas;
use App\Models\Model_kegiatan;

class Laporan extends BaseController
{
    // tampil
    public function index()
    {
        $model = new Model_donasi();
        $data['laporan'] = $model->get_donasi()->getResult('array');
        // print_r($model->get_laporan()->getResult('array'));
        // echo ($model->getLastQuery());
        $data['title'] = 'Data Donasi';
        echo view('admin/include/header', $data);
        echo view('admin/v_laporan/laporan_list', $data);
        echo view('admin/include/footer');
    }

    public function lap_transaksi()
    {
        $model = new Model_donasi();
        $data['laporan'] = $model->get_donasi_done()->getResult('array');
        // echo ($model->getLastQuery());
        $data['title'] = 'Laporan Transaksi';
        $data['isi'] = 'laporan_transaksi.php';
        echo view('admin/include/header', $data);
        echo view('admin/v_laporan/laporan_list', $data);
        echo view('admin/include/footer');
    }

    public function lap_donasi()
    {
        $model = new Model_donasi();
        $data['laporan'] = $model->get_donasi_done()->getResult('array');
        // echo ($model->getLastQuery());
        $data['title'] = 'Laporan Donasi';
        $data['isi'] = 'laporan_donasi.php';
        echo view('admin/include/header', $data);
        echo view('admin/v_laporan/laporan_list', $data);
        echo view('admin/include/footer');
    }

    public function lap_kegiatan()
    {
        $model = new Model_kegiatan();
        $data['kegiatan'] = $model->get_kegiatan()->getResult('array');
        // echo ($model->getLastQuery());
        $data['title'] = 'Laporan Kegiatan';
        $data['isi'] = 'laporan_kegiatan.php';
        echo view('admin/include/header', $data);
        echo view('admin/v_laporan/laporan_list', $data);
        echo view('admin/include/footer');
    }

    // tambahan
}
