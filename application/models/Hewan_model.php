<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('hewan')->result_array(); 
    }
}
?>