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
                  <a class="dropdown-item" href="<?= base_url('prestasi'); ?>">Pusat Prestasi</a>
                  <a class="dropdown-item" href="<?= base_url('bem'); ?>">BEM</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('beritaa'); ?>">BERITA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/login'); ?>"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>