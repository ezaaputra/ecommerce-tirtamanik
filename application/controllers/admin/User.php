<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title'	=>	'Data Pengguna', 
						'user'	=>	$user,
						'isi'	=>	'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah user
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'
					));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. Buat username baru'));

		$valid->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
		// End validasi
		
		$data = array(	'title'	=>	'Tambah Pengguna', 
						'isi'	=>	'admin/user/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> SHA1($i->post('password')),
							'akses_level'	=> $i->post('akses_level')
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database
	}

	// Edit user
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
		// End validasi
		
		$data = array(	'title'	=>	'Edit Pengguna', 
						'user'	=>	$user,
						'isi'	=>	'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_user'		=> $id_user,
							'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> SHA1($i->post('password')),
							'akses_level'	=> $i->post('akses_level')
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database
	}

	// Delete user
	public function delete($id_user)
	{
		$data = array(	'id_user'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */