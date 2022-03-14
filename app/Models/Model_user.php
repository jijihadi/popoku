<?php namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model
{
    protected $table = 'tb_user';

    public function getUser($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_user' => $id]);
        }
    }

    public function get_user_kurir()
    {
        // return $this->getWhere(['id_level' => 3]);
        $builder = $this->db->table('tb_user a')
        ->select('a.id_user, a.nama')
        ->where('a.id_level', 3)->get();
        return $builder;
        // return $builder = $this->db->table('tb_kurir a')->join('tb_user b', 'a.id_user not like b.id_user')
        //     ->where('b.id_level', 3)->get();
    }

    public function get_user()
    {
        return $this->getWhere(['id_level' => 4]);
        // return $builder = $this->db->table('tb_kurir a')->join('tb_user b', 'a.id_user not like b.id_user')
        //     ->where('b.id_level', 3)->get();
    }

    public function get_user_nama($idd)
    {
        // return $this->getWhere(['id_level' => 3]);
        $builder = $this->db->table('tb_user a')
        ->select('a.nama')
        ->where('a.id_user', $idd)->get()->getrow()->nama;
        return $builder;
        // return $builder = $this->db->table('tb_kurir a')->join('tb_user b', 'a.id_user not like b.id_user')
        //     ->where('b.id_level', 3)->get();
    }

    public function save_user($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function update_user($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_user' => $id));
        return $query;
    }

    public function delete_user($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_user' => $id));
        return $query;
    }

}
