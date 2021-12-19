<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_paket');
	}

	public function index()
	{
		$isi['content']	= 'backend/paket/v_paket.php';
		$isi['judul']	= 'Daftar Data Paket';
		$isi['data']	= $this->m_paket->getDataPaket();
		$this->load->view('backend/dashboard', $isi);
	}

	public function tambah()
	{
		$isi['content']	= 'backend/paket/t_paket.php';
		$isi['judul']	= 'Form Tambah Paket';
		$isi['kode_paket']= $this->m_paket->generate_kode_paket();
		$this->load->view('backend/dashboard', $isi);
	}

	public function simpan()
	{
		$data = array(
			'kode_paket' => $this->input->post('kode_paket'),
			'nama_paket' => $this->input->post('nama_paket'),
			'harga_paket' => $this->input->post('harga_paket')
		);
		$query = $this->db->insert('paket', $data);
		if ($query = TRUE) {
			$this->session->set_flashdata('info', 'Data Paket Berhasil di Simpan');
			redirect('paket');
		}
	}

	public function edit($kode_paket)
	{
		$isi['content']	= 'backend/paket/e_paket';
		$isi['judul']	= 'Form Edit Paket';
		$isi['data']	= $this->m_paket->edit($kode_paket);
		$this->load->view('backend/dashboard', $isi);
	}

	public function update()
	{
		$kode_paket = $this->input->post('kode_paket');
		$data = array(
			'kode_paket' => $this->input->post('kode_paket'),
			'nama_paket' => $this->input->post('nama_paket'),
			'harga_paket' => $this->input->post('harga_paket')
		);
		$query = $this->m_paket->update($kode_paket, $data);
		if ($query = TRUE) {
			$this->session->set_flashdata('info', 'Data Paket Berhasil di Update');
			redirect('paket');
		}
	}

	public function delete($kode_paket)
	{
		$query = $this->m_paket->delete($kode_paket);
		if ($query = TRUE) {
			$this->session->set_flashdata('info', 'Data Paket Berhasil di Delete');
			redirect('paket');
		}
	}

	// ======== START INFORMASI PAKET ===========

	public function info_paket()
	{
		$isi['content']	= 'backend/info_paket/v_info_paket';
		$isi['judul']	= 'Info Paket';
		$isi['info_paket']	= $this->db->get('info_paket')->result();
		$this->load->view('backend/dashboard', $isi);
	}

	public function form_info_paket()
	{
		$isi['content']	= 'backend/info_paket/t_info_paket';
		$isi['judul']	= 'Form Tambah Info Paket';		
		$this->load->view('backend/dashboard', $isi);
	}

	public function simpan_info_paket()
	{
		$data['deskripsi_info_paket'] = $this->input->post('deskripsi_info_paket');
		$query = $this->db->insert('info_paket', $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
			redirect('paket/info_paket');
		}
	}

	public function edit_info_paket($id)
	{
		$isi['content']	= 'backend/info_paket/e_info_paket';
		$isi['judul']	= 'Form Edit Info Paket';		
		$isi['info_paket']	= $this->m_paket->edit_info_paket($id);
		$this->load->view('backend/dashboard', $isi);
	}

	public function update_info_paket()
	{
		$id_info_paket = $this->input->post('id_info_paket');
		$data['deskripsi_info_paket'] = $this->input->post('deskripsi_info_paket');
		$query = $this->m_paket->update_info_paket($id_info_paket, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Update');
			redirect('paket/info_paket');
		}
	}

}