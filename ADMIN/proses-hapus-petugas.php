<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     = $_GET['id'];

$query  = "DELETE FROM tb_petugas WHERE id_petugas LIKE '%$id%'";
$result = mysqli_query($koneksi, $query);

if ($result) {
	echo "<script>alert('Data berhasil dihapus !!');
	document.location='menu-petugas.php';
  	</script>";
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br>error : ".mysqli_error($koneksi);
	echo "<br><a href='menu-petugas.php'>Kembali ke menu</a>";
}
?>