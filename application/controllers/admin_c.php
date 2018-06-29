<?php

class Admin_c extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model', 'm');
        if(empty($_SESSION['id_username'])) redirect('login_c');
    }
    
    function index() {
        $this->load->view('layout/header');
        $this->load->view('dashboard');
        $this->load->view('layout/footer');
    }

    public function showData() {
        $data = $this->m->showData();
        echo json_encode($data);
    }

    public function addNewData() {
        $add = $this->m->addNewData();
        $message['success'] = false;
        $message['type'] = 'add';

        if($add) {
            $message['success'] = true;
        }
        echo json_encode($message);
    }

    public function editData() {
        $query = $this->m->editData();
        echo json_encode($query);
    }

    public function updateData() {
        $query = $this->m->updateData();
        $message['success'] = false;
        $message['type'] = 'update';

        if($query){
            $message['success'] = true;
        }
        echo json_encode($message);
    }

    public function deleteData() {
        $query = $this->m->deleteData();
        $message['success'] = false;

        if($query) {
            $message['success'] = true;
        }
        echo json_encode($message);
    }

    public function logout() {
		if($_SESSION['id_username']) {
		$this->session->sess_destroy($data);
        $this->session->unset_userdata($data);
        
        redirect('login_c');
		}
	}
}
