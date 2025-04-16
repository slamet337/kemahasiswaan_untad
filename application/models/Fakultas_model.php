<?php

class Fakultas_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_fakultas');
    $this->db->order_by('id', 'desc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_fakultas');
  }
  
  public function insert_fakultas()
  {
    $data = array(
      'kode_fakultas' => $this->input->post('kode_fakultas'),
      'nama_fakultas' => $this->input->post('nama_fakultas')
    );
    
    return $this->db->insert('tb_fakultas', $data);
  }

  public function update_fakultas($id)
  {
    $data = array(
      'kode_fakultas' => $this->input->post('kode_fakultas'),
      'nama_fakultas' => $this->input->post('nama_fakultas')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_fakultas', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_fakultas', $data);
    }
  }

  public function find_fakultas($id)
  {
    return $this->db->get_where('tb_fakultas', array('id' => $id))->row();
  }

  public function delete_fakultas($id)
  {
    return $this->db->delete('tb_fakultas', array('id' => $id));
  }
}
