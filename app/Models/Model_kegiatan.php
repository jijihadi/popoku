<?php namespace App\Models;

use CodeIgniter\Model;

class Model_kegiatan extends Model
{

    public function get_kegiatan($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_kegiatan a')
            ->orderby('tanggal_kegiatan', 'desc')
            ->get();
        } else {
            $builder = $this->db->table('tb_kegiatan a')
            ->orderby('tanggal_kegiatan', 'desc')
            ->where('a.id_kegiatan', $id)->get();
        }
        return $builder;
    }


    public function save_kegiatan($data)
    {
        $query = $this->db->table('tb_kegiatan')->insert($data);
        return $query;
    }

    public function update_kegiatan($data, $id)
    {
        $query = $this->db->table('tb_kegiatan')->update($data, array('id_kegiatan' => $id));
        return $query;
    }

    public function delete_kegiatan($id)
    {
        $query = $this->db->table('tb_kegiatan')->delete(array('id_kegiatan' => $id));
        return $query;
    }

}
