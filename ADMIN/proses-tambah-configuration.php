<?php
include('koneksi_db.php');

$judul		= $_POST['judul'];
$content	= $_POST['content'];

// query SQL untuk insert data
$query = "INSERT INTO tb_config (judul, isi) VALUES ('$judul', '$content')";
$result = mysqli_query($koneksi, $query);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-configuration.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form-tambah-jenis.php'>Kembali ke form</a>";
}
?>