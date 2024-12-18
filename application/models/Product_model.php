<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_model {
	public function simpan(){
    $data =array(
      'nama'    => $this->input->post('nama'),
      'harga'    => $this->input->post('harga'),
      'stock'    => ($this->input->post('stock')),
      'deskripsi'           => $this->input->post('deskripsi'),
      'kategori'           => $this->input->post('kategori'),
  );
  $this->db->insert('product',$data);
  }
  public function update(){
    $data = array(
      'nama'    => $this->input->post('nama'),
      'harga'    => $this->input->post('harga'),
      'stock'    => $this->input->post('stock'),
      'deskripsi'           => $this->input->post('deskripsi'),
    );
    $where = array(
      'product_id' => $this->input->post('product_id')
    );
    $this->db->update('product',$data,$where);
    }
   // calling product ke front end
	function add_pic($data = array())
  {
      return $this->db->insert_batch('picproduct', $data);
  }
function add_is_primer($product_id)
  {
      $this->db->where('product_id', $product_id);
      $this->db->limit(1);
      $query = $this->db->get('picproduct');
      $data = $query->row();
      $this->db->set('is_primer', 1);
      $this->db->where('picproduct_id', $data->picproduct_id);
      $this->db->update('picproduct');
  }
public function get_all_product()
  {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
      $this->db->where('picproduct.is_primer', 1);
      $query = $this->db->get();
      return $query->result();
  }
  function get_product_by_id($id)
  {
      $this->db->where('product_id', $id);
      $query = $this->db->get('product');

      return $query->result();
  }
  function get_picture_product_by_id($id)
  {
      $this->db->where('product_id', $id);
      $query = $this->db->get('picproduct');

      return $query->result();
  }

  function add_cart($data)
    {
        $this->db->insert('keranjang', $data);
    }
    
  public function get_cart_item($user_id, $product_id)
    {
        return $this->db->get_where('keranjang', [
            'user_id' => $user_id,
            'product_id' => $product_id
        ])->row_array();
    }

  public function update_cart_item($user_id, $product_id, $update_data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->update('keranjang', $update_data);
    }
   
}
	

  
