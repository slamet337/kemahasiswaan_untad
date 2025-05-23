<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

class Report_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pkkmb_model');
    }

    public function word($nim)
{
    $data = $this->Pkkmb_model->get_by_nim($nim);

    if (!$data) {
        show_404();
        return;
    }

    $template_path = APPPATH . 'template/template.docx';

    if (!file_exists($template_path)) {
        show_error('Template Word tidak ditemukan di: ' . $template_path);
        return;
    }

    $templateProcessor = new TemplateProcessor($template_path);

    // Format tanggal Indonesia
    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    // Format tgl surat
    $tglSurat = date_create($data->tgl_surat);
    $tglFormatted = date_format($tglSurat, 'd') . ' ' . $bulan[date_format($tglSurat, 'm')] . ' ' . date_format($tglSurat, 'Y');

    // Format tgl kegiatan (jika ingin diformat juga)
    // $tglKeg = date_create($data->tgl_keg);
    // $tglKegFormatted = date_format($tglKeg, 'd') . ' ' . $bulan[date_format($tglKeg, 'm')] . ' ' . date_format($tglKeg, 'Y');

    // Ganti placeholder dengan data dari database
    $templateProcessor->setValue('nim', $data->nim);
    $templateProcessor->setValue('nama', $data->nama);
    $templateProcessor->setValue('nama_fakultas', $data->nama_fakultas);
    $templateProcessor->setValue('jurusan', $data->jurusan);
    $templateProcessor->setValue('prodi', $data->prodi);
    $templateProcessor->setValue('strata', $data->strata);
    $templateProcessor->setValue('nomor', $data->nomor);
    $templateProcessor->setValue('angkatan', $data->angkatan);
    $templateProcessor->setValue('tgl_keg', $data->tgl_keg);
    $templateProcessor->setValue('tgl_surat', $tglFormatted);        // sudah diformat

    // Nama dan path file output
    $filename = 'Surat_PKMMB_' . preg_replace('/[^a-zA-Z0-9_\-]/', '', $data->nim) . '.docx';
    $output_path = FCPATH . 'uploads/temp/';
    $output_file = $output_path . $filename;

    // Pastikan folder temp tersedia
    if (!is_dir($output_path)) {
        mkdir($output_path, 0755, true);
    }

    // Simpan dokumen hasil proses
    $templateProcessor->saveAs($output_file);

    // Kirim file ke browser
    header("Content-Description: File Transfer");
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($output_file));
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Expires: 0');

    readfile($output_file);
    unlink($output_file);
    exit;
    }

}