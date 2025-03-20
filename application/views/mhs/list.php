<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Prestasi</h1>
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
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" href="<?php echo base_url('mhs/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
            <a class="btn btn-info" href="<?php echo base_url('mhs/export_excel') ?>">
              <i class="fas fa-file-excel mr-1"></i> Export Excel
            </a>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-mahasiswa" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>Kegiatan</th>
                  <th>Link</th>
                  <th>foto</th>
                  <th>sertifikat</th>
                  <th>Surat Tugas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $data) { ?>
                  <tr id="<?= $data->id; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $data->nim; ?></td>
                    <!-- <td><= $data->nama; ?></td> -->
                    <td><?= ($data->nama == NULL) ? '<span class="text-muted font-italic">Pemilik Stambuk sudah du hapus!</span>': $data->nama; ?></td>
                    <td><?= ($data->kategori == NULL) ? '<span class="text-muted font-italic">Kegiatan belum dipilih!</span>': $data->kategori; ?></td>
                    <td>
                    <?php if (!empty($data->link)) : ?>
                      <a href="<?= base_url('uploads/' . $data->link); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                      </a>
                    <?php else : ?>
                    <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                      </td>

                      <td>
                        <?php if (!empty($data->foto)) : ?>
                          <a href="<?= base_url('uploads/' . $data->foto); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>
                      <td>
                        <?php if (!empty($data->sertifikat)) : ?>
                          <a href="<?= base_url('uploads/' . $data->sertifikat); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>
                      <td>
                        <?php if (!empty($data->surat_tugas)) : ?>
                          <a href="<?= base_url('uploads/' . $data->surat_tugas); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>

                    

                    <td>
                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" href="<?php echo base_url('mhs/edit/' . $data->id) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                        <!-- <input name='id' type="text" value="<?= $data->id ?>" hidden>
                        <button type="submit" class="btn btn-danger m-1 delete-btn">
                          <i class="fas fa-trash"></i>
                        </button> -->
                      </div>
                      <!-- </form> -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->