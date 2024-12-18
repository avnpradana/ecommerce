<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

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

      $this->db->select('*');
      $this->db->from('transaction');
      $this->db->where('user_id', $this->session->userdata('id_user'));
      $this->db->join('detailtransaction', 'detailtransaction.transaction_id = transaction.transaction_id');
      $this->db->join('product', 'product.product_id = detailtransaction.product_id');
      $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
      $this->db->where('is_primer',1);
      $order = $this->db->get()->result_array();

      $this->db->select('*');
      $this->db->from('transaction');
      $this->db->join('user', 'user.id_user = transaction.user_id');
      $this->db->order_by('transaction.tanggal', 'DESC'); // Mengurutkan berdasarkan tanggal terbaru
      $transaction = $this->db->get()->result_array();
      
        // Ambil data produk berdasarkan transaksi
        // Menggunakan transaction_id untuk memfilter produk yang terkait
        $product = [];
        foreach ($transaction as $t) {
            $this->db->select('*');
            $this->db->from('transaction');
            $this->db->join('detailtransaction', 'detailtransaction.transaction_id = transaction.transaction_id'); // Join dengan detailtransaction
            $this->db->join('product', 'product.product_id = detailtransaction.product_id'); // Join dengan tabel product
            $this->db->where('transaction.transaction_id', $t['transaction_id']); // Filter berdasarkan transaction_id
            $productsForTransaction = $this->db->get()->result_array();
            
            // Menambahkan produk berdasarkan transaksi
            $product[$t['transaction_id']] = $productsForTransaction;
        }
      
      $data = array(
        'product' => $product,
        'kategori' => $kategori,
        'konfigurasi' => $konfigurasi,
        'picproduct' => $picproduct,
        'order' => $order,
        'transaction' => $transaction,

    );
      $this->load->view('status_pesanan', $data); // Kirim data ke view 'beranda'
  }
      
  
}



