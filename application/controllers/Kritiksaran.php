<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritiksaran extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
        $this->load->model('Konfigurasi_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
	}

  public function index()
	{
		$this->db->select('*');
		$this->db->from('kritik_saran');
		$this->db->join('user','user.id_user = kritik_saran.user_id');
		$kritik = $this->db->get()->result_array();

		$data = array(
			'kritik'	=> $kritik,
		);
    $this->load->view('kritik', $data);
	}

    function simpan() 
    {
      $data = array(
          'user_id' => $this->session->userdata('id_user'),
          'user' => $this->session->userdata('nama'),
          'saran'  => $this->input->post('saran'),
      );
      $this->db->insert('kritik_saran', $data);
          $this->session->set_flashdata('success', 'Terimakasih atas Kritik dan Saran anda');
          redirect('home');
    }
  
}
