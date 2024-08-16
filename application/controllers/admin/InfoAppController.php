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


    public function edit()
    {
        $data['title'] = 'Edit Info : Apps Pariwisata Kab. Pangkep';
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
        $this->load->view('admin/edit_info_app', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function update()
    {
        $response = array('status' => 'error', 'message' => 'Unknown error', 'redirect' => '');

        // Validasi data
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('nama_aplikasi', 'Nama Aplikasi', 'required');
        $this->form_validation->set_rules('bhs_code', 'Bahasa Pemrograman', 'required');
        $this->form_validation->set_rules('versi_app', 'Versi Aplikasi', 'required');
        $this->form_validation->set_rules('tentang_app', 'Tentang Aplikasi', 'required');
        $this->form_validation->set_rules('hub_kami', 'Kontak Kami', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Ambil data dari POST
            $data = array(
                'nama_aplikasi' => $this->input->post('nama_aplikasi'),
                'bhs_code' => $this->input->post('bhs_code'),
                'versi_app' => $this->input->post('versi_app'),
                'tentang_app' => $this->input->post('tentang_app'),
                'hub_kami' => $this->input->post('hub_kami')
            );

            // Ambil ID dari POST
            $id = $this->input->post('id');

            // Lakukan update data
            if ($this->InfoModel->update_data($id, $data)) {
                $response['status'] = 'success';
                $response['message'] = 'Nicee!<br>Data updated successfully';
                $response['redirect'] = base_url('info-apps'); // URL untuk redirect setelah update
            } else {
                $response['message'] = 'Opps!!<br>Failed to update data';
            }
        } else {
            $response['message'] = validation_errors();
        }

        // Kirimkan response JSON
        echo json_encode($response);
    }


}

/* End of file InfoAppController.php */
