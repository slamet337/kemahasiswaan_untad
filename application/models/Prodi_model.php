<?php

class Prodi_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  { 
    $this->db->select('p.id, p.kode_prodi, p.nama_prodi, p.jurusan_id, j.kode_jurusan, j.nama_jurusan');
    $this->db->from('tb_prodi as p');
    $this->db->join('tb_jurusan as j', 'p.jurusan_id = j.id', 'left');
    $this->db->order_by('p.id', 'asc');
    
    $query = $this->db->get();
    
    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_prodi');
  }
  
  public function insert_prodi()
  {
    $data = array(
      'kode_prodi' => $this->input->post('kode_prodi'),
      'nama_prodi' => $this->input->post('nama_prodi'),
      'jurusan_id' => $this->input->post('jurusan_id'),
    );
    
    return $this->db->insert('tb_prodi', $data);
  }

  public function update_prodi($id)
  {
    $data = array(
      'kode_prodi' => $this->input->post('kode_prodi'),
      'nama_prodi' => $this->input->post('nama_prodi'),
      'jurusan_id' => $this->input->post('jurusan_id'),
    );
    
    if($id == 0) {
      return $this->db->insert('tb_prodi', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_prodi', $data);
    }
  }

  public function find_prodi($id)
  {
    return $this->db->get_where('tb_prodi', array('id' => $id))->row();
  }

  public function delete_prodi($id)
  {
    return $this->db->delete('tb_prodi', array('id' => $id));
  }
}
