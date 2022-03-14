<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Model_auth extends Model{
    protected $table = 'tb_user';
    protected $allowedFields = ['nama','email','password','id_level'];
}