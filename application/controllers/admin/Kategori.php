<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$kategori = $this->kategori_model->listing();

		$data = array(	'title'		=>	'Data Kategori Produk', 
						'kategori'	=>	$kategori,
						'isi'		=>	'admin/kategori/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah kategori
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_kategori','Nama kategori','required|is_unique[kategori.nama_kategori]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kategori baru'));

		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/kategori/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){	
		// End validasi
		
		$data = array(	'title'	=>	'Tambah Kategori Produk',
						'error'	=>	$this->upload->display_errors(), 
						'isi'	=>	'admin/kategori/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create Thumbnail Gambar
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/kategori/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/kategori/image/thumbs/';

			$config['create_thumb']		= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 250; // Pixel
			$config['height']      		= 250; //Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End Thumnail Gambar

			$i 				= $this->input;
			$slug_kategori	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data 			= array('slug_kategori'		=> $slug_kategori,
									'nama_kategori'		=> $i->post('nama_kategori'),
									// Disimpan nama file gambar
									'gambar'			=> $upload_gambar['upload_data']['file_name'],
									'urutan'			=> $i->post('urutan')
									);
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/kategori'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'	=>	'Tambah Kategori Produk',
						'isi'	=>	'admin/kategori/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit kategori
	public function edit($id_kategori)
	{
		// Ambil data kategori yang akan diedit
		$kategori = $this->kategori_model->detail($id_kategori);
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_kategori','Nama kategori','required',
			array(	'required'		=> '%s harus diisi'	));

		if ($valid->run()) {
			// Check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) {
				
			$config['upload_path'] = './assets/upload/kategori/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){	
		// End validasi
		
		$data = array(	'title'		=>	'Edit Kategori Produk', 
						'kategori'	=>	$kategori,
						'error'		=>	$this->upload->display_errors(),
						'isi'		=>	'admin/kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create Thumbnail Gambar
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/kategori/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/kategori/image/thumbs/';

			$config['create_thumb']		= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 250; // Pixel
			$config['height']      		= 250; //Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End Thumnail Gambar

			$i 				= $this->input;
			$slug_kategori	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data 			= array('id_kategori'	=> $id_kategori,
									'slug_kategori'	=> $slug_kategori,
									'nama_kategori'	=> $i->post('nama_kategori'),
									// Disimpan nama file gambar
									'gambar'		=> $upload_gambar['upload_data']['file_name'],
									'urutan'		=> $i->post('urutan'));
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/kategori'),'refresh');
			}
		}else{
			// Edit produk tanpa ganti gambar
			$i 				= $this->input;
			$slug_kategori	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data 			= array('id_kategori'	=> $id_kategori,
									'slug_kategori'	=> $slug_kategori,
									'nama_kategori'	=> $i->post('nama_kategori'),
									// Disimpan nama file gambar
									// 'gambar'		=> $upload_gambar['upload_data']['file_name'],
									'urutan'		=> $i->post('urutan'));
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/kategori'),'refresh');
	}}
	// End masuk database

		$data = array(	'title'		=>	'Edit Kategori: '.$kategori->nama_kategori, 
						'kategori'	=>	$kategori,
						'isi'		=>	'admin/kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete kategori
	public function delete($id_kategori)
	{
		$data = array(	'id_kategori'	=> $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */