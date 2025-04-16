<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>" class="nav-link">Home</a>
    </li>
  </ul>

</nav>
<!-- Sidebar User Panel -->


<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url() ?>assets/img/YAKUZA.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <?php echo $this->session->userdata('username'); ?>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="image">
        <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Muhammad Aryo Muzakki">
      </div> -->
      <div class="info">
        <a href="#" class="d-block">Kemahasiswaan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <!-- <pre>
<?php print_r($this->session->userdata()); ?>
</pre> -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link <?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($this->session->userdata('role') == 1): ?> 
        <li class="nav-item">
          <a href="<?= base_url('mahasiswa') ?>" class="nav-link <?= ($this->uri->segment(1) == 'mahasiswa') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Mahasiswa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('mhs') ?>" class="nav-link <?= ($this->uri->segment(1) == 'mhs') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Mahasiswa prestasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('jurusan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'jurusan') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Jurusan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('prodi') ?>" class="nav-link <?= ($this->uri->segment(1) == 'prodi') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Program Studi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('fakultas') ?>" class="nav-link <?= ($this->uri->segment(1) == 'fakultas') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Fakultas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kegiatan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'kegiatan') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Kegiatan
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('bemi') ?>" class="nav-link <?= ($this->uri->segment(1) == 'bem') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>data BEM</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('berita') ?>" class="nav-link <?= ($this->uri->segment(1) == 'berita') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>Upload Berita</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('reset') ?>" class="nav-link <?= ($this->uri->segment(1) == 'reset') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-key"></i>
              <p>Reset Password</p>
            </a>
        </li>
        <?php elseif ($this->session->userdata('role') == 2): ?>
          <li class="nav-item">
            <a class="btn btn-success" href="<?php echo base_url('mhs/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
        <?php endif; ?>
        
        <?php if ($this->session->userdata('role') == 'mahasiswa'): ?>
  <li class="nav-item">
    <a href="<?= base_url('mandiri/create') ?>" class="nav-link">
      <i class="nav-icon fas fa-solid fa-plus"></i>
      <p>Tambah Data</p>
    </a>
  </li>
<?php endif; ?>


        <li class="nav-item">
          <a href="<?= base_url('auth/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
          </a>
        </li>

        <!-- <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>