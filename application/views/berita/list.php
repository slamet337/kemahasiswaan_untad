<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" href="<?= base_url('berita/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
          </div>

          <div class="card-body">
            <table id="tabel-fakultas" style="width:100%" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Tag</th>
                  <th>Tanggal</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($data as $row): ?>
                  <tr id="<?= $row->id; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $row->keterangan; ?></td>
                    <td><?= $row->tag; ?></td>
                    <td><?= $row->tgl; ?></td>
                    <td>
                      <?php if (!empty($row->foto)): ?>
                        <img src="<?= base_url('uploads/berita/' . $row->foto); ?>" width="80">
                      <?php else: ?>
                        <span class="text-muted">Tidak ada foto</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" href="<?= base_url('berita/edit/' . $row->id) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                        <a class="btn btn-info m-1" data-toggle="modal" data-target="#viewModal<?= $row->id ?>">
                          <i class="fas fa-eye"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <!-- MODAL DETAIL -->
            <?php foreach ($data as $d): ?>
              <div class="modal fade" id="viewModal<?= $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?= $d->id ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title" id="viewModalLabel<?= $d->id ?>">Detail Berita</h5>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-bordered">
                        <tr><th>Kegiatan</th><td><?= $d->keterangan ?></td></tr>
                        <tr><th>Tag</th><td><?= $d->tag ?></td></tr>
                        <tr><th>Tanggal</th><td><?= $d->tgl ?></td></tr>
                        <tr>
                          <th>Foto</th>
                          <td>
                            <?php if (!empty($d->foto)): ?>
                              <img src="<?= base_url('uploads/berita/' . $d->foto) ?>" class="img-fluid" width="200">
                            <?php else: ?>
                              <span class="text-muted">Tidak ada foto</span>
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
        </div>
      </div>
    </div>
  </div>
</section>
