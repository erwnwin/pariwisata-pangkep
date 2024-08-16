<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiVisitorController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('VisitorModel');
    }

    public function record()
    {
        // Ambil data dari request body
        $input = json_decode(file_get_contents('php://input'), true);
        $ip_address = $input['ip_address'] ?? null;

        // Validasi
        if ($ip_address) {
            // Simpan data ke database
            $result = $this->VisitorModel->record_visit($ip_address);

            if ($result) {
                $response = array(
                    'success' => true,
                    'message' => 'Kunjungan berhasil dicatat!'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Gagal mencatat kunjungan!'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'Alamat IP tidak diberikan!'
            );
        }

        // Kirim respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}

/* End of file ApiVisitorController.php */
