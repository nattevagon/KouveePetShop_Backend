<?php

use chriskacerguis\RestServer\RestController;

class Customer extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model','customer');
    }

    public function index_get() {
      $id = $this->get('id_customer');
      $nama = $this->get('nama');
      
      if ($id == '' && $nama == '') {
        $customer = $this->customer->getAll();
      } else if ($nama == '') {
        $customer = $this->customer->getById($id);
      } else if($id == ''){
        $customer = $this->customer->getByName($nama);
      }

      if($customer) {
        $this->response($customer, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama'),
        'tgl_lahir' => $this->post('tgl_lahir'),
        'alamat' => $this->post('alamat'),
        'no_telp' => $this->post('no_telp'),
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->post('created_by')
      ];

      if($this->customer->store($data) > 0) {
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
      $id = $this->post('id_customer');
      $data = [
        'nama' => $this->post('nama'),
        'tgl_lahir' => $this->post('tgl_lahir'),
        'alamat' => $this->post('alamat'),
        'no_telp' => $this->post('no_telp'),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $this->post('updated_by')
      ];

      if($this->customer->update($data, $id) > 0) {
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
      $id = $this->post('id_customer');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->customer->delete($data, $id) > 0) {
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