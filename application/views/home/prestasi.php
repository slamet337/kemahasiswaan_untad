<section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Pusat Prestasi <br>
                      Mahasiswa
                    </h1>
                    <p>
                      Pusat Prestasi Mahasiswa (PPM) adalah unit yang bertanggung jawab dalam mengelola dan mengembangkan prestasi mahasiswa di bidang akademik, non-akademik, dan seni budaya. PPM berperan penting dalam memberikan dukungan dan fasilitas bagi mahasiswa untuk mencapai prestasi yang lebih baik.
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
                    <img src="assets/images1/prest.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>
    <section>
<?php
$peringkat_label = [
  '1' => 'JUARA I',
  '2' => 'JUARA II',
  '3' => 'JUARA III',
];

$rekap = [];
foreach ($kegiatan_rows as $row) {
  $tahun = $row->tahun;
  $kategori = strtoupper($row->kategori);
  $peringkat = $peringkat_label[$row->peringkat] ?? 'LAINNYA';
  $total = $row->total;

  if (!isset($rekap[$tahun])) {
    $rekap[$tahun] = [];
  }

  if (!isset($rekap[$tahun][$kategori])) {
    $rekap[$tahun][$kategori] = ['total' => 0, 'juara' => []];
  }

  $rekap[$tahun][$kategori]['juara'][$peringkat] = $total;
  $rekap[$tahun][$kategori]['total'] += $total;
}
?>

<?php foreach ($rekap as $tahun => $kategori_data): ?>
  <h2 class="text-center my-4 text-primary">PRESTASI TAHUN <?= $tahun ?></h2>
  <div class="row text-white text-center mb-5" style="background-color: #0e3c7e; padding: 2rem;">
    <?php foreach ($kategori_data as $kategori => $data): ?>
      <div class="col-md-4 mb-4">
        <h1 class="purecounter text-warning"
            data-purecounter-start="0"
            data-purecounter-end="<?= $data['total'] ?>"
            data-purecounter-duration="1"></h1>
        <h5>PRESTASI <?= $kategori ?></h5>

        <?php foreach ($peringkat_label as $key => $label):
          $jumlah = $data['juara'][$label] ?? 0;
          $persen = ($data['total'] > 0) ? ($jumlah / $data['total']) * 100 : 0;
        ?>
          <div class="text-start mt-2">
            <strong><?= $label ?></strong>
            <div class="progress" style="height: 30px;">
              <div class="progress-bar bg-warning text-dark d-flex align-items-center ps-2"
                   style="width: <?= $persen ?>%;">
                <?= $jumlah ?> PRESTASI
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>

    </section>