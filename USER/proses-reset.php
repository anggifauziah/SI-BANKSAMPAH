
<?php
include 'koneksi_db.php';

// menyimpan data kedalam variabel
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// query SQL untuk update data jika pw diulang sama

 if ($password == $password1) {
      $query  = "UPDATE tb_login SET password = '$password' WHERE username = '$username'";
      $result = mysqli_query($koneksi, $query);}
      else{
        echo"<script>alert('Sesuaikan pengulangan password !!')</script>";
        echo "<br><a href='form-reset-password.php'>Kembali ke form</a>";
      }

if($result){
        // mengalihkan ke halaman index.php
    echo"<script>alert('Password berhasil disimpan'); document.location='profil.php';</script>";
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form-reset-password.php'>Kembali ke form</a>";
    }
?>