<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopdetails extends CI_Controller {
    public function index($id) {
        // Ambil kategori
        $this->db->select('*');
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        // Ambil produk utama berdasarkan ID
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $id);
        $product = $this->db->get()->row_array(); // Ambil satu produk

        // Ambil konfigurasi
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array();

        // Ambil gambar produk
        $this->db->select('*');
        $this->db->from('picproduct');
        $this->db->where('product_id', $id);
        $picproduct = $this->db->get()->result_array();

        $this->db->select('product.*, MIN(picproduct.picture) AS picture'); // Gunakan MIN untuk memilih gambar pertama
        $this->db->from('product');
        $this->db->join('picproduct', 'product.product_id = picproduct.product_id', 'left');
        $this->db->where('product.kategori', $product['kategori']); // Kategori yang sama
        $this->db->where('product.product_id !=', $id); // Tidak termasuk produk saat ini
        $this->db->group_by('product.product_id'); // Grup berdasarkan produk
        $this->db->limit(4); // Batasi jumlah produk terkait
        $related_products = $this->db->get()->result_array();
        

        $data = array(
            'product' => [$product], // Bungkus dalam array agar kompatibel dengan view Anda
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'picproduct' => $picproduct,
            'related_products' => $related_products
        );

        $this->load->view('shopdetails', $data);
    }
}
