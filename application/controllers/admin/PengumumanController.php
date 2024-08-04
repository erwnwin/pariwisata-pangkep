<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengumumanController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Pengumuman : Apps Pariwisata Kab. Pangkep';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file PengumumanController.php */
