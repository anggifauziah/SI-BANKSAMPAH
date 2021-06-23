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
          <li><a href="index.html">Home</a></li>
          <li>Profil</li>
        </ol>
        <h2>Profil Nasabah</h2>

      </div>
    </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->


        <section id="blog" class="blog">
          <div class="container">
             <a href="form-reset-password.php" class="btn btn-primary">Reset Password</a>
             <br>
             <br>
           
              <div class="card border-dark mb-5" style="max-width: 100rem;">
                <div class="card-header">Informasi Identitas Nasabah</div>
                <div class="card-body text-dark">
                  
                  <!-- DataTables Petugas-->
                    <div class="card-body">
                      <div class="table table-responsive-xl">
                        <table class="table" id="dataTable" max-width="100%" cellspacing="0" style="width: 100%">
                        
                          <tbody>
                            <!-- Menampilkan data dari database ke Tabel -->
                            <?php
                            include('koneksi_db.php');
                            $result = mysqli_query($koneksi,"SELECT n.id_nasabah, n.norek_nasabah, n.nama_nasabah, n.jk_nasabah, n.alamat_nasabah, n.telp_nasabah, n.pekerjaan_nasabah, n.tgl_daftar, l.username FROM tb_nasabah n, tb_login l WHERE n.norek_nasabah=$_SESSION[username]");
                            $data   = mysqli_fetch_array($result);
                            ?>
                            <tr>
                              <td>ID Nasabah</td>
                              <td>:</td>
                              <td><?php echo $data['id_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Nomor Rekening</td>
                              <td>:</td>
                              <td><?php echo $data['norek_nasabah'] ?></td>
                            </tr>
                            
                            <tr>
                              <td>Nama Nasabah</td>
                              <td>:</td>
                              <td><?php echo $data['nama_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?php echo $data['jk_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?php echo $data['alamat_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Telepon</td>
                              <td>:</td>
                              <td><?php echo $data['telp_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Pekerjaan</td>
                              <td>:</td>
                              <td><?php echo $data['pekerjaan_nasabah'] ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal Daftar</td>
                              <td>:</td>
                              <td><?php echo date('d-m-Y', strtotime($data['tgl_daftar'])); ?></td>
                            </tr>
                            <!-- Sampai sini -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- DataTables Petugas-->
                  
                </div>
          
            </div>
          </section>

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