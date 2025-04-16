<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bem_model extends CI_Model {

    public function get_all() {
        return $this->db->get('tb_bem')->result();
    }

    // public function find_bem($nim) {
    //     return $this->db->get_where('tb_bem', ['nim' => $nim])->row();
    // }

    public function find_bem($nim) {
    $this->db->select('b.*, m.nama'); // pilih kolom yang diperlukan
    $this->db->from('tb_bem as b');
    $this->db->join('tb_mahasiswa as m', 'b.nim = m.nim', 'left');
    $this->db->where('b.nim', $nim);
    return $this->db->get()->row();
}


    public function insert($data) {
        return $this->db->insert('tb_bem', $data);
    }

    public function update($nim, $data) {
        return $this->db->update('tb_bem', $data, ['nim' => $nim]);
    }

    public function delete($id) {
        return $this->db->delete('tb_bem', ['id' => $id]);
    }


}