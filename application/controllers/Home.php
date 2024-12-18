<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Ambil semua kategori
        $this->db->select('*');
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        // Ambil semua produk
        $this->load->model('Product_Model');
        $product = $this->Product_Model->get_all_product(); 

        $this->db->select('*');
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('konten');
        $konten = $this->db->get()->result_array();

        // Ambil konfigurasi (jika diperlukan)
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array();

        $data = array(
            'product' => $product,
            'caraousel' => $caraousel,
            'konten' => $konten,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
        );

        $this->load->view('beranda', $data); // Kirim data ke view 'beranda'
    }

    public function filter_by_category($ktr) {
        // Ambil kategori berdasarkan ID
        $this->db->select('*');
        $this->db->from('kategori');
       
        $kategori = $this->db->get()->result_array();
        
        // Ambil produk berdasarkan kategori
        $this->load->model('Product_Model');
        $this->db->where('kategori', $ktr);
        $product = $this->Product_Model->get_all_product(); // Ambil semua data kategori
    
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->select('*');
        $konten = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array();

        $data = array(
            'product' => $product,
            'caraousel' => $caraousel,
            'konten' => $konten,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
        );

        $this->load->view('beranda', $data); // Kirim data ke view
    }
    
}
