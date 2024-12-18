<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

    // Fungsi untuk menyimpan data konfigurasi baru
    public function simpan() {
        $data = array(
            'judul_website' => $this->input->post('judul_website'),
            'profil_website' => $this->input->post('profil_website'),
            'instagram'      => $this->input->post('instagram'),
            'facebook'       => $this->input->post('facebook'),
            'email'          => $this->input->post('email'),
            'alamat'         => $this->input->post('alamat'),
            'status'         => $this->input->post('status'),
            'no_wa'          => $this->input->post('no_wa'),
        );
        $this->db->insert('konfigurasi', $data);
    }

    // Fungsi untuk memperbarui data konfigurasi
    public function update() {
        $data = array(
            'judul_website' => $this->input->post('judul_website'),
            'profil_website' => $this->input->post('profil_website'),
            'instagram'      => $this->input->post('instagram'),
            'facebook'       => $this->input->post('facebook'),
            'email'          => $this->input->post('email'),
            'alamat'         => $this->input->post('alamat'),
            'status'         => $this->input->post('status'),
            'no_wa'          => $this->input->post('no_wa'),
        );
        $where = array(
            'id_konfigurasi' => $this->input->post('id_konfigurasi'),
        );
        $this->db->update('konfigurasi', $data, $where);
    }

    // Fungsi untuk mendapatkan semua data konfigurasi
    public function get_all_konfigurasi() {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mendapatkan data konfigurasi berdasarkan ID
    public function get_konfigurasi_by_id($id_konfigurasi) {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $this->db->where('id_konfigurasi', $id_konfigurasi);
        $query = $this->db->get();
        return $query->row();
    }
}
