<?php
if (empty($_SESSION)) {
  session_start();
}
?>
<!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-inner-pages">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <?php
            include('koneksi_db.php'); 
            $query   = mysqli_query($koneksi,"SELECT judul, isi FROM tb_config WHERE id_config = 2 OR id_config = 3 OR id_config = 4 ");
            $class = ["icofont-envelope", "icofont-phone", "icofont-clock-time icofont-flip-horizontal"];
            $div = 0;
            while($data = mysqli_fetch_array($query)) {
              $isi = preg_replace('#</?p.*?>#is', '', $data['isi']);
              if ($data['judul'] == "Email"){
                echo "<li><i class=".$class[$div]."></i><a href='mailto:".$isi."'>".$isi."</a></li>";
                $div += 1;
              } else {
                echo "<li><i class=".$class[$div]."></i>".$isi."</li>";
                $div += 1;
              }
            }
          ?>
        </ul>
      </div>
      <div class="cta">
        <a href="ADMIN/login.php" class="scrollto" <?php if (!empty($_SESSION)) { echo "style='display:none'"; } ?>>Login</a>
        <a href="logout-proses.php" class="scrollto" <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>>Logout</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php" class="scrollto">BANK SAMPAH</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="informasi.php">Informasi</a></li>
          <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="profil.php">Profil</a></li>
          <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="tabungan.php">Tabungan</a></li>
          <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="pinjaman.php">Pinjaman</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
