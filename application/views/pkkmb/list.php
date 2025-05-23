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
            <!-- <a class="btn btn-success" href="<?php echo base_url('pkkmb/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a> -->
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
                  <th>Fakultas</th>
                  <th>Prodi</th>
                  <th>Jurusan</th>
                  <th>Strata</th>
                  <th>Nomor surat</th>
                  <th>Upload</th>
                  <th>Tanggal Upload</th>
                  <?php if ($this->session->userdata('role') == 1): ?>
                  <th>Actions</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $d) { ?>
                  <tr id="<?= $d->nim; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $d->nim; ?></td>
                    <!-- <td><= $data->nama; ?></td> -->
                    <td><?= ($d->nama == NULL) ? '<span class="text-muted font-italic">Pemilik Stambuk sudah du hapus!</span>': $d->nama; ?></td>
                    <td><?= ($d->nama_fakultas == NULL) ? '<span class="text-muted font-italic">fakultas belum dipilih!</span>': $d->nama_fakultas; ?></td>
                    <td><?= ($d->jurusan == NULL) ? '<span class="text-muted font-italic">jurusan belum dipilih!</span>': $d->jurusan; ?></td>
                    <td><?= ($d->prodi == NULL) ? '<span class="text-muted font-italic">prodi belum dipilih!</span>': $d->prodi; ?></td>
                    <td><?= ($d->strata == NULL) ? '<span class="text-muted font-italic">prodi belum dipilih!</span>': $d->strata; ?></td>
                    <td><?= ($d->nomor == NULL) ? '<span class="text-muted font-italic">nomor belum diisi!</span>': $d->nomor; ?></td>
                    <td><?= ($d->tgl == NULL) ? '<span class="text-muted font-italic">nomor belum diisi!</span>': $d->tgl; ?></td>
                    <td>
                    <?php if (!empty($d->sk)) : ?>
                      <a href="<?= base_url('uploads/suratsurat/' . $d->sk); ?>" target="_blank" class="btn btn-sm btn-danger">
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
                      <a class="btn btn-primary m-1" href="<?php echo base_url('pkkmb/edit/' . $d->nim) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="<?php echo base_url('pkkmb/delete/' . $d->nim) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                          <i class="fas fa-trash"></i>
                        </a>
                        <a class="btn btn-info m-1" data-toggle="modal" data-target="#viewModal<?= $d->nim ?>">
                          <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-sm btn-outline-success" href="<?= base_url('report/word/' . $d->nim); ?>">
                          <i class="fas fa-file-word"></i> Word
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
  <div class="modal fade" id="viewModal<?= $detail->nim ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?= $detail->nim ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="viewModalLabel<?= $detail->nim ?>">Detail Sk Pengganti PKKMB</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr><th>NIM</th><td><?= $detail->nim ?></td></tr>
            <tr><th>Nama</th><td><?= $detail->nama ?></td></tr>
            <tr><th>Fakultas</th><td><?= $detail->nama_fakultas ?></td></tr>
            <tr><th>Jurusan</th><td><?= $detail->jurusan ?></td></tr>
            <tr><th>Prodi</th><td><?= $detail->prodi ?></td></tr>
            <tr><th>Strata</th><td><?= $detail->strata ?></td></tr>
            <tr><th>Nomor Surat</th><td><?= $detail->nomor ?></td></tr>
            <tr><th>Tanggal</th><td><?= $detail->tgl ?></td></tr>
            <tr>
              <th>Upload SK</th>
              <td>
                <?php if (!empty($detail->sk)): ?>
                  <a href="<?= base_url('uploads/suratsurat/' . $detail->sk) ?>" target="_blank">Lihat File</a>
                <?php else: ?>
                  <span class="text-muted">Tidak ada file</span>
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