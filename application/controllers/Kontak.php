<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$site 	= $this->konfigurasi_model->listing();

		$data = array(	'title' => 'Kontak',
						'site'	=> $site,
						'isi'	=> 'kontak/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */