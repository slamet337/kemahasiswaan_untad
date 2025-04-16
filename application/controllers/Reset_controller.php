<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Reset_model');
    }

    public function index()
    {
        $nim = $this->input->get('query'); // Ambil NIM dari form pencarian
        $data['title'] = 'Reset Password Mahasiswa';
        $data['mahasiswa'] = null;

        if ($nim) {
            $data['mahasiswa'] = $this->Reset_model->search_by_nim($nim);
        }
        $this->load->view('theme/header');
        $this->load->view('reset/reset', $data);
        // $this->load->view('auth/template');
        $this->load->view('theme/footer');
    }

    public function reset_password($id)
{
    $this->form_validation->set_rules('password', 'Password', 'required', [
        'required' => 'Password tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]', [
        'required' => 'Konfirmasi Password tidak boleh kosong',
        'matches'  => 'Konfirmasi Password tidak sama'
    ]);

    if ($this->form_validation->run() == FALSE) {
        $this->index();
    } else {
        if ($this->Reset_model->reset_password($id)) {
            $this->session->set_flashdata('success', 'Password berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah password.');
        }
        redirect(base_url('reset'));
    }
}

}
