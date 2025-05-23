<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <!-- <a class="btn btn-danger" href="<?php echo base_url('mahasiswa'); ?>">
          <i class="fas fa-times mr-1"></i>
          Batal
        </a> -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('pkkmb/mhs/action'); ?>"enctype="multipart/form-data">
            <div class="card-body">
              <?php 
                if (!empty(validation_errors())) {
              ?>
              <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
              </div>
              <?php 
                }
              ?>

              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?= $this->session->userdata('nim'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('nama'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nama_fakultas">Fakultas</label>
                <input type="text" class="form-control" name="nama_fakultas" value="<?= $this->session->userdata('nama_fakultas'); ?>" readonly>
              </div>
              
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input name="jurusan" type="text" class="form-control" id="jurusan" value="<?= $this->session->userdata('jurusan'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="prodi">prodi</label>
                <input type="text" class="form-control" name="prodi" value="<?= $this->session->userdata('prodi'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="strata">Strata</label>
                <select name="strata" class="form-control" id="strata">
                  <option value="">-- Pilih Strata --</option>
                  <option value="S1">S1</option>
                  <option value="D3">D3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sk">upload SK</label>
                <input type="file" name="sk" class="form-control" accept=".pdf">
              </div>
              
              
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->