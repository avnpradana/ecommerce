<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
		parent:: __construct();
		$this->load->model('Kategori_model');
	}
    public function index($ktr)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('nama_kategori', $ktr);
		$select = $this->db->get()->result_array();

		$this->db->select('*')->from('user');
		$user = $this->db->get()->result_array();
		
		$this->db->select('*')->from('kategori');
		$this->db->order_by('nama_kategori','ASC');
		$kategori = $this->db->get()->result_array();

		$this->db->select('*')->from('konfigurasi');
		$konfigurasi = $this->db->get()->result_array();

		$data = array(
			'select' 	  => $select,
			'user'	      => $user,
			'kategori' 	  => $kategori,
			'konfigurasi' => $konfigurasi,
		);
		$this->load->view('shop/kategori', $data);
	}
}