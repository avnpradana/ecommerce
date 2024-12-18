<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }

    public function index() {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $data['kategori'] = $this->db->get()->result_array();
        $this->load->view('kategori', $data);
    }

    public function tambah() {
        $this->load->view('tambah_kategori');
    }

    public function edit($id) {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        $data['kategori'] = $this->db->get()->row_array();
        $this->load->view('kategori_edit', $data);
    }

    public function simpan() {
        $nama_kategori = $this->input->post('nama_kategori');
        $data = [
            'nama_kategori' => $nama_kategori
        ];
        $this->db->insert('kategori', $data);
        redirect('kategori');
    }

    public function update() {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $data = [
            'nama_kategori' => $nama_kategori
        ];
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
        redirect('kategori');
    }

    public function hapus($id) {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        redirect('kategori');
    }
    public function produk($nama_kategori = null) {
        $this->db->select('*');
        $this->db->from('produk');
        if ($nama_kategori) {
            $this->db->where('kategori', $nama_kategori);
        }
        $data['product'] = $this->db->get()->result_array();
    
        $this->db->select('*');
        $this->db->from('kategori');
        $data['kategori'] = $this->db->get()->result_array();
    
        $this->load->view('shop', $data);
    }
    
    
}
