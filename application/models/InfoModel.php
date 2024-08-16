<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoModel extends CI_Model
{
    public function get_app_info()
    {
        $this->db->select('nama_aplikasi, tentang_app, versi_app, bhs_code, hub_kami');
        $this->db->from('tbl_info_app');
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data dalam bentuk array

        // return $this->db->get('tbl_info_app')->row_array();
    }
}

/* End of file InfoModel.php */
