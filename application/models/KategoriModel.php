<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{

    public function get_items()
    {
        // Logic untuk mengambil semua item (contoh)
        return $this->db->get('tbl_kategori')->result();
        // -5.073821852559766, 119.6208287605224
    }

    public function insert_item($data)
    {
        // Logic untuk menambahkan item baru (contoh)
        $this->db->insert('tbl_kategori', $data);
        return $this->db->insert_id();
    }
}

/* End of file KategoriModel.php */
