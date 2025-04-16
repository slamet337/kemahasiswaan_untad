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
  public $mhs;
  public $fakultas;
  public $kegiatan;
  public $berita;
  public $bem;

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('logged_in')) {
      // redirect('auth');
    }

    $this->load->library('form_validation');
    

    $this->load->model('Mahasiswa_model');
    $this->load->model('Jurusan_model');
    $this->load->model('Prodi_model');
    $this->load->model('Fakultas_model');
    $this->load->model('Kegiatan_model');
    $this->load->model('Mhs_model', 'mhs');
    $this->load->model('Berita_model', 'berita');
    $this->load->model('Bem_model', 'bem');

    $this->mahasiswa = new Mahasiswa_model;
    $this->jurusan = new Jurusan_model;
    $this->prodi = new Prodi_model;
    $this->fakultas = new Fakultas_model;
    $this->kegiatan = new Kegiatan_model;
    $this->kegiatan = new Mhs_model;
    $this->berita = new Berita_model;
    $this->bem = new Bem_model;
    
  }
  public function beranda()
  {
    $data['title'] = 'Beranda Kampus';
    $data['mahasiswa_rows'] = $this->mahasiswa->rows_count();
    $data['jurusan_rows'] = $this->jurusan->rows_count();
    $data['prodi_rows'] = $this->prodi->rows_count();
    $data['fakultas_rows'] = $this->fakultas->rows_count();
    $data['kegiatan_rows'] = $this->mhs->hitung();
    
    $this->load->view('home/template/header', $data);
    $this->load->view('home/template/sidebar');
    $this->load->view('home/beranda', $data);
    $this->load->view('home/template/footer');
    // $this->load->view('home/template/footer', $data);
  }

  public function prestasi()
	{
    $data['title'] = 'Prestasi';

    $data['kegiatan_rows'] = $this->kegiatan->get_prestasi();
    $this->load->view('home/template/header', $data);
    $this->load->view('home/template/sidebar');
    $this->load->view('home/prestasi', $data);
    $this->load->view('home/template/footer');
  }

  public function bem()
  {
    $data['title'] = 'BEM';
    $data['bem_rows'] = $this->bem->get_all();
    $this->load->view('home/template/header', $data);
    $this->load->view('home/template/sidebar');
    $this->load->view('home/bem', $data);
    $this->load->view('home/template/footer');
  }
  public function beritaa()
  {
    $data['title'] = 'Berita Terbaru';
    $data['berita_rows'] = $this->berita->get_all();
    $this->load->view('home/template/header', $data);
    $this->load->view('home/template/sidebar');
    $this->load->view('home/berita', $data);
    $this->load->view('home/template/footer');
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
