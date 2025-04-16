<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_controller extends CI_Controller
{
    public $berita;
    
    public function __construct()
    {
        parent::__construct();
    
        $this->load->library('form_validation');
        $this->load->model('Berita_model');
    
        $this->berita = new Berita_model;
    }
    
    public function index()
    {
        $data['data'] = $this->berita->get_all();
        $data['title'] = 'Data Berita';
    
        $this->load->view('theme/header', $data);
        $this->load->view('berita/list', $data);
        $this->load->view('theme/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Berita';
    
        $this->load->view('theme/header', $data);
        $this->load->view('berita/create', $data);
        $this->load->view('theme/footer');
    }

    public function show($id)
    {
        $data['berita'] = $this->berita->find_berita($id);
    
        $this->load->view('theme/header');
        $this->load->view('berita/list', $data);
        $this->load->view('theme/footer');
    }

    public function store()
    {
        $this->load->library('upload');
    
        $upload_path = './uploads/berita/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        
        function upload_file($field_name, $config) {
            $CI =& get_instance();
            $config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];
            $CI->upload->initialize($config);

            if ($CI->upload->do_upload($field_name)) {
                return $CI->upload->data('file_name');
            } else {
                return false;
            }
        }
        $foto = upload_file('foto', $config);

        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'tag' => $this->input->post('tag'),
            'tgl' => $this->input->post('tgl'),
            'foto' => $foto,
        );
        $this->db->insert('tb_berita',$data);
        $this->session->set_flashdata('success', 'Data Berita berhasil ditambahkan!');
        redirect(base_url('berita'));
    } 
    
    public function edit($id)
    {
        $data['berita'] = $this->berita->find_berita($id);
        $data['title'] = 'Edit Data Berita';
    
        $this->load->view('theme/header', $data);
        $this->load->view('berita/edit', $data);
        $this->load->view('theme/footer');
    }

    public function update($id)
    {
        $this->load->library('upload');
    
        $upload_path = './uploads/berita/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        
        function upload_file($field_name, $config) {
            $CI =& get_instance();
            $config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];
            $CI->upload->initialize($config);

            if ($CI->upload->do_upload($field_name)) {
                return $CI->upload->data('file_name');
            } else {
                return false;
            }
        }
        $foto = upload_file('foto', $config);

        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'tag' => $this->input->post('tag'),
            'tgl' => $this->input->post('tgl'),
            'foto' => $foto,
        );
        
        if ($foto) {
            $this->db->set('foto', $foto);
        }
        
        $this->db->where('id', $id);
        $this->db->update('tb_berita', $data);
        
        $this->session->set_flashdata('success', 'Data Berita berhasil diupdate!');
        redirect(base_url('berita'));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_berita');
        
        $this->session->set_flashdata('success', 'Data Berita berhasil dihapus!');
        redirect(base_url('berita'));
    }
}