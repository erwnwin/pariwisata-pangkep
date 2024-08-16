<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengumumanController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengumumanModel');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak login, redirect ke halaman login
            redirect(base_url('login')); // Ganti dengan rute login Anda
        }
    }


    public function index()
    {
        $data['title'] = 'Pengumuman : Apps Pariwisata Kab. Pangkep';
        $data['pengumuman'] = json_decode(json_encode($this->PengumumanModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function create()
    {
        $data['title'] = 'Create Pengumuman : Apps Pariwisata Kab. Pangkep';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/create_pengumuman', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        $judul_pengumuman =  $this->input->post('judul_pengumuman');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $this->input->post('gambar');

        // Konfigurasi upload gambar
        $config['upload_path'] = './public/uploads/pengumuman/'; // Folder tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4048; // 2MB maksimal ukuran gambar
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        // Data yang akan dikirim ke REST API
        $this->load->library('upload', $config);

        // Upload gambar
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'judul_pengumuman' => $judul_pengumuman,
                'deskripsi' => $deskripsi,
                'gambar' => $gambar
            );

            $simpan = $this->PengumumanModel->insert_item($data);

            if ($simpan) {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('pengumuman')
                );
            } else {
                // Gagal menyimpan data
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br>Data Gagal Disimpan!'
                );
            }
        } else {
            // Gagal upload gambar
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


    public function edit($hash)
    {
        $id = $this->PengumumanModel->decryptId($hash);
        if ($id === null) {
            show_404();
        }

        $data['pengumuman'] = $this->PengumumanModel->get_item_by_id($id);
        if ($data['pengumuman'] === null) {
            show_404();
        }

        $data['title'] = 'Edit Pengumuman : Apps Pariwisata Kab. Pangkep';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/edit_pengumuman', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $judul_pengumuman = $this->input->post('judul_pengumuman');
        $deskripsi = $this->input->post('deskripsi');
        $default_image = $this->input->post('existing_image'); // Ambil nama gambar lama yang terenkripsi dari input tersembunyi

        // Path gambar default jika tidak ada gambar baru
        $config['upload_path'] = './public/uploads/pengumuman/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE; // Menggunakan nama file terenkripsi
        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar']['name'])) {
            // Jika ada gambar baru diupload
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name']; // Nama file terenkripsi
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => $this->upload->display_errors()
                );
                echo json_encode($response);
                return;
            }
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru
            $gambar = $default_image;
        }

        $data = array(
            'judul_pengumuman' => $judul_pengumuman,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar
        );

        $updated = $this->PengumumanModel->update_item($id, $data);

        if ($updated) {
            $response = array(
                'status' => 'success',
                'message' => 'Niceee!<br>Data updated successfully',
                'redirect' => base_url('pengumuman')
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Oppss!<br>Failed to update data'
            );
        }

        echo json_encode($response);
    }
}

/* End of file PengumumanController.php */
