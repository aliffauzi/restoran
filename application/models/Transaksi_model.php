<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	protected $table = 'transaksi';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('id, masakan, total, no_meja, date_format(tanggal,"%d %M %Y") as tanggal, harga');
		$table = $this->db->get($this->table);
		if ($table->num_rows() > 0) {
			foreach ($table->result() as $key => $value) {
				$value->masakan = explode(',', $value->masakan);
				$value->total = explode(',', $value->total);
			}
			return $table->result();
		} else {
			return 'kosong';
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function proses($masakan,$total)
	{
		foreach ($masakan as $key => $id) {
			$data[] = $this->db->query("SELECT nama, harga, harga * ".$total[$key]." as total FROM `masakan` WHERE id = ".$id)->row();
			$data[$key]->qty = $total[$key];
		}
		return $data;
	}

	public function detail($id)
	{
		$this->db->select('id, masakan, total, no_meja, date_format(tanggal,"%d %M %Y") as tanggal, harga');
		$this->db->where('id', $id);
		$table = $this->db->get($this->table)->row();
		$table->masakan = explode(',', $table->masakan);
		$table->total = explode(',', $table->total);
		$table->harga = explode(',', $table->harga);
		return $table;
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */