<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIKADES</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/public/logo.png" rel="icon">
  <link href="<?= base_url(); ?>/public/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/profile/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/public/profile/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Techie - v4.9.1
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="#">SIKADES</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#fitur">Fitur</a></li>
          <li><a class="nav-link" href="<?= base_url(); ?>/CUtama/link_login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Aplikasi SIKADES membantu anda dalam urusan Desa</h1>
          <h2>Mengarsip dan membuat surat kini jadi lebih mudah</h2>
         <!-- <div><a href="#about" class="btn-get-started scrollto">Detail</a></div>-->
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="<?= base_url(); ?>/public/profile/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="<?= base_url(); ?>/public/profile/assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Apa itu aplikasi SIKADES?</h3>
            <p class="">
              Aplikasi SIKADES merupakan Aplikasi web yang bertujuan untuk membantu sekretaris desa dan masyarakat umum dalam melakukan kegiatan yang berkaitan dengan pengarsipan dan pengajuan surat
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Masyarakat umum dapat melakukan pengajuan surat secara online</li>
              <li><i class="bi bi-check-circle"></i> Sekretaris Desa dapat melakukan pengelolaan data yang berkaitan dengan surat dan pengarsipan</li>
            </ul>
           <!-- <a href="#" class="read-more">Read More <i class="bi bi-long-arrow-right"></i></a>-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-12 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?= $totaluser; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Pengguna</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Features Section ======= -->
    <section id="fitur" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Features</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-receipt"></i>
              <h4>Arsip Surat</h4>
              <p>Sekretaris desa dapat melakukan arsip surat masuk dan surat keluar</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Pengajuan Surat</h4>
              <p>Masyarakat dapat melakukan pengajuan secara online dengan melampirkan berkas yang diperlukan</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-shield"></i>
              <h4>Konfirmasi</h4>
              <p>Kepala desa dapat memeriksa kembali surat masuk, surat keluar dan pengajuan surat sebelum di setujui</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-download"></i>
              <h4>Upload dan Download</h4>
              <p>Tersedia fitur upload dan download untuk memudahkan user dalam melengkapi berkas yang diperlukan</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="<?= base_url(); ?>/public/profile/assets/img/features.svg" alt="" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
       <!-- <div class="me-md-auto text-center text-md-start">-->
          <div class="copyright text-center my-auto">
            &copy; Copyright <strong>
              <span>AF/SIKADES Sukawening <?= date('Y'); ?>
                
              </span>
              </strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
            <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
          </div>
        </div>
        <!--<div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>-->
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/public/profile/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/public/profile/assets/js/main.js"></script>

</body>

</html>