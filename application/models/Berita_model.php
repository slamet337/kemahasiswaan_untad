<?php

class Berita_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->from('tb_berita');
        $this->db->order_by('id', 'desc');
        
        $query = $this->db->get(); 
        
        return $query->result();
    }

    public function rows_count()
    {
        return $this->db->count_all('tb_berita');
    }
    
    public function insert_berita()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );
        
        return $this->db->insert('tb_berita', $data);
    }

    public function update_berita($id)
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );
        
        if($id == 0) {
            return $this->db->insert('tb_berita', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('tb_berita', $data);
        }
    }

    public function find_berita($id)
    {
        return $this->db->get_where('tb_berita', array('id' => $id))->row();
    }

    public function delete_berita($id)
    {
        return $this->db->delete('tb_berita', array('id' => $id));
    }
}