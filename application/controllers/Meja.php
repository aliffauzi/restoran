<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('meja_model');
	}

	public function index()
	{
		$this->load->view('meja');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->meja_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($no_meja = $this->input->post('no_meja')) {
			$data = array(
				'no_meja' => $no_meja,
				'jumlah_kursi' => $this->input->post('jumlah_kursi'),
				'status' => '0'
			);
			if ($this->meja_model->create($data)) {
				echo json_encode('tambah');
			} else {
				echo "string";
			}
		} else {
			redirect('error');
		}
	}

	public function edit( $id = NULL )
	{
		if ($id) {
			$data = array(
				'no_meja' => $this->input->post('no_meja'),
				'jumlah_kursi' => $this->input->post('jumlah_kursi')
			);
			if ($this->meja_model->update($id, $data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('error');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->meja_model->delete($id)) {
				echo json_encode('sukses');			
			}
		} else {
			redirect('error');
		}
	}

}

/* End of file Meja.php */
/* Location: ./application/controllers/Meja.php */