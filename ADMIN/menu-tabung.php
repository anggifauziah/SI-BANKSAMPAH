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
        <li class="breadcrumb-item active">Tabungan</li>
      </ol>

      <!-- Button tambah-->
      <div class="form-group">
        <a href="form-tambah-tabungan.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </div>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabungan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Petugas</th>
                  <th>ID Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Jenis Sampah</th>
                  <th>Berat Sampah</th>
                  <th>Total Tabung</th>
                  <th>Tanggal Tabung</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <!-- Menampilkan data dari database ke Tabel -->
                <?php
                include('koneksi_db.php');
                $result = mysqli_query($koneksi,"SELECT t.id_tabung, t.id_petugas, t.id_nasabah, n.nama_nasabah, j.nama_jenis, t.berat_tabung, t.total_tabung, t.tanggal_tabung FROM tb_tabungan t, tb_nasabah n, tb_jenis_sampah j WHERE n.id_nasabah = t.id_nasabah AND j.id_jenis = t.id_jenis ORDER BY t.id_tabung ASC");
                $nomor = 1;
                ?>
                <?php
                  while($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$nomor++."</td>";
                    echo "<td>".$data['id_petugas']."</td>";
                    echo "<td>".$data['id_nasabah']."</td>";
                    echo "<td>".$data['nama_nasabah']."</td>";
                    echo "<td>".$data['nama_jenis']."</td>";
                    echo "<td>".$data['berat_tabung']."</td>";
                    echo "<td>Rp".$data['total_tabung']."</td>";
                    echo "<td>".$data['tanggal_tabung']."</td>";
                    echo "<td>
                          <a href='print-struk-tabungan.php?id=".$data['id_tabung']."' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Print</a>
                          </td>";
                    echo "</tr>";
                  }
                 ?>
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
