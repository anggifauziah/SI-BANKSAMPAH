<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     = $_GET['id'];

$query  = "DELETE FROM tb_pengepul WHERE id_pengepul LIKE '%$id%'";
$result = mysqli_query($koneksi, $query);

if ($result) {
	echo "<script>alert('Data berhasil dihapus !!');
	document.location='menu-pengepul.php';
  	</script>";
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br>error : ".mysqli_error($koneksi);
	echo "<br><a href='menu-pengepul.php'>Kembali ke menu</a>";
}
?>