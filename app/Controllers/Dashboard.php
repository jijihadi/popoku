<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Model_user;
use App\Models\Model_donasi;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new Model_user();
        $model2 = new Model_donasi();

        $data['kurir'] = count($model->get_user_kurir()->getResult('array'));
        $data['donasi_done'] = count($model2->get_donasi_done()->getResult('array'));
        $data['donasi_notyet'] = count($model2->get_donasi_notyet()->getResult('array'));

        if (session()->level_id == 2 || session()->level_id == 1):
            $data['donasi_latest'] = $model2->get_donasi_latest()->getResult('array');
        elseif (session()->level_id == 3):
            $data['donasi_latest'] = $model2->get_donasi_bykurir(session()->user_id)->getResult('array');
        endif;

        // echo "<pre>";
        // echo session()->user_id;
        // print_r( $model2->get_donasi_byuser(session()->user_id)->getResult());
        // echo $model2->getlastquery();
        
        $data['title']  = 'Dashboard';
        echo view('admin/include/header', $data);
        echo view('admin/dashboard',$data);
        echo view('admin/include/footer');
    }
}