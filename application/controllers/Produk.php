<?php

use chriskacerguis\RestServer\RestController;

class Produk extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model','data');
    }

    public function index_get() {
      $data = $this->data->getAll();

      if($data) {
        $this->response($data, RestController::HTTP_OK);
      }
    }
}
?>