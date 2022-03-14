<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Model_auth;
 
class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new Model_auth();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = sha1(md5($password));
            if($verify_pass==$pass){
                if ($data['id_level']==1) {
                    $lev = 'Super Admin';
                }else if($data['id_level']==2){
                    $lev = 'Admin';
                }else if($data['id_level']==3){
                    $lev = 'Kurir';
                }else if($data['id_level']==4){
                    $lev = 'User';
                }
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'nama'          => $data['nama'],
                    'level_id'      => $data['id_level'],
                    'level'         => $lev,
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                if ($data['id_level']==1) {
                    return redirect()->to('/dashboard');
                } elseif ($data['id_level']==2) {
                    return redirect()->to('/dashboard');
                } elseif ($data['id_level']==3) {
                    return redirect()->to('/dashboard');
                } elseif ($data['id_level']==4) {
                    return redirect()->to('/userhome');
                }
                
            }else{
                $session->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>Password anda salah</div>');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>Email tidak ditemukan</div>');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 