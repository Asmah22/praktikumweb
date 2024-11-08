<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kustomer_model extends CI_Model {
    protected $_table = 'kustomer';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik'), true),
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
            'telp' => htmlspecialchars($this->input->post('telp'), true)
        );
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primary => $id])->row();
    }

    public function update($id)
    {
        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik'), true),
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
            'telp' => htmlspecialchars($this->input->post('telp'), true)
        );
        $this->db->where($this->primary, $id);
        return $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->primary, $id)->delete($this->_table);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata("success", "Data Kustomer Berhasil Dihapus");
        }
    }
}
