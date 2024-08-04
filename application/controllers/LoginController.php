<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login : Apps Pariwisata Kab. Pangkep';

        $this->load->view('auth/login', $data);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}

/* End of file LoginController.php */
