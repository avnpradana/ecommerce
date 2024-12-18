<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_total_pendapatan_bulanan()
    {
        // Query untuk menghitung total pendapatan bulanan
        $this->db->select_sum('jumlah');
        $this->db->where('MONTH(tanggal)', date('m')); // Bulan saat ini
        $this->db->where('YEAR(tanggal)', date('Y')); // Tahun saat ini
        return $this->db->get('transaction')->row()->jumlah;
    }

    public function get_total_pendapatan_harian()
    {
        // Query untuk menghitung total pendapatan harian
        $this->db->select_sum('jumlah');
        $this->db->where('DATE(tanggal)', date('Y-m-d')); // Hari ini
        return $this->db->get('transaction')->row()->jumlah;
    }

    public function get_total_sale_amount()
    {
        // Query untuk menghitung total jumlah penjualan
        $this->db->select_sum('jumlah');
        return $this->db->get('transaction')->row()->jumlah;
    }

    public function get_total_customers()
    {
        // Query untuk menghitung total pelanggan
        return $this->db->count_all('user');
    }

    // public function get_total_suppliers()
    // {
    //     // Query untuk menghitung total pemasok
    //     return $this->db->count_all('suppliers');
    // }

    // public function get_total_purchase_invoices()
    // {
    //     // Query untuk menghitung total faktur pembelian
    //     return $this->db->count_all('purchase_invoices');
    // }

    // public function get_total_sales_invoices()
    // {
    //     // Query untuk menghitung total faktur penjualan
    //     return $this->db->count_all('sales_invoices');
    // }
}
