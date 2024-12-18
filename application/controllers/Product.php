<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
        $this->load->model('Product_model');
        if ($this->session->userdata('level') == NULL){
			redirect('auth');
		}
		if ($this->session->userdata('level') == 'admin'){
			redirect('dashboard');
		}
	}


    public function index()
    {
        $this->db->select('*');
        $this->db->from('product');
        $product = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('picproduct', 'picproduct.product_id=product.product_id');
        $picproduct = $this->db->get()->result_array();
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'product' => $product,
            'picproduct' => $picproduct,
            'kategori' => $kategori,
        );
        $this->load->view('product_index', $data);
    }

    // Mendapatkan detail produk berdasarkan ID
    public function show($id) {
        $product = $this->Product_model->get_product_by_id($id);

        if ($product) {
            echo json_encode($product);
      
    }
}
    public function tambah(){
        $this->db->select('*')->from('product');
        $this->db->order_by('nama','ASC');
        $product = $this->db->get()->result_array();
        
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'product' => $product,
            'kategori' => $kategori,
        );
        $this->load->view('product_tambah', $data);
    }
    public function simpan(){
      $nama = $this->input->post('nama');
      $this->db->from('product');
      $this->db->where('nama',$nama);
      $cek = $this->db->get( )->result_array( );
      if($cek<>NULL){
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Fail!!</strong> Username sudah ditambahkan 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('product');
      } 
        $this->Product_model->simpan();
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succes!!</strong> Selamat data berhasil di tambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('product');
    } 
    
    public function hapus($id) {
        // Validasi jika ID tidak kosong atau valid
        if (empty($id)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ID produk tidak valid.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('product');
            return;
        }
    
        // Ambil data gambar terkait berdasarkan ID produk
        $this->db->select('picture');
        $this->db->from('picproduct');
        $this->db->where('product_id', $id);
        $picproduct = $this->db->get()->result_array();
    
        // Hapus file gambar dari server jika ada
        if (!empty($picproduct)) {
            foreach ($picproduct as $pic) {
                $file_path = FCPATH . 'upload/konten/' . $pic['picture']; // Sesuaikan dengan direktori file
                if (file_exists($file_path)) {
                    unlink($file_path); // Hapus file
                }
            }
    
            // Hapus data terkait di tabel picproduct
            $this->db->delete('picproduct', ['product_id' => $id]);
        }
    
        // Hapus data di tabel product
        $deleted = $this->db->delete('product', ['product_id' => $id]);
    
        // Notifikasi berdasarkan hasil penghapusan
        if ($deleted) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Produk berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Gagal menghapus produk.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
    
        // Redirect ke halaman product
        redirect('product');
    }
    
    
    
    public function update(){
		$this->Product_model->update();
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Berhasil diperbarui</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(site_url('product'));
    }
    function simpan_img()
    {
        $id = $this->input->post('product_id'); // Use input->post for form data
        $id = intval($id);
        // No need to set validation rules here, as it's handled in the Product_model

        $jmlhimg = count($_FILES['picture']['name']);

        $uploadData = [];
        for ($i = 0; $i < $jmlhimg; $i++) {
            // Correctly access individual file data within the array
            $uploadData[$i]['id_product'] = $id;

            $_FILES['userfile']['name'] = $_FILES['picture']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['picture']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['picture']['tmp_name'][$i];
            $_FILES['userfile']['size'] = $_FILES['picture']['size'][$i];

            $config['upload_path'] = './upload/konten/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $fileData = $this->upload->data();
                $uploadData[$i]['picture'] = $fileData['file_name'];
                $uploadData[$i]['id_product'] = $id; 
            }
        }

        if ($uploadData !== NULL) {
            $insert = $this->Product_model->add_pic($uploadData);
            $this->Product_model->add_is_primer($product_id);
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
    
    public function cart()
    {
        $this->load->library('cart');
        $user_id = $this->session->userdata('id_user');
    
        // Ambil data dari form
        $id = $this->input->post('product_id');
        $nama = $this->input->post('nama');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
    
        // Hitung subtotal
        $sub_total = $harga * $qty;
    
        // Periksa stok produk di database
        $product = $this->Product_model->get_product_by_id($id);
    
        if ($product[0]->stock < $qty) {
            $this->session->set_flashdata('error', 'Stok produk tidak mencukupi.');
            redirect('front/shopdetails/index/' . $id);
            return;
        }
    
        // Cek apakah produk sudah ada di cart
        $cart_item = $this->Product_model->get_cart_item($user_id, $id);
    
        if ($cart_item) {
            // Update jumlah dan subtotal di cart
            $new_qty = $cart_item['qty'] + $qty;
    
            // Periksa kembali stok dengan jumlah baru
            if ($product[0]->stock < $new_qty) {
                $this->session->set_flashdata('error', 'Jumlah total melebihi stok produk.');
                redirect('front/shopdetails/index/' . $id);
                return;
            }
    
            $update_data = [
                'qty' => $new_qty,
                'sub_total' => $harga * $new_qty,
            ];
    
            $this->Product_model->update_cart_item($user_id, $id, $update_data);
        } else {
            // Tambah produk baru ke cart
            $data = [
                'user_id' => $user_id,
                'product_id' => $id,
                'nama' => $nama,
                'qty' => $qty,
                'harga' => $harga,
                'sub_total' => $sub_total,
            ];
    
            $this->Product_model->add_cart($data);
        }
    
       
        // Redirect kembali ke halaman detail produk
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke keranjang.');
        redirect('front/shopdetails/index/' . $id);
    }
 
    public function cari($query)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Ambil semua data kategori

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('picproduct', 'picproduct.product_id = product.product_id');
        $this->db->where('picproduct.is_primer', 1);
        $this->db->like('nama', $query);
        $hasil = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('konfigurasi');
        $konfigurasi = $this->db->get()->result_array(); // Ambil semua data kategori
        
        $data = array(
            'kategori'       => $kategori,
            'konfigurasi'  => $konfigurasi,
            'hasil'             => $hasil,
        );
        $this->load->view('shopp', $data); // Kirim data ke view 'beranda'
    }
}
