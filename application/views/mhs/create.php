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
          <form role="form" method="post" action="<?= base_url('mhs/create/action'); ?>"enctype="multipart/form-data">
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
              </div>
              <div class="form-group">
                <label for="kegiatan_id">Kegiatan</label>
                <select name="kegiatan_id" class="form-control select-kegiatan" style="width: 100%;">
                  <option></option>
                  <?php foreach ($kegiatan as $f) { ?>
                    <option value="<?= $f->id ?>" <?= ($f->id == set_value('kegiatan_id')) ? 'selected="selected"' : ''; ?> >(<?= $f->kategori ?>) <?= $f->kategori ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan" value="<?= set_value('nama_kegiatan') ?>" maxlength="50">
              </div>

              <div class="form-group">
                <label for="jenis_pesert">Jenis Peserta</label>
                <select name="jenis_pesert" class="form-control" id="jenis_pesert">
                  <!-- <option value="<=$mhs->jenis_pesert?>"><=$mhs->jenis_pesert?></option> -->
                  <option value="">--Pilih--</option>
                  <option value="individu" <?= ("individu" == set_value('jenis_pesert')) ? 'selected="selected"' : ''; ?>>Individu</option>
                  <option value="kelompok" <?= ("kelompok" == set_value('jenis_pesert')) ? 'selected="selected"' : ''; ?>>Kelompok</option>
                </select>
              </div>

              <div class="form-group">
                <label for="peringkat">Peringkat</label>
                <input name="peringkat" type="text" class="form-control" id="peringkat" value="<?= set_value('peringkat') ?>" maxlength="50">
              </div>

              <div class="form-group">
                <label for="no_serti">Nomor Sertifikat</label>
                <input name="no_serti" type="text" class="form-control" id="no_serti" value="<?= set_value('no_serti') ?>" maxlength="15">
              </div>

              <div class="form-group">
                <label for="no_sk">Nomor SK</label>
                <input name="no_sk" type="text" class="form-control" id="no_sk" value="<?= set_value('no_sk') ?>" maxlength="15">
              </div>

              <div class="form-group">
                <label for="model_pelaksana">Model Pelaksana</label>
                <select name="model_pelaksana" class="form-control" id="model_pelaksana">
                  <!-- <option value="<=$mhs->model_pelaksana?>"><=$mhs->model_pelaksana?></option> -->
                  <option value="">--Pilih--</option>
                  <option value="daring" <?= ("daring" == set_value('model_pelaksana')) ? 'selected="selected"' : ''; ?>>Daring</option>
                  <option value="luring" <?= ("luring" == set_value('model_pelaksana')) ? 'selected="selected"' : ''; ?>>Luring</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jml_negara">Jumlah Negara</label>
                <select name="jml_negara" class="form-control" id="jml_negara">
                  <!-- <option value="<=$mhs->jml_negara?>"><=$mhs->jml_negara?></option> -->
                  <option value="">--Pilih--</option>
                  <option value=">= 5 Negara" <?= (">= 5 Negara" == set_value('jml_negara')) ? 'selected="selected"' : ''; ?>>>= 5 Negara</option>
                  <option value="< 5 Negara" <?= ("< 5 Negara" == set_value('jml_negara')) ? 'selected="selected"' : ''; ?>>< 5 Negara</option>
                  <option value="Null" <?= ("Null" == set_value('jml_negara')) ? 'selected="selected"' : ''; ?>>Tidak ada</option>
                </select>
              </div>

              <div class="form-group">
                <label for="jml_pt">Jumlah Perguruan Tinggi</label>
                <select name="jml_pt" class="form-control" id="jml_pt">
                  <!-- <option value="<=$mhs->jml_pt?>"><=$mhs->jml_pt?></option> -->
                  <option value="">--Pilih--</option>
                  <option value=">=10 pt" <?= (">= 10pt" == set_value('jml_pt')) ? 'selected="selected"' : ''; ?>>>= 10 pt</option>
                  <option value="< 10 pt" <?= ("< 10 pt" == set_value('jml_pt')) ? 'selected="selected"' : ''; ?>>< 10 pt</option>
                </select>
              </div>

              <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                  <input name="tgl_mulai" type="date" class="form-control" id="tgl_mulai" value="<?= set_value('tgl_mulai') ?>">
              </div>
              <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                  <input name="tgl_selesai" type="date" class="form-control" id="tgl_selesai" value="<?= set_value('tgl_selesai') ?>">
              </div>
              <div class="form-group">
                <label for="sertifikat">Sertifikat</label>
                <input type="file" name="sertifikat" class="form-control" accept=".pdf">
              </div>
              <div class="form-group"accept=".pdf">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" accept=".jpeg,.png,.jpg">
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="file" name="link" class="form-control" accept=".jpeg,.png,.jpg">
              </div>
              
              <div class="form-group">
                <label for="nip">nomor induk pendamping (pegawai)</label>
                <input name="nip" type="text" class="form-control" id="nip" value="<?= set_value('nama_prodi') ?>" maxlength="20">
              </div>
              <div class="form-group">
                <label for="surat_tugas">Surat Tugas</label>
                <input type="file" name="surat_tugas" class="form-control" accept=".pdf">
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