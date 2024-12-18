<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
        $this->load->model('Konfigurasi_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'user'){
			redirect('home');
		}
	}


    // Menampilkan halaman utama konfigurasi
    public function index() {
        $data['konfigurasi'] = $this->Konfigurasi_model->get_all_konfigurasi();
        $this->load->view('konfigurasi_index', $data);
    }
   
    // Menampilkan halaman tambah konfigurasi
    public function tambah() {
        $this->load->view('konfigurasi_tambah');
    }

    // Menyimpan data konfigurasi baru
    public function simpan() {
        $judul_website = $this->input->post('judul_website');

        // Validasi untuk memastikan judul website unik
        $this->db->from('konfigurasi');
        $this->db->where('judul_website', $judul_website);
        $cek = $this->db->get()->result_array();

        if (!empty($cek)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Judul website sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('konfigurasi/tambah');
        } 

        // Simpan data
        $this->Konfigurasi_model->simpan();
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Data konfigurasi berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('konfigurasi');
    }

    // Menghapus data konfigurasi
    public function hapus($id) {
        $this->db->where('id_konfigurasi', $id);
        $this->db->delete('konfigurasi');

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Data konfigurasi berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('konfigurasi');
    }

    // Menampilkan halaman edit konfigurasi
    public function edit($id) {
        $data['konfigurasi'] = $this->Konfigurasi_model->get_konfigurasi_by_id($id);
        if (!$data['konfigurasi']) {
            show_404();
        }
        $this->load->view('konfigurasi_edit', $data);
    }

    // Memperbarui data konfigurasi
    public function update() {
        $this->Konfigurasi_model->update();
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Data konfigurasi berhasil diperbarui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('konfigurasi');
    }
}
