<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    protected $_table = 'barang';
    protected $primary = 'id';

    public function getAll()
    {
        $sql = "SELECT a.id, a.barkode, a.name AS name, b.name AS satuan, c.name AS kategori, a.harga_beli, a.harga_jual, a.stok 
                FROM ((barang a 
                LEFT JOIN satuan b ON a.satuan_id = b.id) 
                LEFT JOIN kategori c ON a.kategori_id = c.id)";
        return $this->db->query($sql)->result();
    }
    public function save()
    {
        $this->Barang_model->Save();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data Barang Berhasil DiSimpan");
        }
        redirect('barang');
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function delete($id) 
    {
        $this->db->where('id',$id)->delete($this($id));
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data Barang Berhasil DiDelete");
        }
    }
}
