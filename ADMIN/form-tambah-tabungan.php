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
          <a href="menu-tabung.php">Tabungan</a>
        </li>
        <li class="breadcrumb-item active">Form Tambah Tabungan</li>
      </ol>
      <!-- Breadcrumbs -->

      <?php
      include('koneksi_db.php');
      //mengambil data surat dengan id paling besar
      $query    = mysqli_query($koneksi, "SELECT MAX(kode_tabung) as idTerbesar FROM tb_tabungan");
      $data     = mysqli_fetch_array($query);
      $idTbg = $data['idTerbesar'];

      //mengambil angka dari id surat terbesar, menggunakan fungsi substr
      //dan diubah ke int
      $urutan = (int) substr($idTbg, 3, 3);
      //bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
      $id = $urutan+1;

      //membentuk id surat baru
      $huruf = "TBG";
      $kode  = $huruf.sprintf("%03s", $id);

      //ubah format bulan
      function formatBulan($tgl){
        $bln    = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $pecah = explode('-', $tgl);
        return $pecah[2]. ' ' . $bln[((int)$pecah[1])-1]. ' ' .$pecah[0];
      }
      ?>

      <!-- Form Angsuran -->
      <form method="POST" action="proses-tambah-tabungan.php">
        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Bank</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputKodeTabung">Kode Tabung</label>
                <input type="text" class="form-control" name="kode_tabung" id="InputKodeTabung" value="<?php echo($kode) ?>" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="InputKodePetugas">Kode Petugas</label>
                <input type="text" class="form-control" name="kode_petugas" id="InputKodePetugas" placeholder="Kode Petugas" required>
              </div>
            </div>
          </div>
        </div>

        <!-- Load file proses-search-nasabah.js -->
        <script type="text/javascript" src="proses-search-nasabah.js"></script>
        <!-- Load library jquery -->
        <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>

        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Data Diri Nasabah</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputKodeNasabah">Kode Nasabah (NIK)</label>
                <input type="number" class="form-control" name="kode_nasabah" id="kode_nasabah" placeholder="NIK KTP" required>
              </div>
              <div class="form-group col-md-4">
                <label for="btn-search">Search Data Nasabah</label><br>
                <button type="button" id="btn-search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button><span id="loading">LOADING...</span>
              </div>

              <!-- Load file DATA NASABAH -->
              <script>
                $(document).ready(function(){
                    $("#loading").hide(); // Sembunyikan loadingnya
  
                    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
                        search(); // Panggil function search
                    });
    
                    $("#kode_nasabah").keyup(function(event){ // Ketika user menekan tombol di keyboard
                        if(event.keyCode == 13){ // Jika user menekan tombol ENTER
                            search(); // Panggil function search
                        }
                   });
                });
              </script>
              <!-- Load file DATA NASABAH -->

              <div class="form-group col-md-6">
                <label for="InputNorek">Nomor Rekening</label>
                <input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="InputNama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="InputJk">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="InputAlamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="2" readonly></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="InputTelepon">Nomor Telepon/HP</label>
                <input type="number" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon/HP" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="InputPekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" readonly>
              </div>
            </div>
          </div>
        </div>

        <?php
        include('koneksi_db.php');
        $query = "SELECT * FROM tb_jenis_sampah"; //query untuk menampilkan data
        $sql = mysqli_query($koneksi, $query); //Eksekusi query dari var $query
        ?>

        <div class="card border-dark mb-3" style="max-width: 100rem;">
          <div class="card-header">Tabungan</div>
          <div class="card-body text-dark">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="InputJenis">Jenis Sampah</label>
                <select name="id_jenis_sampah" id="id_jenis_sampah" class="form-control" required>
                  <option value="" selected disabled>::. Pilih Jenis Sampah .::</option>
                <?php
                foreach ($sql as $key) { //menampilkan array dari $sql dialiaskan ke $key
                echo '<option value="'.$key['id_jenis_sampah'].'">'.$key['nama_jenis'].'</option>'; // $key['kolom dari database']
                }
                ?>
              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="InputHarga">Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="InputBerat">Berat Sampah</label>
                <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" required>
              </div>
              <div class="form-group col-md-4">
                <label for="InputTotal">Total</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="Total" readonly required>
              </div>
              <div class="form-group col-md-4">
                <label for="InputTglTabung">Tanggal Tabung</label>
                <input type="text" class="form-control" name="tanggal_tabung" id="InputTglTabung" value="<?php echo(formatBulan(date('Y-m-d')));?>" readonly required>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <input type="submit" name="Submit" value="Simpan" class="btn btn-primary">
          <input type="button" value="Cancel" class="btn btn-warning" onclick="history.back(-1)" />
        </div>
      </form>
      <!-- Form Angsuran -->

    </div>

    <!-- Harga Jenis Sampah -->
    <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        
      $(document).ready(function() { // ketika halaman sudah selesai terload, maka fungsi dijalankan
      $('#berat').on('change input', function () { //ketika id berat berubah valuenya maka
      getHargaBeli(); //memanggil fungsi getHargaBeli
      });
      });

      var harga = 0; // deklarasi variabel harga
      $('#id_jenis_sampah').change(function(){ // ketika mengklik id id_jenis / merubah valuenya maka fungsi dijalankan
      getHargaBeli(); //memanggil fungsi getHarga
      console.log(harga); //menampilkan hasil dari variabel data (menampilkan harga)
      });

      function getHargaBeli(){ // membuat fungsi getHargaBeli
      var id = $('#id_jenis_sampah').val(); // mendapatkan value dari id_jenis dan dimasukkan ke variabel id
      $.post("getHargaBeli-jenis.php", {id:id}).done(function(data){ // mengirimkan data ke url getHargaJenis
      $('#harga_beli').val(data); // mengisi id harga dengan variabel data
      if (($("#berat").val() != "")) { // pengecekan ketika id berat tidak kosong
      var berat = document.getElementById("berat").value; //maka ambil value dalam id berat
      var total = berat*data; // membuat variabel total, mengalikan variabel berat dan data
      $('#total').val(total); // mengisi id total_bayar dengan value dari variabel total_bayar
      }
      });
      }

      function setHargaBeli(){ //membuat fungsi setHargaBeli
      harga = $('#harga_beli').val(); //set variabel harga dari id harga
      }
    </script>
    <!-- Harga Jenis Sampah -->

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
