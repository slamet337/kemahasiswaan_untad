<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public $Auth_model;
    public $welcome;
    public $jurusan;
  public $prodi;
  public $fakultas;
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model'); 
        $this->load->model('Jurusan_model');
    $this->load->model('Prodi_model');
    $this->load->model('Fakultas_model');

        $this->Auth_model = new Auth_model;
        $this->jurusan = new Jurusan_model;
        $this->prodi = new Prodi_model;
        $this->fakultas = new Fakultas_model;
        // $this->welcome = new Welcome;
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('welcome');
        }
        $this->load->view('auth/login');
        // $this->load->view('auth/template');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username / NIM', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username_or_nim = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
    
            // Cek user (admin/dosen) dari tabel users
            $user = $this->Auth_model->check_user($username_or_nim);
    
            // Kalau tidak ada, cek di tabel mahasiswa berdasarkan NIM
            if (!$user) {
                $user = $this->Auth_model->get_mahasiswa_by_nim($username_or_nim);
                if ($user) {
                    $user->role = 'mahasiswa';
                }
            }
    
            if ($user && password_verify($password, $user->password)) {
                $session_data = [
                    'user_id'       => $user->id,
                    'nama'          => $user->nama,
                    'role'          => $user->role,
                    'nim'           => $user->nim,
                    'angkatan'      => $user->angkatan,
                    'jurusan'       => $user->jurusan ?? null,
                    'prodi'         => $user->prodi ?? null,
                    'nama_fakultas' => $user->nama_fakultas ?? null,
                    'logged_in'     => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('welcome');
            } else {
                $this->session->set_flashdata('error', 'Username / NIM atau password salah!');
                redirect('auth');
            }
        }
    }
    
    

    // public function login() {
    //     $this->form_validation->set_rules('username', 'Username / NIM', 'required|trim');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('auth/login');
    //     } else {
    //         $username_or_nim = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);
    
    //         // Cek di tabel users
    //         $user = $this->Auth_model->check_user($username_or_nim);
    
    //         // Jika tidak ditemukan di users, cek di mahasiswa berdasarkan NIM
    //         if (!$user) {
    //             $this->db->select('m.*, f.nama_fakultas,j.nama_jurusan,p.nama_prodi');
    //             $this->db->from('tb_mahasiswa m');
    //             $this->db->join('tb_fakultas f', 'm.fakultas_id = f.id', 'left');
    //             $this->db->join('tb_jurusan j', 'm.jurusan_id = j.id', 'left');
    //             $this->db->join('tb_prodi p', 'm.prodi_id = p.id', 'left');
    //             $this->db->where('m.nim', $username_or_nim);
    //             $query = $this->db->get();
    
    //             if ($query->num_rows() == 1) {
    //                 $user = $query->row();
    //                 $user->role = 'mahasiswa';
    //             }
    //         }
    
    //         // Verifikasi password
    //         if ($user && password_verify($password, $user->password)) {
    //             $session_data = [
    //                 'user_id'   => $user->id,
    //                 'nama'      => isset($user->nama) ? $user->nama : (isset($user->nama_lengkap) ? $user->nama_lengkap : ''),
    //                 'role'      => isset($user->role) ? $user->role : 'mahasiswa',
    //                 'nim'       => isset($user->nim) ? $user->nim : null,
    //                 'fakultas_id'  => isset($user->fakultas_id) ? $user->fakultas_id : null,
    //                 'jurusan'   => isset($user->jurusan) ? $user->jurusan : null,
    //                 'prodi'     => isset($user->prodi) ? $user->prodi : null,
    //                 'logged_in' => TRUE
    //             ];
                    
    //             $this->session->set_userdata($session_data);
    //             redirect('welcome'); // Redirect ke dashboard
    //         } else {
    //             $this->session->set_flashdata('error', 'Username / NIM atau password salah!');
    //             redirect('auth');
    //         }
    //     }
    // }
    


    // public function login() {
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('auth/login');
    //     } else {
    //         $username = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);

    //         $user = $this->Auth_model->check_user($username);

    //         if ($user && password_verify($password, $user->password)) {
    //             $session_data = [
    //                 'user_id'   => $user->id,
    //                 'username'  => $user->username,
    //                 'role'    => $user->role,   
    //                 'logged_in' => TRUE
    //             ];
    //             $this->session->set_userdata($session_data);
    //             $this->session->set_userdata('role', $user->role);

    //             redirect('dashboard');
    //         } else {
    //             $this->session->set_flashdata('error', 'Username atau password salah!');
    //             redirect('auth');
    //         }
    //     }
    // }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function register() {
    $data['jurusan'] = $this->jurusan->get_all();
    $data['prodi_all'] = $this->prodi->get_all();
    $data['fakultas'] = $this->fakultas->get_all();
        $this->load->view('auth/register', $data);
        $this->load->view('theme/footer', $data);   
        $this->load->view('theme/script', $data);   
    }

    public function register_action() {
        $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[tb_mahasiswa.nim]');
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('jurusan_id', 'jurusan', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('prodi_id', 'prodi', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('fakultas_id', 'fakultas', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->register(); 
            return;
        
        
        } else {
            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'jurusan_id' => $this->input->post('jurusan_id'),
                'angkatan' => $this->input->post('angkatan'),
                'prodi_id' => $this->input->post('prodi_id'),
                'fakultas_id' => $this->input->post('fakultas_id'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'status' => 1
            ];
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            if ($this->db->insert('tb_mahasiswa', $data)) {
                $this->session->set_flashdata('success', 'Registration successful. You can now login.');
                redirect('auth');
            } else {
                echo $this->db->error();
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect('auth/register');
            }
        }
    }        
    
}
