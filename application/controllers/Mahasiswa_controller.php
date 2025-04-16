<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_controller extends CI_Controller
{

  public $mahasiswa;
  public $jurusan;
  public $prodi;
  public $fakultas;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    $this->load->model('Mahasiswa_model');
    $this->load->model('Jurusan_model');
    $this->load->model('Prodi_model');
    $this->load->model('Fakultas_model');
    
    $this->mahasiswa = new Mahasiswa_model;
    $this->jurusan = new Jurusan_model;
    $this->prodi = new Prodi_model;
    $this->fakultas = new Fakultas_model;

  }

  public function index()
  { 
    $data['data'] = $this->mahasiswa->get_all();
    $data['title'] = 'Data Mahasiswa';
    $this->load->view('theme/header', $data);
    $this->load->view('mahasiswa/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['mahasiswa'] = $this->mahasiswa->find_mahasiswa($id);

    $this->load->view('theme/header');
    $this->load->view('mahasiswa/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $data['jurusan'] = $this->jurusan->get_all();
    $data['prodi_all'] = $this->prodi->get_all();
    $data['fakultas'] = $this->fakultas->get_all();
//     echo "<pre>";
// print_r($data);
// echo "</pre>";
// exit;

    
    $this->load->view('theme/header');
    $this->load->view('mahasiswa/create', $data);
    $this->load->view('theme/footer', $data);
  }

  public function store()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jurusan_id', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('prodi_id', 'Nama Program Studi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('fakultas_id', 'nama fakultas', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('status', 'status', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->mahasiswa->insert_mahasiswa();
      $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
      redirect(base_url('mahasiswa'));
    }
  }

  public function edit($id)
  {
    $data = array(
      'jurusan' => $this->jurusan->get_all(),
      'prodi_all' => $this->prodi->get_all(),
      'prodi' => $this->prodi->find_prodi($id),
      'fakultas' => $this->fakultas->get_all(),
      
      'mahasiswa' => $this->mahasiswa->find_mahasiswa($id)
    );

    $this->load->view('theme/header');
    $this->load->view('mahasiswa/edit', $data);
    $this->load->view('theme/footer', $data);
  }

  public function update($id)
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jurusan_id', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('fakultas_id', 'Nama Fakultas', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('prodi_id', 'Nama Program Studi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('mahasiswa/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Berhasil Diubah');
      $this->mahasiswa->update_mahasiswa($id);
      redirect(base_url('mahasiswa'));
    }
  }

  public function delete($id)
  {
    $this->mahasiswa->delete_mahasiswa($id);
    $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
