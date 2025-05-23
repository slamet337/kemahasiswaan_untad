<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Mahasiswa PKKMB</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
        <a class="btn btn-danger" href="<?php echo base_url('pkkmb'); ?>">
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
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Ubah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('pkkmb/update/' . $pkkmb->nim); ?>">
            <div class="card-body">
              <?php
              if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('message');
                echo "</div>";
              }
              ?>
              <div class="form-group">
                <label for="nim">Nim</label>
                <input name="nim" type="text" class="form-control" id="nim" maxlength="4" value="<?= $pkkmb->nim ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" maxlength="50" value="<?= $pkkmb->nama?>" readonly>
              </div>

              <div class="form-group">
                <label for="jurusan">Nama Jurusan</label>
                <input name="jurusan" type="text" class="form-control" id="jurusan" maxlength="50" value="<?= $pkkmb->jurusan ?>" readonly>
              </div>
              <div class="form-group">
                <label for="prodi">Nama Prodi</label>
                <input name="prodi" type="text" class="form-control" id="prodi" maxlength="50" value="<?= $pkkmb->prodi ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nomor">Nomor surat</label>
                <input name="nomor" type="text" class="form-control" id="nomor" maxlength="50" value="<?= $pkkmb->nomor ?>" required>
              </div>
              <div class="form-group">
                <label for="tgl_keg">Tanggal Kegiatan</label>
                <input name="tgl_keg" type="text" class="form-control" id="tgl_keg" palaceholder="16, 17 dan 18"maxlength="50" value="<?= $pkkmb->tgl_keg ?>" required>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->