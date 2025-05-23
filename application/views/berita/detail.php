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
                  Universitas Tadulako
                </h1>
                <p>Selamat datang di halaman berita Universitas Tadulako. Di sini Anda akan menemukan informasi terkini mengenai kegiatan, acara, dan berita terbaru dari universitas kami.</p>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="<?= base_url('assets/img/info.png')?>" alt="">
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
                <?php if (isset($berita)): ?>
                Berita <span>Kemahasiswaan</span> <?= html_escape($berita->tag) ?>
              </h2>
            </div>
            <div class="row">
              <div class="col-md-4 ">
                <div class="box ">
                  <div class="img-box">
                    <img src="<?= base_url('uploads/berita/' . $berita->foto) ?>" alt="Berita" style="max-width: 10000px;">
                  </div>
                  <div class="detail-box">
                    
                    <p><strong>Keterangan:</strong> <?= html_escape($berita->keterangan) ?></p>
                    <p><strong>Tag:</strong> <?= html_escape($berita->tag) ?></p>
                    <p><strong>Tanggal:</strong> <?= html_escape($berita->tgl) ?></p>
                  </div>
                  <?php if (!empty($berita->foto)): ?>
                    <?php endif; ?>
                    <?php else: ?>
                      <p>Data BERITA tidak ditemukan.</p>
                      <?php endif; ?>
                    </div>
                  </section>
                  
            
            
