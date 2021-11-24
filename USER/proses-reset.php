<?php
include 'koneksi_db.php';

// menyimpan data kedalam variabel
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// query SQL untuk update data jika pw diulang sama

if ($password == $password1) {
  $query  = "UPDATE tb_users SET password = '$password' WHERE username = '$username'";
  $result = mysqli_query($koneksi, $query);
}else{
  echo"<script>alert('Sesuaikan pengulangan password !!');document.location='form-reset-password.php';</script>"; 
}

if($result){
  // mengalihkan ke halaman profil.php
  echo"<script>alert('Password berhasil disimpan'); document.location='profil.php';</script>";
}else{
  echo"<script>alert('Tidak dapat memasukan data ke database !!');document.location='form-reset-password.php';</script>"; 
}    
?>