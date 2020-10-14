<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');

	}

	// Halaman Utama Website - Homepage
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$kategori = $this->konfigurasi_model->nav_produk();
		$produk = $this->produk_model->home();
		// Ambil Data Kategori (kotak kategori yg di dashboard)
		$list_kategori 	= $this->kategori_model->listing();
		// Ambil data keranjang
		// $keranjang	= $this->cart->contents();

		$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'produk'	=> $produk,
						'list_kategori'	=> $list_kategori,
						// 'keranjang'	=> $keranjang,
						'isi' 		=> 'home/list'
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */