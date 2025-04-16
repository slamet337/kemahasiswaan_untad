<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 CSS -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- jQuery -->
<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>

</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="<?php echo base_url('assets/img/YAKUZA.png'); ?>" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="<?php echo base_url('auth/register_action'); ?>" method="post">
    <h3 class="mb-3 text-center">Register</h3>

    <!-- Username -->
    <div class="form-outline mb-3">
        <input type="text" name="nim" class="form-control form-control-lg" placeholder="Nim" value="<?php echo set_value('nim'); ?>" required />
        <label class="form-label">Nim</label>
        <small class="text-danger"><?php echo form_error('nim'); ?></small>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" maxlength="20" value="<?= set_value('nama') ?>" autofocus>
    </div>
    <div class="form-group">
        <label for="fakultas">Fakultas</label>
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
    <!-- Password -->
    <div class="form-outline mb-3">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
        <label class="form-label">Password</label>
        <small class="text-danger"><?php echo form_error('password'); ?></small>
    </div>

    <!-- Confirm Password -->
    <div class="form-outline mb-3">
        <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" required />
        <label class="form-label">Confirm Password</label>
        <small class="text-danger"><?php echo form_error('confirm_password'); ?></small>
    </div>

    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-lg">
            Register
        </button>
        <p class="small fw-bold mt-2 pt-1 mb-0">
            Already have an account? <a href="<?php echo base_url('auth'); ?>" class="link-danger">Login</a>
        </p>
    </div>

    <!-- Menampilkan pesan flashdata -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success mt-3"><?php echo $this->session->flashdata('success'); ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger mt-3"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
</form>

      </div>
    </div>
  </div>
</section>

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
