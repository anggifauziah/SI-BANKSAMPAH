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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tarik</li>
      </ol>

      <!-- Button tambah-->
      <div class="form-group">
        <a href="form-tambah-tarik.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </div>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tarik Tabungan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Petugas</th>
                  <th>Kode Nasabah (NIK)</th>
                  <th>Nama Nasabah</th>
                  <th>Jumlah Tarik</th>
                  <th>Tanggal Tarik</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Menampilkan data dari database ke Tabel -->
                <?php
                include('koneksi_db.php');
                $result = mysqli_query($koneksi,"SELECT t.id_tarik_tabungan, t.kode_tarik_tabungan, p.kode_petugas, n.kode_nasabah, u.nama, t.jumlah_tarik, t.tanggal_tarik 
                  FROM tb_tarik_tabungan t, tb_nasabah n, tb_users u, tb_petugas p
                  WHERE t.nasabah_id = n.id_nasabah and t.petugas_id = p.id_petugas and n.users_id = u.id
                  ORDER BY t.tanggal_tarik ASC");
                $nomor = 1;
                function decrypt_aes($string) {
                  $encrypt_method = "AES-256-CBC";
                  $secret_key = 'sadgjakgdkjafkj';
                  $secret_iv = 'This is my secret iv';

                  $key = hash('sha256', $secret_key);  
                  $iv = substr(hash('sha256', $secret_iv), 0, 16);

                  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                  return $output;
                }
                ?>
                <?php
                  while($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$nomor++."</td>";
                    echo "<td>".$data['kode_petugas']."</td>";
                    echo "<td>".decrypt_aes($data['kode_nasabah'])."</td>";
                    echo "<td>".decrypt_aes($data['nama'])."</td>";
                    echo "<td>Rp".$data['jumlah_tarik']."</td>";
                    echo "<td>".$data['tanggal_tarik']."</td>";
                    echo "<td>
                          <a href='print-struk-tarik.php?id=".$data['kode_tarik_tabungan']."' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Print</a>
                          </td>";
                    echo "</tr>";
                  }
                 ?>
                 <!-- Sampai sini -->
              </tbody>
            </table>
          </div>
        </div>
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
  </div>
</body>

</html>
