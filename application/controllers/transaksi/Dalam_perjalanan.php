<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dalam_perjalanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model'); // Load model untuk transaksi
        if ($this->session->userdata('level') == NULL) {
            redirect('auth'); // Redirect ke login jika tidak ada session
        }
        if ($this->session->userdata('level') == 'user') {
            redirect('home'); // Redirect ke home jika user level adalah 'user'
        }
    }

    // Menampilkan daftar pesanan Konfirmasi
    public function index()
    {
        $title = "Pesanan Dalam Perjalanan"; // Judul halaman
    
        $transaksi = $this->Transaksi_model->get_pesanan_perjalanan(); // Ambil data pesanan Konfirmasi dari model
    
        // Ambil data transaksi
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('user', 'user.id_user = transaction.user_id');
        $this->db->where('transaction.status', 'Pesanan Dalam Perjalanan');
        

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
            'title' => $title,
            'transaksi' => $transaksi,
            'transaction' => $transaction,
            'product' => $product, // Mengirimkan produk berdasarkan transaction_id
        );
    
        $this->load->view('pesanan_dalamperjalanan', $data);
    }
    

    // Metode untuk mengubah status pesanan
    
// Metode untuk mengubah status pesanan
public function ubah_status($id)
{
    // Update status to 'Pesanan dalam_perjalanan'
    $status = 'Pesanan Selesai'; 
    $kurir = $this->input->post('kurir');
    $no_resi = $this->input->post('no_resi');
    // Call model to update the status in the database
    $update = $this->Transaksi_model->update_status($id, $status); 

    if ($update) {
        $this->session->set_flashdata('success', 'Status pesanan berhasil diubah ke Pesanan dalam_perjalanan');
    } else {
        $this->session->set_flashdata('error', 'Gagal mengubah status pesanan');
    }
    redirect('transaksi/dalam_perjalanan');
}

    
    

    
}
