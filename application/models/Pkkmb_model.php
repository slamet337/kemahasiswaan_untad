<?php

class Pkkmb_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
    $this->load->library('upload');
  }

    public function get_all()
    {
        $this->db->select('p.nim,m.nama, p.nomor,p.nama_fakultas, p.prodi,p.jurusan, p.sk,p.strata,p.tgl');
        $this->db->from('tb_pkkmb as p');
        $this->db->join('tb_mahasiswa as m', 'p.nim = m.nim', 'left');
        $this->db->order_by('p.nim', 'desc');
    
        $query = $this->db->get();
    
        return $query->result();
    }

    public function find_pkkmb($nim)
    {
      return $this->db->get_where('tb_pkkmb', array('nim' => $nim))->row();
    }

    public function get_by_nim($nim)
  {
    return $this->db->get_where('tb_pkkmb', ['nim' => $nim])->row();
  }
}