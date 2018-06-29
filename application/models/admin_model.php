<?php

class Admin_model extends CI_Model {
    function showData() {
        $query = $this->db->get('data_penjualan');
        
        if($query->num_rows() > 0) return $query->result();
        else return false;
    }

    public function addNewData() {
        $records = array(
            'nama' => $this->input->post('txtNama'),
            'tanggal_masuk' => date('Y-m-d H:i:s'),
            // 'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'barang' => $this->input->post('txtBarang'),
            // 'kerusakan' => $this->input->post('kerusakan'),
            // 'solusi' => $this->input->post('solusi'),
            // 'biaya' => $this->input->post('biaya'),
            'ket_biaya' => $this->input->post('ket_biaya')
        );
        $this->db->insert('data_penjualan', $records);

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editData() {
        $id = $this->input->get('id');
        $this->db->where('data_id', $id);
        $query = $this->db->get('data_penjualan');

        if($query->num_rows() > 0){
            return $query->row();
        } else{
            return false;
        }
    }

    public function updateData() {
        $id = $this->input->post('txtId');
        $records = array(
            'nama' => $this->input->post('txtNama'),
            'tanggal_masuk' => date('Y-m-d H:i:s'),
            // 'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'barang' => $this->input->post('txtBarang'),
            // 'kerusakan' => $this->input->post('kerusakan'),
            // 'solusi' => $this->input->post('solusi'),
            // 'biaya' => $this->input->post('biaya'),
            'ket_biaya' => $this->input->post('ket_biaya')
        );
        $this->db->where('data_id', $id);
        $this->db->update('data_penjualan', $records);
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false; 
        }
    }

    public function deleteData() {
        $id= $this->input->get('id');
        $this->db->where('data_id', $id);
        $this->db->delete('data_penjualan');

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}