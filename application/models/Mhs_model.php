<?php

class Mhs_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
    $this->load->library('upload');
  }

  public function get_all() {
    
    $this->db->select('p.id, p.nim,m.nama, k.kategori, p.peringkat, p.no_serti,p.no_sk, p.sertifikat, p.surat_tugas, p.foto, p.link');
    $this->db->from('tb_prestasi as p');
    $this->db->join('tb_kegiatan as k', 'p.kegiatan_id = k.id', 'left');
    $this->db->join('tb_mahasiswa as m', 'p.nim = m.nim', 'left');
    $this->db->order_by('p.id', 'desc');

    $query = $this->db->get();

    return $query->result();

  }
  public function ambil()
  {
    $this->db->from('tb_prestasi');
    $this->db->order_by('id', 'desc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_prestasi');
  }
  
  public function insert_mhs($data)
  {
    return $this->db->insert('tb_prestasi', $data);
  }

  public function update_mhs($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('tb_prestasi', $data);
}



  public function find_mhs($id)
  {
    return $this->db->get_where('tb_prestasi', array('id' => $id))->row();
  }

  public function delete_mhs($id)
  {
    return $this->db->delete('tb_prestasi', array('id' => $id));
  }
}
