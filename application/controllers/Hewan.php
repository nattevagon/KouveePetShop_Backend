<?php

use chriskacerguis\RestServer\RestController;

class Hewan extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hewan_model','data');
    }

    public function index_get() {
      $data = $this->data->getAll();
      
      if($data) {
        $this->response($data, RestController::HTTP_OK);
      }
    }
}
?>