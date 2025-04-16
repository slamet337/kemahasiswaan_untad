<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs_controller extends CI_Controller
{

  public $mahasiswa;
  public $kegiatan;
  public $mhs;
  
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    $this->load->model('Mahasiswa_model');
    $this->load->model('Kegiatan_model');
    $this->load->model('Mhs_model');
    
    $this->mahasiswa = new Mahasiswa_model;
    $this->kegiatan = new Kegiatan_model;
    $this->mhs = new Mhs_model;
  
  }

  public function index()
  { 
    $data['data'] = $this->mhs->get_all();
    $data['title'] = 'Data Prestasi';
    
    $this->load->view('theme/header', $data);
    $this->load->view('mhs/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['mhs'] = $this->mhs->find_mhs($id);
    $data['kegiatan'] = $this->kegiatan->get_all();
    
    $this->load->view('theme/header');
    $this->load->view('mhs/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $data['kegiatan'] = $this->kegiatan->get_all();
    $data['mahasiswa'] = $this->mahasiswa->get_all();
    $data['title'] = 'Input Data Prestasi';
    
    $this->load->view('theme/header', $data);
    $this->load->view('mhs/create', $data);
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
    $sertifikat = upload_file('sertifikat', $config);
    $link       = upload_file('link', $config);
    $foto       = upload_file('foto', $config);
    $surat_tugas= upload_file('surat_tugas', $config);

    
    $data = [
        'nim'             => $this->input->post('nim'),
        'kegiatan_id'     => $this->input->post('kegiatan_id'),
        'jenis_pesert'    => $this->input->post('jenis_pesert'),
        'peringkat'       => $this->input->post('peringkat'),
        'no_serti'        => $this->input->post('no_serti'),
        'no_sk'           => $this->input->post('no_sk'),
        'model_pelaksana' => $this->input->post('model_pelaksana'),
        'jml_negara'      => $this->input->post('jml_negara'),
        'jml_pt'          => $this->input->post('jml_pt'),
        'tgl_mulai'       => $this->input->post('tgl_mulai'),
        'tgl_selesai'     => $this->input->post('tgl_selesai'),
        'nip'             => $this->input->post('nip'),
        'nama_kegiatan'   => $this->input->post('nama_kegiatan'),
        'sertifikat'      => $sertifikat, 
        'link'            => $link, 
        'foto'            => $foto, 
        'surat_tugas'     => $surat_tugas, 
    ];

    // Simpan ke database
    $this->db->insert('tb_prestasi', $data);

    $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    redirect(base_url('mhs'));
}


  public function edit($id)
  {
    $data = array(
      'kegiatan' => $this->kegiatan->get_all(),
      'mhs' => $this->mhs->find_mhs($id)
    );
    $data ['title'] = 'Edit Data Prestasi';

    $this->load->view('theme/header', $data);
    $this->load->view('mhs/edit', $data);
    $this->load->view('theme/footer', $data);
  }

  public function update($id)
{
    $config['upload_path']   = FCPATH . 'uploads/';
    $config['allowed_types'] = 'pdf|jpeg|jpg|png';
    $config['max_size']      = 2048;
    $config['file_name']     = 'file_' . time();

    $this->load->library('upload', $config);

    $data = [
        'nim' => $this->input->post('nim'),
        'kegiatan_id' => $this->input->post('kegiatan_id'),
        'jenis_pesert' => $this->input->post('jenis_pesert'),
        'peringkat' => $this->input->post('peringkat'),
        'no_serti' => $this->input->post('no_serti'),
        'no_sk' => $this->input->post('no_sk'),
        'model_pelaksana' => $this->input->post('model_pelaksana'),
        'jml_negara' => $this->input->post('jml_negara'),
        'jml_pt' => $this->input->post('jml_pt'),
        'tgl_mulai' => $this->input->post('tgl_mulai'),
        'tgl_selesai' => $this->input->post('tgl_selesai'),
        'nip' => $this->input->post('nip'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan')
    ];

    // Upload Sertifikat
    if (!empty($_FILES['sertifikat']['name'])) {
        $this->upload->initialize($config); // Reinitialize upload config
        if ($this->upload->do_upload('sertifikat')) {
            $data['sertifikat'] = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('message', 'Upload Sertifikat Gagal: ' . $this->upload->display_errors());
            redirect(base_url('mhs/edit/' . $id));
            return;
        }
    }

    // Upload Foto
    if (!empty($_FILES['foto']['name'])) {
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $data['foto'] = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('message', 'Upload Foto Gagal: ' . $this->upload->display_errors());
            redirect(base_url('mhs/edit/' . $id));
            return;
        }
    }

    // Upload Link (gambar juga)
    if (!empty($_FILES['link']['name'])) {
        $this->upload->initialize($config);
        if ($this->upload->do_upload('link')) {
            $data['link'] = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('message', 'Upload Link Gagal: ' . $this->upload->display_errors());
            redirect(base_url('mhs/edit/' . $id));
            return;
        }
    }
    if (!empty($_FILES['surat_tugas']['name'])) {
        $this->upload->initialize($config);
        if ($this->upload->do_upload('surat_tugas')) {
            $data['surat_tugas'] = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('message', 'Upload Link Gagal: ' . $this->upload->display_errors());
            redirect(base_url('mhs/edit/' . $id));
            return;
        }
    }

    // Simpan ke database
    if ($this->mhs->update_mhs($id, $data)) {
        $this->session->set_flashdata('message', 'Data Berhasil Diubah');
    } else {
        $this->session->set_flashdata('message', 'Gagal memperbarui data');
    }

    redirect(base_url('mhs'));
}

  public function delete($id)
  {
    $this->mhs->delete_mhs($id);
    $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
