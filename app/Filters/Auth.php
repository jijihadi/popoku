<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
        if(!session()->get('logged_in')){
            // maka redirct ke halaman login
            return redirect()->to('/login'); 
        }else{
            // if (session()->get('level_id')==1) {
            //     return redirect()->to('/dashboard'); 
            // }elseif (session()->get('level_id')==2) {
            //     return redirect()->to('/dashboard'); 
            // }
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}