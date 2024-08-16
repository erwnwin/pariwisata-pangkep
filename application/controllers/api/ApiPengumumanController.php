<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiPengumumanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengumumanModel');
    }


    public function index()
    {

        $pengumuman = $this->PengumumanModel->get_items();

        // Mengirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($pengumuman));
    }
}

/* End of file ApiPengumumanController.php */
