<?php

use chriskacerguis\RestServer\RestController;

class Produk extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model','produk');
    }

    public function index_get() {
      $produk = $this->produk->getAll();

      if($produk) {
        $this->response($produk, RestController::HTTP_OK);
      }
    }

    public function index_post()
    {
      $data = [
        'nama' => $this->post('nama'),
        'harga' => $this->post('harga'),
        'minimal' => $this->post('minimal'),
        'stok' => $this->post('stok'),
        'satuan' => $this->post('satuan'),
        'gambar' => $this->post('gambar'),
        'created_at' => date('Y-m-d H:i:s')
      ];

      if($this->produk->store($data) > 0) {
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
      $id = $this->put('id_produk');
      $data = [
        'nama' => $this->put('nama'),
        'harga' => $this->put('harga'),
        'minimal' => $this->put('minimal'),
        'stok' => $this->put('stok'),
        'satuan' => $this->put('satuan'),
        'gambar' => $this->put('gambar'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      if($this->produk->update($data, $id) > 0) {
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
      $id = $this->delete('id_produk');
      $data = [
        'deleted_at' => date('Y-m-d H:i:s')
      ];

      if($this->produk->delete($data, $id) > 0) {
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