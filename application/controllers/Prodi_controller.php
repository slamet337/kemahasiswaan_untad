<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_controller extends CI_Controller
{

  public $prodi;
  public $jurusan;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    
    $this->load->model('Prodi_model');
    $this->load->model('Jurusan_model');

    $this->prodi = new Prodi_model;
    $this->jurusan = new Jurusan_model;

  }

  public function index()
  {  
    $data['data'] = $this->prodi->get_all();
    $data['title'] = 'Data Prodi';

    $this->load->view('theme/header', $data);
    $this->load->view('prodi/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['prodi'] = $this->prodi->find_prodi($id);

    $this->load->view('theme/header');
    $this->load->view('prodi/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $data['jurusan'] = $this->jurusan->get_all();

    $this->load->view('theme/header');
    $this->load->view('prodi/create', $data);
    $this->load->view('theme/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jurusan_id', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->prodi->insert_prodi();
      $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
      redirect(base_url('prodi'));
    }
  }

  public function edit($id)
  {
    $data['jurusan'] = $this->jurusan->get_all();
    $data['prodi'] = $this->prodi->find_prodi($id);

    $this->load->view('theme/header');
    $this->load->view('prodi/edit', $data);
    $this->load->view('theme/footer', $data);
  }

  public function update($id)
  {
    $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jurusan_id', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('prodi/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Berhasil Diubah');
      $this->prodi->update_prodi($id);
      redirect(base_url('prodi'));
    }
  }

  public function delete($id)
  {
    $this->prodi->delete_prodi($id);
    $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
