<?php
include('koneksi_db.php');

$idPetugas 		= $_POST['idPetugas'];
$namaPetugas	= $_POST['namaPetugas'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$jabatan		= $_POST['jabatan'];

// query SQL untuk insert data
$query = "INSERT INTO tb_petugas VALUES ('".$idPetugas."', '".$namaPetugas."', '".$jenisKelamin."', '".$alamat."', '".$telp."', '".$jabatan."')";
$result = mysqli_query($koneksi, $query);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-petugas.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form-tambah-petugas.php'>Kembali ke form</a>";
}
?>