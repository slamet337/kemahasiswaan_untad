<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-sm-6">
        <a class="btn btn-danger" href="<?= base_url('mhs'); ?>">
          <i class="fas fa-times mr-1"></i> Batal
        </a>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Ubah Data</h3>
          </div>

          <form method="post" action="<?= base_url('mhs/update/' . $mhs->id); ?>" enctype="multipart/form-data">
            <div class="card-body">
              <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
              <?php endif; ?>

              <div class="form-group">
                <label for="nim">NIM</label>
                <input name="nim" type="text" class="form-control" id="nim" value="<?= $mhs->nim ?>" maxlength="10" readonly>
              </div>

              <div class="form-group">
                <label for="kegiatan_id">Kategori ID</label>
                <input name="kegiatan_id" type="text" class="form-control" id="kegiatan_id" value="<?= $mhs->kegiatan_id ?>" maxlength="50" readonly>
              </div>

              <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan" value="<?= $mhs->nama_kegiatan ?>" maxlength="50">
              </div>

              <div class="form-group">
                <label for="jenis_pesert">Jenis Peserta</label>
                <select name="jenis_pesert" class="form-control" id="jenis_pesert">
                  <option value="<?=$mhs->jenis_pesert?>"><?=$mhs->jenis_pesert?></option>
                  <option value="">--Pilih--</option>
                  <option value="individu" <?= ($mhs->jenis_pesert == 'individu') ? 'selected' : ''; ?>>Individu</option>
                  <option value="kelompok" <?= ($mhs->jenis_pesert == 'kelompok') ? 'selected' : ''; ?>>Kelompok</option>
                </select>
              </div>

              <div class="form-group">
                <label for="peringkat">Peringkat</label>
                <input name="peringkat" type="text" class="form-control" id="peringkat" value="<?= $mhs->peringkat ?>" maxlength="50">
              </div>

              <div class="form-group">
                <label for="no_serti">Nomor Sertifikat</label>
                <input name="no_serti" type="text" class="form-control" id="no_serti" value="<?= $mhs->no_serti ?>" maxlength="15">
              </div>

              <div class="form-group">
                <label for="no_sk">Nomor SK</label>
                <input name="no_sk" type="text" class="form-control" id="no_sk" value="<?= $mhs->no_sk ?>" maxlength="15">
              </div>

              <div class="form-group">
                <label for="model_pelaksana">Model Pelaksana</label>
                <select name="model_pelaksana" class="form-control" id="model_pelaksana">
                  <option value="<?=$mhs->model_pelaksana?>"><?=$mhs->model_pelaksana?></option>
                  <option value="">--Pilih--</option>
                  <option value="daring" <?= ($mhs->model_pelaksana == 'daring') ? 'selected' : ''; ?>>Daring</option>
                  <option value="luring" <?= ($mhs->model_pelaksana == 'luring') ? 'selected' : ''; ?>>Luring</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jml_negara">Jumlah Negara</label>
                <select name="jml_negara" class="form-control" id="jml_negara">
                  <option value="<?=$mhs->jml_negara?>"><?=$mhs->jml_negara?></option>
                  <option value="">--Pilih--</option>
                  <option value=">= 5 Negara" <?= ($mhs->jml_negara == '>= 5 Negara') ? 'selected' : ''; ?>>>= 5 Negara</option>
                  <option value="< 5 Negara" <?= ($mhs->jml_negara == '< 5 Negara') ? 'selected' : ''; ?>>< 5 Negara</option>
                </select>
              </div>

              <div class="form-group">
                <label for="jml_pt">Jumlah Perguruan Tinggi</label>
                <select name="jml_pt" class="form-control" id="jml_pt">
                  <option value="<?=$mhs->jml_pt?>"><?=$mhs->jml_pt?></option>
                  <option value="">--Pilih--</option>
                  <option value=">=10 pt" <?= ($mhs->jml_pt == '>= 10 pt') ? 'selected' : ''; ?>>>= 10 pt</option>
                  <option value="< 10 pt" <?= ($mhs->jml_pt == '< 10 pt') ? 'selected' : ''; ?>>< 10 pt</option>
                </select>
              </div>

              <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                  <input name="tgl_mulai" type="date" class="form-control" id="tgl_mulai" value="<?= $mhs->tgl_mulai ?>">
              </div>
              <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                  <input name="tgl_selesai" type="date" class="form-control" id="tgl_selesai" value="<?= $mhs->tgl_selesai ?>">
              </div>

              <div class="form-group">
                <label for="sertifikat">Upload Sertifikat</label>
                  <input type="file" class="form-control" id="sertifikat" name="sertifikat" accept=".pdf">
              </div>
              <div class="form-group">
                <label for="foto">Upload Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto" accept=".jpg,.png,.jpeg">
              </div>
              <div class="form-group">
                <label for="link">link</label>
                  <input type="file" class="form-control" id="link" name="link" accept=".jpeg,.jpg,.png">
              </div>
              <div class="form-group">
                <label for="nip">nomor induk pendamping (pegawai)</label>
                <input name="nip" type="text" class="form-control" id="nip" value="<?= $mhs->nip ?>" maxlength="20">
              </div>

              <div class="form-group">
                <label for="surat_tugas">Upload Surat Tugas</label>
                  <input type="file" class="form-control" id="surat_tugas" name="surat_tugas" accept=".pdf">
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
