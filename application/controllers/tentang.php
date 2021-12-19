<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tentang');
	}

	public function index()
	{
		$isi['content'] = 'backend/tentang/v_tentang';
		$isi['judul']	= 'Informasi Tentang Laundry';
		$isi['tentang']	= $this->m_tentang->getTentang();
		$this->load->view('backend/dashboard', $isi);
	}

	public function tambah()
	{
		$isi['content'] = 'backend/tentang/t_tentang';
		$isi['judul']	= 'Form Tentang Laundry';
		$this->load->view('backend/dashboard', $isi);
	}

	public function simpan()
	{
		$config['upload_path'] = 'assets/images/tentang';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_tentang');
		$file_name = $this->upload->data();

		$data = array(
			'judul_tentang' => $this->input->post('judul_tentang'),
			'deskripsi_tentang' => $this->input->post('deskripsi_tentang'),
			'gambar_tentang' => $file_name['file_name']
		);

		$query = $this->db->insert('tentang', $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
			redirect('tentang','refresh');
		}
	}

	public function edit($id_tentang)
	{
		$isi['content'] = 'backend/tentang/e_tentang';
		$isi['judul']	= 'Form Edit Tentang';
		$isi['tentang']	= $this->m_tentang->edit($id_tentang);
		$this->load->view('backend/dashboard', $isi);
	}

	public function update()
	{
		$id_tentang = $this->input->post('id_tentang');
		$config['upload_path'] = 'assets/images/tentang';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$this->load->library('upload', $config);

		if (!empty($_FILES['gambar_tentang']['name'])) {
			$this->upload->do_upload('gambar_tentang');
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
			$data = array(
				'gambar_tentang' => $gambar, 
				'judul_tentang' => $this->input->post('judul_tentang'),
				'deskripsi_tentang' => $this->input->post('deskripsi_tentang')
			);
			$_id = $this->db->get_where('tentang',['id_tentang' => $id_tentang])->row();
			$query = $this->m_tentang->update($id_tentang, $data);
			if ($query = true) {				
				$this->session->set_flashdata('info', 'Data Berhasil di Update');				
				unlink("assets/images/tentang/".$_id->gambar_tentang);
				redirect('tentang');
			}
		}else{
			$data = array( 
				'judul_tentang' => $this->input->post('judul_tentang'),
				'deskripsi_tentang' => $this->input->post('deskripsi_tentang')
			);
			$query = $this->m_tentang->update($id_tentang, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Update');				
				redirect('tentang');
			}
		}
	}

}