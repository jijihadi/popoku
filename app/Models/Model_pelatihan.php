<?php namespace App\Models;

use CodeIgniter\Model;

class Model_pelatihan extends Model
{

    public function get_pelatihan($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_pelatihan a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->orderby('waktu_pelatihan', 'desc')
            ->get();
        } else {
            $builder = $this->db->table('tb_pelatihan a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->orderby('waktu_pelatihan', 'desc')
            ->where('a.id_pelatihan', $id)->get();
        }
        return $builder;
    }

    public function get_pelatihan_aktif()
    {
        $builder = $this->db->table('tb_pelatihan a')
        ->select('a.*, b.*')
        ->join('tb_user b', 'a.id_user=b.id_user')
        ->orderby('waktu_pelatihan', 'desc')
        ->where('dilaksanakan', 0)
        ->get();
        return $builder;
    }

    public function save_pelatihan($data)
    {
        $query = $this->db->table('tb_pelatihan')->insert($data);
        return $query;
    }

    public function update_pelatihan($data, $id)
    {
        $query = $this->db->table('tb_pelatihan')->update($data, array('id_pelatihan' => $id));
        return $query;
    }

    public function delete_pelatihan($id)
    {
        $query = $this->db->table('tb_pelatihan')->delete(array('id_pelatihan' => $id));
        return $query;
    }

}
