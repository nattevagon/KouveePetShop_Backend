<?php

use chriskacerguis\RestServer\RestController;

class Supplier extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model','data');
    }

    public function index_get() {
      $data = $this->data->getAll();

      if($data) {
        $this->response($data, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama'),
        'no_telp' => $this->post('no_telp'),
        'alamat' => $this->post('alamat'),
        'created_at' => date('Y-m-d H:i:s')
      ];

      if($this->supplier->store($data) > 0) {
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
      $id = $this->put('id_supplier');
      $data = [
        'nama' => $this->put('nama'),
        'no_telp' => $this->put('no_telp'),
        'alamat' => $this->put('alamat'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      if($this->supplier->update($data, $id) > 0) {
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
      $id = $this->delete('id_supplier');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->supplier->delete($data, $id) > 0) {
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