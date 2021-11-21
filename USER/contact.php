<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SI Bank Sampah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Anyar - v2.2.1
    * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>
  <body>
    <!-- ======= Top Bar ======= -->
    <?php include 'navbar.php'; ?>
    <!-- End Header -->
    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
          </ol>
          <h2>Contact</h2>
        </div>
        </section><!-- End Breadcrumbs -->

        <?php
        include('koneksi_db.php');
        $query   = mysqli_query($koneksi,"SELECT * FROM tb_config WHERE id_config = 10 OR id_config = 11 OR id_config = 12 ");
        //$contact = mysqli_fetch_array($query);
        ?>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2>Contact Us</h2>
            </div>
            <div class="row">
              <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-right" data-aos-delay="100">
                <div class="col-lg-5">
                  <div class="info">
                    <?php 
                      $class = [ "address", "icofont-google-map", "email", "icofont-envelope", "phone", "icofont-phone"];
                      $div = 0;
                      $i = 1;
                      while($data = mysqli_fetch_array($query)) {
                    ?>
                    <div class=<?php echo $class[$div]; $div += 2;?>>
                      <i class=<?php echo $class[$i]; $i += 2;?>></i>
                      <h4><?php echo $data['judul']; echo" :";?></h4>
                      <p><?php echo $data['isi']; ?></p>
                    </div>
                    <?php 
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section><!-- End Contact Section -->
          </main><!-- End #main -->
          <!-- ======= Footer ======= -->
          <?php include 'footer.php'; ?>
          <!-- End Footer -->
          <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
          <div id="preloader"></div>
          <!-- Vendor JS Files -->
          <script src="assets/vendor/jquery/jquery.min.js"></script>
          <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
          <script src="assets/vendor/php-email-form/validate.js"></script>
          <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
          <script src="assets/vendor/venobox/venobox.min.js"></script>
          <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
          <script src="assets/vendor/aos/aos.js"></script>
          <!-- Template Main JS File -->
          <script src="assets/js/main.js"></script>
        </body>
      </html>