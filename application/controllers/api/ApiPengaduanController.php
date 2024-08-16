<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiPengaduanController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengaduanModel');
    }


    public function submit_complaint()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['nama_wisata']) && isset($input['pengaduan'])) {
            $result = $this->PengaduanModel->insert_complaint($input['nama_wisata'], $input['pengaduan']);
            $response = array('message' => $result ? 'Pengaduan berhasil dikirim' : 'Gagal mengirim pengaduan');
        } else {
            $response = array('message' => 'Data tidak lengkap');
        }

        echo json_encode($response);
    }
}

/* End of file ApiPengaduanController.php */
