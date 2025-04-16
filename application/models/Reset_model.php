<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data mahasiswa
    public function get_all()
    {
        $this->db->from('tb_mahasiswa');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get(); 
        return $query->result();
    }

    // Reset password berdasarkan ID
    public function reset_password($id)
    {
        $new_password = $this->input->post('password');

        if (!$new_password) {
            return false; // Jika password kosong, gagal reset
        }

        $data = array(
            'password' => password_hash($new_password, PASSWORD_BCRYPT)
        );

        $this->db->where('id', $id);
        $update = $this->db->update('tb_mahasiswa', $data);

        return $update ? true : false; // Return true jika berhasil, false jika gagal
    }

    // Cari mahasiswa berdasarkan NIM
    public function search_by_nim($nim)
    {
        $this->db->where('nim', $nim);
        $query = $this->db->get('tb_mahasiswa');
        return $query->row_array(); // Mengembalikan satu data mahasiswa
    }
}
