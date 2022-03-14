<?php namespace App\Models;

use CodeIgniter\Model;

class Model_kapasitas extends Model
{

    public function get_kapasitas($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_kapasitas')->get();
        } else {
            $builder = $this->db->table('tb_kapasitas')
                ->where('id_kurir', $id)->get();
        }
        return $builder;
    }

    public function save_kapasitas($data)
    {
        $query = $this->db->table('tb_kapasitas')->insert($data);
        return $query;
    }

    public function update_kapasitas($data, $id)
    {
        $query = $this->db->table('tb_kapasitas')->update($data, array('id_kurir' => $id));
        return $query;
    }

    public function delete_kapasitas($id)
    {
        $query = $this->db->table('tb_kapasitas')->delete(array('id_kurir' => $id));
        return $query;
    }

}
