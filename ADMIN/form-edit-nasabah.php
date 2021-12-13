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
$nasabah  = mysqli_query($koneksi,"SELECT u.id, n.kode_nasabah, u.nama, u.jenis_kelamin, u.alamat, u.telp, n.pekerjaan, n.nomor_rekening, n.saldo, n.pinjaman FROM tb_nasabah n INNER JOIN tb_users u ON n.users_id = u.id WHERE u.id = $id");
$row      = mysqli_fetch_array($nasabah);
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
        <li class="breadcrumb-item">
          <a href="menu-nasabah.php">Nasabah</a>
        </li>
        <li class="breadcrumb-item active">Form Edit Nasabah</li>
      </ol>

      <!-- Form Edit Nasabah -->
      <form method="POST" action="proses-edit-nasabah.php">
        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Diri Nasabah</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <input type="hidden" class="form-control" name="id" id="InputId" value="<?php echo $row['id']; ?>" readonly required>
              <div class="form-group col-md-6">
                <label for="InputKode">Kode Nasabah</label>
                <input type="number" class="form-control" name="kode_nasabah" id="InputKode" value="<?php echo decrypt_aes($row['kode_nasabah']); ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputNama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="InputNama" value="<?php echo decrypt_aes($row['nama']); ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputJenisKelamin">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenisKelamin" id="InputJenisKelamin" value="<?php echo $row['jenis_kelamin']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputAlamat">Alamat</label>
                <textarea class="form-control" id="InputAlamat" name="alamat" required rows="2"><?php echo decrypt_aes($row['alamat']); ?></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="InputTelepon">Nomor Telepon/HP</label>
                <input type="text" class="form-control" name="telp" id="InputTelepon" value="<?php echo decrypt_aes($row['telp']); ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputPekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="InputPekerjaan" value="<?php echo decrypt_aes($row['pekerjaan']); ?>" required>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Informasi Rekening</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputNorek">Nomor Rekening</label>
                <input type="text" class="form-control" name="norek" id="InputNorek" value="<?php echo decrypt_aes($row['nomor_rekening']); ?>" readonly required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputSaldo">Saldo</label>
                <input type="text" class="form-control" name="saldo" id="InputSaldo" value="<?php echo "Rp",$row['saldo']; ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputPinjam">Pinjaman</label>
                <input type="text" class="form-control" name="pinjam" id="InputPinjam" value="<?php echo "Rp",$row['pinjaman']; ?>" readonly required>
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
