<?php
include('koneksi_db.php');

$kode_jenis_sampah 	= $_POST['kode_jenis_sampah'];
$nama_jenis_sampah	= $_POST['nama_jenis_sampah'];
$harga_beli   		= $_POST['harga_beli'];
$harga_jual			= $_POST['harga_jual'];

// query SQL untuk insert data
$query = "INSERT INTO tb_jenis_sampah (kode_jenis_sampah, nama_jenis, harga_beli, harga_jual) VALUES ('$kode_jenis_sampah', '$nama_jenis_sampah', '$harga_beli', '$harga_jual')";
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