<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data SK
    public function get_all()
    {
        $this->db->from('tb_sk');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get(); 
        return $query->result();
    }

    // Tambah data SK
    public function add_sk($data)
    {
        return $this->db->insert('tb_sk', $data);
    }

    // Hapus data SK berdasarkan ID
    public function delete_sk($id)
    {
        return $this->db->delete('tb_sk', array('id' => $id));
    }

}