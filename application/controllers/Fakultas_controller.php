<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_controller extends CI_Controller
{

  public $fakultas;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Fakultas_model');

    $this->fakultas = new Fakultas_model;

  }

  public function index()
  {  
    $data['data'] = $this->fakultas->get_all();
    $data['title'] = 'Data Fakultas';

    $this->load->view('theme/header', $data);
    $this->load->view('fakultas/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['fakultas'] = $this->fakultas->find_fakultas($id);

    $this->load->view('theme/header');
    $this->load->view('fakultas/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $this->load->view('theme/header');
    $this->load->view('fakultas/create');
    $this->load->view('theme/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('kode_fakultas', 'Kode Fakultas', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->fakultas->insert_fakultas();
      $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
      redirect(base_url('fakultas'));
    }
  }

  public function edit($id)
  {
    $data['fakultas'] = $this->fakultas->find_fakultas($id);

    $this->load->view('theme/header');
    $this->load->view('fakultas/edit', $data);
    $this->load->view('theme/footer');
  }

  public function update($id)
  {
    $this->form_validation->set_rules('kode_fakultas', 'Kode Fakultas', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('fakultas/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Berhasil Diubah');
      $this->fakultas->update_fakultas($id);
      redirect(base_url('fakultas'));
    }
  }

  public function delete($id)
  {
    $this->fakultas->delete_fakultas($id);
    // $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
