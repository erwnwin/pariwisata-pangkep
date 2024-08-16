<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengaduanModel extends CI_Model
{
    public function insert_complaint($nama_wisata, $pengaduan)
    {
        $data = array(
            'nama_wisata' => $nama_wisata,
            'pengaduan' => $pengaduan
        );

        return $this->db->insert('tbl_pengaduan', $data);  // Table 'complaints' should exist in your database
    }

    public function get_items()
    {
        // Logic untuk mengambil semua item (contoh)
        return $this->db->get('tbl_pengaduan')->result();
        // -5.073821852559766, 119.6208287605224
    }

    public function get_all()
    {
        $query = $this->db->get('tbl_wisata');
        return $query->result_array();
    }

    public function get_filtered($nama_wisata = '', $bulan = '', $tahun = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_pengaduan');

        if ($nama_wisata) {
            $this->db->where('nama_wisata', $nama_wisata);
        }

        if ($bulan) {
            // Ubah nama bulan ke angka untuk SQL query
            $bulan_numerik = (int)$bulan;
            $this->db->where('MONTH(created_at)', $bulan_numerik);
        }

        if ($tahun) {
            $this->db->where('YEAR(created_at)', $tahun);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_years()
    {
        $this->db->distinct();
        $this->db->select('YEAR(created_at) as year');
        $this->db->from('tbl_pengaduan');
        $this->db->order_by('year', 'DESC');
        $query = $this->db->get();
        return array_column($query->result_array(), 'year');
    }
}

/* End of file PengaduanModel.php */
