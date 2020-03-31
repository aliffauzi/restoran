<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('kategori_masakan_model');
	}

	public function index()
	{
		$this->load->view('masakan/kategori');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->kategori_masakan_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($nama = $this->input->post('nama')) {
			$data = array(
				'nama' => $nama
			);
			if ($this->kategori_masakan_model->create($data)) {
				echo json_encode('tambah');
			}
		} else {
			redirect('error');
		}
	}

	public function edit( $id = NULL )
	{
		if ($id) {
			$data = array(
				'nama' => $this->input->post('nama')
			);
			if ($this->kategori_masakan_model->update($id, $data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('error');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->kategori_masakan_model->delete($id)) {
				echo json_encode('sukses');			
			}
		} else {
			redirect('error');
		}
	}

	public function get_kategori()
	{
		header('Content-Type: application/json');
		$q = $this->input->get('kategori');
		echo json_encode($this->kategori_masakan_model->getKategori($q));
	}
}

/* End of file Kategori_masakan.php */
/* Location: ./application/controllers/Kategori_masakan.php */
