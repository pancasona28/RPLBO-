<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tentang extends CI_Model {

	public function getTentang()
	{
		return $this->db->get('tentang')->result();
	}

	public function edit($id_tentang)
	{
		$this->db->where('id_tentang', $id_tentang);
		return $this->db->get('tentang')->row_array();
	}

	public function update($id_tentang, $data)
	{
		$this->db->where('id_tentang', $id_tentang);
		$this->db->update('tentang', $data);
	}

}