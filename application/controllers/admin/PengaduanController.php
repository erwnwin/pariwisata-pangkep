<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengaduanController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Pengduan : Apps Pariwisata Kab. Pangkep';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengaduan', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file PengaduanController.php */
