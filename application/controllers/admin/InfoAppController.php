<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoAppController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('InfoModel');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak login, redirect ke halaman login
            redirect(base_url('login')); // Ganti dengan rute login Anda
        }
    }


    public function index()
    {
        $data['title'] = 'Info : Apps Pariwisata Kab. Pangkep';
        // $data['info'] = $this->InfoModel->get_app_info();
        $data['info'] = json_decode(json_encode($this->InfoModel->get_app_info()), true);

        if ($data['info'] === null) {
            $data['info'] = array(
                'nama_aplikasi' => 'Tidak tersedia',
                'tentang_app' => 'Tidak tersedia',
                'versi_app' => 'Tidak tersedia',
                'bhs_code' => 'Tidak tersedia',
                'hub_kami' => 'Tidak tersedia'
            );
        }
        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/info_app', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file InfoAppController.php */
