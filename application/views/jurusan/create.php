<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Jurusan</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="<?php echo base_url('jurusan'); ?>">
          <i class="fas fa-times mr-1"></i>
          Batal
        </a>
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
          <form role="form" method="post" action="<?= base_url('jurusan/create/action'); ?>">
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
                <label for="kode_jurusan">Kode Jurusan</label>
                <input name="kode_jurusan" type="text" class="form-control" id="kode_jurusan" placeholder="Kode Jurusan" maxlength="6" value="<?= set_value('kode_jurusan') ?>" autofocus>
              </div>

              <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input name="nama_jurusan" type="text" class="form-control" id="nama_jurusan" placeholder="Nama Jurusan" maxlength="50" value="<?= set_value('nama_jurusan') ?>">
              </div>

            </div>
            <!-- /.card-body -->

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