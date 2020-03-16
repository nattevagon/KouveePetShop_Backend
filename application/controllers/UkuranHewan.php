<?php

use chriskacerguis\RestServer\RestController;

class UkuranHewan extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UkuranHewan_model','ukuran_hewan');
    }

    public function index_get() {
      $ukuran_hewan = $this->ukuran_hewan->getAll();
    
      if($ukuran_hewan) {
        $this->response($ukuran_hewan, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama'),
        'created_at' => date('Y-m-d H:i:s')
      ];

      if($this->ukuran_hewan->store($data) > 0) {
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

    public function index_put()
    {
      $id = $this->put('id_ukuran_hewan');
      $data = [
        'nama' => $this->put('nama'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      if($this->ukuran_hewan->update($data, $id) > 0) {
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

    public function index_delete()
    {
      $id = $this->delete('id_ukuran_hewan');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->ukuran_hewan->delete($data, $id) > 0) {
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