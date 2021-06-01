<?php
include('koneksi_db.php');

$idNasabah 		= $_POST['idNasabah'];
$nama			= $_POST['namaNasabah'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$pekerjaan		= $_POST['pekerjaan'];
$norek			= $_POST['norek'];

$saldo			= $_POST['saldo'];
$pinjam			= $_POST['pinjam'];

$id 			= $_POST['id'];
$username		= $_POST['username'];
$password		= $_POST['password'];
$level			= $_POST['level'];


// query SQL untuk insert data
$nasabah = "INSERT INTO tb_nasabah VALUES ('".$idNasabah."', '".$nama."', '".$jenisKelamin."', '".$alamat."', '".$telp."', '".$pekerjaan."', '".$norek."', '".$saldo."', '".$pinjam."')";

$login	 = "INSERT INTO tb_login VALUES ('".$id."','".$username."', '".$password."', '".$level."')";

$result = mysqli_query($koneksi, $nasabah);
$result = mysqli_query($koneksi, $login);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-nasabah.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-nasabah.php'>Kembali ke form</a>";
}
?>