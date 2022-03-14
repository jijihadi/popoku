<?php namespace App\Models;

use CodeIgniter\Model;

class Model_artikel extends Model
{

    public function get_artikel($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_artikel a')
            ->orderby('tanggal_rilis', 'desc')
            ->get();
        } else {
            $builder = $this->db->table('tb_artikel a')
            ->orderby('tanggal_rilis', 'desc')
            ->where('a.id_artikel', $id)
            ->get();
        }
        return $builder;
    }

    public function save_artikel($data)
    {
        $query = $this->db->table('tb_artikel')->insert($data);
        return $query;
    }

    public function update_artikel($data, $id)
    {
        $query = $this->db->table('tb_artikel')->update($data, array('id_artikel' => $id));
        return $query;
    }

    public function delete_artikel($id)
    {
        $query = $this->db->table('tb_artikel')->delete(array('id_artikel' => $id));
        return $query;
    }

}
