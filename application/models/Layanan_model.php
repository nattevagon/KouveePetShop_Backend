<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('layanan')->result_array(); 
    }
}
?>