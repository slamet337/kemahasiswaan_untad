<section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1 >
                      Badan Eksekutif <br>
                      Mahasiswa (BEM)
                    </h1>
                    <p>
                      Badan Eksekutif Mahasiswa (BEM) adalah organisasi yang mewakili suara mahasiswa di tingkat universitas. BEM berfungsi sebagai jembatan antara mahasiswa dan pihak kampus, serta berperan dalam pengembangan kepemimpinan, organisasi, dan kegiatan sosial di lingkungan kampus.
                      BEM juga bertanggung jawab dalam menyelenggarakan berbagai kegiatan yang mendukung pengembangan potensi mahasiswa, seperti seminar, pelatihan, dan kegiatan sosial lainnya. Melalui BEM, mahasiswa dapat berpartisipasi aktif dalam pengambilan keputusan dan pengelolaan kegiatan di kampus.                    
                    </p>
                      <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="assets/images1/bem.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>

<section>
  <div class="container">
    <div class="heading_container heading_center mb-5">
      <h2 class="text-center">
        Presiden <span class="text-primary">Mahasiswa</span>
      </h2>
    </div>
    <div class="row g-4" style="background-color:rgb(161, 137, 16); padding: 2rem;">
      <?php foreach ($bem_rows as $b): ?>
        <div class="col-md-4 d-flex">
          <div class="card flex-fill shadow-sm p-2 rounded h-100">
            <img src="<?= base_url('uploads/bem/' . $b->foto) ?>"
                 class="card-img-top rounded"
                 alt="<?= $b->nim ?>"
                 style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $b->jabatan ?></h5>
              <a href="<?php echo base_url('bem/detail/' . $b->nim) ?>" class="text-primary">Read More</a>
               <!-- <a href="" class="text-primary read-more-bem" data-nim="<?= $b->nim ?>">Read More</a> -->
            </div>
            <div class="card-footer bg-white border-top-0">
              <div class="d-flex align-items-center">
                <!-- <img src="<?= base_url('assets/img/user.png') ?>" width="30" class="rounded-circle me-2"> -->
                <img src="<?= base_url('uploads/bem/1745530322_asasa.png') ?>" width="70" class="rounded-circle me-2">
                <div>
                  <small class="text-muted">@admin</small><br>
                  <!-- <small class="text-muted"><?= date('F j, Y', strtotime($b->tgl)) ?></small> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="col-md-4">
    <!-- <img src="..." class="rounded float-left" alt="...">
    <img src="..." class="rounded float-right" alt="..."> -->
  </div>
</section>
<!-- modal -->
 