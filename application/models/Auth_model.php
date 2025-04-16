<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
    public function check_user($username) {
        $this->db->where('username', $username);
        return $this->db->get('users')->row(); // Ambil satu row sebagai objek
    }

}
