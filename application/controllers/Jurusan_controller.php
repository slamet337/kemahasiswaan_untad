<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_controller extends CI_Controller
{

  public $jurusan;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Jurusan_model');

    $this->jurusan = new Jurusan_model;

  }

  public function index()
  {  
    $data['data'] = $this->jurusan->get_all();
    $data['title'] = 'Data Jurusan';

    $this->load->view('theme/header', $data);
    $this->load->view('jurusan/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['jurusan'] = $this->jurusan->find_jurusan($id);

    $this->load->view('theme/header');
    $this->load->view('jurusan/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $this->load->view('theme/header');
    $this->load->view('jurusan/create');
    $this->load->view('theme/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->jurusan->insert_jurusan();
      $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
      redirect(base_url('jurusan'));
    }
  }

  public function edit($id)
  {
    $data['jurusan'] = $this->jurusan->find_jurusan($id);

    $this->load->view('theme/header');
    $this->load->view('jurusan/edit', $data);
    $this->load->view('theme/footer');
  }

  public function update($id)
  {
    $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('jurusan/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Berhasil Diubah');
      $this->jurusan->update_jurusan($id);
      redirect(base_url('jurusan'));
    }
  }

  public function delete($id)
  {
    $this->jurusan->delete_jurusan($id);
    // $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
