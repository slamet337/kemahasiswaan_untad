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
        <a class="btn btn-danger" href="<?php echo base_url('bemi'); ?>">
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
          <form role="form" method="post" action="<?= base_url('bemi/create/action'); ?>"enctype="multipart/form-data">
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
                <select name="nim" class="form-control select-nim" style="width: 100%;">
                  <option></option>
                  <?php foreach ($mahasiswa as $t) { ?>
                    <option value="<?= $t->nim ?>" <?= ($t->nim == set_value('nim')) ? 
                    'selected="selected"' : ''; ?> >(<?= $t->nim ?>) <?= $t->nama ?></option>
                  <?php } ?>
                </select>
                <p class="help-block" colour="" >*jika tidak ada nim dan stambuk silahkan hubungi admin kemahaiswaan</p>
              </div>
              <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= set_value('jabatan') ?>" maxlength="20">
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