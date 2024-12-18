<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'user'){
			redirect('home');
		}
		$this->load->model('Transaksi_model'); // Load model untuk transaksi
		$this->load->model('Dashboard_model'); // Load model untuk data dashboard
	}
	public function index()
	{
			// Ambil data langsung dari database
			$total_pendapatan_bulanan = $this->db->select_sum('jumlah')
																					 ->where('MONTH(tanggal)', date('m'))
																					 ->get('transaction')
																					 ->row()->jumlah;

			$total_pendapatan_harian = $this->db->select_sum('jumlah')
																					->where('DATE(tanggal)', date('Y-m-d'))
																					->get('transaction')
																					->row()->jumlah;

			$total_sale_amount = $this->db->select_sum('jumlah')
																		->get('transaction')
																		->row()->jumlah;

			$total_customers = $this->db->count_all('user');

			// $total_suppliers = $this->db->count_all('suppliers');

			// $total_purchase_invoices = $this->db->where('type', 'purchase')
			// 																		->count_all_results('invoices');

			// $total_sales_invoices = $this->db->where('type', 'sales')
			// 																 ->count_all_results('invoices');

			$transaksi = $this->Transaksi_model->get_pesanan_masuk(); // Ambil data pesanan masuk dari model
    
        // Ambil data transaksi
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('user', 'user.id_user = transaction.user_id');
        $this->db->where('transaction.status', 'Pesanan Masuk');

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
    

			// Siapkan data untuk dikirim ke view
			$data = [
					'total_pendapatan_bulanan' => $total_pendapatan_bulanan ?? 0,
					'total_pendapatan_harian' => $total_pendapatan_harian ?? 0,
					'total_sale_amount' => $total_sale_amount ?? 0,
					'total_customers' => $total_customers,
					
          'transaksi' => $transaksi,
          'transaction' => $transaction,
          'product' => $product, // Mengirimkan produk berdasarkan transaction_id
					// 'total_suppliers' => $total_suppliers,
					// 'total_purchase_invoices' => $total_purchase_invoices,
					// 'total_sales_invoices' => $total_sales_invoices,
			];
			

			// Load view
			$this->load->view('dashboard', $data);
	}

}
