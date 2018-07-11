<?php

Class Login_model extends CI_Model {
    function __contruct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate($data) {
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        return $this->db->get('user')->row();
    }

    function __destruct() {
        $this->db->close();
    }
}