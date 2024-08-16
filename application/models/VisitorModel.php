<?php

defined('BASEPATH') or exit('No direct script access allowed');

class VisitorModel extends CI_Model
{

    public function record_visit($ip_address)
    {
        $data = array(
            'ip_address' => $ip_address,
            'jam_akses' => date('Y-m-d H:i:s'),
            'last_akses' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_visitor', $data);
    }

    public function get_visitor_stats($start_date, $end_date)
    {
        $this->db->select('DATE(jam_akses) as date, COUNT(*) as count');
        $this->db->from('tbl_visitor');
        $this->db->where('jam_akses >=', $start_date);
        $this->db->where('jam_akses <=', $end_date);
        $this->db->group_by('DATE(jam_akses)');
        $this->db->order_by('DATE(jam_akses)', 'ASC');
        return $this->db->get()->result_array();
    }
}

/* End of file VisitorModel.php */
