<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function total_konsumen()
	{
		return $this->db->get('konsumen')->num_rows();
	}	

	public function transaksi_baru()
	{
		$this->db->where('status', 'Baru');
		return $this->db->get('transaksi')->num_rows();
	}

	public function total_transaksi()
	{
		return $this->db->get('transaksi')->num_rows();
	}

}

/* End of file m_dashboard.php */
/* Location: ./application/models/m_dashboard.php */