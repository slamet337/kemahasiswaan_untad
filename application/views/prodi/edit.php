<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Program Studi</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
        <a class="btn btn-danger" href="<?php echo base_url('prodi'); ?>">
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
          <form role="form" method="post" action="<?= base_url('prodi/update/' . $prodi->id); ?>">
            <div class="card-body">
              <?php
              if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('message');
                echo "</div>";
              }
              ?>
              <div class="form-group">
                <label for="kode_prodi">Kode Program Studi</label>
                <input name="kode_prodi" type="text" class="form-control" id="kode_prodi" placeholder="Kode Program Studi" maxlength="4" value="<?= $prodi->kode_prodi ?>" autofocus>
              </div>
              <div class="form-group">
                <label for="nama">Nama Program Studi</label>
                <input name="nama_prodi" type="text" class="form-control" id="nama_prodi" placeholder="Nama Program Studi" maxlength="50" value="<?= $prodi->nama_prodi ?>">
              </div>

              <div class="form-group">
                <label>Nama Jurusan</label>
                <select name="jurusan_id" class="form-control select-jurusan" style="width: 100%;">
                  <option></option>
                  <?php foreach ($jurusan as $j_data) { ?>
                    <option value="<?= $j_data->id ?>" <?= ($j_data->id == $prodi->jurusan_id) ? 'selected="selected"' : ''; ?>>(<?= $j_data->kode_jurusan ?>) <?= $j_data->nama_jurusan ?></option>
                  <?php } ?>
                </select>
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