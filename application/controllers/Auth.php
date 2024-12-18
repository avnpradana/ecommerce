<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
	{
		parent:: __construct();
        $this->load->model('User_model');
	}

    public function index() {
        $this->load->view('loginuser');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
    
        // Ambil user berdasarkan username
        $this->db->from('user')->where('username', $username);
        $user = $this->db->get()->row();
    
        // Jika user tidak ditemukan
        if ($user == NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Username tidak ada!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        } 
        // Jika password cocok
        elseif ($user->password == $password) {
            // Cek level pengguna
            if ($user->level == 'Admin') {
                // Set session jika level adalah admin
                $data = array(
                    'username' => $user->username,
                    'nama'     => $user->nama,
                    'level'    => $user->level,
                    'nohp'     => $user->nohp,
                    'id_user'  => $user->id_user, 
                );
                $this->session->set_userdata($data);
    
                redirect('dashboard');
            } 
            elseif ($user->level == 'user') {
                // Set session jika level adalah user
                $data = array(
                    'username' => $user->username,
                    'nama'     => $user->nama,
                    'level'    => $user->level,
                    'nohp'     => $user->nohp,
                    'id_user'  => $user->id_user, 
                );
                $this->session->set_userdata($data);
    
                redirect('home'); // Redirect ke halaman front/home untuk level user
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> Level pengguna tidak dikenali!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('auth');
            }
        } 
        // Jika password salah
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> Password yang anda masukkan salah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
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
          redirect('auth');
        } 
          $this->User_model->simpanusr();
          $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Succes!!</strong> Selamat data berhasil di tambahkan
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('auth');
      } 
     
    public function logout() {
        // Hapus semua session
        $this->session->sess_destroy();
    
        // Redirect ke halaman login
        redirect('auth');
    }
    
    
    
    }
