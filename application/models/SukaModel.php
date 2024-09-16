<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SukaModel extends CI_Model
{
    // Fungsi untuk menyimpan atau memperbarui like
    public function save_like($wisata_id, $ip_likes)
    {
        $this->db->where('wisata_id', $wisata_id);
        $this->db->where('ip_likes', $ip_likes);
        $query = $this->db->get('tbl_suka');

        // Jika belum ada like dari IP ini, insert like baru
        if ($query->num_rows() == 0) {
            $data = array(
                'wisata_id' => $wisata_id,
                'likes' => 1, // Like diset sebagai 1 (like aktif)
                'ip_likes' => $ip_likes
            );
            return $this->db->insert('tbl_suka', $data);
        } else {
            // Jika sudah ada like dari IP ini, toggle like (bisa unlike)
            $row = $query->row();
            $new_like = $row->likes == 1 ? 0 : 1;

            $this->db->where('id', $row->id);
            return $this->db->update('tbl_suka', array('likes' => $new_like));
        }
    }

    // Fungsi untuk mendapatkan status like dari pengguna berdasarkan IP
    public function get_like_status($wisata_id, $ip_likes)
    {
        $this->db->where('wisata_id', $wisata_id);
        $this->db->where('ip_likes', $ip_likes);
        $query = $this->db->get('tbl_suka');
        return $query->row();
    }
}

/* End of file SukaModel.php */
