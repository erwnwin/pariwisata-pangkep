<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiSuka extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SukaModel');
    }


    public function toggle_like()
    {
        $wisata_id = $this->input->post('wisata_id');
        $ip_likes = $this->input->ip_address(); // Mendapatkan IP address pengguna

        // $this->load->model('SukaModel');
        $success = $this->SukaModel->save_like($wisata_id, $ip_likes);

        if ($success) {
            $response = array('success' => true, 'message' => 'Like status updated');
        } else {
            $response = array('success' => false, 'message' => 'Failed to update like');
        }

        echo json_encode($response);
    }

    // Fungsi untuk mendapatkan status like
    public function get_like_status()
    {
        $wisata_id = $this->input->get('wisata_id');
        $ip_likes = $this->input->ip_address();

        // $this->load->model('SukaModel');
        $like = $this->SukaModel->get_like_status($wisata_id, $ip_likes);

        echo json_encode(array('likes' => $like ? $like->likes : 0));
    }
}

/* End of file ApiSuka.php */
