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

<?php
include 'koneksi_db.php';
$id       = $_GET['id'];
$nasabah  = mysqli_query($koneksi,"SELECT * FROM tb_nasabah WHERE id_nasabah='$id'");
$row      = mysqli_fetch_array($nasabah);
?>

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
        <li class="breadcrumb-item">
          <a href="menu-petugas.php">Nasabah</a>
        </li>
        <li class="breadcrumb-item active">Form Edit Nasabah</li>
      </ol>

      <!-- Form Edit Nasabah -->
      <form method="POST" action="proses-edit-nasabah.php">
        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Diri Nasabah</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputId">ID Nasabah</label>
                <input type="number" class="form-control" name="idNasabah" id="InputId" value="<?php echo $row['id_nasabah']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputNama">Nama Lengkap</label>
                <input type="text" class="form-control" name="namaNasabah" id="InputNama" value="<?php echo $row['nama_nasabah']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputJk">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jk" id="InputJk" value="<?php echo $row['jk_nasabah']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputAlamat">Alamat</label>
                <textarea class="form-control" id="InputAlamat" name="alamat" required rows="2"><?php echo $row['alamat_nasabah']; ?></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="InputTelepon">Nomor Telepon/HP</label>
                <input type="number" class="form-control" name="telp" id="InputTelepon" value="<?php echo $row['telp_nasabah']; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputPekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="InputPekerjaan" value="<?php echo $row['pekerjaan_nasabah']; ?>" required>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Informasi Rekening</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputId">Nomor Rekening</label>
                <input type="text" class="form-control" name="norek" id="InputId" value="<?php echo $row['norek_nasabah']; ?>" readonly required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputId">Saldo</label>
                <input type="text" class="form-control" name="saldo" id="InputSaldo" value="<?php echo "Rp",$row['saldo_nasabah']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputId">Pinjaman</label>
                <input type="text" class="form-control" name="pinjam" id="InputPinjam" value="<?php echo "Rp",$row['pinjaman_nasabah']; ?>" readonly required>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <input type="submit" name="Submit" value="Simpan" class="btn btn-primary">
          <input type="button" value="Cancel" class="btn btn-warning" onclick="history.back(-1)" />
        </div>
      </form>
      <!-- Form Edit Nasabah -->

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
