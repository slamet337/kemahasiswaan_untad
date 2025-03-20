<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Mahasiswa</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="<?php echo base_url('mahasiswa'); ?>">
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
          <form role="form" method="post" action="<?= base_url('mahasiswa/create/action'); ?>">
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
                <input name="nim" type="text" class="form-control" id="nim" placeholder="NIM" maxlength="10" value="<?= set_value('nim') ?>" autofocus>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" maxlength="50" value="<?= set_value('nama') ?>">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat" maxlength="50" value="<?= set_value('alamat') ?>">
              </div>
              
              <div class="form-group">
                <label for="no-hp">Nomor HP</label>
                <input name="no_hp" type="text" class="form-control" id="no-hp" placeholder="Nomor HP" maxlength="15" value="<?= set_value('no_hp') ?>">
              </div>
              <div class="form-group">
                <label for="fakultas">fakultas</label>
                <select name="fakultas_id" class="form-control select-fakultas" style="width: 100%;">
                  <option></option>
                  <?php foreach ($fakultas as $f) { ?>
                    <option value="<?= $f->id ?>" <?= ($f->id == set_value('fakultas_id')) ? 'selected="selected"' : ''; ?> >(<?= $f->kode_fakultas ?>) <?= $f->nama_fakultas ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Nama Jurusan</label>
                <select name="jurusan_id" class="form-control select-jurusan" style="width: 100%;">
                  <option></option>
                  <?php foreach ($jurusan as $j_data) { ?>
                    <option value="<?= $j_data->id ?>" <?= ($j_data->id == set_value('jurusan_id')) ? 'selected="selected"' : ''; ?> >(<?= $j_data->kode_jurusan ?>) <?= $j_data->nama_jurusan ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Program Studi</label>
                <select name="prodi_id" class="form-control select-prodi" style="width: 100%;">
                  <option></option>
                </select>
              </div>

              <div class="form-group">
                <label for="status">status</label>
                <select name="status" class="form-control" id="status">
                  <option>status</option>
                  <option value="1" <?= (1 == set_value('status')) ? 'selected="selected"' : ''; ?>>Aktif</option>
                  <option value="2" <?= (2 == set_value('status')) ? 'selected="selected"' : ''; ?>>Lulus</option>
                  <option value="3" <?= (3 == set_value('status')) ? 'selected="selected"' : ''; ?>>Drop Out</option>
                  <option value="0" <?= (0 == set_value('status')) ? 'selected="selected"' : ''; ?>>Tidak Aktif</option>
                </select>
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