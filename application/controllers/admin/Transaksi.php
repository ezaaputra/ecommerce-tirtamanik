<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('konfigurasi_model');
	}

	// Load data transaksi
	public function index()
	{
		$header_transaksi = $this->header_transaksi_model->listing();
		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list',
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Load data transaksi
	public function sudah_bayar()
	{
		$header_transaksi = $this->header_transaksi_model->sudah();
		$data = array(	'title' 			=> 'Data Transaksi Sudah Terbayar',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/sudah_bayar',
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Load data transaksi
	public function belum_bayar()
	{
		$header_transaksi = $this->header_transaksi_model->belum();
		$data = array(	'title' 			=> 'Data Transaksi Belum Terbayar',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/belum_bayar',
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Konfirmasi
	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);

		$i = $this->input;

		$data = array(	'status_bayar'			=> 'Konfirmasi',
						'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
				);
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
		redirect(base_url('admin/transaksi/sudah_bayar'),'refresh');
	}

	// Cetak
	public function cetak($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	// Cetak
	public function cetak_kirim($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		$this->load->view('admin/transaksi/kirim', $data, FALSE);
	}	

	// Unduh pdf laporan
	public function pdf($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output a PDF file directly to the browser
		$nama_file_pdf = 'detail-transaksi-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}

	// Unduh pengiriman
	public function kirim($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title' 			=> 'Detail Transaksi', 
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// SETTING HEADER DAN FOOTER
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
		    <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 40px; width: auto;">
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; border: solid thin #000; font-size: 12px;">'.$site->namaweb.
				'<br>Alamat:  '.$site->alamat.'<br>
				Telepon: '.$site->telepon.'
			</div>
		');
		// END SETTING HEADER DAN FOOTER
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output tampil dengan nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}

	// Delete transaksi pelanggan yang tidak bayar
	public function delete_belum($id_header_transaksi)
	{
		// Ambil data traksaksi
		$header_transaksi	= $this->header_transaksi_model->detail($id_header_transaksi);
		// // Proses hapus gambar bukti bayar di header transaksi
		// unlink('./assets/upload/image/'.$header_transaksi->bukti_bayar);
		// unlink('./assets/upload/image/thumbs/'.$header_transaksi->bukti_bayar);

		$data = array( 'id_header_transaksi'	=> $id_header_transaksi );
		$this->header_transaksi_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/transaksi/belum_bayar'),'refresh');
	}

	// Delete riwayat transaksi pelanggan yang telah diproses 
	public function delete_tolak($id_header_transaksi)
	{
		$data = array(	'status_bayar'			=> 'Belum',
						'jumlah_bayar'			=> null,
						'rekening_pembayaran'	=> null,
						'rekening_pelanggan'	=> null,
						'id_rekening'			=> null,
						'tanggal_bayar'			=> null,
						'nama_bank'				=> null,
						'id_header_transaksi'	=> $id_header_transaksi,
				);
		$this->header_transaksi_model->edit($data);

		// Ambil data traksaksi
		$header_transaksi	= $this->header_transaksi_model->detail($id_header_transaksi);
		// Proses hapus gambar bukti bayar di header transaksi
		unlink('./assets/upload/image/'.$header_transaksi->bukti_bayar);
		unlink('./assets/upload/image/thumbs/'.$header_transaksi->bukti_bayar);

		$this->session->set_flashdata('sukses','Bukti telah ditolak');
		redirect(base_url('admin/transaksi/sudah_bayar'),'refresh');
	}

	// Delete riwayat transaksi pelanggan yang telah diproses 
	public function delete_riwayat_transaksi($id_header_transaksi)
	{
		// Ambil data traksaksi
		$header_transaksi	= $this->header_transaksi_model->detail($id_header_transaksi);
		// Proses hapus gambar bukti bayar di header transaksi
		unlink('./assets/upload/image/'.$header_transaksi->bukti_bayar);
		unlink('./assets/upload/image/thumbs/'.$header_transaksi->bukti_bayar);

		$data = array( 'id_header_transaksi'	=> $id_header_transaksi );
		$this->header_transaksi_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/transaksi'),'refresh');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */