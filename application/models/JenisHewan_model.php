<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JenisHewan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jenis_hewan');
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function getBy($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_hewan');
        $this->db->where('id_jenis_hewan', $id);
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function store($data)
    {
        $this->db->insert('jenis_hewan', $data);
        return $this->db->affected_rows();
    }

    
    public function update($data, $id)
    {
        $this->db->update('jenis_hewan', $data, ['id_jenis_hewan' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('jenis_hewan', $data, ['id_jenis_hewan' => $id]);
        return $this->db->affected_rows();
    }
}
?>