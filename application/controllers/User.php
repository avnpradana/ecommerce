<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct()
	{
		parent:: __construct();
        $this->load->model('User_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'user'){
			redirect('home');
		}
	}


	public function index(){
    $this->db->select(' * ')->from('user');
    $this->db->order_by('nama','ASC');
    $user = $this->db->get( )->result_array( );
    $data = array('user' => $user);
		$this->load->view('user_index',$data);
	}	   
  public function tambah(){
    $this->load->view('user_tambah');
  } 
  public function edit($id){
    $this->db->select('*')->from('user');
    $this->db->where('id_user', $id);
    $user = $this->db->get()->result_array();
    $data = array('user' => $user);
    $this->load->view('user_edit',$data);
  } 
  public function simpan(){
    $username = $this->input->post('username');
    $this->db->from('user');
    $this->db->where('username',$username);
    $cek = $this->db->get( )->result_array( );
    if($cek<>NULL){
      $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Fail!!</strong> Username sudah ditambahkan 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('user/index');
    } 
      $this->User_model->simpan();
      $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Succes!!</strong> Selamat data berhasil di tambahkan
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      redirect('user/index');
  } 
 
  public function update(){
		$this->User_model->update();
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Berhasil diperbarui</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(site_url('user'));
    }

    public function hapus($id) {
      $this->db->where('id_user', $id);
      $this->db->delete('user');
      
      $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> User berhasil dihapus.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      
      redirect('user');
  }
  
  public function beranda(){
    $this->load->view('beranda');
  }
  
  
}
