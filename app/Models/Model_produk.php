<?php namespace App\Models;

use CodeIgniter\Model;

class Model_produk extends Model
{
    protected $table = 'tb_produk a ';

    public function get_produk($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table($this->table)->join('tb_kategori b', 'a.id_kategori=b.id_kategori')->get();
        } else {
            $builder = $this->db->table($this->table)->join('tb_kategori b', 'a.id_kategori=b.id_kategori')
            ->where('a.id_produk', $id)->get();
        }
        return $builder;
    }

    public function get_produk_random()
    {
        $builder = $this->db->table($this->table)
        ->join('tb_kategori b', 'a.id_kategori=b.id_kategori')
        ->orderby('RAND()')
        ->limit('5')
        ->get();
        return $builder;
    }

    public function save_produk($data)
    {
        $query = $this->db->table('tb_produk')->insert($data);
        return $query;
    }

    public function update_produk($data, $id)
    {
        $query = $this->db->table('tb_produk')->update($data, array('id_produk' => $id));
        return $query;
    }

    public function delete_produk($id)
    {
        $query = $this->db->table('tb_produk')->delete(array('id_produk' => $id));
        return $query;
    }

}
