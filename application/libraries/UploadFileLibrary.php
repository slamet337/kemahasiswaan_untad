<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFileLibrary {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('upload');
    }

    public function upload_file($field_name, $folder = 'uploads/', $allowed_types = 'pdf', $max_size = 2048) {
        $config['upload_path']   = './' . $folder;
        $config['allowed_types'] = $allowed_types;
        $config['max_size']      = $max_size;
        $config['file_name']     = 'file_' . time();

        $this->CI->upload->initialize($config);

        if (!$this->CI->upload->do_upload($field_name)) {
            return ['status' => false, 'error' => $this->CI->upload->display_errors()];
        } else {
            $fileData = $this->CI->upload->data();
            return ['status' => true, 'file_path' => $folder . $fileData['file_name']];
        }
    }
}
