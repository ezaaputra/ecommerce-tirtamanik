<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	// Load menu kategori produk
	public function nav_produk()
	{
		$this->db->select(	'produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori');
		$this->db->from('produk');
		// JOIN
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		// END JOIN
		$this->db->group_by('produk.id_kategori'); // Ngitung total gambar
		$this->db->order_by('kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all header_transaksi Belum Bayar
	public function nav_header_belum($id_pelanggan)
	{
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('header_transaksi.status_bayar', 'Belum');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */