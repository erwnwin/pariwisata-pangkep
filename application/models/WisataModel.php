<?php

defined('BASEPATH') or exit('No direct script access allowed');

class WisataModel extends CI_Model
{

    public function get_items()
    {
        $this->db->select('w.id AS wisata_id, w.nama_wisata, w.alamat_lengkap, w.latitude, w.longitude, w.deskripsi, k.nama_kategori');
        $this->db->from('tbl_wisata w');
        $this->db->join('tbl_kategori k', 'w.kategori_id = k.id');
        // $this->db->join('tbl_gambar g', 'w.id = g.wisata_id', 'left');
        // Menyusun hasil query
        $query = $this->db->get();
        $results = $query->result();
        // Mengembalikan data hasil query
        // return $query->result_array();
        $modifiedResults = array();
        foreach ($results as $result) {
            // Konversi objek ke array
            $item = (array) $result;
            // Tambahkan ID terenkripsi ke array
            $item['encrypted_id'] = $this->encryptId($item['wisata_id']);
            // Simpan hasil yang dimodifikasi
            $modifiedResults[] = $item;
        }

        return $modifiedResults;
        // -5.073821852559766, 119.6208287605224
    }

    public function get_gambar_by_wisata_idku($id)
    {
        $this->db->select('gambar_detail');
        $this->db->from('tbl_gambar');
        $this->db->where('wisata_id', $id);
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan array asosiatif
        // return $query->result_array(); // Mengembalikan hasil sebagai array
    }

    public function delete_gambar_by_name($image_name)
    {
        $this->db->where('gambar_detail', $image_name);
        $this->db->delete('tbl_gambar');
    }

    // public function delete_gambar_by_wisata_id($id)
    // {
    //     $this->db->where('wisata_id', $id);
    //     $this->db->delete('tbl_gambar');
    // }

    public function update_wisata($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_wisata', $data);
    }


    public function insert_wisata($data)
    {
        $this->db->insert('tbl_wisata', $data);
        return $this->db->insert_id();
    }

    public function insert_gambar_wisata($data)
    {
        $this->db->insert('tbl_gambar', $data);
    }

    public function insert_gambar_fasilitas($data)
    {
        $this->db->insert('tbl_fasilitas', $data);
    }

    public function insert_gambar_kondisi_jalan($data)
    {
        $this->db->insert('tbl_kondisi_jalan', $data);
    }

