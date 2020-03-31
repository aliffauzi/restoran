<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	protected $table = 'pengguna';

	public function login($username,$password)
	{
		$this->db->where('username', $username);
		if ($user = $this->db->get($this->table)->row()) {
			if (password_verify($password, $user->password)) {
				$restoran = $this->db->get('pengaturan',1)->row();
				$data = array(
					'username' => $user->username,
					'password' => $user->password,
					'id' => $user->id,
					'restoran' => $restoran,
					'status' => 'login'
				);
				$this->session->set_userdata($data);
				return 'sukses';
			} else {
				return 'password';
			}
		} else {
			return "username";
		}
	}

	public function register($username,$password)
	{
		$data = array(
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		);
		$this->db->insert($this->table, $data);
		$data['id'] = $this->db->insert_id();
		$restoran = $this->db->get('pengaturan',1)->row();
		$data['restoran'] = $restoran;
		$data['status'] = 'login';
		return $data;
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */