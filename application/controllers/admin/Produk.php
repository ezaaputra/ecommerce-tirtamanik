<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title'		=>	'Data Produk', 
						'produk'	=>	$produk,
						'isi'		=>	'admin/produk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Gambar
	public function gambar($id_produk)
	{
		$produk 	= $this->produk_model->detail($id_produk);
		$gambar 	= $this->produk_model->gambar($id_produk);

		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('judul_gambar','Judul/Nama gambar','required',
			array(	'required'		=> '%s harus diisi'));

		
		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){	
		// End validasi
		
		$data = array(	'title'		=>	'Tambah Gambar Produk: '.$produk->nama_produk, 
						'produk'	=>	$produk,
						'gambar'	=>	$gambar,
						'error'		=>	$this->upload->display_errors(),
						'isi'		=>	'admin/produk/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create Thumbnail Gambar
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';

			$config['create_thumb']		= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 250; // Pixel
			$config['height']      		= 250; //Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End Thumnail Gambar

			$i = $this->input;

			$data = array(	'id_produk'		=> $id_produk,
							'judul_gambar'	=> $i->post('judul_gambar'),
							// Disimpan nama file gambar
							'gambar'		=> $upload_gambar['upload_data']['file_name']
						);
			$this->produk_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses','Data gambar telah ditambah');
			redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=>	'Tambah Gambar Produk', 
						'produk'	=>	$produk,
						'gambar'	=>	$gambar,
						'isi'		=>	'admin/produk/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah produk
	public function tambah()
	{
		// Ambil data kategori
		$kategori = $this->kategori_model->listing();

		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_produk','Nama produk','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode produk','required|is_unique[produk.kode_produk]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat kode baru'));

		
		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){	
		// End validasi
		
		$data = array(	'title'		=>	'Tambah Produk', 
						'kategori'	=>	$kategori,
						'error'		=>	$this->upload->display_errors(),
						'isi'		=>	'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create Thumbnail Gambar
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';

			$config['create_thumb']		= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 250; // Pixel
			$config['height']      		= 250; //Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End Thumnail Gambar

			$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_produk'	=> $i->post('kode_produk'),
							'nama_produk'	=> $i->post('nama_produk'),
							'slug_produk'	=> $slug_produk,
							'keterangan'	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'			=> $i->post('harga'),
							'stok'			=> $i->post('stok'),
							// Disimpan nama file gambar
							'gambar'		=> $upload_gambar['upload_data']['file_name'],
							'ukuran'		=> $i->post('ukuran'),
							'status_produk'	=> $i->post('status_produk'),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=>	'Tambah Produk', 
						'kategori'	=>	$kategori,
						'isi'		=>	'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit produk
	public function edit($id_produk)
	{
		// Ambil data produk yang akan diedit
		$produk = $this->produk_model->detail($id_produk);
		// Ambil data kategori
		$kategori = $this->kategori_model->listing();
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_produk','Nama produk','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode produk','required',
			array(	'required'		=> '%s harus diisi'));

		if ($valid->run()) {
			// Check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) {
				
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){	
		// End validasi
		
		$data = array(	'title'		=>	'Edit Produk: '.$produk->nama_produk, 
						'kategori'	=>	$kategori,
						'produk'	=>	$produk,
						'error'		=>	$this->upload->display_errors(),
						'isi'		=>	'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create Thumbnail Gambar
			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';

			$config['create_thumb']		= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 250; // Pixel
			$config['height']      		= 250; //Pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End Thumnail Gambar

			$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

			$data = array(	'id_produk'		=> $id_produk,
							'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_produk'	=> $i->post('kode_produk'),
							'nama_produk'	=> $i->post('nama_produk'),
							'slug_produk'	=> $slug_produk,
							'keterangan'	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'			=> $i->post('harga'),
							'stok'			=> $i->post('stok'),
							// Disimpan nama file gambar
							'gambar'		=> $upload_gambar['upload_data']['file_name'],
							'ukuran'		=> $i->post('ukuran'),
							'status_produk'	=> $i->post('status_produk')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
			}
		}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

			$data = array(	'id_produk'		=> $id_produk,
							'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_produk'	=> $i->post('kode_produk'),
							'nama_produk'	=> $i->post('nama_produk'),
							'slug_produk'	=> $slug_produk,
							'keterangan'	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'			=> $i->post('harga'),
							'stok'			=> $i->post('stok'),
							// Disimpan nama file gambar (gambar tidak diganti)
							// 'gambar'		=> $upload_gambar['upload_data']['file_name'],
							'ukuran'		=> $i->post('ukuran'),
							'status_produk'	=> $i->post('status_produk')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}}
		// End masuk database
		
		$data = array(	'title'		=>	'Edit Produk: '.$produk->nama_produk, 
						'kategori'	=>	$kategori,
						'produk'	=>	$produk,
						'isi'		=>	'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete produk
	public function delete($id_produk)
	{
		// Proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);

		$data = array(	'id_produk'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}

	// Delete gambar produk
	public function delete_gambar($id_produk,$id_gambar)
	{
		// Proses hapus gambar
		$gambar = $this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

		$data = array(	'id_gambar'	=> $id_gambar);
		$this->produk_model->delete_gambar($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */