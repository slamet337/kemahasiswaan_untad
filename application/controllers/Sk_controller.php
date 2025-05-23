<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_controller extends CI_Controller
{
    public $sk;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sk_model');
        $this->sk = new Sk_model;
    }

    public function index()
    {
        $data['data'] = $this->sk->get_all();
        $data['title'] = 'Data SK';
        
        $this->load->view('theme/header', $data);
        $this->load->view('sk/list', $data);
        $this->load->view('theme/footer', $data);
    }

    public function create()
    {
       $data ['title'] = 'Input Data SK';
    //    $data ['data'] = $this->sk->get_all();
        
        $this->load->view('theme/header', $data);
        $this->load->view('sk/create', $data);
        $this->load->view('theme/footer', $data);
    }

    public function store()
    {
        $this->load->library('upload');

    // Konfigurasi Upload
    $upload_paths = './uploads/'; // Folder penyimpanan file
    $config = [
        'upload_path'   => $upload_paths,
        'allowed_types' => 'jpg|png|pdf|docx',
        'max_size'      => 2048, // Maksimal 2MB
    ];

    // Fungsi untuk mengupload file
    function upload_file($field_name, $config)
    {
        $CI =& get_instance();
        $config['file_name'] = time() . '_' . $_FILES[$field_name]['name']; // Nama unik
        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload($field_name)) {
            return null; // Gagal upload, return null
        } else {
            return $CI->upload->data('file_name'); // Berhasil, return nama file
        }
    }

    // Upload file
    $sk = upload_file('sk', $config);

    
    $data = [
        'no_surat' => $this->input->post('no_surat'),
        'nama' => $this->input->post('nama'),
        'tgl' => $this->input->post('tgl'),
        'sk'     => $sk, 
    ];

    // Simpan ke database
    $this->db->insert('tb_sk', $data);

    $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    redirect(base_url('sk'));
    }
    
    public function delete($id)
    {
        if ($this->sk->delete_sk($id)) {
            redirect('sk');
        } else {
            echo "Gagal menghapus data SK";
        }
    }

}