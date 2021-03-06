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
        <li class="breadcrumb-item active">Petugas</li>
      </ol>

      <!-- Button tambah-->
      <div class="form-group">
        <a href="form-tambah-petugas.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </div>

      <!-- DataTables Petugas-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Petugas</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Petugas</th>
                  <th>Nama Petugas</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Menampilkan data dari database ke Tabel -->
                <?php
                include('koneksi_db.php');
                $result = mysqli_query($koneksi,"SELECT p.*, u.*  FROM tb_petugas p, tb_users u where p.users_id = u.id");
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
                    echo "<td>".decrypt_aes($data['nama'])."</td>";
                    echo "<td>".$data['jenis_kelamin']."</td>";
                    echo "<td>".decrypt_aes($data['alamat'])."</td>";
                    echo "<td>".decrypt_aes($data['telp'])."</td>";
                    echo "<td>".$data['jabatan']."</td>";
                    echo "<td>
                          <a href='form-edit-petugas.php?id=".$data['kode_petugas']."' class = 'btn btn-warning btn-sm'><i class='fa fa-pencil'></i> Edit</a>
                          <a data-href='proses-hapus-petugas.php?id=".$data['kode_petugas']."' class = 'btn btn-danger btn-sm' data-toggle='modal' data-target='#konfirmasi_hapus'><i class='fa fa-trash-o'></i> Hapus</a>
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
      <!-- DataTables Petugas-->

    </div>

    <!-- Hapus Petugas-->
    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <a class="btn btn-danger btn-ok"> Hapus</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hapus Petugas-->

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

  <!-- Hapus Petugas-->
  <script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });

  </script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Hapus Petugas-->

</body>

</html>
