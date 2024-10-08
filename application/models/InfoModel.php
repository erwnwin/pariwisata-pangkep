<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoModel extends CI_Model
{
    public function get_app_info()
    {
        $this->db->select('id, nama_aplikasi, tentang_app, versi_app, bhs_code, hub_kami');
        $this->db->from('tbl_info_app');
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data dalam bentuk array

        // return $this->db->get('tbl_info_app')->row_array();
    }

    public function update_data($id, $data)
    {
        // Memastikan ID ada dan valid
        if (!is_numeric($id)) {
            return false;
        }

        // Menentukan baris yang akan diperbarui berdasarkan ID
        $this->db->where('id', $id);

        // Melakukan pembaruan pada tabel 'info_apps'
        return $this->db->update('tbl_info_app', $data); // Gantilah 'info_apps' dengan nama tabel Anda
    }
}

/* End of file InfoModel.php */
