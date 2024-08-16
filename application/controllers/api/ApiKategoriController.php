<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiKategoriController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
    }


    public function index()
    {
        $kategori = $this->KategoriModel->get_items();

        // Mengirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($kategori));
    }
}

/* End of file ApiKategoriController.php */
