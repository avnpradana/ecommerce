<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_details extends CI_Controller {

    public function index() {
        // Ambil semua kategori
        $this->db->select('*');
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        
        $this->load->model('Product_Model');
        $product = $this->Product_Model->get_all_product(); // Ambil semua produk

        // Ambil data keranjang dengan join produk dan picproduct
        $this->db->select('keranjang.*, product.*, picproduct.*');
        $this->db->from('keranjang');
        $this->db->join('product', 'product.product_id = keranjang.product_id');
        $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
        $this->db->where('keranjang.user_id', $this->session->userdata('id_user'));
        $this->db->where('picproduct.is_primer', 1);
        $keranjang = $this->db->get()->result_array();

        // Menghitung total harga keranjang
        $cart_total = 0;
        foreach ($keranjang as $item) {
            $cart_total += $item['sub_total'];
        }

        // Ambil konfigurasi dan picproduct
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('picproduct');
        $picproduct = $this->db->get()->result_array();

        // Kirim data ke view
        $data = array(
            'product' => $product,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'picproduct' => $picproduct,
            'keranjang' => $keranjang,
            'cart_total' => $cart_total // Kirim total keranjang ke view
        );
        $this->load->view('cartdetails', $data); 
    } 

    public function delete_cart_item($keranjang_id) {
        // Pastikan user memiliki akses untuk menghapus item di keranjang
        $user_id = $this->session->userdata('id_user');
        
        if (!$user_id) {
            redirect('login'); // Redirect ke login jika user belum login
        }

        // Hapus item dari keranjang berdasarkan keranjang_id dan user_id
        $this->db->where('keranjang_id', $keranjang_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->delete('keranjang');

        if ($result) {
            $this->session->set_flashdata('message', 'Item berhasil dihapus dari keranjang.');
        } else {
            $this->session->set_flashdata('message', 'Item tidak ditemukan atau gagal dihapus.');
        }

        // Redirect kembali ke halaman keranjang
        redirect('front/Cart_details');
    }
}
