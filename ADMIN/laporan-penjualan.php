<!-- Alert Login -->
<?php
session_start();
if(empty($_SESSION)){
echo "<script>alert('Anda Harus Login Terlebih Dahulu');
document.location='login.php';
</script>";
}
?>
<!-- Alert Login -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - SI Bank Sampah</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Navigation-->
    <?php include 'navbar.php'; ?>
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Laporan PenJUALAN</li>
        </ol>

        <!-- FORM FILTER -->
        <form method="GET" action="laporan-pinjaman.php">
          <div class="row">
            <div class="col-sm-6 col-md-4">
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
            </div>
          </div>
          <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>

          <?php
          if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
          echo '<a href="laporan-penjualan.php" class="btn btn-default">RESET</a>';
          ?>
        </form>
        <!-- FORM FILTER -->

        <?php
        // Load file koneksi.php
        include "koneksi_db.php";

        $tgl_awal  = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data Pinjaman
        $query     = "SELECT pj.id_jual, pj.kode_jual, pt.kode_petugas, p.kode_pengepul, u.nama, j.nama_jenis, pj.berat_jual, pj.total_jual, pj.tanggal_jual FROM tb_penjualan pj, tb_petugas pt, tb_pengepul p, tb_users u, tb_jenis_sampah j WHERE p.id_pengepul = pj.pengepul_id and pt.id_petugas = pj.petugas_id and p.users_id = u.id AND j.id_jenis_sampah = pj.jenis_sampah_id";
        $url_cetak = "print-laporan-penjualan.php";
        $label     = "Semua Data Penjualan";
        }else{ // Jika terisi
        // Buat query untuk menampilkan data Pinjaman sesuai periode tanggal
        $query     = "SELECT pj.id_jual, pj.kode_jual, pt.kode_petugas, p.kode_pengepul, u.nama, j.nama_jenis, pj.berat_jual, pj.total_jual, pj.tanggal_jual FROM tb_penjualan pj, tb_petugas pt, tb_pengepul p, tb_users u, tb_jenis_sampah j WHERE p.id_pengepul = pj.pengepul_id and pt.id_petugas = pj.petugas_id and p.users_id = u.id AND j.id_jenis_sampah = pj.jenis_sampah_id AND (tanggal_jual BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
        $url_cetak = "print-laporan-penjualan.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
        $tgl_awal  = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
        $label     = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        ?>
        <hr />
        <h4 style="margin-bottom: 5px;"><b>Data Penjualan</b></h4>
        <?php echo $label ?><br />
        <div style="margin-top: 5px;">
          <a href="<?php echo $url_cetak ?>">CETAK LAPORAN</a>
        </div>
        <div class="table-responsive" style="margin-top: 10px;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Penjualan</th>
                <th>Kode Petugas</th>
                <th>Kode Pengepul</th>
                <th>Nama Pengepul</th>
                <th>Jenis Sampah</th>
                <th>Berat Sampah</th>
                <th>Total Penjualan</th>
              </tr>
            </thead>
            <tbody>
              <?php
               function decrypt_aes($string) {
                $encrypt_method = "AES-256-CBC";
                $secret_key = 'sadgjakgdkjafkj';
                $secret_iv = 'This is my secret iv';

                $key = hash('sha256', $secret_key);  
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                return $output;
              }
              $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
              $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
              $nomor = 1;
              if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
              while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
              $tgl = date('d-m-Y', strtotime($data['tanggal_jual'])); // Ubah format tanggal jadi dd-mm-yyyy
              echo "<tr>";
                echo "<td>".$nomor++."</td>";
                echo "<td>".$tgl."</td>";
                echo "<td>".$data['kode_petugas']."</td>";
                echo "<td>".$data['kode_pengepul']."</td>";
                echo "<td>".decrypt_aes($data['nama'])."</td>";
                echo "<td>".$data['nama_jenis']."</td>";
                echo "<td>".$data['berat_jual']."</td>";
                echo "<td>Rp".$data['total_jual']."</td>";
              echo "</tr>";
              }
              }else{ // Jika data tidak ada
              echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <?php include 'footer.php'; ?>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      
      <!-- Logout-->
      <?php include('logout-modal.php'); ?>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>

      <!-- Include library Moment (Dibutuhkan untuk Datepicker) -->
      <script src="vendor/libraries/moment/moment.min.js"></script>
      <!-- Include library Bootstrap Datepicker -->
      <script src="vendor/libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Include File JS Custom (untuk fungsi Datepicker) -->
      <script src="js/custom.js"></script>
      <script>
      $(document).ready(function(){
      setDateRangePicker(".tgl_awal", ".tgl_akhir")
      })
      </script>

    </div>
  </body>
</html>