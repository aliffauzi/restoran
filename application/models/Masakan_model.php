<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_model extends CI_Model {

	protected $table = 'masakan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('masakan.*, kategori_masakan.nama as kategori');
		$this->db->from('masakan');
		$this->db->join('kategori_masakan', 'masakan.id_kategori = kategori_masakan.id');
		return $this->db->get()->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getMasakan()
	{
		return $this->db->get($this->table);
	}

}

/* End of file Masakan_model.php */
/* Location: ./application/models/Masakan_model.php */