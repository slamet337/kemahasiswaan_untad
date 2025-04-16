<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

    <div class="reset-container">
        <h2>Reset Password Mahasiswa</h2>

        <!-- Pesan Notifikasi -->
        <?php if (!empty($mahasiswa) || $this->input->post('password')): ?>
    <?php if ($this->session->flashdata('success')): ?>
        <p class="alert alert-success"><?= $this->session->flashdata('success'); ?></p>
    <?php elseif ($this->session->flashdata('error')): ?>
        <p class="alert alert-danger"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
<?php endif; ?>


        <!-- Form Pencarian -->
        <form action="<?= base_url('reset'); ?>" method="get">
            <div class="form-group">
                <input type="text" name="query" placeholder="Masukkan NIM..." required>
                <button type="submit" class="btn">Cari</button>
            </div>
        </form>

        <!-- Jika Mahasiswa Ditemukan -->
        <?php if ($mahasiswa): ?>
            <h3>Data Mahasiswa</h3>
            <table border="1">
                <tr>
                    <th>NIM</th>
                    <td><?= $mahasiswa['nim']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= $mahasiswa['nama']; ?></td>
                </tr>
                
            </table>

            <!-- Form Reset Password -->
            <h3>Reset Password</h3>
            <form action="<?= base_url('reset/reset_password/' . $mahasiswa['id']); ?>" method="post">
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Reset Password</button>
                </div>
            </form>
        <?php else: ?>
            <p>Silakan cari mahasiswa menggunakan NIM.</p>
        <?php endif; ?>
    </div>

</body>
</html>
