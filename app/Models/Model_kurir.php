<?php namespace App\Models;

use CodeIgniter\Model;

class Model_kurir extends Model
{

    public function get_kurir($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_kurir a')
            ->select('a.*, b.nama, c.kapasitas_max, c.kapasitas_sekarang, c.kapasitas_sisa, d.nama_level_kapasitas')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->join('tb_kapasitas c', 'a.id_kurir=c.id_kurir', 'left')
            ->join('tb_level_kapasitas d', 'c.id_level_kapasitas=d.id_level_kapasitas ', 'left')
            ->get();
        } else {
            $builder = $this->db->table('tb_kurir a')
            ->select('a.*, b.nama, c.kapasitas_max, c.kapasitas_sekarang, c.kapasitas_sisa, d.nama_level_kapasitas')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->join('tb_kapasitas c', 'a.id_kurir=c.id_kurir', 'left')
            ->join('tb_level_kapasitas d', 'c.id_level_kapasitas=d.id_level_kapasitas', 'left')
            ->where('a.id_kurir', $id)->get();
        }
        return $builder;
    }

    public function get_kurir_ready()
    {
            $builder = $this->db->table('tb_kurir a')
            ->select('a.*, b.nama, c.kapasitas_max, c.kapasitas_sekarang, c.kapasitas_sisa, d.nama_level_kapasitas')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->join('tb_kapasitas c', 'a.id_kurir=c.id_kurir', 'left')
            ->join('tb_level_kapasitas d', 'c.id_level_kapasitas=d.id_level_kapasitas ', 'left')
            ->orderby('c.kapasitas_sekarang', 'DESC')
            ->where('c.kapasitas_sekarang not like 0')
            ->get();
        return $builder;
    }


    public function save_kurir($data)
    {
        $query = $this->db->table('tb_kurir')->insert($data);
        return $query;
    }

    public function update_kurir($data, $id)
    {
        $query = $this->db->table('tb_kurir')->update($data, array('id_kurir' => $id));
        return $query;
    }

    public function delete_kurir($id)
    {
        $query = $this->db->table('tb_kurir')->delete(array('id_kurir' => $id));
        return $query;
    }

}
