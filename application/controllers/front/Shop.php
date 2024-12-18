<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function index() {
      $this->db->select('*');
      $this->db->from('kategori');
      $kategori = $this->db->get()->result_array(); // Ambil semua data kategori
      $this->load->model('Product_Model');
      $product = $this->Product_Model->get_all_product(); // Ambil semua data kategori
      $this->db->select('*');
      $this->db->from('konfigurasi');
      $konfigurasi = $this->db->get()->result_array(); // Ambil semua data kategori
      $this->db->from('picproduct');
      $picproduct = $this->db->get()->result_array(); // Ambil semua data kategori
      $data = array(
        'product' => $product,
        'kategori' => $kategori,
        'konfigurasi' => $konfigurasi,
        'picproduct' => $picproduct,
    );
      $this->load->view('shop', $data); // Kirim data ke view 'beranda'
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
    $this->db->from('konten');
    $konten = $this->db->get()->result_array();
    
    $this->db->select('*');
    $this->db->from('konfigurasi');
    $konfigurasi = $this->db->get()->result_array();

    $data = array(
        'product' => $product,

        'kategori' => $kategori,
        'konfigurasi' => $konfigurasi,
    );

    $this->load->view('shop', $data); // Kirim data ke view
}

public function detail($id)
    {
        // Ambil data produk berdasarkan ID
        $this->db->where('product_id', $id);
        $query = $this->db->get('product');
        $data['products'] = $query->result();

        // Ambil data gambar produk berdasarkan ID
        $this->db->where('product_id', $id);
        $query = $this->db->get('picproduct');
        $data['pic_products'] = $query->result();

        // Tampilkan view dengan data yang diambil
        $this->load->view('shopdetails', $data);
    }
    
    public function cari($query)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Ambil semua data kategori

       

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
        $this->db->where('picproduct.is_primer', 1);
        $this->db->like('nama', $query);
        $hasil = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array(); // Ambil semua data kategori
        
        $data = array(
            'kategori'       => $kategori,
            'konfigurasi'  => $konfigurasi,
            'hasil'             => $hasil,
          
        );
        $this->load->view('shopp', $data); // Kirim data ke view 'beranda'
    }
  
}



