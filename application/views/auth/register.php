<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <style>
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<section class="vh-100">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card">
          <div class="row g-0">

            <!-- Form Side -->
            <div class="col-lg-6 d-flex align-items-center">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-4 text-center">Sign up</h3>

                <form action="<?= base_url('auth/register_action'); ?>" method="post">

                  <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= set_value('nim'); ?>" required>
                    <small class="text-danger"><?= form_error('nim'); ?></small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" required>
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Fakultas</label>
                    <select name="fakultas_id" class="form-control select-fakultas" style="width: 100%">
                      <option></option>
                      <?php foreach ($fakultas as $f) { ?>
                        <option value="<?= $f->id ?>" <?= ($f->id == set_value('fakultas_id')) ? 'selected' : '' ?>><?= $f->kode_fakultas ?> - <?= $f->nama_fakultas ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label class="form-label">Jurusan</label>
                      <select name="jurusan_id" class="form-control select-jurusan" style="width: 100%">
                        <option></option>
                        <?php foreach ($jurusan as $j) { ?>
                          <option value="<?= $j->id ?>" <?= ($j->id == set_value('jurusan_id')) ? 'selected' : '' ?>><?= $j->kode_jurusan ?> - <?= $j->nama_jurusan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label">angkatan</label>
                        <input type="number" name="angkatan" class="form-control" value="<?= set_value('angkatan'); ?>" required>
                        <small class="text-danger"><?= form_error('angkatan'); ?></small>
                      </div>

                  <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi_id" class="form-control select-prodi" style="width: 100%">
                      <option></option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-danger"><?= form_error('password'); ?></small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                    <small class="text-danger"><?= form_error('confirm_password'); ?></small>
                  </div>

                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>

                </form>
              </div>
            </div>

            <!-- Image Side -->
            <div class="col-lg-6 d-none d-lg-block">
              <img src="<?= base_url('assets/img/YAKUZA.png'); ?>" class="img-fluid rounded-end" alt="register image" style="height: 50%; object-fit: cover;">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select-fakultas, .select-jurusan, .select-prodi').select2({ theme: 'bootstrap4', placeholder: 'Pilih' });
  });
</script>

</body>
</html>
