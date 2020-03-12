<?php

use chriskacerguis\RestServer\RestController;

class JenisHewan extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisHewan_model','data');
    }

    public function index_get() {
      $data = $this->data->getAll();

      if($data) {
        $this->response($data, RestController::HTTP_OK);
      }
    }
}
?>