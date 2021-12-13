<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   		    	= $_POST['id'];
$nama			      = $_POST['nama_Pengepul'];
$alamat		    	= $_POST['alamat'];
$telp 			    = $_POST['telp'];

function encrypt_aes($string) {
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'sadgjakgdkjafkj';
    $secret_iv = 'This is my secret iv';

    $key = hash('sha256', $secret_key);  
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    return $output;
}

$e_nama=encrypt_aes($nama);
$e_alamat=encrypt_aes($alamat);
$e_telp=encrypt_aes($telp);

// query SQL untuk update data
$query  = "UPDATE tb_users u SET u.nama = '$e_nama', u.alamat = '$e_alamat', u.telp = '$e_telp' WHERE u.id = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
  // mengalihkan ke halaman index.php
header("location: menu-pengepul.php");
}else{
  echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br>error : ".mysqli_error($koneksi);
echo "<br><a href='form-edit-pengepul.php'>Kembali ke form</a>";
}
?>