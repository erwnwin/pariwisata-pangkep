<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiWisataController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
    }

    public function index()
    {
        $wisata_data = $this->WisataModel->get_all_wisata();

        foreach ($wisata_data as &$wisata) {
            // Ambil gambar berdasarkan wisata_id
            $wisata['gambar_list'] = $this->WisataModel->get_gambar_by_wisata_id($wisata['id']);
        }

        echo json_encode($wisata_data);
    }

    public function wisata_by_kategori($kategori_id)
    {
        $kategori_id = (int)$kategori_id; // Pastikan kategori_id adalah integer

        // Set header Content-Type ke application/json
        $this->output
            ->set_content_type('application/json');

        if ($kategori_id <= 0) {
            $response = array('status' => 'error', 'message' => 'Invalid category ID');
            $this->output
                ->set_status_header(400) // Set status HTTP ke 400 Bad Request
                ->set_output(json_encode($response));
            return;
        }

        $data = $this->WisataModel->get_wisata_by_kategori($kategori_id);

        if ($data) {
            $this->output
                ->set_status_header(200) // Set status HTTP ke 200 OK
                ->set_output(json_encode($data));
        } else {
            $response = array('status' => 'error', 'message' => 'No data found');
            $this->output
                ->set_status_header(404) // Set status HTTP ke 404 Not Found
                ->set_output(json_encode($response));
        }
    }
}

/* End of file ApiWisataController.php */
