<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id_config  = $_GET['id'];

$query  = "DELETE FROM tb_config WHERE id_config=$id_config";
$result = mysqli_query($koneksi, $query);

if ($result) {
	echo "<script>alert('Data berhasil dihapus !!');
	document.location='menu-configuration.php';
  	</script>";
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br>error : ".mysqli_error($koneksi);
	echo "<br><a href='menu-jenis-sampah.php'>Kembali ke menu</a>";
}
?>