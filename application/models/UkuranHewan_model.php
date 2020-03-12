<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UkuranHewan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('ukuran_hewan')->result_array(); 
    }
}
?>
?>