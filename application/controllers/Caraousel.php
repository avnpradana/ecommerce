<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel extends CI_Controller {
    public function __construct()
	{
		parent:: __construct();
        $this->load->model('Caraousel_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'user'){
			redirect('home');
		}
	}

 

    // Tampilkan daftar data
    public function index() {
        $data['caraousel'] = $this->Caraousel_model->get_all();
        $this->load->view('caraousel_index', $data);
    }

    // Form tambah data
    public function tambah() {
        $this->load->view('caraousel_tambah');
    }

    // Simpan data
    public function simpan() {
        $judul = $this->input->post('judul'); // Mengambil data judul dari form
        $subjudul = $this->input->post('subjudul'); // Mengambil data subjudul dari form
        $deskripsi = $this->input->post('deskripsi'); // Mengambil data deskripsi dari form

        $jmlhimg = count($_FILES['foto']['name']);

        $uploadData = [];
        for ($i = 0; $i < $jmlhimg; $i++) {
            // Mengakses data file gambar
            $uploadData[$i]['judul'] = $judul;
            $uploadData[$i]['subjudul'] = $subjudul;
            $uploadData[$i]['deskripsi'] = $deskripsi;

            $_FILES['userfile']['name'] = $_FILES['foto']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['foto']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
            $_FILES['userfile']['size'] = $_FILES['foto']['size'][$i];

            // Konfigurasi upload
            $config['upload_path'] = './upload/caraousel/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Cek apakah upload berhasil
            if ($this->upload->do_upload('userfile')) {
                $fileData = $this->upload->data();
                $uploadData[$i]['foto'] = $fileData['file_name']; // Menyimpan nama file gambar
            }
        }

        // Simpan data jika ada gambar yang berhasil diupload
        if (!empty($uploadData)) {
            $insert = $this->Caraousel_model->add_pic($uploadData);
            if ($insert) {
                $this->session->set_flashdata('success', 'Berhasil Upload');
                redirect('caraousel');
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload');
                redirect('caraousel/tambah');
            }
        } else {
            $this->session->set_flashdata('error', 'Tidak ada file yang diupload');
            redirect('caraousel/tambah');
        }
    }

    // Hapus data
    public function hapus($id) {
        if ($this->Caraousel_model->hapus($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data.');
        }
        redirect('caraousel');
    }
}