    public function get_all_wisata()
    {
        $this->db->select('tbl_wisata.*, tbl_kategori.nama_kategori');
        $this->db->from('tbl_wisata');
        $this->db->join('tbl_kategori', 'tbl_wisata.kategori_id = tbl_kategori.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_gambar_by_wisata_id($wisata_id)
    // {
    //     $this->db->select('gambar_detail');
    //     $this->db->from('tbl_gambar');
    //     $this->db->where('wisata_id', $wisata_id);
    //     $query = $this->db->get();

    //     return array_column($query->result_array(), 'gambar_detail');
    // }



    public function get_gambar_fasilitas_by_wisata_id($wisata_id)
    {
        $this->db->select('gambar_fasilitas');
        $this->db->from('tbl_fasilitas');
        $this->db->where('wisata_id', $wisata_id);
        $query = $this->db->get();

        return array_column($query->result_array(), 'gambar_fasilitas');
    }


    public function get_gambar_kondisi_jalan_by_wisata_id($wisata_id)
    {
        $this->db->select('gambar_kondisi_jalan');
        $this->db->from('tbl_kondisi_jalan');
        $this->db->where('wisata_id', $wisata_id);
        $query = $this->db->get();

        return array_column($query->result_array(), 'gambar_kondisi_jalan');
    }



    public function get_wisata_by_kategori($kategori_id)
    {
        $kategori_id = (int)$kategori_id; // Pastikan kategori_id adalah integer

        // Pilih kolom yang dibutuhkan dari tbl_wisata, tbl_gambar, dan tbl_kategori
        $this->db->select('tbl_wisata.id, tbl_wisata.nama_wisata, tbl_wisata.alamat_lengkap, tbl_wisata.latitude, tbl_wisata.longitude, tbl_wisata.deskripsi, tbl_wisata.kategori_id, tbl_kategori.nama_kategori, GROUP_CONCAT(DISTINCT tbl_gambar.gambar_detail) AS gambar_list, GROUP_CONCAT(DISTINCT tbl_fasilitas.gambar_fasilitas) AS gambar_fasilitas, GROUP_CONCAT(DISTINCT tbl_kondisi_jalan.gambar_kondisi_jalan) AS gambar_kondisi_jalan');
        $this->db->from('tbl_wisata');

        // Join dengan tabel tbl_gambar berdasarkan wisata_id
        $this->db->join('tbl_gambar', 'tbl_gambar.wisata_id = tbl_wisata.id', 'left');
        $this->db->join('tbl_fasilitas', 'tbl_fasilitas.wisata_id = tbl_wisata.id', 'left');
        $this->db->join('tbl_kondisi_jalan', 'tbl_kondisi_jalan.wisata_id = tbl_wisata.id', 'left');

        // Join dengan tabel tbl_kategori untuk mendapatkan nama kategori
        $this->db->join('tbl_kategori', 'tbl_wisata.kategori_id = tbl_kategori.id', 'left');

        // Filter berdasarkan kategori_id
        $this->db->where('tbl_wisata.kategori_id', $kategori_id);

        // Mengelompokkan hasil berdasarkan wisata id
        $this->db->group_by('tbl_wisata.id');

        // Eksekusi query
        $query = $this->db->get();

        // Kembalikan hasil query sebagai array asosiatif dan konversi gambar_list menjadi array
        $result = $query->result_array();

        foreach ($result as &$row) {
            // Mengubah gambar_list dari string yang dipisahkan koma menjadi array
            $row['gambar_list'] = explode(',', $row['gambar_list']);
            $row['gambar_fasilitas'] = explode(',', $row['gambar_fasilitas']);
            $row['gambar_kondisi_jalan'] = explode(',', $row['gambar_kondisi_jalan']);
        }

        return $result;
    }



    // hash
    public function encryptId($id)
    {
        return md5($id);
    }

    // Mendapatkan ID asli dari terenkripsi
    public function decryptId($hash)
    {
        // Ini adalah contoh sederhana. Anda perlu menyesuaikan dengan cara penyimpanan ID
        $this->db->select('id');
        $this->db->from('tbl_wisata');
        $this->db->where('MD5(id)', $hash);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->id : null;
    }

    public function get_item_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_wisata');
        return $query->row();
    }

    public function update_item($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_wisata', $data);
    }


    public function get_nearby_wisata($latitude, $longitude, $radius = 10)
    {
        // Radius dalam satuan derajat (misalnya 10 km)
        $radius_in_degrees = $radius / 111; // 1 derajat ~ 111 km

        $this->db->select('id, nama_wisata, alamat_lengkap, latitude, longitude, deskripsi, kategori_id');
        $this->db->from('tbl_wisata');
        $this->db->where('latitude >=', $latitude - $radius_in_degrees);
        $this->db->where('latitude <=', $latitude + $radius_in_degrees);
        $this->db->where('longitude >=', $longitude - $radius_in_degrees);
        $this->db->where('longitude <=', $longitude + $radius_in_degrees);

        $query = $this->db->get();
        return $query->result_array();
    }


    // Fungsi untuk menghapus gambar berdasarkan wisata_id
    public function delete_gambar_by_wisata_id($wisata_id, $table_name)
    {
        // Menentukan tabel yang digunakan
        $this->db->where('wisata_id', $wisata_id);
        $this->db->delete($table_name);
    }

    // Fungsi untuk menyimpan gambar baru ke database
    public function insert_gambar($table_name, $image_data)
    {
        // Menyimpan data gambar baru ke tabel yang ditentukan
        $this->db->insert($table_name, $image_data);
    }

    // Fungsi untuk mendapatkan gambar berdasarkan wisata_id
    public function get_gambar_by_wisata_id($wisata_id, $table_name, $column_name)
    {
        // Mendapatkan semua gambar yang berkaitan dengan wisata_id
        $this->db->select($column_name);
        $this->db->from($table_name);
        $this->db->where('wisata_id', $wisata_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file WisataModel.php */
