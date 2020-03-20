<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
    private $table = 'layanan'; 
    public $id;
    public $nama;
    public $created_at;
    public $updated_at;
    public $deleted_at; 

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function getBy($id)
    {
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('id_layanan', $id);
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array();
    }

    public function store($data)
    {
        $this->db->insert('layanan', $data);
        return $this->db->affected_rows();
    }

    
    public function update($data, $id)
    {
        $this->db->update('layanan', $data, ['id_layanan' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('layanan', $data, ['id_layanan' => $id]);
        return $this->db->affected_rows();
    }

}
?>