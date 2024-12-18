<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {

    // Fungsi untuk menyimpan data
    public function simpan($data) {
        return $this->db->insert('konten', $data);
    }

    // Fungsi untuk mendapatkan semua data
    public function get_all() {
        return $this->db->get('konten')->result();
    }

    // Fungsi untuk mendapatkan data berdasarkan ID
    public function get_by_id($id) {
        $this->db->where('id_konten', $id);
        return $this->db->get('konten')->row();
    }

    // Fungsi untuk menghapus data
    public function hapus($id) {
        $this->db->where('id_konten', $id);
        return $this->db->delete('konten');
    }

    // Fungsi untuk mengupdate data
    public function update($id, $data) {
        $this->db->where('id_konten', $id);
        return $this->db->update('konten', $data);
    }

    // Fungsi untuk menambahkan gambar
    function add_pic($data = array())
    {
        return $this->db->insert_batch('konten', $data);
    }
}
