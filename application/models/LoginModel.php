<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{

    public function validate_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Pastikan password di hash dengan md5
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() == 1) {
            return $query->row_array(); // Mengembalikan data pengguna sebagai array
        } else {
            return false; // Mengembalikan false jika login gagal
        }
    }
}

/* End of file LoginModel.php */
