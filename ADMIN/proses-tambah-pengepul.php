<?php
include('koneksi_db.php');

$idPengepul 	= $_POST['id_Pengepul'];
$namaPengepul	= $_POST['nama_Pengepul'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];

// query SQL untuk insert data
$query = "INSERT INTO tb_pengepul VALUES ('".$idPengepul."','".$namaPengepul."','".$jenisKelamin."','".$alamat."','".$telp."')";
$result = mysqli_query($koneksi, $query);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-pengepul.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form-tambah-pengepul.php'>Kembali ke form</a>";
}
?>