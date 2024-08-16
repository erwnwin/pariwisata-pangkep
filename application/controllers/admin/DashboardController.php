<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('VisitorModel');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak login, redirect ke halaman login
            redirect(base_url('login')); // Ganti dengan rute login Anda
        }
    }


    public function index()
    {
        $data['title'] = 'Dashboard : Apps Pariwisata Kab. Pangkep';
        $start_date = date('Y-m-01'); // Awal bulan ini
        $end_date = date('Y-m-t'); // Akhir bulan ini
        $data['stats'] = $this->VisitorModel->get_visitor_stats($start_date, $end_date);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function get_visitor_stats()
    {
        $start_date = date('Y-m-01'); // Awal bulan ini
        $end_date = date('Y-m-t'); // Akhir bulan ini
        $stats = $this->VisitorModel->get_visitor_stats($start_date, $end_date);
        echo json_encode($stats);
    }
}
 
 /* End of file DashboardController.php */
