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
            $wisata['gambar_list'] = $this->WisataModel->get_gambar_by_wisata_id($wisata['id']);

            // Ambil gambar fasilitas
            $wisata['gambar_fasilitas'] = $this->WisataModel->get_gambar_fasilitas_by_wisata_id($wisata['id']);

            // Ambil gambar kondisi jalan
            $wisata['gambar_kondisi_jalan'] = $this->WisataModel->get_gambar_kondisi_jalan_by_wisata_id($wisata['id']);
        }

        echo json_encode($wisata_data);
    }

    public function wisata_by_kategori($kategori_id)
    {
        $kategori_id = (int)$kategori_id;

        $this->output
            ->set_content_type('application/json');

        if ($kategori_id <= 0) {
            $response = array('status' => 'error', 'message' => 'Invalid category ID');
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($response));
            return;
        }

        $data = $this->WisataModel->get_wisata_by_kategori($kategori_id);

        if ($data) {
            $this->output
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            $response = array('status' => 'error', 'message' => 'No data found');
            $this->output
                ->set_status_header(404)
                ->set_output(json_encode($response));
        }
    }

    public function get_nearby_wisata()
    {
        $latitude = $this->input->get('latitude');
        $longitude = $this->input->get('longitude');
        $radius = $this->input->get('radius') ?: 10; // default radius 10 km

        $result = $this->WisataModel->get_nearby_wisata($latitude, $longitude, $radius);
        echo json_encode($result);
    }
}

/* End of file ApiWisataController.php */
