<?php

class Kegiatan_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_kegiatan');
    $this->db->order_by('id', 'desc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }

  public function ambil()
  {
    $this->db->select('p.*,m.*, k.id, k.kategori');
    $this->db->from('tb_prestasi as p');
    $this->db->join('tb_kegiatan as k', 'p.kegiatan_id = k.id', 'left');
    $this->db->join('tb_mhs as m', 'p.nim = m.nim', 'left');
    $this->db->order('p.nim', 'asc');
    
    $query = $this->db->get();

    return $query->result();
  }
  public function rows_count()
  {
    return $this->db->count_all('tb_kegiatan');
  }
  
  public function insert_kegiatan()
  {
    $data = array(
    //   'kode_fakultas' => $this->input->post('kode_fakultas'),
      'kategori' => $this->input->post('kategori')
    );
    
    return $this->db->insert('tb_kegiatan', $data);
  }

  public function update_kegiatan($id)
  {
    $data = array(
    //   'kode_fakultas' => $this->input->post('kode_fakultas'),
      'kategori' => $this->input->post('kategori')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_kegiatan', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_kegiatan', $data);
    }
  }

  public function find_kegiatan($id)
  {
    return $this->db->get_where('tb_kegiatan', array('id' => $id))->row();
  }

  public function delete_kegiatan($id)
  {
    return $this->db->delete('tb_kegiatan', array('id' => $id));
  }
}
