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

<body class="fixed-nav sticky-footer bg-light" id="page-top">

  <?php
    include 'koneksi_db.php';
    $tabungan          = mysqli_query($koneksi, "SELECT * FROM tb_tabungan");
    $jumlah_tabungan   = mysqli_num_rows($tabungan);

    $tarik             = mysqli_query($koneksi, "SELECT * FROM tb_tarik_tabungan");
    $jumlah_tarik      = mysqli_num_rows($tarik);

    $pinjam            = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman");
    $jumlah_pinjam     = mysqli_num_rows($pinjam);

    $angsuran          = mysqli_query($koneksi, "SELECT * FROM tb_angsuran");
    $jumlah_angsuran   = mysqli_num_rows($angsuran);       
  ?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-book"></i>
              </div>
              <div class="mr-5">
                <?php echo $jumlah_tabungan; ?> Data Tabungan
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu-tabung.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
                <?php echo $jumlah_tarik; ?> Data Tarik Tabungan
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu-tarik.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file"></i>
              </div>
              <div class="mr-5">
                <?php echo $jumlah_pinjam; ?> Data Pinjaman
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu-pinjaman.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-clipboard"></i>
              </div>
              <div class="mr-5">
                <?php echo $jumlah_angsuran; ?> Data Angsuran
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu-angsuran.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div id="grafik">
          </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>

    <script src="js/highcharts/highcharts.js"></script>
    <script src="js/highcharts/exporting.js"></script>
    <script src="js/highcharts/export-data.js"></script>
    <script src="js/highcharts/accessibility.js"></script>

<script type="text/javascript">
  Highcharts.chart('grafik', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Grafik Jumlah Nasabah'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
        <?php
          include('koneksi_db.php');
          $data = mysqli_query($koneksi, "SELECT YEAR(tgl_daftar) AS tahun_daftar, COUNT(*) AS jumlah FROM tb_nasabah GROUP BY YEAR(tgl_daftar) ORDER BY YEAR(tgl_daftar)");
          while ($row = mysqli_fetch_array($data)) {
            $th = $row['tahun_daftar'];
            $jm = $row['jumlah'];
            echo "'$th',";
          }
        ?>
        ],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' Nasabah'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Tahun Daftar',
        data: [
        <?php
          include('koneksi_db.php');
          $data = mysqli_query($koneksi, "SELECT YEAR(tgl_daftar) AS tahun_daftar, COUNT(*) AS jumlah FROM tb_nasabah GROUP BY YEAR(tgl_daftar) ORDER BY YEAR(tgl_daftar)");
          while ($row = mysqli_fetch_array($data)) {
            $th = $row['tahun_daftar'];
            $jm = $row['jumlah'];
            echo "$jm,";
          }
        ?>
        ]
    }]
});
</script>

  </div>
</body>

</html>
