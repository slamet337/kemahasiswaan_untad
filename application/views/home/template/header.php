<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="assets/img/YAKUZA.png" type="">

  <title><?= $title; ?></title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="assets/css1/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" 
  rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" 
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="assets/css1/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="assets/css1/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/css1/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>
<style>
  .progress-bar {
  background-color: #ffc107;
  color: #000; /* biar tulisan kontras di atas kuning */
  font-weight: bold;
  display: flex;
  justify-content: center;
  align-items: center;
}

nav ul:after {
    content: "";
    clear: both;
    display: block;
}
 
nav ul li {
    float: left;
}
 
nav ul li:hover {
    background-color: #222;
 
}
 
nav ul li a {
 
    display: block;
    padding: 20px 30px;
    text-decoration: none;
    color: #fff;
 
}
 
.dropdown-menu {
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.dropdown-item:hover {
  background-color: #f0f0f0;
  color: #007bff;
}

  .progress {
    background-color: #e0e0e0;
    border-radius: 5px;
  }

  .progress-bar {
    font-size: 14px;
  }


</style>
<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="assets/images1/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="">
            <span>
              Kemahasiswaan
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
<script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
<script>
  new PureCounter();

  // Format angka ribuan setelah animasi selesai (opsional)
  document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
      document.querySelectorAll('.purecounter').forEach(el => {
        const num = parseInt(el.innerText.replace(/\D/g, ''));
        el.innerText = num.toLocaleString('id-ID');
      });
    }, 1200); // sedikit lebih dari duration PureCounter (1 detik)
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>