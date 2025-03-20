<?php

class Jurusan_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_jurusan');
    $this->db->order_by('id', 'asc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_jurusan');
  }
  
  public function insert_jurusan()
  {
    $data = array(
      'kode_jurusan' => $this->input->post('kode_jurusan'),
      'nama_jurusan' => $this->input->post('nama_jurusan')
    );
    
    return $this->db->insert('tb_jurusan', $data);
  }

  public function update_jurusan($id)
  {
    $data = array(
      'kode_jurusan' => $this->input->post('kode_jurusan'),
      'nama_jurusan' => $this->input->post('nama_jurusan')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_jurusan', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_jurusan', $data);
    }
  }

  public function find_jurusan($id)
  {
    return $this->db->get_where('tb_jurusan', array('id' => $id))->row();
  }

  public function delete_jurusan($id)
  {
    return $this->db->delete('tb_jurusan', array('id' => $id));
  }
}
