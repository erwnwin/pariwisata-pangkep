<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengumumanModel extends CI_Model
{
    // public function get_items()
    // {
    //     // Logic untuk mengambil semua item (contoh)
    //     return $this->db->get('tbl_pengumuman')->result();
    //     // -5.073821852559766, 119.6208287605224
    // }

    public function get_items()
    {
        // Ambil semua item dari tabel
        $query = $this->db->get('tbl_pengumuman');
        $results = $query->result(); // Mengembalikan hasil sebagai array objek

        // Mengonversi objek ke array dan enkripsi ID setiap item
        $modifiedResults = array();
        foreach ($results as $result) {
            // Konversi objek ke array
            $item = (array) $result;
            // Tambahkan ID terenkripsi ke array
            $item['encrypted_id'] = $this->encryptId($item['id']);
            // Simpan hasil yang dimodifikasi
            $modifiedResults[] = $item;
        }

        return $modifiedResults;
    }

    public function insert_item($data)
    {
        // Logic untuk menambahkan item baru (contoh)
        $this->db->insert('tbl_pengumuman', $data);
        return $this->db->insert_id();
    }

    public function encryptId($id)
    {
        return md5($id);
    }

    // Mendapatkan ID asli dari terenkripsi
    public function decryptId($hash)
    {
        // Ini adalah contoh sederhana. Anda perlu menyesuaikan dengan cara penyimpanan ID
        $this->db->select('id');
        $this->db->from('tbl_pengumuman');
        $this->db->where('MD5(id)', $hash);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->id : null;
    }

    public function get_item_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_pengumuman');
        return $query->row();
    }

    public function update_item($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_pengumuman', $data);
    }
}

/* End of file PengumumanModel.php */
