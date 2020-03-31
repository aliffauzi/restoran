<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('masakan_model');
	}

	public function index()
	{
		$this->load->view('masakan/data_masakan');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->masakan_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($nama = $this->input->post('nama')) {
			$config['upload_path'] = './uploads/';
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else{
				$file = $this->upload->data();
				$data = array(
					'nama' => $nama,
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'gambar' => $file['file_name']
				);
				if ($this->masakan_model->create($data)) {
					echo json_encode('tambah');
				}
			}
		} else {
			redirect('error');
		}
	}

	public function edit( $id = NULL )
	{
		if ($id) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga' => $this->input->post('harga')
			);
			if ($this->input->post('gambar') !== 'undefined') {
				$config['upload_path'] = './uploads/';
				$config['overwrite'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
				else{
					$data['gambar'] = $this->upload->data()['file_name'];					
				}
			}
			if ($this->masakan_model->update($id, $data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('error');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->masakan_model->delete($id)) {
				echo json_encode('sukses');			
			}
		} else {
			redirect('error');
		}
	}

}

/* End of file Masakan.php */
/* Location: ./application/controllers/Masakan.php */