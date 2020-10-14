<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');

	}

	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		// Ambil Data Kategori (kotak kategori)
		$list_kategori 	= $this->kategori_model->listing();
		

		$data = array(	'title' 			=> 'Kategori',
						'site'				=> $site,
						'list_kategori'		=> $list_kategori,
		 				'isi'				=> 'kategori/list',
		 			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */