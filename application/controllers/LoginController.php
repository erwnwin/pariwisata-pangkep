<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }


    public function index()
    {
        $data['title'] = 'Login : Apps Pariwisata Kab. Pangkep';

        $this->load->view('auth/login', $data);
    }


    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->LoginModel->validate_login($username, $password);

            if (is_array($user) && !empty($user)) {
                // Set session data
                $this->session->set_userdata('user_id', $user['id']); // Atur ID pengguna atau data lain yang diperlukan
                $this->session->set_userdata('username', $user['username']); // Menyimpan username dalam session
                $this->session->set_userdata('password', $user['password']); // Menyimpan password dalam session
                $this->session->set_userdata('nama_pengguna', $user['nama_pengguna']); // Menyimpan nama_pengguna dalam session

                $response = array(
                    'status' => 'success',
                    'message' => 'Sukses!<br>Login successful!'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Opps!!<br>Invalid username or password.'
                );
            }
        }

        // Mengirimkan respons dalam format JSON
        echo json_encode($response);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}

/* End of file LoginController.php */
