<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function login()
	{
		if ($this->session->userdata('status') === 'login') {
			redirect('/');
		}
		if ($username = $this->input->post('username')) {
			$password = $this->input->post('password');
			echo json_encode($this->auth_model->login($username,$password));
		} else {
			$this->load->view('auth/login');
		}
	}

	public function register()
	{
		if ($this->session->userdata('status') === 'login') {
			redirect('/');
		}
		if ($username = $this->input->post('username')) {
			$password = $this->input->post('username');
			if ($user = $this->auth_model->register($username,$password)) {
				$this->session->set_userdata($user);
				echo json_encode('sukses');
			} else {
				echo json_encode('gagal');
			}
		} else {
			$this->load->view('auth/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */