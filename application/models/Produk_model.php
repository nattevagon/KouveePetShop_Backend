<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function getBy($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function store($data)
    {
        $this->db->insert('produk', $data);
        return $this->db->affected_rows();
    }

    
    public function update($data, $id)
    {
        $this->db->update('produk', $data, ['id_produk' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('produk', $data, ['id_produk' => $id]);
        return $this->db->affected_rows();
    }
}
?>