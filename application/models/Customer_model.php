<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('customer')->result_array(); 
    }
}
?>