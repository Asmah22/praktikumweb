<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'userlog' => infoLogin(),
            'barang' => $this->Barang_model->getAll(),
            'content'=> 'barang/index'
        );
        $this->load->view('template/main',$data);
    }
    public function add() 
    {
        $data = array(
            'title' => 'Tambah Data Barang',
            'kategori' => $this->db->get('kategori')->result_array(),
            'satuan' => $this->db->get('satuan')->result_array(),
            'supplier' => $this->db->get('supplier')->result_array(),
            'content' => 'barang/add_form'
        );
        $this->load->view('template/main',$data);    
    }
    public function save(){
        $data = array(
            'barkode' => htmlspecialchars($this->input->post('barkode'), true),
            'name' => htmlspecialchars($this->input->post('name'), true),
            'harga_beli' => htmlspecialchars($this->input->post('harga_beli'), true),
            'harga_jual' => htmlspecialchars($this->input->post('harga_jual'), true),
            'stok' => htmlspecialchars($this->input->post('stok'), true),
            'kategori_id' => htmlspecialchars($this->input->post('kategori_id'), true),
            'satuan_id' => htmlspecialchars($this->input->post('satuan_id'), true),
            'supplier_id' => htmlspecialchars($this->input->post('supplier_id'), true),
            'user_id' => $this->session->userdata('id'),
        );
        return $this->db->insert($this->_table,$data);
    }
    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Barang',
            'kategori' => $this->db->get('kategori')->result_array(),
            'satuan' => $this->db->get('satuan')->result_array(),
            'supplier' => $this->db->get('supplier')->result_array(),
            'barang' => $this->db->get('barang')->result_array(),
            'content' => 'barang/edit_form'
        );
        $this->load->view('template/main',$data);
    }
}