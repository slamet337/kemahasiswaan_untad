
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Layanan Kemahasiswaan
                </a>
                <div class="dropdown-menu" aria-labelledby="layananDropdown">
                  <a class="dropdown-item" href="<?= base_url('prestasi'); ?>" font-size="30px">Pusat Prestasi</a>
                  <a class="dropdown-item" href="<?= base_url('bem'); ?>">BEM</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('beritaa'); ?>">BERITA</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="unduhDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  UNDUH
                </a>
                <div class="dropdown-menu" aria-labelledby="unduhDropdown">
                  <a class="dropdown-item" href="<?= base_url('sk'); ?>" >SK KEGIATAN <br>MAHASISWA</a>
                  <a class="dropdown-item" href="<?= base_url('sop'); ?>">SOP</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/login'); ?>"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              
            </ul>
          </div>
        </nav>
      </div>
    </header>