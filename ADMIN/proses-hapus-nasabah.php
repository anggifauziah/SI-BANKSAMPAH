<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     = $_GET['id'];

$query  = "DELETE n,l FROM tb_nasabah n INNER JOIN tb_login l ON n.norek_nasabah = l.username WHERE id_nasabah LIKE '%$id%'";
$result = mysqli_query($koneksi, $query);

if ($result) {
	echo "<script>alert('Data berhasil dihapus !!');
	document.location='menu-nasabah.php';
  	</script>";
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk menghapus data.";
	echo "<br>error : ".mysqli_error($koneksi);
	echo "<br><a href='menu-nasabah.php'>Kembali ke menu</a>";
}
?>