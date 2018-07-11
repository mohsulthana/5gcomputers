<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login_model', 'login');
		if(!empty($_SESSION['id_username'])) redirect('admin_c');
	}

	public function index() {
		if($_POST) {
			$result = $this->login->validate($_POST);
			$username_hash = hash("sneffru", $result->username);
			if(!empty($result)) {
				$data = [
					'id_username' => $result->id_username,
					'username' => $result->username,
					'password' => $result->password
				];
				$this->input->set_cookie($result->id_username, $result->username, time() + 3600);
				$this->session->set_userdata($data);
				redirect('admin_c');
			} else {
				$this->session->set_flashdata('flashdata', 'Username or password might be wrong');
				redirect('login_c');
			}
		}
		$this->load->view('login');
	}
}
