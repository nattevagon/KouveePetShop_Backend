<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('deleted_at IS NULL');
        return $query = $this->db->get()->result_array(); 
    }
    
    public function store($data)
    {
        $this->db->insert('supplier', $data);
        return $this->db->affected_rows();
    }

    
    public function update($data, $id)
    {
        $this->db->update('supplier', $data, ['id_supplier' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('supplier', $data, ['id_supplier' => $id]);
        return $this->db->affected_rows();
    }
}
?>