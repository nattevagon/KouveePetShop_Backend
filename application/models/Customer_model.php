<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array(); 
    }
    
    public function store($data)
    {
        $this->db->insert('customer', $data);
        return $this->db->affected_rows();
    }

    
    public function update($data, $id)
    {
        $this->db->update('customer', $data, ['id_customer' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('customer', $data, ['id_customer' => $id]);
        return $this->db->affected_rows();
    }
}
?>