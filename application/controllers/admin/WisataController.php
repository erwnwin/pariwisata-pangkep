<?php

defined('BASEPATH') or exit('No direct script access allowed');

class WisataController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
        $this->load->model('KategoriModel');
        if (!$this->session->userdata('user_id')) {
            // Jika tidak login, redirect ke halaman login
            redirect(base_url('login')); // Ganti dengan rute login Anda
        }
    }


    public function index()
    {
        $data['title'] = 'Wisata : Apps Pariwisata Kab. Pangkep';
        $data['wisata'] = json_decode(json_encode($this->WisataModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/wisata', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Wisata : Apps Pariwisata Kab. Pangkep';
        $data['kategori'] = json_decode(json_encode($this->KategoriModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/create_wisata', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        // Ambil data dari form
        $nama_wisata = $this->input->post('nama_wisata');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $kategori_id = $this->input->post('kategori_id');
        $deskripsi = $this->input->post('deskripsi');

        // Konfigurasi upload gambar
        $config['upload_path'] = './public/uploads/wisata/'; // Folder tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5048; // 5MB maksimal ukuran gambar
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        // Load library upload
        $this->load->library('upload', $config);

        // Menyimpan data wisata
        $data_wisata = array(
            'nama_wisata' => $nama_wisata,
            'alamat_lengkap' => $alamat_lengkap,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'kategori_id' => $kategori_id,
            'deskripsi' => $deskripsi
        );

        // Simpan data wisata dan ambil ID
        $wisata_id = $this->WisataModel->insert_wisata($data_wisata);

        if ($wisata_id) {
            // Upload gambar
            $files = $_FILES['gambar_detail'];
            $file_count = count($files['name']);
            $upload_errors = [];

            for ($i = 0; $i < $file_count; $i++) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                    $image_data = array(
                        'wisata_id' => $wisata_id,
                        'gambar_detail' => $upload_data['file_name']
                    );
                    $this->WisataModel->insert_gambar($image_data);
                } else {
                    $upload_errors[] = $this->upload->display_errors();
                }
            }

            if (!empty($upload_errors)) {
                // Gagal upload gambar
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br> Upload Gambar Gagal: ' . implode('; ', $upload_errors)
                );
            } else {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('wisata') // URL untuk redirect setelah sukses
                );
            }
        } else {
            // Gagal menyimpan data wisata
            $response = array(
                'success' => false,
                'message' => 'Gagal!<br>Data Wisata Gagal Disimpan!'
            );
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function edit($hash)
    {
        $id = $this->WisataModel->decryptId($hash);
        if ($id === null) {
            show_404();
        }

        $data['wisata'] = $this->WisataModel->get_item_by_id($id);
        $data['kategori'] = $this->KategoriModel->get_items();

        if ($data['wisata'] === null) {
            show_404();
        }

        $data['title'] = 'Edit Wisata : Apps Pariwisata Kab. Pangkep';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/edit_wisata', $data);
        $this->load->view('layouts/footer', $data);
    }


    public function update()
    {
        // Ambil data dari form
        $id = $this->input->post('id');
        $nama_wisata = $this->input->post('nama_wisata');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $kategori_id = $this->input->post('kategori_id');
        $deskripsi = $this->input->post('deskripsi');

        // Konfigurasi upload gambar
        $config['upload_path'] = './public/uploads/wisata/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Update data wisata
        $data_wisata = array(
            'nama_wisata' => $nama_wisata,
            'alamat_lengkap' => $alamat_lengkap,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'kategori_id' => $kategori_id,
            'deskripsi' => $deskripsi
        );

        $updated = $this->WisataModel->update_wisata($id, $data_wisata);

        if ($updated) {
            // Konfigurasi untuk upload gambar baru
            $files = $_FILES['gambar_detail'];
            $file_count = count($files['name']);
            $upload_errors = [];
            $uploaded_files = [];

            // Jika ada gambar baru diunggah
            if ($file_count > 0 && !empty(array_filter($files['name']))) {
                // Hapus semua gambar lama sebelum mengupload gambar baru
                $existing_images = $this->WisataModel->get_gambar_by_wisata_idku($id);
                foreach ($existing_images as $image) {
                    $image_name = $image['gambar_detail']; // Nama enkripsi dari database
                    $image_path = './public/uploads/wisata/' . $image_name;

                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $this->WisataModel->delete_gambar_by_wisata_id($id);

                // Proses upload gambar baru
                for ($i = 0; $i < $file_count; $i++) {
                    if ($files['error'][$i] == 4) {
                        continue; // Skip jika tidak ada file yang dipilih
                    }

                    $_FILES['file']['name'] = $files['name'][$i];
                    $_FILES['file']['type'] = $files['type'][$i];
                    $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['file']['error'] = $files['error'][$i];
                    $_FILES['file']['size'] = $files['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $upload_data = $this->upload->data();
                        $image_name = $upload_data['file_name'];
                        $uploaded_files[] = $image_name;

                        $image_data = array(
                            'wisata_id' => $id,
                            'gambar_detail' => $image_name
                        );
                        $this->WisataModel->insert_gambar($image_data);
                    } else {
                        $upload_errors[] = $this->upload->display_errors();
                    }
                }
            }

            // Kirim respons
            if (!empty($upload_errors)) {
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br> Upload Gambar Gagal: ' . implode('; ', $upload_errors)
                );
            } else {
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Diperbarui!',
                    'redirect' => base_url('wisata')
                );
            }
        } else {
            // Gagal menyimpan data wisata
            $response = array(
                'success' => false,
                'message' => 'Gagal!<br>Data Wisata Gagal Diperbarui!'
            );
        }

        // Kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}

/* End of file WisataController.php */
