<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JenisHewan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('jenis_hewan')->result_array(); 
    }
}
?>
?>