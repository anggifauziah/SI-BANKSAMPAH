<?php
include 'koneksi_db.php';

// menyimpan data kedalam variabel
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

function encrypt_aes($string) {
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'sadgjakgdkjafkj';
    $secret_iv = 'This is my secret iv';

    $key = hash('sha256', $secret_key);  
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    return $output;
}
// query SQL untuk update data jika pw diulang sama
$username = encrypt_aes($username);
$password = encrypt_aes($password);

if ($password == $password1) {
  $query  = "UPDATE tb_users SET password = '$password' WHERE username LIKE '%$username%'";
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