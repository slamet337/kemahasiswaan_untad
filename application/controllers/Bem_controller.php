<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bem_controller extends CI_Controller
{
    public $bem;
    public $mahasiswa;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Bem_model');
        $this->load->model('Mahasiswa_model');

        $this->bem = new Bem_model;
        $this->mahasiswa = new Mahasiswa_model;
    }

    public function index()
    {
        $data['data'] = $this->bem->get_all();
        $data['title'] = 'Data BEM';

        $this->load->view('theme/header', $data);
        $this->load->view('bem/list', $data);
        $this->load->view('theme/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data BEM';
        $data['mahasiswa'] = $this->mahasiswa->get_all();

        $this->load->view('theme/header', $data);
        $this->load->view('bem/create', $data);
        $this->load->view('theme/footer');
    }

    public function show($id)
    {
        $data['bem'] = $this->bem->find_bem($id);

        $this->load->view('theme/header');
        $this->load->view('bem/list', $data);
        $this->load->view('theme/footer');
    }
    public function store()
    {
        $this->load->library('upload');
        
        $upload_path = './uploads/bem/';
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
            'nim' => $this->input->post('nim'),
            // 'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'foto' => $foto,
        );
        $this->db->insert('tb_bem',$data);
        $this->session->set_flashdata('success', 'Data Bem berhasil ditambahkan!');
        redirect(base_url('bemi'));
    }   
    public function edit($id)
    {
        $data['bem'] = $this->bem->find_bem($id);
        $data['title'] = 'Edit Data BEM';
    
        $this->load->view('theme/header', $data);
        $this->load->view('bem/edit', $data);
        $this->load->view('theme/footer');
    }

    public function update($id)
    {
        $this->load->library('upload');
        
        $upload_path = './uploads/bem/';
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
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'foto' => $foto,
        );
        $this->db->update('tb_bem',$data, ['id' => $id]);
        $this->session->set_flashdata('success', 'Data Bem berhasil diubah!');
        redirect(base_url('bem'));
    }

    public function delete($id)
    {
        $this->db->delete('tb_bem', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data Bem berhasil dihapus!');
        redirect(base_url('bem'));
    }
}