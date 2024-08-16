<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiInfoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InfoModel'); // Muat model Info_model
        $this->output->set_content_type('application/json'); // Set header content-type
    }

    public function info()
    {
        $data = $this->InfoModel->get_app_info();
        echo json_encode($data); // Mengembalikan data dalam format JSON
    }
}

/* End of file ApiInfoController.php */
