<?php

use chriskacerguis\RestServer\RestController;

class Supplier extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model','supplier');
    }

    public function index_get() {
      $id = $this->get('id_supplier');
      
      if ($id == '') {
        $supplier = $this->supplier->getAll();
      } else {
        $supplier = $this->supplier->getBy($id);
      }

      if($supplier) {
        $this->response($supplier, RestController::HTTP_OK);
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

    public function update_post()
    {
      $id = $this->post('id_supplier');
      $data = [
        'nama' => $this->post('nama'),
        'no_telp' => $this->post('no_telp'),
        'alamat' => $this->post('alamat'),
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

    public function delete_post()
    {
      $id = $this->post('id_supplier');
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