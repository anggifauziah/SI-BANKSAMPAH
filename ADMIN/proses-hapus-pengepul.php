<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     = $_GET['id'];

$query  = "DELETE FROM tb_pengepul WHERE id_pengepul=$id";
$result = mysqli_query($koneksi, $query);

if ($query) {
	header("location: menu-pengepul.php");
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br><a href='menu-pengepul.php'>Kembali ke menu</a>";
}


?>