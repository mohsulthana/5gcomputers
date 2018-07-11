<?php


class Pengeluaran_c extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('pengeluaran_m', 'pengeluaran');
    }
    
    public function index() {
        $pengeluaran = $this->pengeluaran->data_pengeluaran();
        $data['records'] = $pengeluaran;

        $this->load->view('layout/header');
        $this->load->view('pengeluaran', $data);
        $this->load->view('layout/footer');
    }
}