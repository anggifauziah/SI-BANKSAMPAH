<?php
include('koneksi_db.php');

$id_jenis 	= $_POST['id_jenis'];
$nama_jenis	= $_POST['nama_jenis'];
$Beli   	= $_POST['Beli'];
$jual		= $_POST['Jual'];

// query SQL untuk insert data
$query = "INSERT INTO tb_jenis_sampah VALUES ('".$id_jenis."', '".$nama_jenis."', '".$Beli."', '".$jual."')";
$result = mysqli_query($koneksi, $query);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-jenis-sampah.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form-tambah-jenis.php'>Kembali ke form</a>";
}
?>