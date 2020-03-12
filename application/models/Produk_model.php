<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('produk')->result_array(); 
    }
}
?>