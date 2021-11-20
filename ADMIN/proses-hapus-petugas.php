<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id     	= $_GET['id'];

$petugas	= mysqli_query($koneksi, "SELECT users_id FROM tb_petugas WHERE kode_petugas = '$id'");
$hasil 		= mysqli_fetch_array($petugas);
$iduser		= $hasil['users_id'];

$query  	= "DELETE FROM tb_petugas WHERE kode_petugas LIKE '%$id%'";
$result 	= mysqli_query($koneksi, $query);

if ($query) {
	$users  = "DELETE FROM tb_users WHERE  id LIKE '%$iduser%'";
	$result = mysqli_query($koneksi, $users);
}

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