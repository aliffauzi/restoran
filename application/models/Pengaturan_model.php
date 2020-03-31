<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {

	protected $table = 'pengaturan';

	public function read()
	{
		return $this->db->get($this->table, 1)->row();
	}

	public function simpan($data)
	{
		return $this->db->update($this->table, $data);
	}

}

/* End of file Pengaturan_model.php */
/* Location: ./application/models/Pengaturan_model.php */