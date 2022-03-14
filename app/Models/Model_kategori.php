<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_kategori extends Model
{
    public function get_kategori_user($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_level')->get();
        } else {
            $builder = $this->db->table('tb_level')->where('id_level', $id)->get();
        }
        return $builder;
    }

    public function get_kategori_produk($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_kategori')->get();
        } else {
            $builder = $this->db->table('tb_kategori')->where('id_kategori', $id)->get();
        }
        return $builder;
    }

    public function get_kategori_kapasitas($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_level_kapasitas')->get();
        } else {
            $builder = $this->db->table('tb_level_kapasitas')->where('id_level_kapasitas', $id)->get();
        }
        return $builder;
    }

    // add
    public function save_kategori_user($data)
    {
        $query = $this->db->table('tb_level')->insert($data);
        return $query;
    }

    public function save_kategori_produk($data)
    {
        $query = $this->db->table('tb_kategori')->insert($data);
        return $query;
    }

    public function save_kategori_kapasitas($data)
    {
        $query = $this->db->table('tb_level_kapasitas')->insert($data);
        return $query;
    }

    //update
    public function update_kategori_user($data, $idd)
    {
        $query = $this->db->table('tb_level')->update($data, array('id_level' => $idd));
        return $query;
    }

    public function update_kategori_produk($data, $idd)
    {
        $query = $this->db->table('tb_kategori')->update($data, array('id_kategori' => $idd));
        return $query;
    }

    public function update_kategori_kapasitas($data, $idd)
    {
        $query = $this->db->table('tb_level_kapasitas')->update($data, array('id_level_kapasitas' => $idd));
        return $query;
    }

    // delete
    public function delete_kategori_user($id)
    {
        $query = $this->db->table('tb_level')->delete(array('id_level' => $id));
        return $query;
    }

    public function delete_kategori_produk($id)
    {
        $query = $this->db->table('tb_kategori')->delete(array('id_kategori' => $id));
        return $query;
    }

    public function delete_kategori_kapasitas($id)
    {
        $query = $this->db->table('tb_level_kapasitas')->delete(array('id_level_kapasitas' => $id));
        return $query;
    }
}
