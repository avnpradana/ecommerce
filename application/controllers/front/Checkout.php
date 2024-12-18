<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

  public function index() {
    $id_user = $this->session->userdata('id_user');

    // Cek apakah user sudah login
    if (!$id_user) {
        redirect('login'); // R edirect ke halaman login jika belum login
    }

    // Ambil data user langsung dari database
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user', $id_user);
    $user = $this->db->get()->result_array();
    
   
    
    // Ambil semua kategori
    $this->db->select('*');
    $this->db->from('kategori');
    $kategori = $this->db->get()->result_array();
    
    // Ambil semua produk
    $this->load->model('Product_Model');
    $product = $this->Product_Model->get_all_product();

    // Ambil data keranjang dengan join produk dan picproduct
    $this->db->select('keranjang.*, product.*, picproduct.*');
    $this->db->from('keranjang');
    $this->db->join('product', 'product.product_id = keranjang.product_id');
    $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
    $this->db->where('keranjang.user_id', $id_user);
    $this->db->where('picproduct.is_primer', 1);
    $keranjang = $this->db->get()->result_array();

    // Menghitung total harga keranjang
    $cart_total = 0;
    if (!empty($keranjang)) {
        foreach ($keranjang as $item) {
            $cart_total += $item['sub_total'];
        }
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
        'user' => $user,
        
        'kategori' => $kategori,
        'konfigurasi' => $konfigurasi,
        'picproduct' => $picproduct,
        'keranjang' => $keranjang,
        'cart_total' => $cart_total // Kirim total keranjang ke view
    );

    // Load view dengan data yang telah disiapkan
    $this->load->view('checkout', $data);
  } 
  


  public function process_checkout() {
    // Pastikan user sudah login
    $user_id = $this->session->userdata('id_user');
    if (!$user_id) {
        redirect('login');
    }

    // Ambil data dari form (Billing Details)
    $data_billing = [
        'nama'       => $this->input->post('nama'),
        'alamat'     => $this->input->post('alamat'),
        'kota'       => $this->input->post('kota'),
        'provinsi'   => $this->input->post('provinsi'),
        'kode_pos'   => $this->input->post('kode_pos'),
        'nohp'       => $this->input->post('nohp'),
        'email'      => $this->input->post('email'),
    ];

    // Perbarui data user di tabel user
    $this->db->where('id_user', $user_id);
    $this->db->update('user', $data_billing);

    // Ambil data keranjang
    $this->db->select('keranjang.*, product.harga, product.nama, product.product_id');
    $this->db->from('keranjang');
    $this->db->join('product', 'product.product_id = keranjang.product_id');
    $this->db->where('keranjang.user_id', $user_id);
    $keranjang = $this->db->get()->result_array();

    if (empty($keranjang)) {
        redirect('keranjang');
    }

    // Hitung total harga
    $cart_total = 0;
    foreach ($keranjang as $item) {
        $cart_total += $item['sub_total'];
    }

    // Simpan data transaksi ke tabel transaction
    $data_transaction = [
        'user_id'    => $user_id,
        'tanggal'    => date('Y-m-d'),
        'jumlah'     => $cart_total,
        'status'     => 'Pesanan Masuk',  // Status awal
    ];
    $this->db->insert('transaction', $data_transaction);
    $transaction_id = $this->db->insert_id();

    // Simpan detail transaksi
    foreach ($keranjang as $item) {
        $data_order_item = [
            'product_id'      => $item['product_id'],
            'transaction_id'  => $transaction_id,
            'jumlah'          => $item['qty'],
            'harga'           => $item['harga'],
            'sub_harga'       => $item['harga'] * $item['qty']
        ];
        $this->db->insert('detailtransaction', $data_order_item);

        // Kurangi stok produk
        $this->db->set('stock', 'stock - ' . $item['qty'], FALSE);
        $this->db->where('product_id', $item['product_id']);
        $this->db->update('product');
    }

    // Hapus keranjang setelah checkout berhasil
    $this->db->delete('keranjang', ['user_id' => $user_id]);

    // Redirect ke halaman sukses
    $this->session->set_flashdata('success', 'Pesanan Anda berhasil dibuat!');
    redirect('front/status');
}
    public function simpan() {
       $payment;    
    }
}
