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
          <a href="menu-petugas.php">Petugas</a>
        </li>
        <li class="breadcrumb-item active">Form Tambah Petugas</li>
      </ol>
      <!-- Breadcrumbs -->

      <?php
      include('koneksi_db.php');
      //mengambil data surat dengan id paling besar
      $query  = mysqli_query($koneksi, "SELECT MAX(id_petugas) as idTerbesar FROM tb_petugas");
      $data   = mysqli_fetch_array($query);
      $idPtgs = $data['idTerbesar'];

      //mengambil angka dari id surat terbesar, menggunakan fungsi substr
      //dan diubah ke int
      $urutan = (int) substr($idPtgs, 3, 3);
      //bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
      $id = $urutan+1;

      //membentuk id surat baru
      $huruf = "PT";
      $kode  = $huruf.sprintf("%03s", $id);
      ?>

      <!-- Form Petugas -->
      <form method="POST" action="proses-tambah-petugas.php" enctype="multipart/form-data">
        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Diri Petugas</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputId">ID Petugas</label>
                <input type="text" class="form-control" name="idPetugas" id="InputId" placeholder="ID Petugas" value="<?php echo($kode) ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputNama">Nama Lengkap</label>
                <input type="text" class="form-control" name="namaPetugas" id="InputNama" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputJenisKelamin">Jenis Kelamin</label>
                <select name="jenisKelamin" id="InputJenisKelamin" class="form-control" required>
                  <option selected disabled>::. Jenis Kelamin .::</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="InputAlamat">Alamat</label>
                <textarea class="form-control" id="InputAlamat" name="alamat" placeholder="Alamat" required rows="2"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="InputTelepon">Nomor Telepon/HP</label>
                <input type="number" class="form-control" name="telp" id="InputTelepon" placeholder="Nomor Telepon/HP" required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputJabatan">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="InputJabatan" placeholder="Jabatan" required>
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