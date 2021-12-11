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
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
            <li>Tabungan</li>
          </ol>
          <h2>Total Tabungan</h2>
        </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
          <div class="container">
            <div class="card border-dark mb-5" style="max-width: 100rem;">
              <div class="card-header">Informasi Tabungan Nasabah</div>
              <div class="card-body text-dark">
                
                <!-- DataTables Petugas-->
                <div class="card-body">
                  <div class="table table-responsive-xl">
                    <table class="table" id="dataTable" max-width="100%" cellspacing="0" style="width: 100%">
                      
                      <tbody>
                        <!-- Menampilkan data dari database ke Tabel -->
                        <?php
                        include('koneksi_db.php');
                        $result = mysqli_query($koneksi,"SELECT u.username, n.kode_nasabah, u.nama, n.nomor_rekening, n.saldo FROM tb_users u, tb_nasabah n WHERE n.users_id = u.id AND n.nomor_rekening=$_SESSION[username]");
                        $data   = mysqli_fetch_array($result);
                        ?>
                        
                        <tr>
                          <td>Kode Nasabah (NIK)</td>
                          <td>:</td>
                          <td><?php echo $data['kode_nasabah'] ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Rekening</td>
                          <td>:</td>
                          <td><?php echo $data['nomor_rekening'] ?></td>
                        </tr >
                        <tr>
                          <td>Nama Nasabah</td>
                          <td>:</td>
                          <td><?php echo $data['nama'] ?></td>
                        </tr>
                        <tr>
                          <td>Saldo Nasabah</td>
                          <td>:</td>
                          <td><?php echo "Rp",$data['saldo'] ?></td>
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
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
          <div class="container">
            
            <div class="card-header">Riwayat Transaksi</div>
            <div class="card-body text-dark">
              
              <!-- DataTables Petugas-->
              <div class="card-body">
                <form method="GET" action="tabungan.php">
                  <div class="form-group">
                    <label>Filter Tanggal</label>
                    <div class="input-group">
                      <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal datetimepicker-input" placeholder="Tanggal Awal" data-toggle="datetimepicker" data-target=".tgl_awal" autocomplete="off">
                      <div class="input-group-append">
                        <span class="input-group-text">s/d</span>
                      </div>
                      <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir datetimepicker-input" placeholder="Tanggal Akhir" data-toggle="datetimepicker" data-target=".tgl_akhir" autocomplete="off">
                    </div>
                  </div>
                  <div>
                    <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                    <?php
                      if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                      echo '<a href="tabungan.php" class="btn btn-warning">RESET</a>';
                    ?>
                  </div>
                </form>
                <?php
                  // Load file koneksi.php
                  include "koneksi_db.php";

                  $tgl_awal  = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                  $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

                  if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                    // Buat query untuk menampilkan semua data tabungan
                    $queryp      = "SELECT p.kode_tabung, p.total_tabung, p.tanggal_tabung FROM tb_tabungan p,tb_nasabah n WHERE p.nasabah_id=n.id_nasabah and n.nomor_rekening=$_SESSION[username]";
                    $queryt     = "SELECT t.kode_tarik_tabungan, t.jumlah_tarik, t.tanggal_tarik FROM tb_tarik_tabungan t,tb_nasabah n WHERE t.nasabah_id=n.id_nasabah and n.nomor_rekening=$_SESSION[username]";
                  }else{ // Jika terisi
                    // Buat query untuk menampilkan data tabungan sesuai periode tanggal
                    $queryp     = "SELECT p.kode_tabung, p.total_tabung, p.tanggal_tabung FROM tb_tabungan p,tb_nasabah n WHERE p.nasabah_id=n.id_nasabah and n.nomor_rekening=$_SESSION[username] AND (tanggal_tabung BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                    $queryt     = "SELECT t.kode_tarik_tabungan, t.jumlah_tarik, t.tanggal_tarik FROM tb_tarik_tabungan t,tb_nasabah n WHERE t.nasabah_id=n.id_nasabah and n.nomor_rekening=$_SESSION[username] AND (tanggal_tarik BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
                  }
                ?>
                
                <br>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Menampilkan data dari database ke Tabel -->
                      <?php
                      $nomor = 1;
                      $result_tabung = mysqli_query($koneksi, $queryp);
                      $result_tarik  = mysqli_query($koneksi, $queryt);
                      $row1          = mysqli_num_rows($result_tabung);
                      $row2          = mysqli_num_rows($result_tarik);
                      if ($row1 + $row2 > 0) {
                        while($data_tabung = mysqli_fetch_array($result_tabung)) {
                          $tgl_tabung = date('d-m-Y', strtotime($data_tabung['tanggal_tabung']));
                          echo "<tr>";
                            echo "<td>".$nomor++."</td>";
                            echo "<td>+ Rp".$data_tabung['total_tabung']."</td>";
                            echo "<td>".$tgl_tabung."</td>";
                          echo "</tr>";
                        }
                        while($data_tarik = mysqli_fetch_array($result_tarik)) {
                          $tgl_tarik = date('d-m-Y', strtotime($data_tarik['tanggal_tarik']));
                          echo "<tr>";
                            echo "<td>".$nomor++."</td>";
                            echo "<td>- Rp".$data_tarik['jumlah_tarik']."</td>";
                            echo "<td>".$tgl_tarik."</td>";
                          echo "</tr>";
                        }
                      } else { //jika data tidak ada
                        echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
                      }
                      
                      ?>
                      <!-- Sampai sini -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- DataTables Petugas-->
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
        <!-- Page level plugin JavaScript-->
        <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Include library Moment (Dibutuhkan untuk Datepicker) -->
        <script src="assets/vendor/libraries/moment/moment.min.js"></script>
        <!-- Include library Bootstrap Datepicker -->
        <script src="assets/vendor/libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Include File JS Custom (untuk fungsi Datepicker) -->
        <script src="assets/js/custom.js"></script>
        <script>
          $(document).ready(function(){
            setDateRangePicker(".tgl_awal", ".tgl_akhir")
          })
        </script>
      </body>
    </html>