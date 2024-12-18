<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picproduct extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
        $this->load->model('Product_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'user'){
			redirect('home');
		}
	}


    public function index()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('nama','ASC');
        $this->db->join('picproduct', 'picproduct.id_product = product.id_product');
        $this->db->where('picproduct.is_primer', 1);
        $product = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('picproduct', 'picproduct.id_product = product.id_product');
        $picproduct = $this->db->get()->result_array();
        $data = array(
			'product'    => $product,
			'picproduct' => $picproduct,
		);
        $this->load->view('product_index',$data);
    }

    public function tambah(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('nama','ASC');
        $prdct = $this->db->get()->result_array();

        $data = array(
			'prdct'      => $prdct,
		);
        $this->load->view('picproduct_tambah',$data);
    }

    function simpan_img()
    {
        $id = $this->input->post('product_id'); // Use input->post for form data
        $id = intval($id);
        // No need to set validation rules here, as it's handled in the Product_Model

        $jmlhimg = count($_FILES['picture']['name']);

        $uploadData = [];
        for ($i = 0; $i < $jmlhimg; $i++) {
            // Correctly access individual file data within the array
            $uploadData[$i]['product_id'] = $id;

            $_FILES['userfile']['name'] = $_FILES['picture']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['picture']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['picture']['tmp_name'][$i];
            $_FILES['userfile']['size'] = $_FILES['picture']['size'][$i];

            $config['upload_path'] = './upload/konten/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 5000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $fileData = $this->upload->data();
                $uploadData[$i]['picture'] = $fileData['file_name'];
                $uploadData[$i]['product_id'] = $id; // Add the id element to the inner array
            }
        }

        if ($uploadData !== NULL) {
            $insert = $this->Product_model->add_pic($uploadData);
            $this->Product_model->add_is_primer($id);
            if ($insert) {
                echo "
                    <a href='" . base_url('product/prdk') . "'> Kembali </a>
                    <br>
                    Berhasil Upload ";
            } else {
                echo "Gagal Upload";
            }
        }
    }
}
