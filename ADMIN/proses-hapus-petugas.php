<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     = $_GET['id'];

$query  = "DELETE FROM tb_petugas WHERE id_petugas=$id";
$result = mysqli_query($koneksi, $query);

if ($query) {
	header("location: menu-petugas.php");
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br><a href='menu-petugas.php'>Kembali ke menu</a>";
}


?>