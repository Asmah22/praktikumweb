<?php
class Satuan_model extends CI_Model
{
    protected $_table = 'satuan';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = array(
            'id' => htmlspecialchars($this->input->post('id'), true),
            'name' => htmlspecialchars($this->input->post('name'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
            'role' => htmlspecialchars($this->input->post('role'), true),
        );

        return $this->db->insert($this->_table, $data);
    }
    public function getById($id)
    {
        return $this->db->where('id', $id)->get($this->_table)->row();
    }
    public function editData()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' => htmlspecialchars($this->input->post('name'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
        );

        return $this->db->set($data)->where('id', $id)->update($this->_table);
    }

}