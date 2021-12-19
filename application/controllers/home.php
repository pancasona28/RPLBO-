<?php

class Home Extends CI_Controller{

	public function index()
	{
		$isi['slider'] = $this->db->get('slider')->result();
		$isi['paket'] = $this->db->get('paket')->result();
		$isi['info_paket'] = $this->db->get('info_paket')->row_array();
		$this->load->view('frontend/header', $isi);

		$isi['tentang'] = $this->db->get('tentang')->row_array();
		$this->load->view('frontend/home', $isi);
		$this->load->view('frontend/footer');
	}
}