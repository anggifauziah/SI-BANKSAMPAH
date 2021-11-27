<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   		    	= $_POST['id'];
$nama			      = $_POST['nama_Pengepul'];
$alamat		    	= $_POST['alamat'];
$telp 			    = $_POST['telp'];

// query SQL untuk update data
$query  = "UPDATE tb_users u SET u.nama = '$nama', u.alamat = '$alamat', u.telp = '$telp' WHERE u.id = '$id'";
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