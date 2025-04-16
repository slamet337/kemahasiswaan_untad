<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Fakultas</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
        <a class="btn btn-danger" href="<?php echo base_url('fakultas'); ?>">
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
            <h3 class="card-title">Ubah Data Fakultas</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('fakultas/update/' . $fakultas->id); ?>">
            <div class="card-body">

              <?php
              if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('message');
                echo "</div>";
              }
              ?>
              
              <div class="form-group">
                <label for="kode_fakultas">Kode Fakultas</label>
                <input name="kode_fakultas" type="text" class="form-control" id="kode_fakultas" value="<?= $fakultas->kode_fakultas ?>" maxlength="2" autofocus>
              </div>

              <div class="form-group">
                <label for="nama_fakultas">Nama fakultas</label>
                <input name="nama_fakultas" type="text" class="form-control" id="nama_fakultas" value="<?= $fakultas->nama_fakultas ?>" maxlength="50">
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