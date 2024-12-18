<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {
	public function simpan(){
    $data =array(
      'username'    => $this->input->post('username'),
      'nama'    => $this->input->post('nama'),
      'password'    => md5($this->input->post('password')),
      'nohp'    => ($this->input->post('nohp')),
      'level'           => $this->input->post('level'),
  );
  $this->db->insert('user',$data);
  }
	public function simpanusr(){
    $data =array(
      'username'    => $this->input->post('username'),
      'nama'    => $this->input->post('nama'),
      'password'    => md5($this->input->post('password')),
      'level'           => 'user',
  );
  $this->db->insert('user',$data);
  }
  public function update(){
    $data = array(
      'nama'    => $this->input->post('nama'),
      'username'    => $this->input->post('username'),
      'nohp'    => $this->input->post('nohp'),
      'level'           => $this->input->post('level'),
    );
    $where = array(
      'id_user' => $this->input->post('id_user')
    );
    $this->db->update('user',$data,$where);
    }
	}	
