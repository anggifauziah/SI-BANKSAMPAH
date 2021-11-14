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
      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="menu-jenis-sampah.php">Jenis Sampah</a>
        </li>
        <li class="breadcrumb-item active">Form Edit Jenis</li>
      </ol>
      <!-- Breadcrumbs -->

      <?php
      include('koneksi_db.php');
      //mengambil data dengan id paling besar
      $id_jenis_sampah  = $_GET['id'];
      $jenis            = mysqli_query($koneksi,"SELECT * FROM tb_jenis_sampah WHERE id_jenis_sampah='$id_jenis_sampah'");
      $row              = mysqli_fetch_array($jenis);
      ?>

      <!-- Form Petugas -->
      <form method="POST" action="proses-edit-jenis.php" enctype="multipart/form-data">
        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Jenis Sampah</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <input type="hidden" class="form-control" name="id_jenis_sampah" id="InputId" value="<?php echo $row['id_jenis_sampah']; ?>" readonly required>
              <div class="form-group col-md-6">
                <label for="InputId">Kode Jenis Sampah</label>
                <input type="text" class="form-control" name="kode_jenis_sampah" id="InputKode" placeholder="Kode Jenis Sampah" value="<?php echo $row['kode_jenis_sampah']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputNama">Nama Jenis Sampah</label>
                <input type="text" class="form-control" name="nama_jenis_sampah" id="InputNama" placeholder="Nama Jenis Sampah" value="<?php echo $row['nama_jenis']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputBeli">Harga Beli/kg</label>
                <input type="number" class="form-control" name="harga_beli" id="InputBeli" placeholder="Harga Beli"  value="<?php echo $row['harga_beli']; ?>" required>
              </div>
                <div class="form-group col-md-6">
                <label for="InputBeli">Harga Jual/kg</label>
                <input type="number" class="form-control" name="harga_jual" id="InputJual" placeholder="Harga Jual"  value="<?php echo $row['harga_jual']; ?>" required>
              </div>
             
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <input type="submit" name="Submit" value="Simpan" class="btn btn-primary">
          <input type="button" value="Cancel" class="btn btn-warning" onclick="history.back(-1)" />
        </div>
      </form>
      <!-- Form Petugas -->

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include 'footer.php'; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Scroll to Top Button-->

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
