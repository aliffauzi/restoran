<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('pengaturan_model');
	}

	public function index()
	{
		$data['restoran'] = $this->pengaturan_model->read();
		$this->load->view('pengaturan',$data);
	}

	public function simpan()
	{
		if ($nama = $this->input->post('nama')) {
			$data = array(
				'nama' => $nama,
				'alamat' => $this->input->post('alamat')
			);
			if ($this->pengaturan_model->simpan($data)) {
				$this->session->set_userdata('restoran', $this->db->get('pengaturan',1)->row());
				$this->session->set_flashdata('sukses','simpan');
				redirect('pengaturan');
			}
		} else {
			redirect('error');
		}
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */