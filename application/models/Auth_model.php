<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_user($username_or_email) {
        return $this->db
            ->where('username', $username_or_email)
            // ->or_where('email', $username_or_email)
            ->get('users')->row();
    }

    public function get_mahasiswa_by_nim($nim) {
        $this->db->select('m.*, 
            j.nama_jurusan as jurusan, 
            p.nama_prodi as prodi, 
            f.nama_fakultas, 
            f.id as fakultas_id');
        $this->db->from('tb_mahasiswa m');
        $this->db->join('tb_jurusan j', 'j.id = m.jurusan_id', 'left');
        $this->db->join('tb_prodi p', 'p.id = m.prodi_id', 'left');
        $this->db->join('tb_fakultas f', 'f.id = m.fakultas_id', 'left');
        $this->db->where('m.nim', $nim);
        return $this->db->get()->row();
    }
}
