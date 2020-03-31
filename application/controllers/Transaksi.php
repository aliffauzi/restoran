<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('/');
		}
		$this->load->model('transaksi_model');
	}

	public function index()
	{
		$transaksi = $this->transaksi_model->read();
		$data['transaksi'] = $transaksi;
		$this->load->view('transaksi/data_transaksi',$data);
	}

	public function add()
	{
		if ($this->input->get('masakan') & $this->input->get('total') & $this->input->get('meja') & $this->input->get('harga')) {
			$masakan = $this->input->get('masakan');
			$total = $this->input->get('total');
			$meja = $this->input->get('meja');
			$harga = $this->input->get('harga');
			$insert = array(
				'masakan' => $masakan,
				'total' => $total,
				'no_meja' => $meja,
				'harga' => $harga,
				'tanggal' => date('Y-m-d')
			);
			$this->transaksi_model->create($insert);
			redirect('transaksi');
		} else {
			redirect('transaksi');
		}
	}

	public function proses()
	{		
		if ($this->input->get('masakan') & $this->input->get('total') & $this->input->get('meja') & $this->input->get('harga')) {
			$masakan = $this->input->get('masakan');
			$total = $this->input->get('total');
			$meja = $this->input->get('meja');
			$harga = $this->input->get('harga');
			$data = array(
				'masakan' => explode(',', $masakan),
				'qty' => explode(',', $total),
				'harga' => explode(',', $harga),
				'no_meja' => $meja
			);
			$this->load->view('transaksi/proses',$data);
		} else {
			redirect('order/masakan');
		}
	}

	public function detail( $id = NULL )
	{
		if ($id) {
			$data = array(
				'pesanan' => $this->transaksi_model->detail($id),
			);
			$this->load->view('transaksi/detail', $data);
		} else {
			redirect('transaksi');
		}
	}

	public function hapus( $id = NULL )
	{
		if ($id) {
			$this->session->set_flashdata('hapus', 'sukses');
			$this->transaksi_model->delete($id);
			redirect('transaksi');
		} else {
			redirect('transaksi');
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */