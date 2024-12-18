<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

  public function index() {
    // Load the database library
    $this->load->database();

    // Get only active configurations directly from the database
    $query = $this->db->get_where('konfigurasi', array('status' => 'aktif'));

    // Pass the result to the view
    $data['konfigurasi'] = $query->result_array();

    // Load the view and pass the filtered configurations
    $this->load->view('your_view_file', $data);
}


}
