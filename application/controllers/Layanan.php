<?php

use chriskacerguis\RestServer\RestController;

class Layanan extends RestController {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Layanan_model','layanan');
      $this->load->library('form_validation');
    }

    public function index_get() {
      $id = $this->get('id_layanan');
      
      if ($id == '') {
        $layanan = $this->layanan->getAll();
      } else {
        $layanan = $this->layanan->getBy($id);
      }

      if($layanan) {
        $this->response($layanan, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama')
      ];

      if($this->layanan->store($data) > 0) {
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
      $id = $this->post('id_layanan');
      $data = [
        'nama' => $this->post('nama')
      ];

      if($this->layanan->update($data, $id) > 0) {
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
      $id = $this->post('id_layanan');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->layanan->delete($data, $id) > 0) {
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