<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('h.id_hewan as "ID_HEWAN", h.nama as "NAMA", h.tgl_lahir as "TGL_LAHIR", jh.nama as "JENIS_HEWAN", uh.nama as "UKURAN_HEWAN", c.nama as "CUSTOMER"');
        $this->db->from('hewan h');
        $this->db->join('jenis_hewan jh', 'id_jenis_hewan');
        $this->db->join('ukuran_hewan uh', 'id_ukuran_hewan');
        $this->db->join('customer c', 'id_customer');
        $this->db->where('h.deleted_at IS NULL');
        return $query = $this->db->get()->result_array(); 
    }

    public function store($data)
    {
        $this->db->insert('hewan', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('hewan', $data, ['id_hewan' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($data, $id)
    {
        $this->db->update('hewan', $data, ['id_hewan' => $id]);
        return $this->db->affected_rows();
    }
}
?>