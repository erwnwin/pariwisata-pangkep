<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengaduanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengaduanModel');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak login, redirect ke halaman login
            redirect(base_url('login')); // Ganti dengan rute login Anda
        }
    }


    public function index()
    {
        $data['title'] = 'Pengaduan : Apps Pariwisata Kab. Pangkep';
        $data['wisata_list'] = $this->PengaduanModel->get_all();
        $data['years'] = $this->PengaduanModel->get_years();

        $selected_wisata = $this->input->get('nama_wisata');
        $selected_bulan = $this->input->get('bulan');
        $selected_tahun = $this->input->get('tahun');

        $data['selected_wisata'] = $selected_wisata;
        $data['selected_bulan'] = $selected_bulan;
        $data['selected_tahun'] = $selected_tahun;

        $data['pengaduan'] = $this->PengaduanModel->get_filtered($selected_wisata, $selected_bulan, $selected_tahun);

        // Tambahkan logika untuk memeriksa apakah 'created_at' dalam 10 jam terakhir
        $current_time = new DateTime("", new DateTimeZone('Asia/Makassar'));

        foreach ($data['pengaduan'] as &$pengaduan) {
            $created_at = new DateTime($pengaduan['created_at'], new DateTimeZone('Asia/Makassar'));
            $interval = $current_time->diff($created_at);
            $pengaduan['is_recent'] = $interval->h < 2 && $interval->days == 0;
        }

        // Fungsi untuk mengurutkan berdasarkan 'created_at' secara descending
        usort($data['pengaduan'], function ($a, $b) {
            $dateA = new DateTime($a['created_at'], new DateTimeZone('Asia/Makassar'));
            $dateB = new DateTime($b['created_at'], new DateTimeZone('Asia/Makassar'));
            return $dateB <=> $dateA;
        });


        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengaduan', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file PengaduanController.php */
