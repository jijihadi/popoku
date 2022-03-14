<?php namespace App\Models;

use CodeIgniter\Model;

class Model_donasi extends Model
{

    public function get_donasi($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table('tb_donasi a')
                ->select('a.*, b.*')
                ->join('tb_user b', 'a.id_user=b.id_user')
                ->orderby('tanggal_pengajuan', 'desc')
                ->get();
        } else {
            $builder = $this->db->table('tb_donasi a')
                ->select('a.*, b.*')
                ->join('tb_user b', 'a.id_user=b.id_user')
                ->orderby('tanggal_pengajuan', 'desc')
                ->where('a.id_donasi', $id)->get();
        }
        return $builder;
    }

    public function get_donasi_byuser($id)
    {
        
        $builder = $this->db->table('tb_donasi a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->orderby('tanggal_pengajuan', 'desc')
            ->where('a.id_user', $id)->get();
        return $builder;
    }

    public function get_donasi_bykurir($id)
    {
        
        $builder = $this->db->table('tb_donasi a')
            ->select('a.*')
            ->orderby('tanggal_pengajuan', 'desc')
            ->where('a.id_kurir', $id)->get();
        return $builder;
    }

    public function get_donasi_done()
    {
        $builder = $this->db->table('tb_donasi a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->orderby('tanggal_pengajuan', 'desc')
            ->where('a.status_donasi', 2)->get();

        return $builder;
    }

    public function get_donasi_latest()
    {
        $builder = $this->db->table('tb_donasi a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->join('tb_kurir c', 'a.id_kurir=c.id_kurir')
            ->where('a.status_donasi', 2)
            ->orderby('tanggal_diambil', 'desc')
            ->limit(5)
            ->get();

        return $builder;
    }

    public function get_donasi_notyet()
    {
        $builder = $this->db->table('tb_donasi a')
            ->select('a.*, b.*')
            ->join('tb_user b', 'a.id_user=b.id_user')
            ->where('a.status_donasi not like 2')->get();

        return $builder;
    }

    public function save_donasi($data)
    {
        $query = $this->db->table('tb_donasi')->insert($data);
        return $query;
    }

    public function update_donasi($data, $id)
    {
        $query = $this->db->table('tb_donasi')->update($data, array('id_donasi' => $id));
        return $query;
    }

    public function delete_donasi($id)
    {
        $query = $this->db->table('tb_donasi')->delete(array('id_donasi' => $id));
        return $query;
    }

}
