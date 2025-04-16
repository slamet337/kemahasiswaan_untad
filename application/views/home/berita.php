<section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Berita <br>
                      Terkini
                    </h1>
                    
                      
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="assets/images1/berita.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>
    
    
<section class="service_section layout_padding" style="padding-top: 60px; padding-bottom: 60px;">
  <div class="container">
    <div class="heading_container heading_center mb-5">
      <h2 class="text-center">
        Berita <span class="text-primary">Terbaru</span>
      </h2>
    </div>

    <div class="row g-4" style="background-color: #003366; padding: 2rem;">
      <?php foreach ($berita_rows as $b): ?>
        <div class="col-md-4 d-flex">
          <div class="card flex-fill shadow-sm p-2 rounded h-100">
            <img src="<?= base_url('uploads/berita/' . $b->foto) ?>"
                 class="card-img-top rounded"
                 alt="<?= $b->keterangan ?>"
                 style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $b->tag ?></h5>
              <a href="<?= base_url('berita/detail/' . $b->id) ?>" class="text-primary">Read More</a>
            </div>
            <div class="card-footer bg-white border-top-0">
              <div class="d-flex align-items-center">
                <img src="<?= base_url('assets/img/user.png') ?>" width="30" class="rounded-circle me-2">
                <div>
                  <small class="text-muted">@admin</small><br>
                  <small class="text-muted"><?= date('F j, Y', strtotime($b->tgl)) ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
