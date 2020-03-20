<?php

use chriskacerguis\RestServer\RestController;

class Hewan extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hewan_model','hewan');
    }

    public function index_get() {
      $id = $this->get('id_hewan');
      
      if ($id == '') {
        $hewan = $this->hewan->getAll();
      } else {
        $hewan = $this->hewan->getBy($id);
      }

      if($hewan) {
        $this->response($hewan, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'id_ukuran_hewan' => $this->post('id_ukuran_hewan'),
        'id_jenis_hewan' => $this->post('id_jenis_hewan'),
        'id_customer' => $this->post('id_customer'),
        'nama' => $this->post('nama'),
        'tgl_lahir' => $this->post('tgl_lahir'),
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->post('created_by')
      ];

      if($this->hewan->store($data) > 0) {
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
      $id = $this->post('id_hewan');
      $data = [
        'id_ukuran_hewan' => $this->post('id_ukuran_hewan'),
        'id_jenis_hewan' => $this->post('id_jenis_hewan'),
        'id_customer' => $this->post('id_customer'),
        'nama' => $this->post('nama'),
        'tgl_lahir' => $this->post('tgl_lahir'),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $this->post('updated_by')
      ];

      if($this->hewan->update($data, $id) > 0) {
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
      $id = $this->post('id_hewan');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->hewan->delete($data, $id) > 0) {
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