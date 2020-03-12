<?php

use chriskacerguis\RestServer\RestController;

class Layanan extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model','data');
    }

    public function index_get() {
      $data = $this->data->getAll();

      if($data) {
        $this->response($data, RestController::HTTP_OK);
      }
    }
}
?>