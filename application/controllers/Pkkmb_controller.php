<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkkmb_controller extends CI_Controller
{

  public $mahasiswa;
  public $pkkmb;
  
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    $this->load->model('Mahasiswa_model');
    $this->load->model('Pkkmb_model');
    
    $this->mahasiswa = new Mahasiswa_model;
    $this->pkkmb = new Pkkmb_model;
  }

    public function index()
    { 
        $data['data'] = $this->pkkmb->get_all();
        $data['title'] = 'Pengganti PKKMB';
        
        $this->load->view('theme/header', $data);
        $this->load->view('pkkmb/list', $data);
        $this->load->view('theme/footer');
    }

    public function create()
    {
        $data['mahasiswa'] = $this->mahasiswa->get_all();
        $data['title'] = 'Input Data Pengganti PKKMB';
        
        $this->load->view('theme/header', $data);
        $this->load->view('pkkmb/mhs', $data);
        $this->load->view('theme/footer');
    }
    public function store()
    {
    $this->load->library('upload');

    // Konfigurasi Upload
    $upload_paths = './uploads/suratsurat/'; // Folder penyimpanan file
    $config = [
        'upload_path'   => $upload_paths,
        'allowed_types' => 'jpg|png|pdf|docx',
        'max_size'      => 2048, // Maksimal 2MB
    ];

    
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
    // $link       = upload_file('link', $config);
    // $foto       = upload_file('foto', $config);
    // $surat_tugas= upload_file('surat_tugas', $config);

    
    $data = [
        'nim'             => $this->input->post('nim'),
        'nama'            => $this->input->post('nama'),
        'jurusan'         => $this->input->post('jurusan'),
        'prodi'           => $this->input->post('prodi'),
        'nama_fakultas'   => $this->input->post('nama_fakultas'),
        'strata'          => $this->input->post('strata'),
        'angkatan'        => $this->input->post('angkatan'),
        'sk'              => $sk, 
        'tgl'    => date('Y-m-d H:i:s'),
    ];

    // Simpan ke database
    $this->db->insert('tb_pkkmb', $data);

    $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    redirect(base_url('welcome'));
  }

  public function edit($nim)
  {
    $data['mahasiswa'] = $this->mahasiswa->find_mahasiswa($nim);
    $data['title'] = 'Edit Data Pengganti PKKMB';
    $data['pkkmb'] = $this->pkkmb->find_pkkmb($nim);    
    $this->load->view('theme/header', $data);
    $this->load->view('pkkmb/edit', $data);
    $this->load->view('theme/footer');
  }
    public function update($nim)
    {
        $this->load->library('upload');
    
        // Konfigurasi Upload
        $upload_paths = './uploads/suratsurat/'; // Folder penyimpanan file
        $config = [
            'upload_path'   => $upload_paths,
            'allowed_types' => 'jpg|png|pdf|docx',
            'max_size'      => 2048, // Maksimal 2MB
        ];
    
        
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
        // $link       = upload_file('link', $config);
        // $foto       = upload_file('foto', $config);
        // $surat_tugas= upload_file('surat_tugas', $config);
    
        
        $data = [
            'nomor'           => $this->input->post('nomor'),
            'tgl_keg'         => $this->input->post('tgl_keg'),
            'jurusan'         => $this->input->post('jurusan'),
            // 'prodi'           => $this->input->post('prodi'),
            // 'nama_fakultas'   => $this->input->post('nama_fakultas'),
            // 'strata'          => $this->input->post('strata'),
            // 'angkatan'        => $this->input->post('angkatan'),
            // 'sk'              => $sk, 
            'tgl_surat'        => date('Y-m-d H:i:s'),
        ];
    
        // Simpan ke database
        if ($this->db->update('tb_pkkmb', $data, ['nim' => $nim])) {
        redirect(base_url('pkkmb'));
        } else {
        echo "Gagal";
        }
    }
}