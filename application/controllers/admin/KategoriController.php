<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
    }


    public function index()
    {
        $data['title'] = 'Kategori : Apps Pariwisata Kab. Pangkep';
        $data['kategori'] = json_decode(json_encode($this->KategoriModel->get_items()), true);
        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Kategori : Apps Pariwisata Kab. Pangkep';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/create_kategori', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        $nama_kategori =  $this->input->post('nama_kategori');
        $gambar_kategori = $this->input->post('gambar_kategori');

        // Konfigurasi upload gambar_kategori
        $config['upload_path'] = './public/uploads/kategori/'; // Folder tempat menyimpan gambar_kategori
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4048; // 2MB maksimal ukuran gambar_kategori
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        // Data yang akan dikirim ke REST API
        $this->load->library('upload', $config);

        // Upload gambar_kategori
        if ($this->upload->do_upload('gambar_kategori')) {
            $upload_data = $this->upload->data();
            $gambar_kategori = $upload_data['file_name'];
            $data = array(
                'nama_kategori' => $nama_kategori,
                'gambar_kategori' => $gambar_kategori
            );

            $simpan = $this->KategoriModel->insert_item($data);

            if ($simpan) {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('kategori')
                );
            } else {
                // Gagal menyimpan data
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br>Data Gagal Disimpan!'
                );
            }
        } else {
            // Gagal upload gambar_kategori
            $response = array(
                'success' => false,
                'message' => 'Gagal!<br> Upload Gambar Gagal: ' . $this->upload->display_errors()
            );
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}

/* End of file KategoriController.php */
