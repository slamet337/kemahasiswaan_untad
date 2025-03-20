<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_controller extends CI_Controller
{

  public $kegiatan;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Kegiatan_model');

    $this->kegiatan = new Kegiatan_model;

  }

  public function index()
  {  
    $data['data'] = $this->kegiatan->get_all();
    $data['title'] = 'Data Kegiatan';

    $this->load->view('theme/header', $data);
    $this->load->view('kegiatan/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['kegiatan'] = $this->kegiatan->find_kegiatan($id);

    $this->load->view('theme/header');
    $this->load->view('kegiatan/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $this->load->view('theme/header');
    $this->load->view('kegiatan/create');
    $this->load->view('theme/footer');
  }

  public function store()
  {
    // $this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('kategori', 'kategori', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->kegiatan->insert_kegiatan();
      $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
      redirect(base_url('kegiatan'));
    }
  }

  public function edit($id)
  {
    $data['kegiatan'] = $this->kegiatan->find_kegiatan($id);
    $data['title'] = 'Ubah Data Kegiatan';

    $this->load->view('theme/header', $data);
    $this->load->view('kegiatan/edit', $data);
    $this->load->view('theme/footer');
  }

  public function update($id)
  {
    // $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('kategori', 'Kategori Kegiatan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('kegiatan/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Berhasil Diubah');
      $this->kegiatan->update_kegiatan($id);
      redirect(base_url('kegiatan'));
    }
  }

  public function delete($id)
  {
    $this->kegiatan->delete_kegiatan($id);
    // $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
  }
}
