<?php

use chriskacerguis\RestServer\RestController;

class JenisHewan extends RestController {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('JenisHewan_model','jenis_hewan');
    }

    public function index_get() {
      $id = $this->get('id_jenis_hewan');
      $nama = $this->get('nama');
      
      if ($id == '' && $nama == '') {
        $jenis_hewan = $this->jenis_hewan->getAll();
      } else if ($nama == '') {
        $jenis_hewan = $this->jenis_hewan->getById($id);
      } else if($id == ''){
        $jenis_hewan = $this->jenis_hewan->getByName($nama);
      }

      if($jenis_hewan) {
        $this->response($jenis_hewan, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama'),
        'created_at' => date('Y-m-d H:i:s')
      ];

      if($this->jenis_hewan->store($data) > 0) {
        $this->response([
          'status' => true,
          'message' => 'data has been created.'
        ],  RestController::HTTP_CREATED);
      } else {
        $this->response([
          'status' => false,
          'message' => 'failed to create!'
        ], RestController::HTTP_BAD_REQUEST);
      }
    }

    public function update_post()
    {
      $id = $this->post('id_jenis_hewan');
      $data = [
        'nama' => $this->post('nama'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      if($this->jenis_hewan->update($data, $id) > 0) {
        $this->response([
          'status' => true,
          'message' => 'data has been updated.'
        ],  RestController::HTTP_OK);
      } else {
        $this->response([
          'status' => false,
          'message' => 'failed to update!'
        ], RestController::HTTP_BAD_REQUEST);
      }
    }

    public function delete_post()
    {
      $id = $this->post('id_jenis_hewan');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->jenis_hewan->delete($data, $id) > 0) {
        $this->response([
          'status' => true,
          'id' => $id,
          'message' => 'data has been soft deleted.'
        ],  RestController::HTTP_OK);
      } else {
        $this->response([
          'status' => false,
          'message' => 'failed to deleted!'
        ], RestController::HTTP_BAD_REQUEST);
      }
    }
    
}
?>