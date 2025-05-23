<section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container ">
          <div class="row">
            <div class="col-md-6 ">
              <div class="detail-box">
                <h1>
                  Badan Eksekutif Mahasiswa <br>
                  Universitas Tadulako
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
                <img src="<?= base_url('assets/img/bem.png')?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- end slider section -->
  </div>
    <section>
      <div class="service_section_layout_padding">
        <div class="service_container">
          <div class="container ">
            <div class="heading_container heading_center">
              <h2>
                <?php if (isset($bem)): ?>
                Detail <span>Data</span> <?= html_escape($bem->jabatan) ?>
              </h2>
            </div>
            <div class="row">
              <div class="col-md-4 ">
                <div class="box ">
                  <div class="img-box">
                    <img src="<?= base_url('uploads/bem/' . $bem->foto) ?>" alt="Foto BEM" style="max-width: 10000px;">
                  </div>
                  <div class="detail-box">
                    
                    <p><strong>NIM:</strong> <?= html_escape($bem->nim) ?></p>
                    <p><strong>Nama:</strong> <?= html_escape($bem->nama) ?></p>
                    <p><strong>Jabatan:</strong> <?= html_escape($bem->jabatan) ?></p>
                  </div>
                  <?php if (!empty($bem->foto)): ?>
                    <?php endif; ?>
                    <?php else: ?>
                      <p>Data BEM tidak ditemukan.</p>
                      <?php endif; ?>
                    </div>
                  </section>
                  
            
            
