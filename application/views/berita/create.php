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
        <a class="btn btn-danger" href="<?php echo base_url('berita'); ?>">
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
            <h3 class="card-title"><?= $title; ?></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('berita/create/action'); ?>"enctype="multipart/form-data">
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
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" type="text" class="form-control" id="keterangan" value="<?= set_value('keterangan') ?>" maxlength="">
              </div>
              <div class="form-group">
                <label for="tag">Tag line</label>
                <input name="tag" type="text" class="form-control" id="tag" value="<?= set_value('tag') ?>" maxlength="">
              </div>
              <div class="form-group">
                <label for="tgl">Tanggal posting</label>
                  <input name="tgl" type="date" class="form-control" id="tgl" value="<?= set_value('tgl_mulai') ?>">
              </div>
              
              
              <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" name="foto" class="form-control" accept=".jpeg,.png,.jpg">
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