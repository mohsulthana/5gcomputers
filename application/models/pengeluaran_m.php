<?php


class Pengeluaran_m extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function data_pengeluaran() {
        $q = $this->db->get('pengeluaran');
        if($q->num_rows() > 0) {
            return $q->result();
        } else {
            return false;
        }
    }
}