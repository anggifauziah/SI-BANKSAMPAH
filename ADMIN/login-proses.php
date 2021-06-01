<?php 
session_start();
include 'koneksi_db.php'; 
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_login = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'"; 
    $cek = mysqli_num_rows($sql = mysqli_query($koneksi, $query_login));
    $data = mysqli_fetch_assoc($sql);
    if ($cek > 0) {
      $_SESSION['id_login'] = $data['id_login'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['password'] = $data['password'];
      header("location: index.php");
    }else{
    ?>
      <script language="JavaScript">
      alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
      document.location='login.php';
    </script>
    <?php
    }
  }
?>