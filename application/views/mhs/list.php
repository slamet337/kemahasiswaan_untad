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
            <?php if ($this->session->userdata('role') == 1): ?>
            <a class="btn btn-success" href="<?php echo base_url('mhs/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
            <?php endif; ?>
            <!-- <a class="btn btn-info" href="<?php echo base_url('mhs/export_excel') ?>">
              <i class="fas fa-file-excel mr-1"></i> Export Excel
            </a> -->

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
                  <?php if ($this->session->userdata('role') == 1): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                  <tr id="<?= $d->id; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $d->nim; ?></td>
                    <!-- <td><= $data->nama; ?></td> -->
                    <td><?= ($d->nama == NULL) ? '<span class="text-muted font-italic">Pemilik Stambuk sudah du hapus!</span>': $d->nama; ?></td>
                    <td><?= ($d->kategori == NULL) ? '<span class="text-muted font-italic">Kegiatan belum dipilih!</span>': $d->kategori; ?></td>
                    <td>
                    <?php if (!empty($d->link)) : ?>
                      <a href="<?= base_url('uploads/' . $d->link); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                      </a>
                    <?php else : ?>
                    <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                      </td>

                      <td>
                        <?php if (!empty($d->foto)) : ?>
                          <a href="<?= base_url('uploads/' . $d->foto); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>
                      <td>
                        <?php if (!empty($d->sertifikat)) : ?>
                          <a href="<?= base_url('uploads/' . $d->sertifikat); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>
                      <td>
                        <?php if (!empty($d->surat_tugas)) : ?>
                          <a href="<?= base_url('uploads/' . $d->surat_tugas); ?>" target="_blank" class="btn btn-sm btn-danger">
                        <i class="fas fa-download"></i> Download
                          </a>
                        <?php else : ?>
                          <span class="text-muted">File tidak ditemukan</span>
                        <?php endif; ?>
                          </td>

                    

                    <td>

                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                      <?php if ($this->session->userdata('role') == 1): ?>
                      <a class="btn btn-primary m-1" href="<?php echo base_url('mhs/edit/' . $d->id) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                        <a class="btn btn-info m-1" data-toggle="modal" data-target="#viewModal<?= $d->id ?>">
                          <i class="fas fa-eye"></i>
                        </a>

                        <!-- <input name='id' type="text" value="<?= $data->id ?>" hidden>
                        <button type="submit" class="btn btn-danger m-1 delete-btn">
                          <i class="fas fa-trash"></i>
                        </button> -->
                      </div>
                      <!-- </form> -->
                    </td>
                    <?php endif; ?>
                  </tr>
                <?php } ?>
                
              </tbody>
            </table>
            <!-- modal -->
            <?php foreach ($data as $detail): ?>
  <div class="modal fade" id="viewModal<?= $detail->id ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?= $detail->id ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="viewModalLabel<?= $detail->id ?>">Detail Prestasi Mahasiswa</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr><th>NIM</th><td><?= $detail->nim ?></td></tr>
            <tr><th>Nama</th><td><?= $detail->nama ?></td></tr>
            <tr><th>Kegiatan</th><td><?= $detail->kategori ?></td></tr>
            <tr><th>Juara</th><td><?= $detail->peringkat ?></td></tr>
            <tr><th>Jenis Peserta</th><td><?= $detail->jenis_pesert ?></td></tr>
            <tr>
              <th>Link</th>
              <td>
                <?php if (!empty($detail->link)): ?>
                  <a href="<?= base_url('uploads/' . $detail->link) ?>" target="_blank">Lihat File</a>
                <?php else: ?>
                  <span class="text-muted">Tidak ada file</span>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>Foto</th>
              <td>
                <?php if (!empty($detail->foto)): ?>
                  <img src="<?= base_url('uploads/' . $detail->foto) ?>" class="img-fluid" width="200">
                <?php else: ?>
                  <span class="text-muted">Tidak ada foto</span>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>Sertifikat</th>
              <td>
                <?php if (!empty($detail->sertifikat)): ?>
                  <a href="<?= base_url('uploads/' . $detail->sertifikat) ?>" target="_blank">Lihat Sertifikat</a>
                <?php else: ?>
                  <span class="text-muted">Tidak ada sertifikat</span>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>Surat Tugas</th>
              <td>
                <?php if (!empty($detail->surat_tugas)): ?>
                  <a href="<?= base_url('uploads/' . $detail->surat_tugas) ?>" target="_blank">Lihat Surat Tugas</a>
                <?php else: ?>
                  <span class="text-muted">Tidak ada surat tugas</span>
                <?php endif; ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END MODAL -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->