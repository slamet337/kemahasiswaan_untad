<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  
  public $mahasiswa;
  public $jurusan;
  public $prodi;
  public $fakultas;
  public $kegiatan;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    
    $this->load->model('Mahasiswa_model');
    $this->load->model('Jurusan_model');
    $this->load->model('Prodi_model');
    $this->load->model('Fakultas_model');
    $this->load->model('Kegiatan_model');

    $this->mahasiswa = new Mahasiswa_model;
    $this->jurusan = new Jurusan_model;
    $this->prodi = new Prodi_model;
    $this->fakultas = new Fakultas_model;
    $this->kegiatan = new Kegiatan_model;

  }
  
	public function index()
	{
    $data = array(
      'mahasiswa_rows' => $this->mahasiswa->rows_count(),
      'jurusan_rows' => $this->jurusan->rows_count(),
      'prodi_rows' => $this->prodi->rows_count(),
      'fakultas_rows' => $this->fakultas->rows_count(),
      'kegiatan_rows' => $this->kegiatan->rows_count(),
    );
    $data['title'] = 'Dashboard';
		$this->load->view('theme/header', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('theme/footer');
	}
}
